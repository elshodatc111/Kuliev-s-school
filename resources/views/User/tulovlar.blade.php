@extends('User.layout.app')
@section('title',"To'lovlar")
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>To'lovlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">To'lovlar</li>
            </ol>
        </nav>
    </div>


    <div class="row">
        @forelse($Tulov as $item)
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title w-100 text-center">{{ $item['summa']}}</h5>
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">To'lov turi:</h6><small>{{ $item['type']}}</small>
                    </div>
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">To'lov vaqti:</h6><small>{{ $item['created_at']}}</small>
                    </div>
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">To'lov holati:</h6><small class="text-success">Tasdiqlandi</small>
                    </div>
                </div>
            </div>
        </div>
        @empty

        @endforelse
    </div>
    
</main>
@endsection