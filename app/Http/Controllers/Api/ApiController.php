<?php

namespace App\Http\Controllers\Api;
use App\Models\Setting;
use App\Models\SmsCounter;
use App\Models\Guruh;
use App\Models\GuruhUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller{

    public function setting(){
        return Setting::first();
    }

    public function update(Request $request){
        $Setting = Setting::first();
        $Setting->EndData = $request->EndData;
        $Setting->Username = $request->Username;
        $Setting->Status = $request->Status;
        $Setting->save();
        $response = [
            'status' => [
                'code' => 200,
                'message' => "Filial Sozlamalari sozlandi"
            ]
        ];
        return $response;
    }

    public function smsCount(){
        return SmsCounter::first();
    }

    public function smsCountPlus(Request $request){
        $SmsCounter = SmsCounter::first();
        $SmsCounter->maxsms = $SmsCounter->maxsms + $request->maxsms;
        $SmsCounter->save();
        $response = [
            'status' => [
                'code' => 200,
                'plus' => $request->maxsms,
                'maxsms' => $SmsCounter->maxsms,
                'counte' => $SmsCounter->counte,
                'message' => "Filialga sms qo'shildi"
            ]
        ];
        return $response;
    }

    public function active(Request $request){
        $StartDates = $request->start." 00:00:00";
        $EndDates = $request->end." 23:59:59";
        $Guruhsss = Guruh::where('guruh_start','<=',$EndDates)->where('guruh_end','>=',$StartDates)->get();
        $ActivUser = array();
        foreach ($Guruhsss as $key => $value) {
            $GuruhUsersss = GuruhUser::where('guruh_id',$value->id)->get();
            foreach ($GuruhUsersss as $key11 => $item) {
                $userss_id = $item->user_id;
                $km = 0;
                foreach ($ActivUser as $keyaaaas => $valueaaaas) {
                    if($valueaaaas==$userss_id){
                        $km++;
                    }
                }
                if($km==0){
                    array_push($ActivUser, $userss_id);
                }   
            }
        }
        $ActivStudent = count($ActivUser);
        $response = [
            'status' => [
                'code' => 200,
                'start' => $request->start,
                'end' => $request->end,
                'users' => $ActivStudent,
                'message' => "Aktiv Talabalar"
            ]
        ];
        return $response;
    }
}
