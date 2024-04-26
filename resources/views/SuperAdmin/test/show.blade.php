@extends('SuperAdmin.layout.home')
@section('title',"Online Testlar")
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>O'qituvchiga to'lovlar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('superAdminTesting')}}">Online Testlar</a></li>
            <li class="breadcrumb-item active">Test</li>
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
            <div class="card-body">
                <h5 class="card-title w-100 text-center mb-1 pb-1">Online Testlar</h5>
                <div class="table-responsive">
                    <table class="table text-center table-bordered" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Filial</th>
                                <th>Cours</th>
                                <th>Testlar soni</th>
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