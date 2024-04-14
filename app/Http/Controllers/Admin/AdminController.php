<?php

namespace App\Http\Controllers\Admin;
use App\Models\Room;
use App\Models\Guruh;
use App\Models\GuruhTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller{
    public function __construct(){$this->middleware('auth');}
    public function coocies(){
        if(Auth::user()->filial_id != request()->cookie('filial_id')){
            if(Auth::user()->type != 'SuperAdmin'){
                Auth::logout();
                return view('home')->withCookie('filial_id', ' ', -86400)->withCookie('filial_name', ' ', -86400);
            }
        }
        if(!request()->cookie('filial_name')){
            Auth::logout();
            return view('home')->withCookie('filial_id', ' ', -86400)->withCookie('filial_name', ' ', -86400);
        }
    }
    public function index(){
        $this->coocies();


        $currentTime = time();
        $weekStart = strtotime('last Monday', $currentTime);
        $Room = Room::where('filial_id',request()->cookie('filial_id'))->where('status','true')->get();
        $room_id = 1;
        $Rooms = array();
        foreach($Room as $key => $value ){
            $Rooms[$key]['guruh_id'] = $value->id;
            $Rooms[$key]['room_name'] = $value->room_name;
            $Jadval = array();
            for ($k = 1; $k <= 9; $k++) {
                for ($i = 0; $i < 6; $i++) {
                    $day = date('Y-m-d', strtotime("+$i days", $weekStart));
                    $GuruhJadval = GuruhTime::where('room_id',$value->id)
                                ->where('times',$k)->where('dates',$day)->get();
                    if(count($GuruhJadval)>=1){
                        $guruh_id = $GuruhJadval->first()->guruh_id;
                        $guruh_name = Guruh::where('id',$guruh_id)->get()->first()->guruh_name;
                        $Jadval[$i][$k]['guruh_id'] = $guruh_id;
                        $Jadval[$i][$k]['guruh_name'] = $guruh_name;
                    }else{$Jadval[$i][$k] = 'bosh';}
                }
            }
            $Rooms[$key]['hafta_kun'] = $Jadval;
        }
        return view('Admin.index', compact('Rooms'));
    }
    

}
