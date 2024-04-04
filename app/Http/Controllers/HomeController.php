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
            return redirect()->route('Admin');
        }elseif(Auth::user()->type=='Techer' AND Auth::user()->status=='techer'){
            return redirect()->route('Techer');
        }elseif(Auth::user()->type=='User' AND Auth::user()->status=='user'){
            return redirect()->route('User');
        }else{
            return view('home');
        }
        
    }
}
