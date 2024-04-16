<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Filial;
use App\Models\Room;
use App\Models\Cours;
use App\Models\TulovSetting;
use App\Models\FilialKassa;
use App\Events\CreateFilial;
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
        $validated['naqt'] = 0;
        $validated['xarajat_naqt'] = 0;
        $validated['plastik'] = 0;
        $validated['xarajat_plastik'] = 0;
        $validated['payme'] = 0;
        $validated['xarajat_payme'] = 0;
        $Filial = Filial::create($validated);
        FilialKassa::create([
            'filial_id' => $Filial->id
        ]);
        return redirect()->back()->with('success', 'Yangi filial yaratildi.'); 
    }
    public function filialUpdate(Request $request){
        $validated = $request->validate([
            'filial_name' => 'required',
            'filial_addres' => 'required'
        ]);
        $Filial = Filial::find($request['id']);
        $Filial->filial_name = $request->filial_name;
        $Filial->filial_addres = $request->filial_addres;
        $Filial->save();
        return redirect()->back()->with('success', 'Filial taxrirlandi.'); 
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
        $Cours = Cours::where('filial_id',$id)->get();
        return view('SuperAdmin.filialshow',compact('Filial','Room','TulovSetting','Cours'));
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
    public function filialCoursCreate(Request $request){
        $validated = $request->validate([
            'filial_id' => 'required',
            'cours_name' => 'required'
        ]);
        Cours::create($validated);
        return redirect()->back()->with('success', 'Yangi kurs kiritildi.');
    }
    public function filialDelete(Request $request){
        dd($request);
    }
}
