<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function coocies(){
        if(Auth::user()->filial_id != request()->cookie('filial_id')){
            if(Auth::user()->type != 'SuperAdmin'){
                Auth::logout();
                return view('home')->withCookie('filial_id', ' ', -86400)->withCookie('filial_name', ' ', -86400);
            }
        }
        if(!request()->cookie('filial_name')){
            Auth::logout();
            return view('home')->withCookie('filial_id', ' ', -86400)->withCookie('filial_name', ' ', -86400);
        }
    }
    public function index(){
        $this->coocies();
        return view('Admin.index');
    }
    

}
