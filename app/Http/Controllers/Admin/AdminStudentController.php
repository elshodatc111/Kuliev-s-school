<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AdminKassa;
use App\Models\UserHistory;
use App\Events\CreateTashrif;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminStudentController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $User = User::where('filial_id',request()->cookie('filial_id'))->where('type','User')->orderby('id','desc')->get();
        return view('Admin.user.index',compact('User'));
    }
    public function debit(){
        $User = User::where('filial_id',request()->cookie('filial_id'))->where('type','User')->orderby('id','desc')->where('balans','<',0)->get();
        return view('Admin.user.debit',compact('User'));
    }
    public function pays(){
        return "Tulovlar:";
    }
    public function create(){
        return view('Admin.user.create');
    }
    public function store(Request $request){
        $login = rand(1,9);
        $password = rand(10000000,99999999);
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'phone2' => ['required', 'string', 'max:255'],
            'addres' => ['required', 'string', 'max:255'],
            'tkun' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'max:255'],
            'smm' => ['required', 'string', 'max:255']
        ]);
        $validate['filial_id'] = request()->cookie('filial_id');
        $validate['type'] = 'User';
        $validate['status'] = 'true';
        $validate['balans'] = null;
        $validate['email'] = time()*$login;
        $validate['password'] = Hash::make($password);
        $validate['admin_id'] = Auth::user()->id;
        $Users = count(User::where('filial_id',$validate['filial_id'])->where('phone',$validate['phone'])->where('type','User')->get());
        if($Users>0){
            return redirect()->back()->with('error', 'Siz kiritgan telegon raqam oldin ro\'yhatga olingan.'); 
        }
        $NewUser = User::create($validate);
        $id = $NewUser->id;
        $Phone = str_replace(" ","",$NewUser->phone);
        $UserHistory = UserHistory::create([
            'filial_id' => $validate['filial_id'],
            'user_id' => $id,
            'status' => 'Markazga tashrif',
            'balans' => 0,
        ]);
        CreateTashrif::dispatch($id,$Phone,$password);
        return redirect()->route('Student')->with('success', 'Yangi tashrif qo\'shildi.'); 
    }
    public function show($id){
        return view('Admin.user.show');
    }
}
