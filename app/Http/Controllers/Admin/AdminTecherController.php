<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\FilialKassa;
use App\Models\IshHaqi;
use App\Events\AdminCreateTecher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminTecherController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('Admin.techer.index');
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
    
}
