@extends('Admin.layout.home')
@section('title','O\'qituvchilar')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>O'qituvchilar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item active">O'qituvchilar</li>
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
        <div class="card-body text-center">
            <h5 class="card-title">O'qituvchilar</span></h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center table-striped table-hover" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>O'qituvchilar</th>
                            <th>Phone</th>
                            <th>Aktiv guruhlari</th>
                            <th>Login</th>
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
        <h5 class="card-title">Yangi O'qituvchi qo'shish</span></h5>
        <form action="{{ route('AdminTecherCreate') }}" method="post">
            @csrf 
            <div class="row">
                <div class="col-lg-6">    
                    <label for="name">O'qituvchi</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                    <label for="phone" class=" mt-2">Telefon Raqam</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="phone form-control @error('phone') is-invalid @enderror" required>
                    <label for="phone2" class=" mt-2">Ikkinchi Telefon Raqam</label>
                    <input type="text" name="phone2" value="{{ old('phone2') }}" class="phone form-control @error('phone2') is-invalid @enderror" required>
                    <label for="addres" class=" mt-2">Yashash Manzili</label>
                    <input type="text" name="addres" value="{{ old('addres') }}" class="form-control @error('addres') is-invalid @enderror" required>
                </div>
                <div class="col-lg-6">    
                    <label for="tkun">Tug'ilgan Kuni</label>
                    <input type="date" name="tkun" value="{{ old('tkun') }}" class="form-control @error('tkun') is-invalid @enderror" required>
                    <label for="email " class=" mt-2">Login</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                    <label for="about" class=" mt-2 ">O'qituvchi Haqida</label>
                    <input type="text" name="about" value="{{ old('about') }}" class="form-control @error('about') is-invalid @enderror" required>
                    <label for="about" class=" mt-2 ">.</label>
                    <button type="submit" class="btn btn-primary w-100">Yangi Hodimni Saqlash</button>
                </div>
            </div>
        </form>
      </div>
    </div>  
</section>

</main>

@endsection