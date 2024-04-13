<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\FilialKassa;
use App\Models\Moliya;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoliyaController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $FilialKassa = FilialKassa::where('filial_id',request()->cookie('filial_id'))->first();
        $Kassa = array();
        $Kassa['Naqt'] = number_format(($FilialKassa->tulov_naqt), 0, '.', ' ');
        $Kassa['Plastik'] = number_format(($FilialKassa->tulov_plastik), 0, '.', ' ');
        $Kassa['ChiqimNaqt'] = number_format(($FilialKassa->tulov_naqt_chiqim), 0, '.', ' ');
        $Kassa['ChiqimPlastik'] = number_format(($FilialKassa->tulov_plastik_chiqim), 0, '.', ' ');
        $Kassa['XarajatNaqt'] = number_format(($FilialKassa->tulov_naqt_xarajat), 0, '.', ' ');
        $Kassa['XarajatPlastik'] = number_format(($FilialKassa->tulov_plastik_xarajat), 0, '.', ' ');

        return view("Admin.moliya.index",compact('Kassa'));
    }

    public function chiqim(Request $request){
        $naqt = str_replace(" ","",$request->naqt);
        $plastik = str_replace(" ","",$request->plastik);
        $summa = str_replace(",","",$request->summa);
        $FilialKassa = FilialKassa::where('filial_id',request()->cookie('filial_id'))->first();
        if($request->type=='Naqt'){
            if($summa>$naqt){return redirect()->back()->with('error', "Kassada mablag' yetarli emas."); }
            $FilialKassa->tulov_naqt = $FilialKassa->tulov_naqt-$summa;
            $FilialKassa->tulov_naqt_chiqim = $FilialKassa->tulov_naqt_chiqim+$summa;
        }
        if($request->type=='Plastik'){
            if($summa>$plastik){return redirect()->back()->with('error', "Kassada mablag' yetarli emas."); }
            $FilialKassa->tulov_plastik = $FilialKassa->tulov_plastik-$summa;
            $FilialKassa->tulov_plastik_chiqim = $FilialKassa->tulov_plastik_chiqim+$summa;
        }
        $FilialKassa->save();
        $Moliya = Moliya::create([
            'filail_id'=>request()->cookie('filial_id'),
            'xodisa'=>$request->xodisa,
            'summa'=>$summa,
            'type'=>$request->type,
            'status'=>'false',
            'about'=>$request->about,
            'user_id'=>Auth::User()->id,
        ]);
        return redirect()->back()->with('success', "Kassadan chiqim qilindi. Tasdiqlanish kutilmoqda");
    }
    public function xarajat(Request $request){
        $naqt = str_replace(" ","",$request->naqt);
        $plastik = str_replace(" ","",$request->plastik);
        $summa = str_replace(",","",$request->summa);
        $FilialKassa = FilialKassa::where('filial_id',request()->cookie('filial_id'))->first();
        if($request->type=='Naqt'){
            if($summa>$naqt){return redirect()->back()->with('error', "Kassada mablag' yetarli emas."); }
            $FilialKassa->tulov_naqt = $FilialKassa->tulov_naqt-$summa;
            $FilialKassa->tulov_naqt_xarajat = $FilialKassa->tulov_naqt_xarajat+$summa;
        }
        if($request->type=='Plastik'){
            if($summa>$plastik){return redirect()->back()->with('error', "Kassada mablag' yetarli emas."); }
            $FilialKassa->tulov_plastik = $FilialKassa->tulov_plastik-$summa;
            $FilialKassa->tulov_plastik_xarajat = $FilialKassa->tulov_plastik_xarajat+$summa;
        }
        $FilialKassa->save();
        $Moliya = Moliya::create([
            'filail_id'=>request()->cookie('filial_id'),
            'xodisa'=>$request->xodisa,
            'summa'=>$summa,
            'type'=>$request->type,
            'status'=>'false',
            'about'=>$request->about,
            'user_id'=>Auth::User()->id,
        ]);
        return redirect()->back()->with('success', "Kassadan xarajatlar uchun chiqim qilindi. Tasdiqlanish kutilmoqda");
    }
}
