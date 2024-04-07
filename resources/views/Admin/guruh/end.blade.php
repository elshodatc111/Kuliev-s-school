@extends('Admin.layout.home')
@section('title','Yakunlangan guruhlar')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Yakunlangan guruhlar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('AdminGuruh') }}">Guruhlar</a></li>
            <li class="breadcrumb-item active">Yakunlangan guruhlar</li>
        </ol>
    </nav>
</div>
@if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error') }}</div>
@endif
<section class="section dashboard">
    <div class="card info-card sales-card">
        <div class="card-body text-center pt-3">
            <ul class="nav nav-tabs d-flex">
                <li class="nav-item flex-fill">
                    <a class="nav-link w-100" href="{{ route('AdminGuruh') }}">Guruhlar</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100 active bg-primary text-white" href="{{ route('AdminGuruhEnd') }}">Yakunlangan guruhlar</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a class="nav-link w-100" href="{{ route('AdminGuruhCreate') }}">Yangi guruh</a>
                </li>
            </ul>
            <div>
                Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus.
            </div>
        </div>
    </div>
</section>

</main>

@endsection