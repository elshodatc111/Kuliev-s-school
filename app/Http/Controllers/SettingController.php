<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SettingController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $Setting = Setting::find(1);
        return view('setting', compact('Setting'));
    }
    public function update(Request $request){
        $validated = $request->validate([
            'EndData' => 'required',
            'Summa' => 'required',
            'Username' => 'required',
        ]);
        if(isset($request->Status)){
            $validated['Status']='true';
        }else{
            $validated['Status']='false';
        }
        $Setting = Setting::find(1);
        $Setting->update($validated);
        return redirect()->back()->with('success', 'Markaz sozlamalari taxrirlandi.'); 
        dd($request);
    }
}
