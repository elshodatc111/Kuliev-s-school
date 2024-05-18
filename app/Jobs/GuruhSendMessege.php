<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\SendMessege;
use App\Models\SmsCounter;
use App\Models\SmsCentar;
use mrmuminov\eskizuz\Eskiz;
use mrmuminov\eskizuz\types\sms\SmsSingleSmsType;

class GuruhSendMessege implements ShouldQueue{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $phone;
    public $text;
    public $SendMessege;
    public function __construct($SendMessege){
        $this->phone = "+998".str_replace(" ","",$SendMessege->phone);
        $this->text = $SendMessege->text; 
        $this->SendMessege = $SendMessege; 
    }
    public function handle(): void{
        $this->SendMessege->status = "Yuborildi";
        $phone = $this->phone;
        $Text = $this->text;
        $eskiz_email = env('ESKIZ_UZ_EMAIL');
        $eskiz_password = env('ESKIZ_UZ_Password');
        $eskiz = new Eskiz($eskiz_email,$eskiz_password);
        $eskiz->requestAuthLogin();
        $from='4546';
        $mobile_phone = $phone;
        $message = $Text;
        $user_sms_id = 1;
        $callback_url = '';
        $singleSmsType = new SmsSingleSmsType(
            from: $from,
            message: $message,
            mobile_phone: $mobile_phone,
            user_sms_id:$user_sms_id,
            callback_url:$callback_url
        );
        $result = $eskiz->requestSmsSend($singleSmsType);
        $SmsCounter = SmsCounter::get()->first();
        $SmsCounter->counte = $SmsCounter->counte + 1;
        $SmsCounter->maxsms = $SmsCounter->maxsms - 1;
        $SmsCounter->save();
        $this->SendMessege->save();
    }
}
