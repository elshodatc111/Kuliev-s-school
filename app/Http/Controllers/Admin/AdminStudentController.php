<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminStudentController extends Controller{
    public function index(){
        return view('Admin.user.index');
    }
    public function debit(){
        return "Qarzdorlas:";
    }
    public function pays(){
        return "Tulovlar:";
    }
    public function create(){
        return "Yangi talaba:";
    }
}
