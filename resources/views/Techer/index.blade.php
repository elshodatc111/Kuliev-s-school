@extends('Techer.layout.home')
@section('title','Bosh sahifa')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Bosh sahifa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('Techer')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Bosh sahifa</li>
                </ol>
            </nav>
        </div>
    
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card info-card sales-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Yangi guruhlar</span></h5>
                            <h5>15</h5>
                        </div>
                    </div>  
                </div>
                <div class="col-lg-4">
                    <div class="card info-card sales-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Aktiv guruhlar</span></h5>
                            <h5>15</h5>
                        </div>
                    </div>  
                </div>
                <div class="col-lg-4">
                    <div class="card info-card sales-card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Yakunlangan guruhlar</span></h5>
                            <h5>15</h5>
                        </div>
                    </div>  
                </div>
            </div>
        </section>

    </main>

@endsection