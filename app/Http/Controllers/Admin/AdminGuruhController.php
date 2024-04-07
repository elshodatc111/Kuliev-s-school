<?php

namespace App\Http\Controllers\Admin;
use App\Models\TulovSetting;
use App\Models\Room;
use App\Models\User;
use App\Models\Guruh;
use App\Models\Cours;
use App\Models\GuruhTime;
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
        $Guruh = Guruh::create($validate);
        $Kunlar = array();
        $Kunlar['date0'] = $request->date0;
        $Kunlar['date2'] = $request->date2;
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
                'dates'=>$value,
                'times'=>$request->guruh_vaqt,
            ]);
        }
        return redirect()->route('AdminGuruhShow',$Guruh->id); 
    }
    public function show($id){
        dd(Guruh::find($id));
    }

}
