<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        if(Auth::user()->type=='SuperAdmin'){
            return redirect()->route('SuperAdmin');
        }elseif(Auth::user()->type=='Admin' OR Auth::user()->type=='Operator'){
            return redirect()->route('Admin')
                ->withCookie('filial_id', Auth::user()->filial_id, 86400)
                ->withCookie('filial_name', "Test Filial", 86400);
        }elseif(Auth::user()->type=='Techer'){
            return redirect()->route('Techer');
        }elseif(Auth::user()->type=='User'){
            return redirect()->route('User');
        }else{
            return view('home');
        }
        
    }
}
