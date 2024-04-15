<?php

namespace App\Http\Controllers\Admin;
use App\Models\Room;
use App\Models\User;

use Carbon\Carbon;
use App\Models\Guruh;
use App\Models\Eslatma;
use App\Models\GuruhTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

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
    public function eslatmalar(){
        $Eslatma = array();
        $ess = Eslatma::where('filial_id',request()->cookie('filial_id'))->where('status','true')->get();
        if($ess){
            foreach($ess as $key => $item){
                $Eslatma[$key]['id'] = $item->id;
                $Eslatma[$key]['type'] = $item->type;
                if($item->type=='user'){
                    $Eslatma[$key]['name'] =User::where('id',$item->user_guruh_id)->first()->name;
                }else{
                    $Eslatma[$key]['name'] = Guruh::find($item->user_guruh_id)->guruh_name;
                }
                $Eslatma[$key]['user_guruh_id'] = $item->user_guruh_id;
                $Eslatma[$key]['text'] = $item->text;
                $Eslatma[$key]['created_at'] = $item->created_at;
                $Eslatma[$key]['meneger'] = User::find($item->admin_id)->email;
            }
        }
        $Eslatma_arxiv = array();
        $arxiv = Eslatma::where('filial_id',request()->cookie('filial_id'))->where('status','false')->orderby('id','desc')->get();
        if($arxiv){
            foreach($arxiv as $key=>$item){
                $Eslatma_arxiv[$key]['id'] = $item->id;
                $Eslatma_arxiv[$key]['type'] = $item->type;
                if($item->type=='user'){
                    $Eslatma_arxiv[$key]['name'] =User::where('id',$item->user_guruh_id)->first()->name;
                }else{
                    $Eslatma_arxiv[$key]['name'] = Guruh::find($item->user_guruh_id)->guruh_name;
                }
                $Eslatma_arxiv[$key]['user_guruh_id'] = $item->user_guruh_id;
                $Eslatma_arxiv[$key]['text'] = $item->text;
                $Eslatma_arxiv[$key]['created_at'] = $item->created_at;
                $Eslatma_arxiv[$key]['meneger'] = User::find($item->admin_id)->email;
            }
        }
        return view('Admin.messege.eslatma',compact('Eslatma','Eslatma_arxiv'));
    }
    public function eslatmaarxiv($id){
        $Eslatma = Eslatma::find($id);
        $Eslatma->status='false';
        $Eslatma->save();
        return redirect()->back()->with('success', "Eslatma arxivlansi.");
    }
    public function murojatlar(){
        return view('Admin.messege.murojat');
    }
    public function tkun(){
        $today = Carbon::today();
        $tkun = User::whereRaw("DATE_FORMAT(tkun, '%m-%d') = ?", [$today->format('m-d')])->get();
        return view('Admin.messege.tkun', compact('tkun'));
    }
    public function elonlar(){
        return view('Admin.messege.elon');
    }
    
    public function sendMessege(){
        $Eslatma = Eslatma::find(4);
        $Eslatma->status='true';
        $Eslatma->save();
    }

}
