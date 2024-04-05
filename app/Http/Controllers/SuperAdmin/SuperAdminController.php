<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SuperAdminController extends Controller{
    
    public function index(){
        
        return view('SuperAdmin.index');
    }
    public function filial(){
        return view('SuperAdmin.filial');
    }
    public function hisobot(){
        return view('SuperAdmin.hisobot');
    }
    public function statistika(){
        return view('SuperAdmin.statistika');
    }



    
}
