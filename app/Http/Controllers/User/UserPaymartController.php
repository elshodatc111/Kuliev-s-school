<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tulov;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class UserPaymartController extends Controller{
    public function Tolovlar(){
        $Tulovlar = Tulov::where('user_id',Auth::user()->id)->get();
        $Tulov = array();
        foreach($Tulovlar as $key=>$item){
            $Tulov[$key]['summa'] = number_format(($item->summa), 0, '.', ' ');
            $Tulov[$key]['type'] = $item->type;
            $Tulov[$key]['created_at'] = $item->created_at;
        }
        return view('User.tulovlar',compact('Tulov'));
    }
}
