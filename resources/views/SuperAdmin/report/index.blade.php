@extends('SuperAdmin.layout.home')
@section('title','Hisobot')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Hisobot</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('filial')}}">Filiallar</a></li>
            <li class="breadcrumb-item active">Hisobot</li>
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
            <div class="card-body text-center">
                <h5 class="card-title mb-0 pb-0">SSSS</span></h5>
            </div>
        </div>
    

  


     
</section>

</main>

@endsection