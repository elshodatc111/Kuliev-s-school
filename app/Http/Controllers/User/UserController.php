<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('User.index');
    }
    public function Guruhlar(){
        
        return view('User.guruh');
    }
    public function Tolovlar(){
        return view('User.tulovlar');
    }
    public function Contact(){
        return view('User.contact');
    }public function Kabinet(){
        
        return view('User.kabinet');
    }
}
