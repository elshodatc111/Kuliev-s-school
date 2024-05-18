<?php

namespace App\Listeners;
use App\Events\createTulov;
use App\Models\User;
use App\Models\AdminKassa;
use App\Models\Tulov;
use App\Models\Filial;
use App\Models\SendMessege;
use App\Models\Guruh;
use App\Jobs\TashrifMessege;
use App\Models\SmsCentar;
use App\Models\SmsCounter;
use App\Models\FilialKassa;
use App\Models\UserHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use mrmuminov\eskizuz\Eskiz;
use mrmuminov\eskizuz\types\sms\SmsSingleSmsType;
use Illuminate\Support\Facades\Log;
class UserTulov{
    public function __construct(){}
    public function handle(createTulov $event): void{
        $filial_name = Filial::find(request()->cookie('filial_id'))->filial_name;
        $user_id = $event->user_id;
        $naqt = str_replace(",","",$event->naqt);
        $plastik = str_replace(",","",$event->plastik);
        $summa = $naqt+$plastik;
        $guruh_id = $event->guruh_id;
        $about = $event->about;
        $User = User::find($user_id);
        if($guruh_id!='NULL'){
            $Guruh = Guruh::find($guruh_id);
            $Guruh_Name = $Guruh->guruh_name;
            $ChegirmaTulov = $Guruh->guruh_price-$Guruh->guruh_chegirma;
            $Chegirma = $Guruh->guruh_chegirma;
            if($naqt+$plastik == $ChegirmaTulov){
                $UserHistory = UserHistory::create([
                    'filial_id'=>request()->cookie('filial_id'),
                    'user_id'=>$user_id,
                    'status'=>'Chegirma',
                    'type'=>$Guruh_Name,
                    'summa'=>$Chegirma,
                    'xisoblash'=>$User->balans."+".$Chegirma."=".$User->balans+$Chegirma,
                    'balans'=>$User->balans+$Chegirma
                ]);
                $User->balans = $User->balans+$Chegirma;
                $User->save();
                $Tulov = Tulov::create([
                    'filial_id' => request()->cookie('filial_id'),
                    'user_id' => $user_id,
                    'guruh_id' => $guruh_id,
                    'summa' => $Chegirma,
                    'type' => 'Chegirma',
                    'status' => 'true',
                    'about' => $about,
                    'admin_id' => Auth::user()->id,
                ]);
            }else{
                $Chegirma=0;
            }
            $FilialKassa = FilialKassa::where('filial_id',request()->cookie('filial_id'))->first();
            $tulov_chegirma = $FilialKassa->tulov_chegirma;
            $Mavjud = $tulov_chegirma + $Chegirma;
            $FilialKassa->tulov_chegirma=$Mavjud;
            $FilialKassa->save();
        }else{
            $Guruh_Name = ' ';
            $Chegirma = 0;
        }
        if($naqt!=0){
            $Tulov = Tulov::create([
                'filial_id' => request()->cookie('filial_id'),
                'user_id' => $user_id,
                'guruh_id' => $guruh_id,
                'summa' => $naqt,
                'type' => 'Naqt',
                'status' => 'true',
                'about' => $about,
                'admin_id' => Auth::user()->id,
            ]);
            $FilialKassa = FilialKassa::where('filial_id',request()->cookie('filial_id'))->first();
            $tulov_naqt = $FilialKassa->tulov_naqt;
            $Mavjud = $tulov_naqt + $naqt;
            $FilialKassa->tulov_naqt=$Mavjud;
            $FilialKassa->save();
            $UserHistory = UserHistory::create([
                'filial_id'=>request()->cookie('filial_id'),
                'user_id'=>$user_id,
                'status'=>'Tulov Naqt',
                'type'=>$Guruh_Name,
                'summa'=>$naqt,
                'xisoblash'=>$User->balans."+".$naqt."=".$User->balans+$naqt,
                'balans'=>$User->balans+$naqt
            ]);
            $User->balans = $User->balans+$naqt;
            $User->save();
        }
        if($plastik!=0){
            $Tulov = Tulov::create([
                'filial_id' => request()->cookie('filial_id'),
                'user_id' => $user_id,
                'guruh_id' => $guruh_id,
                'summa' => $plastik,
                'type' => 'Plastik',
                'status' => 'true',
                'about' => $about,
                'admin_id' => Auth::user()->id,
            ]);$FilialKassa = FilialKassa::where('filial_id',request()->cookie('filial_id'))->first();
            $tulov_plastik = $FilialKassa->tulov_plastik;
            $Mavjud = $tulov_plastik + $plastik;
            $FilialKassa->tulov_plastik=$Mavjud;
            $FilialKassa->save();
            $UserHistory = UserHistory::create([
                'filial_id'=>request()->cookie('filial_id'),
                'user_id'=>$user_id,
                'status'=>'Tulov Plastik',
                'type'=>$Guruh_Name,
                'summa'=>$plastik,
                'xisoblash'=>$User->balans."+".$plastik."=".$User->balans+$plastik,
                'balans'=>$User->balans+$plastik
            ]);
            $User->balans = $User->balans+$plastik;
            $User->save();
        }
        if($Chegirma!=0){
            $Text = "Hurmatli ".$User->name." ! ".$filial_name." o'quv markazi kurslari uchun ".$summa." so'm to'lov qabul qilindi. va sizga ".$Chegirma." so'm chegirma berildi.";            
        }else{
            $Text = "Hurmatli ".$User->name." ! ".$filial_name." o'quv markazi kurslari uchun ".$summa." so'm to'lov qabul qilindi.";        
        }
        $SmsCentar = SmsCentar::where('filial_id',$User->filial_id)->first()->tulov;
        if($SmsCentar=='on'){
            $Phone = str_replace(" ","",$User->phone);
            $SendMessege = SendMessege::create([
                'text' => $Text,
                'phone' =>'+998'.$Phone,
                'status' => 'Yuborilmoqda...'
            ]);
            TashrifMessege::dispatch($SendMessege);
        }
        if(Auth::user()->type!='SuperAdmin'){
            $AdminKassa = AdminKassa::where('user_id',Auth::user()->id)->first();
            $AdminKassa->naqt = $AdminKassa->naqt + $naqt;           
            $AdminKassa->plastik = $AdminKassa->plastik + $plastik;           
            $AdminKassa->chegirma = $AdminKassa->chegirma + $Chegirma; 
            $AdminKassa->save();  
        }
    }
}
