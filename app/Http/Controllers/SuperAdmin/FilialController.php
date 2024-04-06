<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Filial;
use App\Models\Room;
use App\Models\TulovSetting;
use App\Models\FilialKassa;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilialController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function filial(){
        $Filial = Filial::get();
        return view('SuperAdmin.filial',compact('Filial'));
    }
    public function filialcreate(Request $request){
        $validated = $request->validate([
            'filial_name' => 'required',
            'filial_addres' => 'required'
        ]);
        $Filial = Filial::create($validated);
        FilialKassa::create([
            'filial_id' => $Filial->id
        ]);
        return redirect()->back()->with('success', 'Yangi filial yaratildi.'); 
    }
    public function filailCrm($Filial_id){
        $Filial = Filial::find($Filial_id);
            return redirect()->route('Admin')
                ->withCookie('filial_id', $Filial_id, 86400)
                ->withCookie('filial_name', $Filial->filial_name, 86400);
    }
    public function show($id){
        $Filial = Filial::find($id);
        $Room = Room::where('filial_id',$Filial->id)->where('status','true')->get();
        $TulovSetting = array();
        foreach(TulovSetting::where('filial_id',$Filial->id)->where('status','true')->get() as $key => $item){
            $TulovSetting[$key]['id'] = $item->id;
            $TulovSetting[$key]['tulov_summa'] = number_format(($item->tulov_summa), 0, '.', ' ');
            $TulovSetting[$key]['chegirma'] = number_format(($item->chegirma), 0, '.', ' ');
            $TulovSetting[$key]['admin_chegirma'] = number_format(($item->admin_chegirma), 0, '.', ' ');
        }
        return view('SuperAdmin.filialshow',compact('Filial','Room','TulovSetting'));
    }
    public function roomcreate(Request $request){
        $validated = $request->validate([
            'filial_id' => 'required',
            'room_name' => 'required',
            'status' => 'required'
        ]);
        Room::create($validated);
        return redirect()->back()->with('success', 'Yangi xona yaratildi.'); 
    }
    public function roomdelete($id){
        $Room = Room::find($id);
        $Room->status = 'false';
        $Room->save();
        return redirect()->back()->with('success', 'Xona o\'chirildi.');
    }
    public function tulovSettingCreate(Request $request){
        $validated = $request->validate([
            'filial_id' => 'required',
            'tulov_summa' => 'required',
            'chegirma' => 'required',
            'admin_chegirma' => 'required',
            'status' => 'required'
        ]);
        $validated['tulov_summa'] = str_replace(",","",$request->tulov_summa);
        $validated['chegirma'] = str_replace(",","",$request->chegirma);
        $validated['admin_chegirma'] = str_replace(",","",$request->admin_chegirma);
        TulovSetting::create($validated);
        return redirect()->back()->with('success', 'To\'lov sozlamalari kiritilidi.');
    }
    public function tulovSettingDelete($id){
        $TulovSetting = TulovSetting::find($id);
        $TulovSetting->status = 'false';
        $TulovSetting->save();
        return redirect()->back()->with('success', 'To\'lov sozlamasi o\'chirildi.');
    }
}
