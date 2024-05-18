<?php

namespace App\Jobs;
use App\Models\User;
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

class AllSendMessege implements ShouldQueue{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $AllSMS;
    public $Text;
    public function __construct($AllSMS){
        $this->AllSMS = $AllSMS;
        $this->Text = $AllSMS->text;
    }
    public function sendMessege($Phone, $Text){
        $eskiz_email = env('ESKIZ_UZ_EMAIL');
        $eskiz_password = env('ESKIZ_UZ_Password');
        $eskiz = new Eskiz($eskiz_email,$eskiz_password);
        $eskiz->requestAuthLogin();
        $from='4546';
        $mobile_phone = $Phone;
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
        return true;
    }
    public function handle(): void{
        $Text = $this->Text;
        $User = User::where('type','User')->get();
        $count = 0;
        foreach ($User as $key => $value) {
            $Phone = "+998".str_replace(" ","",$value->phone);
            if($this->sendMessege($Phone, $Text)==true){
                $SmsCounter = SmsCounter::get()->first();
                $SmsCounter->counte = $SmsCounter->counte + 1;
                $SmsCounter->maxsms = $SmsCounter->maxsms - 1;
                $SmsCounter->save();
                $SendMessege = SendMessege::create([
                    'phone' => $Phone,
                    'text' => $Text,
                    'status' => "Yuborildi",
                ]);
                $count = $count + 1;
            }
        }
        $AllSMS = $this->AllSMS;
        $AllSMS->status = $count." ta sms yuborildi";
        $AllSMS->save();
    }
}
