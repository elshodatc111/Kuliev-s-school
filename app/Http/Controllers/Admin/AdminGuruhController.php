<?php

namespace App\Http\Controllers\Admin;
use App\Models\TulovSetting;
use App\Models\Room;
use App\Models\User;
use App\Models\Cours;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminGuruhController extends Controller{
    
    public function index(){
        return view('Admin.guruh.index');
    }
    public function endGuruh(){
        return view('Admin.guruh.end');
    }
    public function CreateGuruh(){
        $TulovSetting = TulovSetting::where('filial_id',request()->cookie('filial_id'))->get();
        $Room = Room::where('filial_id',request()->cookie('filial_id'))->where('status','true')->get();
        $Techer = User::where('filial_id',request()->cookie('filial_id'))->where('status','true')->where('type','Techer')->get();
        $Cours = Cours::where('filial_id',request()->cookie('filial_id'))->get();
        return view('Admin.guruh.create',compact('TulovSetting','Room','Techer','Cours'));
    }
    public function CreateGuruh1(Request $request){
        $validate = $request->validate([
            'guruh_name' => ['required', 'string', 'max:255'],
            'guruh_price' => ['required', 'string', 'max:255'],
            'guruh_start' => ['required', 'string', 'max:255'],
            'hafta_kun' => ['required', 'string', 'max:255'],
            'room_id' => ['required', 'string', 'max:255'],
            'techer_id' => ['required', 'string', 'max:255'],
            'cours_id' => ['required', 'string', 'max:255']
        ]);
        if($request->guruh_start < date('Y-m-d')){
            return redirect()->back()->with('error', 'Guruhni bugungi kun va kiyingi kunlarda ochish mumkun.'); 
        }
        dd($validate);
    }

}
