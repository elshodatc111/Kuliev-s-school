@extends('User.layout.app')
@section('title','Bosh sahifa')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Bosh sahifa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Bosh sahifa</li>
            </ol>
        </nav>
    </div>
        <div class="row dashboard">
            <div class="col-lg-4 col-6">
                <div class="card info-card sales-card text-center">
                    <div class="bg-primary text-white mt-4" style="width:60px;border-radius:50%;font-size:35px;padding:5px;height:60px;margin:0 auto;">
                        1
                    </div>
                    <h5 class="card-title">Yangi guruhlar</h5>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="card info-card sales-card text-center">
                    <div class="bg-warning text-white mt-4" style="width:60px;border-radius:50%;font-size:35px;padding:5px;height:60px;margin:0 auto;">
                        1
                    </div>
                    <h5 class="card-title">Aktiv guruhlar</h5>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card info-card sales-card text-center">
                    <div class="bg-danger text-white mt-4" style="width:60px;border-radius:50%;font-size:35px;padding:5px;height:60px;margin:0 auto;">
                        1
                    </div>
                    <h5 class="card-title">Yakunlangan guruhlar</h5>
                </div>
            </div>
        </div>
        <h5 class="card-title">Chegirmali to'lovlar</h5>
        <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <img src="https://atko.tech/NiceAdmin/assets/img/01.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Guruhning nomi</h5>
                            <p class="mt-0">Guruhga <span class="text-primary">350 000</span> so'm to'lov qiling va <span class="text-primary">50 000</span> s'om chegirma oling</p>
                            <a href="" class="btn btn-success w-50">To'lov</a><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <img src="https://atko.tech/NiceAdmin/assets/img/01.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Guruhning nomi</h5>
                            <p class="mt-0">Guruhga <span class="text-primary">350 000</span> so'm to'lov qiling va <span class="text-primary">50 000</span> s'om chegirma oling</p>
                            <a href="" class="btn btn-success w-50">To'lov</a><br>
                        </div>
                    </div>
                </div>
            </div>
        
            


</main>
@endsection