<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\User;
use App\Models\Filial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportControlle extends Controller{
    public function index(){
        return view('SuperAdmin.hisobot.index');
    }
    public function show(Request $request){
        $type = $request->report;
        if($type=='all_tashrif'){
            $User = User::where('type','User')->get();
            $Users = array();
            foreach ($User as $key => $value) {
                $Users[$key]['id'] = $value->id;
                $Users[$key]['filial'] = Filial::find($value->filial_id)->filial_name;
                $Users[$key]['name'] = $value->name;
                $Users[$key]['addres'] = $value->addres;
                $Users[$key]['tkun'] = $value->tkun;
                $Users[$key]['phone'] = $value->phone;
                $Users[$key]['phone2'] = $value->phone2;
                $Users[$key]['about'] = $value->about;
                $Users[$key]['smm'] = $value->smm;
                $Users[$key]['balans'] = $value->balans;
                $Users[$key]['login'] = $value->email;
                $Users[$key]['admin'] = User::find($value->admin_id)->name;
                $Users[$key]['created_at'] = $value->created_at;
            }
            return view('SuperAdmin.hisobot.users',compact('Users'));
        }

        #return view('SuperAdmin.hisobot.show');
    }
}
