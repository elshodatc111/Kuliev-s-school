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
            <h5 class="card-title">Hisobotlar</span></h5>
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-8">
                        <select name="" class="form-select" required>
                            <option value="">Tanlang</option>
                        </select>
                    </div>
                    <div class="col-lg-4"><button class="btn btn-primary mt-2 mt-lg-0 w-100">Filter</button></div>
                </div>
            </form>

        </div>
    </div>
</section>

</main>

@endsection