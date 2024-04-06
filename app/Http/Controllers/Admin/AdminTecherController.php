<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\FilialKassa;
use App\Models\IshHaqi;
use App\Events\AdminCreateTecher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\HodimUpdatePasswor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminTecherController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $Techers = User::where('filial_id',request()->cookie('filial_id'))->where('type','Techer')->where('status','true')->get();

        return view('Admin.techer.index',compact('Techers'));
    }
    public function techerCreate(Request $request){
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tkun' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'max:255'],
            'addres' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'phone2' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users']
        ]);
        $password = rand(10000000, 99999999);
        $validate['password'] = Hash::make($password);
        $validate['type'] = 'Techer';
        $validate['status'] = 'true';
        $validate['admin_id'] = Auth::user()->id;
        $validate['filial_id'] = request()->cookie('filial_id');
        $User = User::create($validate);
        AdminCreateTecher::dispatch($User->id,$password);
        return redirect()->back()->with('success', 'Yangi o\'qituvchi qo\'shildi.'); 
    }
    public function techerShow($id){
        $Techer = User::find($id);

        return view('Admin.techer.show',compact('Techer'));
    }
    public function techerDelete($id){
        $Techer = User::find($id);
        $Techer->status = 'false';
        $Techer->save();
        return redirect()->back()->with('success', 'O\'qituvchi O\'chirildi.'); 
    }
    public function techerUpdate(Request $request){
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tkun' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'max:255'],
            'addres' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'phone2' => ['required', 'string', 'max:255'],
        ]);
        $User = User::find($request->user_id);
        $User->update($validate);
        return redirect()->back()->with('success', 'O\'qituvchi malumotlari yangilandi.'); 
    }
    public function techerUpdatePassword(Request $request){
        $User = User::find($request->user_id);
        $password = rand(10000000, 99999999);
        $User->password = Hash::make($password);
        $User->save();
        HodimUpdatePasswor::dispatch($User->id,$password);
        return redirect()->back()->with('success', 'O\'qituvchi paroli yangilandi.'); 
    }



}
