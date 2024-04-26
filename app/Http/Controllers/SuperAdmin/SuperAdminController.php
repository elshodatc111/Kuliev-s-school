<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SmsCounter;
use App\Models\Guruh;
use App\Models\GuruhUser;
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
    public function SMMIndex(){
        $Oylar = array();
        $Oylar[0] = date("Y-m",strtotime("-5 month",time()));
        $Oylar[1] = date("Y-m",strtotime("-4 month",time()));
        $Oylar[2] = date("Y-m",strtotime("-3 month",time()));
        $Oylar[3] = date("Y-m",strtotime("-2 month",time()));
        $Oylar[4] = date("Y-m",strtotime("-1 month",time()));
        $Oylar[5] = date("Y-m");
        $Oylar2 = array();
        $Oylar2[0] = date("M",strtotime("-5 month",time()));
        $Oylar2[1] = date("M",strtotime("-4 month",time()));
        $Oylar2[2] = date("M",strtotime("-3 month",time()));
        $Oylar2[3] = date("M",strtotime("-2 month",time()));
        $Oylar2[4] = date("M",strtotime("-1 month",time()));
        $Oylar2[5] = date("M");
        $Svod = array();
        foreach ($Oylar as $key => $value) {
            $User = User::where('type','User')->where('created_at','>=',$value."-01 00:00:00")->where('created_at','<=',$value."-31 23:59:59")->get();
            $Telegram = 0;
            $Instagram = 0;
            $Facebook = 0;
            $Bannerlar = 0;
            $Tanishlar = 0;
            $Boshqa = 0;
            foreach ($User as $keys => $item) {
                if($item->smm == 'Telegram'){
                    $Telegram = $Telegram + 1;
                }elseif($item->smm == 'Instagram'){
                    $Instagram = $Instagram + 1;
                }elseif($item->smm == 'Facebook'){
                    $Facebook = $Facebook + 1;
                }elseif($item->smm == 'Bannerlar'){
                    $Bannerlar = $Bannerlar + 1;
                }elseif($item->smm == 'Tanishlar'){
                    $Tanishlar = $Tanishlar + 1;
                }elseif($item->smm == 'Boshqa'){
                    $Boshqa = $Boshqa + 1;
                }
            }
            $Svod[$key]['Telegram'] = $Telegram;
            $Svod[$key]['Instagram'] = $Instagram;
            $Svod[$key]['Facebook'] = $Facebook;
            $Svod[$key]['Bannerlar'] = $Bannerlar;
            $Svod[$key]['Tanishlar'] = $Tanishlar;
            $Svod[$key]['Boshqa'] = $Boshqa;
            $Telegram = 0;
            $Instagram = 0;
            $Facebook = 0;
            $Bannerlar = 0;
            $Tanishlar = 0;
            $Boshqa = 0;
        }
        $sss = array();
        $sss['oy'] = $Oylar2;
        $sss['svod'] = $Svod;
        return $sss;
    }
    public function index(){
        $SmsCounter = SmsCounter::find(1);
        $SettingEndData = date("Y-m-d", strtotime('-3 day',strtotime(Setting::find(1)->EndData)));
        $times = date("Y-m-d");
        if($times>$SettingEndData){$Block = 'true';
        }else{$Block = "false";}
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
        $SMM = $this->SMMIndex();
        $StartDates = date("Y-m")."-01 00:00:00";
        $EndDates = date("Y-m")."31 23:59:59";
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
        return view('SuperAdmin.index',compact('Filial','Block','SMM','SmsCounter','ActivStudent'));
    }    
}
