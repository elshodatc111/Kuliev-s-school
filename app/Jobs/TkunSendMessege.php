<?php

namespace App\Jobs;
use App\Models\Filial;
use App\Models\User;
use App\Models\TKunMessege;
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
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class TkunSendMessege implements ShouldQueue{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $data;
    public $status;
    public $TKunMessege;
    public function __construct($TKunMessege){
        $this->date = $TKunMessege->data;
        $this->status = $TKunMessege->status;
        $this->TKunMessege = $TKunMessege;
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
        $SmsCentar = SmsCentar::get()->first()->tkun;
        if($SmsCentar=='on'){
            $today = Carbon::today();
            $User = User::where('type','!=','SuperAdmin')->whereRaw("DATE_FORMAT(tkun, '%m-%d') = ?", [$today->format('m-d')])->get();
            foreach ($User as $key => $value) {
                $Filail_name = Filial::find($value->filial_id)->filial_name;
                $Text =strval("Hurmatli ".$value->name."! Sizni tug'ilgan kuningiz bilan chin yurakdan tabriklaymiz! Ushbu quvonchli kunda va yilning har bir kunida sizga omad va sog'lik, istaklaringizni amalga oshirish va ko'plab ijobiy his-tuyg'ularni tilaymiz.\n Hurmat bilan ".$Filail_name." o'quv markazi jamoasi.");
                $Phone = "+998".str_replace(" ","",$value->phone); 
                $SmsCounter = SmsCounter::get()->first();
                $SmsCounter->counte = $SmsCounter->counte + 1;
                $SmsCounter->maxsms = $SmsCounter->maxsms - 1;
                $SmsCounter->save();
                $SendMessege = SendMessege::create([
                    'phone' => $Phone,
                    'text' => $Text,
                    'status' => "Kutilmoqda...",
                ]);
                if($this->sendMessege($Phone, $Text)==true){
                    $SendMessege->status = "Yuborildi";
                    $SendMessege->save();
                }else{
                    $SendMessege->status = "Error";
                    $SendMessege->save();
                }
            }
            $this->TKunMessege->status = "Yuborildi";
        }else{
            $this->TKunMessege->status = "Cheklov";
        }
        $this->TKunMessege->save();
    }
}
