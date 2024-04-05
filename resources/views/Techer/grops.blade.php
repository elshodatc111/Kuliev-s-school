@extends('Techer.layout.home')
@section('title','Guruhlar')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Guruhlar</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('Techer')}}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active">Guruhlar</li>
                </ol>
            </nav>
        </div>
    
        <section class="section dashboard">
            <div class="card info-card sales-card">
                <div class="card-body text-center">
                    <h5 class="card-title">1-xona</span></h5>
                    <div class="table-responsive">

                    </div>
                </div>
            </div>  
        </section>

    </main>

@endsection