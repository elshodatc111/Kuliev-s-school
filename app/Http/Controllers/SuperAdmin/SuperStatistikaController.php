<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Models\User;
use App\Models\Filial;
use App\Models\Tulov;
use App\Models\Moliya;
use App\Models\IshHaqi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperStatistikaController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function OylikTashrif($filial_id){
        $StartMonch = date("Y-m")."-01 00:00:00";
        $EndMonch = date("Y-m")."-31 23:59:59";
        $Users = User::where('filial_id',request()->cookie('filial_id'))->where('type','User')->get();
        $Telegram = 0;
        $Instagram = 0;
        $Facebook = 0;
        $Bannerlar = 0;
        $Tanishlar = 0;
        $Boshqalar = 0;
        $OylikTashrif = array();
        foreach ($Users as $key => $value) {
            if($value->smm == 'Telegram'){$Telegram = $Telegram + 1;
            }elseif($value->smm == 'Instagram'){$Instagram = $Instagram + 1;
            }elseif($value->smm == 'Facebook'){$Facebook = $Facebook + 1;
            }elseif($value->smm == 'Bannerlar'){$Bannerlar = $Bannerlar + 1;
            }elseif($value->smm == 'Tanishlar'){$Tanishlar = $Tanishlar + 1;
            }else{$Boshqalar = $Boshqalar + 1;}
        }
        $OylikTashrif['Telegram'] = $Telegram;
        $OylikTashrif['Bannerlar'] = $Bannerlar;
        $OylikTashrif['Instagram'] = $Instagram;
        $OylikTashrif['Facebook'] = $Facebook;
        $OylikTashrif['Tanishlar'] = $Tanishlar;
        $OylikTashrif['Boshqalar'] = $Boshqalar;
        
        return $OylikTashrif;
    }
    public function OylikTulov($filial_id){
        $StartMonch = date("Y-m")."-01 00:00:00";
        $EndMonch = date("Y-m")."-31 23:59:59";
        $Tulovlar = Tulov::where('filial_id',request()->cookie('filial_id'))
            ->where('created_at',">=",$StartMonch)
            ->where('created_at',"<=",$EndMonch)
            ->where('status','true')->get();
        $Tulov = array();
        $Naqt = 0;
        $Plastik = 0;
        $Payme = 0;
        foreach ($Tulovlar as $key => $value) {
            if($value->type=='Naqt'){
                $Naqt = $Naqt + $value->summa;
            }elseif($value->type=='Plastik'){
                $Plastik = $Plastik + $value->summa;
            }elseif($value->type=='Payme'){
                $Payme = $Payme + $value->summa;
            }
        }
        $Tulov['Naqt'] = $Naqt;
        $Tulov['Plastik'] = $Plastik;
        $Tulov['Payme'] = $Payme;
        return $Tulov;
    }
    public function Kunlar(){
        $Kunlar = array();
        array_push($Kunlar,date("d-M",strtotime('-5 day',time())));
        array_push($Kunlar,date("d-M",strtotime('-4 day',time())));
        array_push($Kunlar,date("d-M",strtotime('-3 day',time())));
        array_push($Kunlar,date("d-M",strtotime('-2 day',time())));
        array_push($Kunlar,date("d-M",strtotime('-1 day',time())));
        array_push($Kunlar,date("d-M"));
        return $Kunlar;
    }
    public function kunlikNPPCHQTulovlar($filial_id){
        $KunlikStatustika = array();
        $Naqt = array();
        $Plastik = array();
        $Payme = array();
        $Chegirma = array();
        $Qaytarilgan = array();
        $m = 1;
        for ($i=-5; $i <= 0; $i++) { 
            $dates = date("Y-m-d", strtotime($i.' day',time()));
            $Tulovlar = Tulov::where('filial_id',$filial_id)
                ->where('created_at',">=",$dates." 00:00:00")
                ->where('created_at',"<=",$dates." 23:59:59")->where('status','true')->get();
            $N = 0;
            $P = 0;
            $Q = 0;
            $Pay = 0;
            $CH = 0;
            foreach ($Tulovlar as $key => $value) {
                if($value->type == 'Naqt'){$N = $N + $value->summa;
                }elseif($value->type == 'Plastik'){$P = $P + $value->summa;
                }elseif($value->type == 'Chegirma'){$CH = $CH + $value->summa;
                }elseif($value->type == 'Payme'){$Pay = $Pay + $value->summa;
                }else{$Q = $Q + $value->summa;}
            }
            $Naqt[$m] = $N;
            $Plastik[$m] = $P;
            $Payme[$m] = $Pay;
            $Chegirma[$m] = $CH;
            $Qaytarilgan[$m] = $Q;
            $m++;
        }
        $KunlikStatustika['Naqt'] = $Naqt;
        $KunlikStatustika['Plastik'] = $Plastik;
        $KunlikStatustika['Payme'] = $Payme;
        $KunlikStatustika['Chegirma'] = $Chegirma;
        $KunlikStatustika['Qaytarilgan'] = $Qaytarilgan;
        return $KunlikStatustika;

    }
    public function KunlikTulovlar($id){
        $Statistika = array();
        $Statistika['kunlar'] = $this->Kunlar();
        $Statistika['Tulovlar'] = $this->kunlikNPPCHQTulovlar($id);
        return $Statistika;
    }
    public function OylikStatistiakOylar(){
        $oylar = array();
        $oylar[0] = date("M",strtotime('-5 month',time()));
        $oylar[1] = date("M",strtotime('-4 month',time()));
        $oylar[2] = date("M",strtotime('-3 month',time()));
        $oylar[3] = date("M",strtotime('-2 month',time()));
        $oylar[4] = date("M",strtotime('-1 month',time()));
        $oylar[5] = date("M",strtotime('0 month',time()));
        return $oylar;
    }
    public function OylikTulovlar($id){
        $OylikStatustika = array();
        $OylikStatustikaView = array();
        $Naqt = array();
        $Plastik = array();
        $Payme = array();
        $Chegirma = array();
        $Qaytarilgan = array();
        $Xarajat = array();
        $UmumiyXarajat = array();
        $IshHaqi = array();
        $Daromat = array();
        $m = 1;
        for ($i=-5; $i <= 0; $i++) { 
            $dates = date("Y-m", strtotime($i.' month', time()));
            $Tulovlar = Tulov::where('filial_id',$id)
                ->where('created_at',">=",$dates."-01 00:00:00")
                ->where('created_at',"<=",$dates."-31 23:59:59")->where('status','true')->get();
            $Moliya = Moliya::where('filial_id',$id)
                ->where('created_at',">=",$dates."-01 00:00:00")
                ->where('created_at',"<=",$dates."-31 23:59:59")->where('status','true')->get();
            $IshHaqi = IshHaqi::where('filial_id',$id)
                ->where('created_at',">=",$dates."-01 00:00:00")
                ->where('created_at',"<=",$dates."-31 23:59:59")->get();
            $naqts = 0;
            $plastiks = 0;
            $chegirma = 0;
            $qaytaril = 0;
            $payme = 0;
            $xarajat = 0;
            $adminxarajat = 0;
            $ishhaqii = 0;
            foreach ($IshHaqi as $keyt => $value) {$ishhaqii = $ishhaqii + $value->summa;}
            foreach ($Moliya as $keysss => $value) {
                if($value->xodisa=='Xarajat'){
                    $xarajat = $xarajat + $value->summa;
                }
                if($value->xodisa=='Qaytarildi'){
                    $xarajat = $xarajat - $value->summa;
                }
                if($value->xodisa=='XarajatAdmin'){
                    $adminxarajat = $adminxarajat + $value->summa;
                }
            }
            foreach ($Tulovlar as $sss => $value) {
                if($value->type == 'Naqt'){
                    $naqts = $value->summa + $naqts;
                }
                if($value->type == 'Plastik'){
                    $plastiks = $value->summa + $plastiks;
                }
                if($value->type == 'Chegirma'){
                    $chegirma = $value->summa + $chegirma;
                }
                if($value->type == 'Qaytarildi (Naqt)'){
                    $qaytaril = $value->summa + $qaytaril;
                }
                if($value->type == 'Qaytarildi (Plastik)'){
                    $qaytaril = $value->summa + $qaytaril;
                }
                if($value->type == 'Payme'){
                    $payme = $value->summa + $payme;
                }
            }
            $daromat = $naqts + $plastiks + $payme - $qaytaril - $xarajat - $adminxarajat - $ishhaqii;
            $OylikStatustika[$m]['Naqt'] = $naqts;
            $OylikStatustika[$m]['Plastik'] = $plastiks;
            $OylikStatustika[$m]['Payme'] = $payme;
            $OylikStatustika[$m]['Chegirma'] = $chegirma;
            $OylikStatustika[$m]['Qaytarilgan'] = $qaytaril;
            $OylikStatustika[$m]['Xarajat'] = $xarajat;
            $OylikStatustika[$m]['UmumiyXarajat'] = $adminxarajat;
            $OylikStatustika[$m]['IshHaqi'] = $ishhaqii;
            $OylikStatustika[$m]['Daromat'] = $daromat;
            $OylikStatustikaView[$m]['Naqt'] = number_format(($naqts), 0, '.', ' ');
            $OylikStatustikaView[$m]['Plastik'] = number_format(($plastiks), 0, '.', ' ');
            $OylikStatustikaView[$m]['Payme'] = number_format(($payme), 0, '.', ' ');
            $OylikStatustikaView[$m]['Chegirma'] = number_format(($chegirma), 0, '.', ' ');
            $OylikStatustikaView[$m]['Qaytarilgan'] = number_format(($qaytaril), 0, '.', ' ');
            $OylikStatustikaView[$m]['Xarajat'] = number_format(($xarajat), 0, '.', ' ');
            $OylikStatustikaView[$m]['UmumiyXarajat'] = number_format(($adminxarajat), 0, '.', ' ');
            $OylikStatustikaView[$m]['IshHaqi'] = number_format(($ishhaqii), 0, '.', ' ');
            $OylikStatustikaView[$m]['Daromat'] = number_format(($daromat), 0, '.', ' ');
            $m++;
        }
        $report = array();
        $report['statis'] = $OylikStatustika;
        $report['view'] = $OylikStatustikaView;
        return $report;
    }
    public function index($id){
        $OylikTashriflar = $this->OylikTashrif($id);
        $OylikTulov = $this->OylikTulov($id);
        $KunlikStatistika = $this->KunlikTulovlar($id);
        $OylikStatistiakOylar = $this->OylikStatistiakOylar();
        $OylikTulovlar = $this->OylikTulovlar($id);
        $Kun1 = date("Y-m-d",strtotime('-5 day',time()));
        $Kun2 = date("Y-m-d",strtotime('-4 day',time()));
        $Kun3 = date("Y-m-d",strtotime('-3 day',time()));
        $Kun4 = date("Y-m-d",strtotime('-2 day',time()));
        $Kun5 = date("Y-m-d",strtotime('-1 day',time()));
        $Kun6 = date("Y-m-d");
        return view('SuperAdmin.statistik.index', compact('OylikTulovlar','OylikStatistiakOylar','KunlikStatistika','Kun1','Kun2','Kun3','Kun4','Kun5','Kun6','OylikTashriflar','OylikTulov'));
    }

    public function statistikaMonth(){

        
        $OylikStatustika = array();
        $OylikStatustikaView = array();
        $Naqt = array();
        $Plastik = array();
        $Payme = array();
        $Chegirma = array();
        $Qaytarilgan = array();
        $Xarajat = array();
        $UmumiyXarajat = array();
        $IshHaqi = array();
        $Daromat = array();
        $m = 1;
        for ($i=-5; $i <= 0; $i++) { 
            $dates = date("Y-m", strtotime($i.' month', time()));
            $Tulovlar = Tulov::where('created_at',">=",$dates."-01 00:00:00")
                ->where('created_at',"<=",$dates."-31 23:59:59")->where('status','true')->get();
            $Moliya = Moliya::where('created_at',">=",$dates."-01 00:00:00")
                ->where('created_at',"<=",$dates."-31 23:59:59")->where('status','true')->get();
            $IshHaqi = IshHaqi::where('created_at',">=",$dates."-01 00:00:00")
                ->where('created_at',"<=",$dates."-31 23:59:59")->get();
            $naqts = 0;
            $plastiks = 0;
            $chegirma = 0;
            $qaytaril = 0;
            $payme = 0;
            $xarajat = 0;
            $adminxarajat = 0;
            $ishhaqii = 0;
            foreach ($IshHaqi as $keyt => $value) {$ishhaqii = $ishhaqii + $value->summa;}
            foreach ($Moliya as $keysss => $value) {
                if($value->xodisa=='Xarajat'){
                    $xarajat = $xarajat + $value->summa;
                }
                if($value->xodisa=='Qaytarildi'){
                    $xarajat = $xarajat - $value->summa;
                }
                if($value->xodisa=='XarajatAdmin'){
                    $adminxarajat = $adminxarajat + $value->summa;
                }
            }
            foreach ($Tulovlar as $sss => $value) {
                if($value->type == 'Naqt'){
                    $naqts = $value->summa + $naqts;
                }
                if($value->type == 'Plastik'){
                    $plastiks = $value->summa + $plastiks;
                }
                if($value->type == 'Chegirma'){
                    $chegirma = $value->summa + $chegirma;
                }
                if($value->type == 'Qaytarildi (Naqt)'){
                    $qaytaril = $value->summa + $qaytaril;
                }
                if($value->type == 'Qaytarildi (Plastik)'){
                    $qaytaril = $value->summa + $qaytaril;
                }
                if($value->type == 'Payme'){
                    $payme = $value->summa + $payme;
                }
            }
            $daromat = $naqts + $plastiks + $payme - $qaytaril - $xarajat - $adminxarajat - $ishhaqii;
            $OylikStatustika[$m]['Naqt'] = $naqts;
            $OylikStatustika[$m]['Plastik'] = $plastiks;
            $OylikStatustika[$m]['Payme'] = $payme;
            $OylikStatustika[$m]['Chegirma'] = $chegirma;
            $OylikStatustika[$m]['Qaytarilgan'] = $qaytaril;
            $OylikStatustika[$m]['Xarajat'] = $xarajat;
            $OylikStatustika[$m]['UmumiyXarajat'] = $adminxarajat;
            $OylikStatustika[$m]['IshHaqi'] = $ishhaqii;
            $OylikStatustika[$m]['Daromat'] = $daromat;
            $OylikStatustikaView[$m]['Naqt'] = number_format(($naqts), 0, '.', ' ');
            $OylikStatustikaView[$m]['Plastik'] = number_format(($plastiks), 0, '.', ' ');
            $OylikStatustikaView[$m]['Payme'] = number_format(($payme), 0, '.', ' ');
            $OylikStatustikaView[$m]['Chegirma'] = number_format(($chegirma), 0, '.', ' ');
            $OylikStatustikaView[$m]['Qaytarilgan'] = number_format(($qaytaril), 0, '.', ' ');
            $OylikStatustikaView[$m]['Xarajat'] = number_format(($xarajat), 0, '.', ' ');
            $OylikStatustikaView[$m]['UmumiyXarajat'] = number_format(($adminxarajat), 0, '.', ' ');
            $OylikStatustikaView[$m]['IshHaqi'] = number_format(($ishhaqii), 0, '.', ' ');
            $OylikStatustikaView[$m]['Daromat'] = number_format(($daromat), 0, '.', ' ');
            $m++;
        }
        $OylikTulovlar = array();
        $OylikTulovlar['statis'] = $OylikStatustika;
        $OylikTulovlar['view'] = $OylikStatustikaView;
        $OylikStatistiakOylar = $this->OylikStatistiakOylar();
        return view('SuperAdmin.statistik.oy', compact('OylikTulovlar','OylikStatistiakOylar'));
    }


    public function statistikaKun($date){
        $Start = $date." 00:00:00";
        $End = $date." 23:59:59";
        $Tulovlar = Tulov::where('filial_id',request()->cookie('filial_id'))
            ->where('created_at','>=',$Start)
            ->where('created_at','<=',$End)
            ->get();
        $Tulov = array();
        foreach ($Tulovlar as $key => $value) {
            $Tulov[$key]['User'] = User::find($value->user_id)->name;
            $Tulov[$key]['Admiin'] = User::find($value->admin_id)->email;
            $Tulov[$key]['summa'] = number_format(($value->summa), 0, '.', ' ');
            $Tulov[$key]['type'] = $value->type;
            $Tulov[$key]['about'] = $value->about;
            $Tulov[$key]['created_at'] = $value->created_at;
        }
        return view('SuperAdmin.statistik.kunlik',compact('Tulov'));
    }
}
