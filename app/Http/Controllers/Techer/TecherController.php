<?php

namespace App\Http\Controllers\Techer;
use App\Models\Guruh;
use App\Models\Tulov;
use App\Models\IshHaqi;
use App\Models\GuruhUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TecherController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('Techer.index');
    }
    public function Guruhlar(){
        $times = date("Y-m-d",strtotime('-30 day',time()));
        $Guruhlar = Guruh::where('techer_id',Auth::user()->id)->where('guruh_status','true')->where('guruh_end','>=',$times)->get();
        $Guruh = array();
        foreach ($Guruhlar as $key => $value) {
            $Guruh[$key]['id'] = $value->id;
            $Guruh[$key]['guruh_name'] = $value->guruh_name;
            $Guruh[$key]['guruh_start'] = $value->guruh_start;
            $Guruh[$key]['guruh_end'] = $value->guruh_end;
            switch ($value->guruh_vaqt) {
                case '1':
                    $Guruh[$key]['guruh_vaqt'] = "08:00-09:30";
                    break;
                case '2':
                    $Guruh[$key]['guruh_vaqt'] = "09:30-11:00";
                    break;
                case '3':
                    $Guruh[$key]['guruh_vaqt'] = "11:00-12:30";
                    break;
                case 4:
                    $Guruh[$key]['guruh_vaqt'] = "12:30-14:00";
                    break;
                case '5':
                    $Guruh[$key]['guruh_vaqt'] = "14:00-15:30";
                    break;
                case '6':
                    $Guruh[$key]['guruh_vaqt'] = "15:30-17:00";
                    break;
                case '7':
                    $Guruh[$key]['guruh_vaqt'] = "17:00-18:30";
                    break;
                case '8':
                    $Guruh[$key]['guruh_vaqt'] = "18:30-20:00";
                    break;
                case '9':
                    $Guruh[$key]['guruh_vaqt'] = "20:00-21:30";
                    break;
            }
            $Guruh[$key]['users'] = count(GuruhUser::where('guruh_id',$value->id)->where('status','true')->get());
        }
        return view('Techer.grops',compact('Guruh'));
    }
    public function Tolovlar(){
        $IshHaqi = IshHaqi::where('user_id',Auth::user()->id)->where('status','!=','Hodim')->orderby('id','desc')->get();
        $Tulovlar = array();
        foreach ($IshHaqi as $key => $value) {
            $Tulov[$key]['id'] = $value->id;
            $Tulov[$key]['summa'] = number_format(($value->summa), 0, '.', ' ');
            $Tulov[$key]['type'] = $value->type;
            $Tulov[$key]['about'] = $value->about;
            $Tulov[$key]['guruh'] = Guruh::find($value->status)->guruh_name;
        }
        return view('Techer.pays');
    }
    public function Kabinet(){
        return view('Techer.kabinet');
    }
}
