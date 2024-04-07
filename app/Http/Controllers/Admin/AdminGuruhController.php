<?php

namespace App\Http\Controllers\Admin;

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
        return view('Admin.guruh.create');
    }
}
