<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\Filial;
use App\Models\FilialKassa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperMoliyaController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index($id){
        $Filials = Filial::find($id);
        $FilialKassa = FilialKassa::where('filial_id',$id)->first();
        $Filial = array();
        $Filial['filial_name'] = $Filials->filial_name;
        $Filial['naqt'] = number_format(($Filials->naqt), 0, '.', ' ');
        $Filial['naqtkassa'] = number_format(($FilialKassa->tulov_naqt_chiqim), 0, '.', ' ');
        $Filial['plastik'] = number_format(($Filials->plastik), 0, '.', ' ');
        $Filial['plastikkassa'] = number_format(($FilialKassa->tulov_plastik_chiqim), 0, '.', ' ');
        $Filial['payme'] = number_format(($Filials->payme), 0, '.', ' ');

        return view('SuperAdmin.moliya.index',compact('Filial'));
    }
}
