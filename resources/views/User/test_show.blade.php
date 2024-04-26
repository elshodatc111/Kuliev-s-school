@extends('User.layout.app')
@section('title',"Guruh")
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Guruh</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('User') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('Guruhlar') }}">Guruhlarim</a></li>
                <li class="breadcrumb-item active">Guruh</li>
            </ol>
        </nav>
    </div> 
    <section class="section dashboard"> 
        <form action="" method="post">
            @csrf 
            <input type="hidden" name="guruh_id" value="">
            <div class="row">
                @forelse($Testlar as $item)
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['Savol'] }}</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" required>
                                <label class="form-check-label" for="gridRadios1">First radio</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2" required>
                                <label class="form-check-label" for="gridRadios2">First radio</label>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body"><h5 class="card-title">Testlar mavjud emas.</h5></div>
                        </div>
                    </div>
                @endforelse

                @if($TestCount!=0)
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-primary w-50">Tekshirish</button>
                </div>
                @endif
            </div>
        </form>
    </section>
</main>
@endsection