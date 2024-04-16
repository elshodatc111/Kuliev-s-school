<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperMoliyaController extends Controller
{
    public function index($id){
        return view('SuperAdmin.moliya.index');
    }
}
