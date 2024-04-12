<?php

namespace App\Http\Controllers\Admin;
use App\Models\TulovSetting;
use App\Models\Room;
use App\Models\User;
use App\Models\Guruh;
use App\Models\UserHistory;
use App\Models\GuruhUser;
use App\Models\Cours;
use App\Models\GuruhTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminGuruhController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $EndData = date("Y-m-d",strtotime('-15 day',strtotime(date('Y-m-d'))));
        $Guruh = Guruh::where('filial_id',request()->cookie('filial_id'))->where('guruh_end','>=',$EndData)->get();
        $Guruhlar = array();
        foreach($Guruh as $key=> $item){
            $Guruhlar[$key]['guruh_name'] = $item->guruh_name;
            $Guruhlar[$key]['guruh_start'] = $item->guruh_start;
            $Guruhlar[$key]['guruh_end'] = $item->guruh_end;
            if($item->guruh_start<=date("Y-m-d") AND $item->guruh_end>=date("Y-m-d")){
                $Guruhlar[$key]['guruh'] = 0;
            }elseif($item->guruh_start>date("Y-m-d")){
                $Guruhlar[$key]['guruh'] = 1;
            }else{
                $Guruhlar[$key]['guruh'] = -1;
            }
            $GuruhUser = count(GuruhUser::where('guruh_id',$item->id)->where('status','true')->get());
            $Guruhlar[$key]['talabalar'] = $GuruhUser;
            $Guruhlar[$key]['id'] = $item->id;
        }
        return view('Admin.guruh.index',compact('Guruhlar'));
    } 
    public function endGuruh(){
        $EndData = date("Y-m-d");
        $Guruh = Guruh::where('filial_id',request()->cookie('filial_id'))->where('guruh_end','<',$EndData)->get();
        $Guruhlar = array();
        foreach($Guruh as $key=> $item){
            $Guruhlar[$key]['guruh_name'] = $item->guruh_name;
            $Guruhlar[$key]['guruh_start'] = $item->guruh_start;
            $Guruhlar[$key]['guruh_end'] = $item->guruh_end;
            if($item->guruh_start<=date("Y-m-d") AND $item->guruh_end>=date("Y-m-d")){
                $Guruhlar[$key]['guruh'] = 0;
            }elseif($item->guruh_start>date("Y-m-d")){
                $Guruhlar[$key]['guruh'] = 1;
            }else{
                $Guruhlar[$key]['guruh'] = -1;
            }
            $GuruhUser = count(GuruhUser::where('guruh_id',$item->id)->where('status','true')->get());
            $Guruhlar[$key]['talabalar'] = $GuruhUser;
            $Guruhlar[$key]['id'] = $item->id;
        }
        return view('Admin.guruh.end',compact('Guruhlar'));
    }
    public function CreateGuruh(){
        $TulovSetting = TulovSetting::where('filial_id',request()->cookie('filial_id'))->get();
        $Room = Room::where('filial_id',request()->cookie('filial_id'))->where('status','true')->get();
        $Techer = User::where('filial_id',request()->cookie('filial_id'))->where('status','true')->where('type','Techer')->get();
        $Cours = Cours::where('filial_id',request()->cookie('filial_id'))->get();
        return view('Admin.guruh.create',compact('TulovSetting','Room','Techer','Cours'));
    }
    public function DarsKunlari($StartData, $type){
        $startTimestamp = strtotime($StartData);
        $endTimestamp = strtotime('+31 day',$startTimestamp);
        $i = 1;
        if($type=='toq'){
            $Juft = [1, 3, 5];
        }else{
            $Juft = [2, 4, 6];
        }
        $dates = array();
        while ($startTimestamp <= $endTimestamp) {
            $currentDayOfWeek = date('N', $startTimestamp);
            if (in_array($currentDayOfWeek, $Juft)) { // Monday, Wednesday, Friday
                if($i==14){break;}
                $dates[] = date('Y-m-d', $startTimestamp);
                $i = $i+1;
            }
            $startTimestamp = strtotime('+1 day', $startTimestamp);
        }
        return $dates;
    }
    public function boshSoatlar($dars_vaqti){
        $Mavjud_vaqtlar = array();
        foreach($dars_vaqti as $teme){
            switch ($teme) {
                case 1:
                    $Mavjud_vaqtlar['1']['text'] = '08:00-09:30';
                    $Mavjud_vaqtlar['1']['id'] = 1;
                    break;
                case 2:
                    $Mavjud_vaqtlar['2']['text'] = '09:30-11:00';
                    $Mavjud_vaqtlar['2']['id'] = 2;
                    break;
                case 3:
                    $Mavjud_vaqtlar['3']['text'] = '11:00-12:30';
                    $Mavjud_vaqtlar['3']['id'] = 3;
                break;
                case 4:
                    $Mavjud_vaqtlar['4']['text'] = '12:30-14:00';
                    $Mavjud_vaqtlar['4']['id'] = 4;
                    break;
                case 5:
                    $Mavjud_vaqtlar['5']['text'] = '14:00-15:30';
                    $Mavjud_vaqtlar['5']['id'] = 5;
                    break;
                case 6:
                    $Mavjud_vaqtlar['6']['text'] = '15:30-17:00';
                    $Mavjud_vaqtlar['6']['id'] = 6;
                    break;
                case 7:
                    $Mavjud_vaqtlar['7']['text'] = '17:00-18:30';
                    $Mavjud_vaqtlar['7']['id'] = 7;
                    break;
                case 8:
                    $Mavjud_vaqtlar['8']['text'] = '18:30-20:00';
                    $Mavjud_vaqtlar['8']['id'] = 8;
                    break;
                case 9:
                    $Mavjud_vaqtlar['9']['text'] = '20:00-21:30';
                    $Mavjud_vaqtlar['9']['id'] = 9;
                    break;
            }
        }
        return $Mavjud_vaqtlar;
    }
    public function CreateGuruh1(Request $request){
        $validate = $request->validate([
            'guruh_name' => ['required', 'string', 'max:255'],
            'guruh_price' => ['required', 'string', 'max:255'],
            'guruh_start' => ['required', 'string', 'max:255'],
            'hafta_kun' => ['required', 'string', 'max:255'],
            'room_id' => ['required', 'string', 'max:255'],
            'techer_id' => ['required', 'string', 'max:255'],
            'techer_price' => ['required', 'string', 'max:255'],
            'techer_bonus' => ['required', 'string', 'max:255'],
            'cours_id' => ['required', 'string', 'max:255']
        ]);
        if($request->guruh_start < date('Y-m-d')){return redirect()->back()->with('error', 'Guruhni bugungi kun va kiyingi kunlarda ochish mumkun.'); }
        $dars_kunlari = $this->DarsKunlari($request->guruh_start,$request->hafta_kun);
        $TulovSetting = TulovSetting::where('id',$request->guruh_price)->where('status','true')->first();
        $dars_vaqti = array(1,2,3,4,5,6,7,8,9);
        foreach ($dars_vaqti as $value) {
            $K = 0;
            foreach($dars_kunlari as $item){
                $GuruhJadval = GuruhTime::where('room_id',$request->room_id)
                ->where('dates',$item)
                ->where('times',$value)->get();
                if(count($GuruhJadval)>0){
                    $K++;
                }
            }
            if($K>0){
                unset($dars_vaqti[$value-1]);
            }
        }
        $GuruhView = array();
        $GuruhView['guruh_name'] = $request->guruh_name;
        $GuruhView['guruh_price'] = number_format(($TulovSetting->tulov_summa), 0, '.', ' ');
        $GuruhView['guruh_techer'] = User::find($request->techer_id)->name;
        $GuruhView['techer_price'] = str_replace(","," ",$request->techer_price);
        $GuruhView['techer_bonus'] = str_replace(","," ",$request->techer_bonus);
        $GuruhView['cours'] = Cours::find($request->cours_id)->cours_name;
        $GuruhView['room'] = Room::find($request->room_id)->room_name;
        $GuruhView['hafta_kun'] = $request->hafta_kun;
        $GuruhView['guruh_start'] = $request->guruh_start;
        $GuruhView['guruh_end'] = end($dars_kunlari);
        $GuruhView['kunlar'] = $dars_kunlari;
        $GuruhView['dars_vaqtlari'] = $this->boshSoatlar($dars_vaqti);
        $GuruhInput = array();
        $GuruhInput['filial_id'] = request()->cookie('filial_id');
        $GuruhInput['techer_id'] = $request->techer_id;
        $GuruhInput['cours_id'] = $request->cours_id;
        $GuruhInput['room_id'] = $request->room_id;
        $GuruhInput['guruh_name'] = $request->guruh_name;
        $GuruhInput['guruh_price'] = $TulovSetting->tulov_summa;
        $GuruhInput['guruh_chegirma'] = $TulovSetting->chegirma;
        $GuruhInput['guruh_admin_chegirma'] = $TulovSetting->admin_chegirma;
        $GuruhInput['techer_price'] = str_replace(",","",$request->techer_price);
        $GuruhInput['techer_bonus'] = str_replace(",","",$request->techer_bonus);
        $GuruhInput['guruh_status'] = 'true';
        $GuruhInput['guruh_start'] = $request->guruh_start;
        $GuruhInput['guruh_end'] = end($dars_kunlari);
        return view('Admin.guruh.create2',compact('GuruhView','GuruhInput'));
    }
    public function CreateGuruh2(Request $request){
        $validate = $request->validate([
            'filial_id' => ['required'],
            'techer_id' => ['required'],
            'cours_id' => ['required'],
            'room_id' => ['required'],
            'guruh_name' => ['required'],
            'guruh_price' => ['required'],
            'guruh_chegirma' => ['required'],
            'guruh_admin_chegirma' => ['required'],
            'techer_price' => ['required'],
            'techer_bonus' => ['required'],
            'guruh_status' => ['required'],
            'guruh_start' => ['required'],
            'guruh_end' => ['required'],
            'guruh_vaqt' => ['required'],
        ]);
        $validate['admin_id'] = Auth::user()->id;
        $Guruh = Guruh::create($validate);
        $GuruhID = $Guruh->id;
        $Kunlar = array();
        $Kunlar['date0'] = $request->date0;
        $Kunlar['date1'] = $request->date1;
        $Kunlar['date2'] = $request->date2;
        $Kunlar['date3'] = $request->date3;
        $Kunlar['date4'] = $request->date4;
        $Kunlar['date5'] = $request->date5;
        $Kunlar['date6'] = $request->date6;
        $Kunlar['date7'] = $request->date7;
        $Kunlar['date8'] = $request->date8;
        $Kunlar['date9'] = $request->date9;
        $Kunlar['date10'] = $request->date10;
        $Kunlar['date11'] = $request->date11;
        $Kunlar['date12'] = $request->date12;
        foreach ($Kunlar as $key => $value) {
            GuruhTime::create([
                'filial_id'=>$request->filial_id,
                'room_id'=>$request->room_id,
                'guruh_id'=>$GuruhID,
                'dates'=>$value,
                'times'=>$request->guruh_vaqt,
            ]);
        }
        return redirect()->route('AdminGuruhShow',$Guruh->id); 
    }
    public function GuruhAbout($id){
        $Guruhlar = Guruh::find($id);
        $Guruh = array();
        $Guruh['guruh_name'] = $Guruhlar->guruh_name;
        $Guruh['guruh_price'] = number_format(($Guruhlar->guruh_price), 0, '.', ' ');
        $Guruh['techer_price'] = number_format(($Guruhlar->techer_price), 0, '.', ' ');
        $Guruh['techer_bonus'] = number_format(($Guruhlar->techer_bonus), 0, '.', ' ');
        $Guruh['guruh_start'] = $Guruhlar->guruh_start;
        $Guruh['guruh_end'] = $Guruhlar->guruh_end;
        $Guruh['guruh_vaqt'] = $Guruhlar->guruh_vaqt;
        $Guruh['admin_id'] = User::find($Guruhlar->admin_id)->email;
        $Guruh['techer_id'] = User::find($Guruhlar->techer_id)->name;
        $Guruh['created_at'] = $Guruhlar->created_at;
        $Guruh['updated_at'] = $Guruhlar->updated_at;
        $Guruh['cours_id'] = Cours::find($Guruhlar->cours_id)->cours_name;
        $Guruh['room_id'] = Room::find($Guruhlar->room_id)->room_name;
        $Guruh['id'] = $Guruhlar->id;
        switch ($Guruhlar->guruh_vaqt) {
            case 1:
                $Guruh['guruh_vaqt'] = '08:00-09:30';
                break;
            case 2:
                $Guruh['guruh_vaqt'] = '09:30-11:00';
                break;
            case 3:
                $Guruh['guruh_vaqt'] = '11:00-12:30';
            break;
            case 4:
                $Guruh['guruh_vaqt'] = '12:30-14:00';
                break;
            case 5:
                $Guruh['guruh_vaqt'] = '14:00-15:30';
                break;
            case 6:
                $Guruh['guruh_vaqt'] = '15:30-17:00';
                break;
            case 7:
                $Guruh['guruh_vaqt'] = '17:00-18:30';
                break;
            case 8:
                $Guruh['guruh_vaqt'] = '18:30-20:00';
                break;
            case 9:
                $Guruh['guruh_vaqt'] = '20:00-21:30';
                break;
        }
        $Kunlar = GuruhTime::where('guruh_id',$Guruhlar->id)->get();
        $Kun = array();
        foreach ($Kunlar as $key => $value) {
            $Kun[$key] = $value->dates;
        }
        $Guruh['Kunlar'] = $Kun;
        return $Guruh;
    }
    public function userEndGroups($id){
        $GuruhUser = GuruhUser::where('guruh_id',$id)->where('status','true')->get();
        $Deletes = array();
        $Users = array();
        foreach ($GuruhUser as $key => $value) {
            $Users[$key]['user_id'] = $value->user_id;
            $Users[$key]['user_name'] = User::where('id',$value->user_id)->first()->name;
        }
        $Deletes['user'] = $Users;
        $Deletes['guruh_price'] = number_format((Guruh::where('id',$id)->first()->guruh_price), 0, '.', ' ');
        return $Deletes;
    }
    public function guruhTalabalari($guruh_id){
        $GuruhUser = GuruhUser::where('guruh_id',$guruh_id)->orderby('id','desc')->get();
        $Users = array();
        foreach ($GuruhUser as $key => $value) {
            $Users[$key]['user_id'] = $value->user_id;
            $Users[$key]['User'] = User::find($value->user_id)->name;
            $Users[$key]['commit_start'] = $value->commit_start;
            $Users[$key]['created_at'] = $value->created_at;
            $Users[$key]['admin_id_start'] = User::find($value->admin_id_start)->email;
            if($value->status=='true'){
                $Users[$key]['commit_end'] = " ";
                $Users[$key]['admin_id_end'] = " ";
                $Users[$key]['updated_at'] = " ";
                $Users[$key]['status'] = "Faol";
            }else{
                $Users[$key]['commit_end'] = $value->commit_end;
                $Users[$key]['admin_id_end'] = User::find($value->admin_id_end)->email;
                $Users[$key]['updated_at'] = $value->updated_at;
                $Users[$key]['status'] = "O'chirildi";
            }
            $Users[$key]['balans'] = number_format((User::find($value->user_id)->balans), 0, '.', ' ');
        }
        return $Users;
    }
    public function show($id){
        $Guruh = $this->GuruhAbout($id);
        $Days = GuruhTime::where('guruh_id',$Guruh['id'])->get();
        $UsersDeletes = $this->userEndGroups($id);
        $Talabalar = $this->guruhTalabalari($id);
        return view('Admin.guruh.show',compact('Guruh','Days','UsersDeletes','Talabalar'));
    }
    public function guruhDelUser(Request $request){
        $validate = $request->validate([
            'guruh_id' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
            'commit_end' => ['required', 'string', 'max:255']
        ]);
        $jarima = str_replace(",","",$request->jarima);
        $validate['status'] = 'false';
        $validate['admin_id_end'] = Auth::User()->id;
        $UserGuruh = GuruhUser::where('user_id',$validate['user_id'])->where('guruh_id',$validate['guruh_id'])->where('status','true')->first();
        $UserGuruh->update($validate);
        $User = User::find($request->user_id);
        $Balans = $User->balans;
        $Guruh_name = Guruh::where('id',$request->guruh_id)->first()->guruh_name;
        $Guruh_price = Guruh::where('id',$request->guruh_id)->first()->guruh_price;
        $Xisob = strval($Balans." + ".$Guruh_price." = ".$Balans+$Guruh_price);
        $Balans = $Balans+$Guruh_price;
        $UserHistory = UserHistory::create([
            'filial_id'=>request()->cookie('filial_id'),
            'user_id'=>$request->user_id,
            'status'=>"Guruhdan o'chirildi",
            'type'=>$Guruh_name,
            'summa'=>$Guruh_price,
            'xisoblash'=>$Xisob,
            'balans'=>$Balans,
        ]);
        $Xisob2 = strval($Balans." - ".$jarima." = ".$Balans-$jarima);
        $Balans = $Balans-$jarima;
        $UserHistory = UserHistory::create([
            'filial_id'=>request()->cookie('filial_id'),
            'user_id'=>$request->user_id,
            'status'=>"Jarima",
            'type'=>$Guruh_name,
            'summa'=>$jarima,
            'xisoblash'=>$Xisob2,
            'balans'=>$Balans,
        ]);
        $Users = User::find($request->user_id)->update([
            'balans'=>$Balans
        ]);
        $User_name = $User->name;
        return redirect()->back()->with('success', $User_name.' guruhdan o\'chirildi.'); 
    }

}
