@extends('SuperAdmin.layout.home')
@section('title','Kabinet')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Kabinet</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
                <li class="breadcrumb-item active">Kabinet</li>
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
            <div class="card-body mt-3">
                <form action="{{ route('settingupdate') }}" method="post">
                    @csrf 
                    <div class="row ">
                        <div class="col-lg-4">
                            <label for="EndData" class="mt-3 mb-2" style="font-weight:700">Filial bloklanish muddati</label>
                            <input type="date" name="EndData" value="{{ $Setting['EndData'] }}" class="form-control mb-2" required>
                            <label for="Summa" class="mt-3 mb-2" style="font-weight:700">Tulov summasi</label>
                            <input type="number" name="Summa" value="{{ $Setting['Summa'] }}" class="form-control mb-2" required>
                            <label for="Username" class="mt-3 mb-2" style="font-weight:700">Username</label>
                            <input type="text" name="Username" value="{{ $Setting['Username'] }}" class="form-control mb-2" required>
                            <label for="Status" class="mt-3 mb-2" style="font-weight:700">Filial xolati</label>
                            <div class="form-check form-switch">
                                @if($Setting['Status']=='true')
                                    <input class="form-check-input" type="checkbox" name="Status" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" name="Status">
                                @endif
                            </div>
                            <button class="btn btn-primary w-100 mt-3">O'zgarishlarni saqlash</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
                
    </section>

</main>
@endsection