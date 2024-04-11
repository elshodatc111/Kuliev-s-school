@extends('Admin.layout.home')
@section('title','Qarzdorlar')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Qarzdorlar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item active">Qarzdorlar</li>
        </ol>
    </nav>
</div>
@if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error') }}</div>
@endif

<section class="section dashboard">
            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <a href="{{ route('Student') }}" class="nav-link text-center text-center bg-success text-white w-100 active">Tashriflar</a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <a href="{{ route('StudentQarzdorlar') }}" class="nav-link w-100 text-center">Qarzdorlar</a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <a href="{{ route('StudentTulovlar') }}" class="nav-link text-center w-100">To'lovlar</a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <a href="{{ route('StudentCreate') }}" class="nav-link text-center w-100">Yangi tashrif</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="myTabjustifiedContent">
                        <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                            <h5 class="card-title w-100 text-center py-1">Tashriflar</h5>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-white text-center">#</th>
                                            <th class="bg-primary text-white text-center">FIO</th>
                                            <th class="bg-primary text-white text-center">Manzil</th>
                                            <th class="bg-primary text-white text-center">Telefon raqam</th>
                                            <th class="bg-primary text-white text-center">Guruhlar</th>
                                            <th class="bg-primary text-white text-center">Ro'yhatdan o'tdi</th>
                                            <th class="bg-primary text-white text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                            <td>Bo'sh</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
          
                    
        </section>

</main>

@endsection