<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Guruh;
use App\Models\GuruhUser;
use App\Models\GuruhTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class UserGuruhController extends Controller{
    public function Guruhlar(){
        $Guruh = GuruhUser::where('user_id',Auth::user()->id)->where('status','true')->get();
        $New = "https://atko.tech/NiceAdmin/assets/img/cours.jpg";
        $End = "https://atko.tech/NiceAdmin/assets/img/cours.jpg";
        $Now = "https://atko.tech/NiceAdmin/assets/img/cours.jpg";
        $Guruhlar = array();
        foreach($Guruh as $key=>$item){
            $Guruhlar[$key]['id'] = $item->guruh_id;
            $Guruhlar[$key]['name'] = Guruh::find($item->guruh_id)->guruh_name;
            $guruh_start = Guruh::find($item->guruh_id)->guruh_start;
            $guruh_end = Guruh::find($item->guruh_id)->guruh_end;
            $thisNow = date("Y-m-d");
            if($guruh_start>=$thisNow AND $guruh_end<=$thisNow){
                $Guruhlar[$key]['image'] = $Now;
            }elseif($guruh_end>$Guruhlar){
                $Guruhlar[$key]['image'] = $New;
            }else{
                $Guruhlar[$key]['image'] = $End;
            }
        }
        return view('User.guruh',compact('Guruhlar'));
    }
    public function show($id){
        $Guruh = Guruh::find($id);
        $Guruhs = array();
        switch ($Guruh->guruh_vaqt) {
            case '1':
                $Guruhs['guruh_vaqt'] = "08:00-09:30";
                break;
            case '2':
                $Guruhs['guruh_vaqt'] = "09:30-11:00";
                break;
            case '3':
                $Guruhs['guruh_vaqt'] = "11:00-12:30";
                break;
            case 4:
                $Guruhs['guruh_vaqt'] = "12:30-14:00";
                break;
            case '5':
                $Guruhs['guruh_vaqt'] = "14:00-15:30";
                break;
            case '6':
                $Guruhs['guruh_vaqt'] = "15:30-17:00";
                break;
            case '7':
                $Guruhs['guruh_vaqt'] = "17:00-18:30";
                break;
            case '8':
                $Guruhs['guruh_vaqt'] = "18:30-20:00";
                break;
            case '9':
                $Guruhs['guruh_vaqt'] = "20:00-21:30";
                break;
        }
        $Guruhs['guruh_name'] = $Guruh->guruh_name;
        $Guruhs['guruh_price'] = $Guruh->guruh_price;
        $Guruhs['techer'] = User::find($Guruh->techer_id)->name;
        $Guruhs['test'] = 0;
        $Guruhs['room'] = Room::find($Guruh['room_id'])->room_name;
        $Guruhs['cours_id'] = $Guruh->cours_id;
        $GuruhTime = GuruhTime::where('guruh_id',$Guruh['id'])->get();
        return view('User.guruh_show',compact('Guruhs','GuruhTime'));
    }
}
