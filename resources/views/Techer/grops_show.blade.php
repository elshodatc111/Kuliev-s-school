@extends('Techer.layout.home')
@section('title','Guruh')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Guruh</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('Techer')}}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('TGuruhlar')}}">Guruhlar</a></li>
                    <li class="breadcrumb-item active">Guruh</li>
                </ol>
            </nav>
        </div>
    
        <section class="section dashboard">
            <div class="card info-card sales-card">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $Guruh['guruh_name'] }}</span></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Guruh</th>
                                    <th>Boshlanish vaqti</th>
                                    <th>Tugash vaqti</th>
                                    <th>Talabalar</th>
                                    <th>Dars vaqti</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card info-card sales-card">
                <div class="card-body text-center">
                    <h5 class="card-title">Guruh davomat</span></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Guruh</th>
                                    <th>Boshlanish vaqti</th>
                                    <th>Tugash vaqti</th>
                                    <th>Talabalar</th>
                                    <th>Dars vaqti</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
        </section>

    </main>

@endsection