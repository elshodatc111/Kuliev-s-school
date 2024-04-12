<?php

namespace App\Listeners;

use App\Events\debitSendMessege;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use mrmuminov\eskizuz\Eskiz;
use mrmuminov\eskizuz\types\sms\SmsSingleSmsType;

class DeberSendMessege{
    public function __construct(){}
    public function handle(debitSendMessege $event): void{
        $Filial = $event->Filial;
        $k=0;
        foreach($event->Messege as $value){
            $Text = $value['name']." sizning ".$Filial." o'quv markazining o'quv kurslaridan ".$value['qarz']." so'm qarzdorligingiz mavjud.";
            $Phone = $value['phone'];
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
            $k++;
        }
    }
}
