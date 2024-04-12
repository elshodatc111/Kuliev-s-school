<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Guruh;
use App\Models\AdminKassa;
use App\Models\UserHistory;
use App\Models\GuruhUser;
use App\Models\FilialKassa;
use App\Models\Tulov;
use App\Events\CreateTashrif;
use App\Events\createTulov;
use App\Events\UserResetPassword;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use mrmuminov\eskizuz\Eskiz;
use mrmuminov\eskizuz\types\sms\SmsSingleSmsType;

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
    public function update(Request $request){
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'phone2' => ['required', 'string', 'max:255'],
            'addres' => ['required', 'string', 'max:255'],
            'tkun' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string', 'max:255']
        ]);
        $User = User::find($request->user_id)->update($validate);
        return redirect()->back()->with('success', 'Talaba malumotlari yangilandi.'); 
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
    public function passwordUpdate(Request $request){
        $password = rand(10000000,99999999);
        $User = User::find($request->id);
        $User->password = Hash::make($password);
        $User->save();
        UserResetPassword::dispatch($User->name,$password,$User->phone);
        return redirect()->back()->with('success', 'Talaba paroli yangilandi.'); 
    }
    public function sendMessege(Request $request){
        $User = User::find($request->user_id);
        $phone = "+998".str_replace(" ","",$User->phone);
        $Text = $request->text;
        $eskiz_email = env('ESKIZ_UZ_EMAIL');
        $eskiz_password = env('ESKIZ_UZ_Password');
        $eskiz = new Eskiz($eskiz_email,$eskiz_password);
        $eskiz->requestAuthLogin();
        $from='4546';
        $mobile_phone = $phone;
        $message = $Text;
        $user_sms_id = 1;
        $callback_url = '';
        $singleSmsType = new SmsSingleSmsType(
            from: $from,
            message: $message,
            mobile_phone: $mobile_phone,
            user_sms_id:$user_sms_id,
            callback_url:$callback_url
        );
        $result = $eskiz->requestSmsSend($singleSmsType);
        return redirect()->back()->with('success', 'SMS xabar yuborildi.'); 
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
    public function TalabaGuruhlari($id){
        $GuruhUser = GuruhUser::where('user_id',$id)->get();
        $result = array();
        foreach($GuruhUser as $key => $item){
            $result[$key]['guruh_name'] = Guruh::where('id',$item->guruh_id)->first()->guruh_name;
        }
    }
    public function userArxivGuruh($id){
        $userArxivGuruh = GuruhUser::where('user_id',$id)->get();
        $History = array();
        foreach($userArxivGuruh as $key => $item){
            $History[$key]['id'] = $item->id;
            $History[$key]['guruh_id'] = $item->guruh_id;
            $History[$key]['guruh_name'] = Guruh::find($item->guruh_id)->guruh_name;
            $History[$key]['guruh_start'] = $item->created_at;
            $History[$key]['commit_start'] = $item->commit_start;
            $History[$key]['admin_id_start'] = User::where('id',$item->admin_id_start)->first()->email;
            $History[$key]['status'] = $item->status;
            if($item->status=='true'){
                $History[$key]['admin_id_end'] = " ";
                $History[$key]['updated_at'] = " ";
                $History[$key]['commit_end'] = " ";
            }else{
                $History[$key]['commit_end'] = $item->commit_end;
                $History[$key]['admin_id_end'] = User::where('id',$item->admin_id_end)->first()->email;
                $History[$key]['updated_at'] = $item->updated_at;
            }
        }
        return $History;
    }
    public function chegirmaliGuruhlar($id){
        $userArxivGuruh = GuruhUser::where('user_id',$id)->where('status','true')->get();
        $ChegirmaDay = date("Y-m-d",strtotime('-3 day',strtotime(date('Y-m-d'))));
        $Guruhlar = array();
        foreach ($userArxivGuruh as $key => $value) {
            $Guruh = Guruh::where('id',$value->guruh_id)->where('guruh_start','>=',$ChegirmaDay)->first();
            if($Guruh){
                $Tulovs = count(Tulov::where('user_id',$id)->where('guruh_id',$value->guruh_id)->where('type','Chegirma')->get());
                if($Tulovs>0){}
                else{
                    $Guruhlar[$key]['guruh_id'] = $Guruh->id;
                    $Guruhlar[$key]['guruh_name'] = $Guruh->guruh_name;
                    $Guruhlar[$key]['chegirmaTulov'] = $Guruh->guruh_price-$Guruh->guruh_chegirma;
                }
            }
        }
        return $Guruhlar;
    }
    public function TalabaTulovlari($id){
        $TalabaTulovlar = Tulov::where('user_id',$id)->get();
        $Tulov = array();
        foreach ($TalabaTulovlar as $key => $value) {
            $Tulov[$key]['id'] = $value->id;
            $Tulov[$key]['summa'] = number_format(($value->summa), 0, '.', ' ');
            $Tulov[$key]['type'] = $value->type;
            $Tulov[$key]['about'] = $value->about;
            $Tulov[$key]['created_at'] = $value->created_at;
            $Tulov[$key]['admin'] = User::find($value->admin_id)->email;
        }
        return $Tulov;
    }
    public function show($id){
        $Users = $this->userAbout($id);
        $Guruhs = $this->Guruhs($id);
        $userHistory = $this->userHistory($id);
        $talaba_guruh = $this->TalabaGuruhlari($id);
        $userArxivGuruh = $this->userArxivGuruh($id);
        $ChegirmaGuruh = $this->chegirmaliGuruhlar($id);
        $Tulovlar = $this->TalabaTulovlari($id);
        return view('Admin.user.show',compact('Users','Guruhs','userHistory','Tulovlar','talaba_guruh','userArxivGuruh','ChegirmaGuruh'));
    }

    public function tulov(Request $request){
        $validate = $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'naqt' => ['required', 'string', 'max:255'],
            'plastik' => ['required', 'string', 'max:255']
        ]);
        if($request->naqt == '0' AND $request->plastik == '0'){
            return redirect()->back()->with('error', 'To\'lov summasi noto\'g\'ri kiritildi.'); 
        }
        createTulov::dispatch($request->user_id, $request->naqt, $request->plastik, $request->guruh_id, $request->about);
        return redirect()->back()->with('success', 'To\'lov amalga oshirildi.'); 
    }
    public function tulovDelete($id){
        $TalabaTulovlar = Tulov::where('id',$id)->first();
        $user_id = $TalabaTulovlar->user_id;
        $guruh_id = $TalabaTulovlar->guruh_id;
        if($guruh_id=='NULL'){
            $guruh_name = " ";
        }else{
            $guruh_name = Guruh::where('id',$guruh_id)->first()->guruh_name;
        }
        $summa = $TalabaTulovlar->summa;
        $type = $TalabaTulovlar->type;
        $User = User::find($user_id);
        $User_Balans = $User->balans;
        $User_balans = $User->balans;
        $User->balans = $User_balans-$summa;
        $User->save();
        $FilialKassa = FilialKassa::where('filial_id',request()->cookie('filial_id'))->first();
        if($type=='Chegirma'){
            if(empty($FilialKassa->tulov_chegirma)){
                $TypeChegirma = 0;
            }else{
                $TypeChegirma = $FilialKassa->tulov_chegirma;
            }
            $FilialKassa->tulov_chegirma = $TypeChegirma-$summa; 
        }elseif($type='Naqt'){
            $FilialKassa->tulov_naqt = $FilialKassa->tulov_naqt-$summa;        
        }elseif($type='Plastik'){
            $FilialKassa->tulov_plastik = $FilialKassa->tulov_plastik-$summa;            
        }
        $FilialKassa->save();
        $UserHistory = UserHistory::create([
            'filial_id'=>request()->cookie('filial_id'),
            'user_id'=>$user_id,
            'status'=>"To'lov o'chirildi(".$type.")",
            'type'=>$guruh_name,
            'summa'=>$summa,
            'xisoblash'=>$User_Balans."-".$summa."=".$User->balans,
            'balans'=>$User->balans
        ]);
        $TalabaTulovlar->delete();
        return redirect()->back()->with('success', 'To\'lov o\'chirildi.'); 
    }
}
