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
        <div class="row">
            <div class="col-lg-4"> 
                <div class="card">
                    <img src="https://atko.tech/NiceAdmin/assets/img/cours.jpg" class="card-img-top">
                    <div class="card-body p-0">
                        <ul class="list-group" style="border-radius:0">
                            <h5 class="card-title w-100 text-center py-2 mb-0">{{ $Guruhs['guruh_name'] }}</h5>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Kurs narxi:<span class="badge bg-primary rounded-pill">{{ $Guruhs['guruh_price'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Dars vaqti:<span class="badge bg-primary rounded-pill">{{ $Guruhs['guruh_vaqt'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                O'qituvchi:<span class="badge bg-primary rounded-pill">{{ $Guruhs['techer'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Test natijasi:<span class="badge bg-primary rounded-pill">{{ $Guruhs['test'] }}</span>
                            </li>
                        </ul>
                        <button class="btn btn-success text-white w-100" style="border-radius:0 0 5px 5px ">Online Test</button>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title w-100 text-center">Dars xonasi: {{ $Guruhs['room'] }}</h5>
                        <table class="table table-bordered text-center">
                            <tr>
                                <td colspan=3>Dars kunlari</td>
                            </tr>
                            @if($CountDates==13)
                            <tr>
                                <td>{{ $GuruhTime[0]['dates'] }}</td>
                                <td>{{ $GuruhTime[4]['dates'] }}</td>
                                <td>{{ $GuruhTime[8]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[1]['dates'] }}</td>
                                <td>{{ $GuruhTime[5]['dates'] }}</td>
                                <td>{{ $GuruhTime[9]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[2]['dates'] }}</td>
                                <td>{{ $GuruhTime[6]['dates'] }}</td>
                                <td>{{ $GuruhTime[10]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[3]['dates'] }}</td>
                                <td>{{ $GuruhTime[7]['dates'] }}</td>
                                <td>{{ $GuruhTime[11]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td colspan=3><b>Qo'shimcha dars: </b>{{ $GuruhTime[12]['dates'] }}</td>
                            </tr>
                            @else
                            <tr>
                                <td>{{ $GuruhTime[0]['dates'] }}</td>
                                <td>{{ $GuruhTime[8]['dates'] }}</td>
                                <td>{{ $GuruhTime[16]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[1]['dates'] }}</td>
                                <td>{{ $GuruhTime[9]['dates'] }}</td>
                                <td>{{ $GuruhTime[17]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[2]['dates'] }}</td>
                                <td>{{ $GuruhTime[10]['dates'] }}</td>
                                <td>{{ $GuruhTime[18]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[3]['dates'] }}</td>
                                <td>{{ $GuruhTime[11]['dates'] }}</td>
                                <td>{{ $GuruhTime[19]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[4]['dates'] }}</td>
                                <td>{{ $GuruhTime[12]['dates'] }}</td>
                                <td>{{ $GuruhTime[20]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[5]['dates'] }}</td>
                                <td>{{ $GuruhTime[13]['dates'] }}</td>
                                <td>{{ $GuruhTime[21]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[6]['dates'] }}</td>
                                <td>{{ $GuruhTime[14]['dates'] }}</td>
                                <td>{{ $GuruhTime[22]['dates'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $GuruhTime[7]['dates'] }}</td>
                                <td>{{ $GuruhTime[15]['dates'] }}</td>
                                <td>{{ $GuruhTime[23]['dates'] }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection