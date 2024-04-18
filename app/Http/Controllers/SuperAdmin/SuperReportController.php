<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperReportController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index($id){
        return view('SuperAdmin.report.index');
    }
}
