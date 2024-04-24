<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Guruh;
use App\Models\Filial;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SuperAdminController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $SettingEndData = date("Y-m-d", strtotime('-3 day',strtotime(Setting::find(1)->EndData)));
        $times = date("Y-m-d");
        if($times>$SettingEndData){
            $Block = 'true';
        }else{
            $Block = "false";
        }

        $Filiallar = Filial::get();
        $Filial = array();
        foreach ($Filiallar as $key => $value) {
            $Filial[$key]['filial_name'] = $value->filial_name;
            $Filial[$key]['user'] = count(User::where('filial_id',$value->id)->where('type','User')->get());
            $Filial[$key]['techer'] = count(User::where('filial_id',$value->id)->where('type','Techer')->get());
            $Filial[$key]['meneger'] = count(User::where('filial_id',$value->id)->where('type','Admin')->get())+count(User::where('filial_id',$value->id)->where('type','Operator')->get());
            $Filial[$key]['guruhlar'] = count(Guruh::where('filial_id',$value->id)->get());
            $Filial[$key]['yangiguruh'] = count(Guruh::where('filial_id',$value->id)->where('guruh_start','>',date('Y-m-d'))->get());
            $Filial[$key]['aktivguruh'] = count(Guruh::where('filial_id',$value->id)->get())-count(Guruh::where('filial_id',$value->id)->where('guruh_start','>',date('Y-m-d'))->get())-count(Guruh::where('filial_id',$value->id)->where('guruh_end','<',date('Y-m-d'))->get());
            $Filial[$key]['endguruh'] = count(Guruh::where('filial_id',$value->id)->where('guruh_end','<',date('Y-m-d'))->get());
        }
        return view('SuperAdmin.index',compact('Filial','Block'));
    }    
}
