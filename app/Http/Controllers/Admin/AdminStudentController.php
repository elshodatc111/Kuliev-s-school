<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Guruh;
use App\Models\AdminKassa;
use App\Models\UserHistory;
use App\Models\GuruhUser;
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
    public function userAbout($id){
        $User = User::find($id);
        $Users = array();
        $Users['id'] = $User->id;
        $Users['name'] = $User->name;
        $Users['phone'] = $User->phone;
        $Users['phone2'] = $User->phone2;
        $Users['addres'] = $User->addres;
        $Users['tkun'] = $User->tkun;
        $Users['balans'] = number_format(($User->balans), 0, '.', ' ');
        $Users['about'] = $User->about;
        $Users['smm'] = $User->smm;
        $Users['email'] = $User->email;
        return $Users;
    }
    public function Guruhs($id){
        $Guruhs = Guruh::where('guruh_end','>',date('Y-m-d'))
            ->where('filial_id',request()->cookie('filial_id'))->get();
        $Guruh = array();
        foreach ($Guruhs as $key => $value) {
            $GuruhUser = count(GuruhUser::where('user_id',$id)
                ->where('guruh_id',$value->id)
                ->where('status','true')->get());
            if($GuruhUser==0){
                $Guruh[$key]['guruh_id'] = $value->id;
                $Guruh[$key]['guruh_name'] = $value->guruh_name;
                $Guruh[$key]['techer'] = User::find($value->techer_id)->name;
            }
        }
        return $Guruh;
    }
    public function userHistory($id){
        $UserHistory = UserHistory::where('user_id',$id)->orderby('id','desc')->get();
        return $UserHistory;
    }
    public function show($id){
        $Users = $this->userAbout($id);
        $Guruhs = $this->Guruhs($id);
        $userHistory = $this->userHistory($id);
        return view('Admin.user.show',compact('Users','Guruhs','userHistory'));
    }
    public function guruhPlus(Request $request){
        $validate = $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'guruh_id' => ['required', 'string', 'max:255'],
            'commit_start' => ['required', 'string', 'max:255'],
        ]);
        $validate['filial_id'] = request()->cookie('filial_id');
        $validate['status'] = 'true';
        $validate['admin_id_start'] = Auth::user()->id;
        $GuruhUser2 = GuruhUser::where('user_id',$request->user_id)->where('guruh_id',$request->guruh_id)->where('status','true')->get();
        if(count($GuruhUser2)>0){
            return redirect()->back()->with('error', 'Talaba siz tanlagan guruhda mavjud.'); 
        }
        $GuruhUser = GuruhUser::create($validate);
        $Guruh = Guruh::where('id',$request->guruh_id)->first();
        $Guruh_price = $Guruh->guruh_price;
        $Balans = User::where('id',$request->user_id)->first()->balans;
        if(empty($Balans)){
            $Balans = 0;
        }
        $Summa = $Balans-$Guruh_price;
        $User = User::find($request->user_id);
        $User->update(['balans'=>$Summa]);
        $UserHistory = UserHistory::create([
            'filial_id'=>request()->cookie('filial_id'),
            'user_id'=>$request->user_id,
            'status'=>"Guruhga qo'shildi",
            'type'=>$Guruh->guruh_name,
            'summa'=>-$Guruh_price,
            'xisoblash'=>$Balans."-".$Guruh_price."=".$Summa,
            'balans'=>$Summa
        ]);
        return redirect()->back()->with('success', 'Talaba yangi guruhga qo\'shildi.'); 
    }
}
