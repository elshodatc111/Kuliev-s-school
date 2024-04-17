<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guruh;
use App\Models\GuruhUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class UserGuruhController extends Controller{
    public function Guruhlar(){
        $Guruh = GuruhUser::where('user_id',Auth::user()->id)->where('status','true')->get();
        $New = "https://atko.tech/NiceAdmin/assets/img/01.png";
        $End = "https://atko.tech/NiceAdmin/assets/img/01.png";
        $Now = "https://atko.tech/NiceAdmin/assets/img/01.png";
        $Guruhlar = array();
        foreach($Guruh as $key=>$item){
            $Guruhlar[$key]['id'] = $item->id;
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
            $Guruhlar[$key]['id'] = $item->id;
        }
        return view('User.guruh',compact('Guruhlar'));
    }
    public function show($id){
        return view('User.guruh_show');
    }
}
