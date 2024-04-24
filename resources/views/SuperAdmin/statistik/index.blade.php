@extends('SuperAdmin.layout.home')
@section('title','Statistika')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Statistika</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('filial')}}">Filiallar</a></li>
            <li class="breadcrumb-item active">Statistika</li>
        </ol>
    </nav>
</div> 
@if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error') }}</div>
@endif
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title w-100 text-center">Oylik Tashriflar</h5>
                        <canvas id="pieChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#pieChart'), {
                                type: 'pie',
                                data: {
                                labels: [
                                    'Telegram',
                                    'Facebook',
                                    'Instagram',
                                    'Tanishlar',
                                    'Bannerlar',
                                    'Boshqa'
                                ],
                                datasets: [{
                                    label: 'Oylik tashriflar',
                                    data: [
                                        {{ $OylikTashriflar['Telegram'] }},
                                        {{ $OylikTashriflar['Facebook'] }},
                                        {{ $OylikTashriflar['Instagram'] }},
                                        {{ $OylikTashriflar['Tanishlar'] }},
                                        {{ $OylikTashriflar['Bannerlar'] }},
                                        {{ $OylikTashriflar['Boshqalar'] }},
                                    ],
                                    backgroundColor: [
                                        '#289FD5','#4867AA','#C032AE','#F4CA16','#8CF416','#16F4D6'
                                    ],
                                    hoverOffset: 4
                                }]
                                }
                            });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title w-100 text-center">Oylik to'lovlar</h5>
                        <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#doughnutChart'), {
                                type: 'doughnut',
                                data: {
                                labels: [
                                    'Naqt',
                                    'Plastik',
                                    'Payme'
                                ],
                                datasets: [{
                                    label: 'Oylik to\'lovlar',
                                    data: [
                                        {{ $OylikTulov['Naqt'] }},
                                        {{ $OylikTulov['Plastik'] }},
                                        {{ $OylikTulov['Payme'] }}
                                    ],
                                    backgroundColor: ['green','#F4AF0F','#44BBC2'],
                                    hoverOffset: 4
                                }]
                                }
                            });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title mb-0 pb-0">Kunlik to'lovlar</h5>
                <canvas id="barChart" style="max-height: 400px;"></canvas>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#barChart'), {
                            type: 'bar',
                            data: {
                            labels: [
                                    '{{ $KunlikStatistika["kunlar"][0] }}',
                                    '{{ $KunlikStatistika["kunlar"][1] }}',
                                    '{{ $KunlikStatistika["kunlar"][2] }}',
                                    '{{ $KunlikStatistika["kunlar"][3] }}',
                                    '{{ $KunlikStatistika["kunlar"][4] }}',
                                    '{{ $KunlikStatistika["kunlar"][5] }}'
                                ],
                            datasets: [{
                                    label: "Naqt to'lov",
                                    data: [
                                        '{{ $KunlikStatistika["Tulovlar"]["Naqt"][1] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Naqt"][2] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Naqt"][3] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Naqt"][4] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Naqt"][5] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Naqt"][6] }}'
                                    ],
                                    backgroundColor: ['#0000F6']
                                },{
                                    label: "Plastik to'lov",
                                    data: [
                                        '{{ $KunlikStatistika["Tulovlar"]["Plastik"][1] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Plastik"][2] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Plastik"][3] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Plastik"][4] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Plastik"][5] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Plastik"][6] }}'
                                    ],
                                    backgroundColor: ['#00FF00']
                                },{
                                    label: "Payme to'lov",
                                    data: [
                                        '{{ $KunlikStatistika["Tulovlar"]["Payme"][1] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Payme"][2] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Payme"][3] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Payme"][4] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Payme"][5] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Payme"][6] }}'
                                    ],
                                    backgroundColor: ['#21B3B8']
                                },{
                                    label: 'Chegirmalar',
                                    data: [
                                        '{{ $KunlikStatistika["Tulovlar"]["Chegirma"][1] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Chegirma"][2] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Chegirma"][3] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Chegirma"][4] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Chegirma"][5] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Chegirma"][6] }}'
                                    ],
                                    backgroundColor: ['#F4CA16']
                                },{
                                    label: "Qaytarilgan to'lovlar",
                                    data: [
                                        '{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][1] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][2] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][3] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][4] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][5] }}',
                                        '{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][6] }}'
                                    ],
                                    backgroundColor: ['#EB4C42']
                                }
                            ]
                            },
                            options: {
                      plugins: {
                        title: {
                          display: true,
                          text: 'Chart.js Bar Chart - Stacked'
                        },
                      },
                      responsive: true,
                      scales: {
                        x: {
                          stacked: true,
                        },
                        y: {
                          stacked: true
                        }
                      }
                    }
                        });
                    });
                </script>
                <div class="table-responsive">
                    <table class="table table-bordered mt-3" style="font-size:12px">
                        <tr>
                            <th style="text-align:left">Status</th>
                            <td><a href="{{ route('statistikaKun',$Kun1) }}">{{ $KunlikStatistika["kunlar"][0] }}</a></td>
                            <td><a href="{{ route('statistikaKun',$Kun2) }}">{{ $KunlikStatistika["kunlar"][1] }}</a></td>
                            <td><a href="{{ route('statistikaKun',$Kun3) }}">{{ $KunlikStatistika["kunlar"][2] }}</a></td>
                            <td><a href="{{ route('statistikaKun',$Kun4) }}">{{ $KunlikStatistika["kunlar"][3] }}</a></td>
                            <td><a href="{{ route('statistikaKun',$Kun5) }}">{{ $KunlikStatistika["kunlar"][4] }}</a></td>
                            <td><a href="{{ route('statistikaKun',$Kun6) }}">{{ $KunlikStatistika["kunlar"][5] }}</a></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Naqt</th>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][1] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][2] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][3] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][4] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][5] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][6] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Plastik</th>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Plastik"][1] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Plastik"][2] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Plastik"][3] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Plastik"][4] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Plastik"][5] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Plastik"][6] }}</td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left">Payme</th>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Payme"][1] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Payme"][2] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Payme"][3] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Payme"][4] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Payme"][5] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Payme"][6] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Chegirma</th>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Chegirma"][1] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Chegirma"][2] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Chegirma"][3] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Chegirma"][4] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Chegirma"][5] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Chegirma"][6] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Qaytarildi</th>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][1] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][2] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][3] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][4] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][5] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Qaytarilgan"][6] }}</td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left">Xisoblandi</th>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][1]+$KunlikStatistika["Tulovlar"]["Plastik"][1]+$KunlikStatistika["Tulovlar"]["Payme"][1]-$KunlikStatistika["Tulovlar"]["Qaytarilgan"][1] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][2]+$KunlikStatistika["Tulovlar"]["Plastik"][2]+$KunlikStatistika["Tulovlar"]["Payme"][2]-$KunlikStatistika["Tulovlar"]["Qaytarilgan"][2] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][3]+$KunlikStatistika["Tulovlar"]["Plastik"][3]+$KunlikStatistika["Tulovlar"]["Payme"][3]-$KunlikStatistika["Tulovlar"]["Qaytarilgan"][3] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][4]+$KunlikStatistika["Tulovlar"]["Plastik"][4]+$KunlikStatistika["Tulovlar"]["Payme"][4]-$KunlikStatistika["Tulovlar"]["Qaytarilgan"][4] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][5]+$KunlikStatistika["Tulovlar"]["Plastik"][5]+$KunlikStatistika["Tulovlar"]["Payme"][5]-$KunlikStatistika["Tulovlar"]["Qaytarilgan"][5] }}</td>
                            <td>{{ $KunlikStatistika["Tulovlar"]["Naqt"][6]+$KunlikStatistika["Tulovlar"]["Plastik"][6]+$KunlikStatistika["Tulovlar"]["Payme"][6]-$KunlikStatistika["Tulovlar"]["Qaytarilgan"][6] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title mb-0 pb-0">Oylik to'lovlar</h5>
                <canvas id="oyliktulovlar" style="max-height: 400px;"></canvas>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#oyliktulovlar'), {
                            type: 'bar',
                            data: {
                            labels: [
                                '{{ $OylikStatistiakOylar[0] }}',
                                '{{ $OylikStatistiakOylar[1] }}',
                                '{{ $OylikStatistiakOylar[2] }}',
                                '{{ $OylikStatistiakOylar[3] }}',
                                '{{ $OylikStatistiakOylar[4] }}',
                                '{{ $OylikStatistiakOylar[5] }}'
                            ],
                            datasets: [{
                                    label: 'Naqt to\'lov',
                                    data: [
                                        {{ $OylikTulovlar['statis'][1]['Naqt'] }},
                                        {{ $OylikTulovlar['statis'][2]['Naqt'] }},
                                        {{ $OylikTulovlar['statis'][3]['Naqt'] }},
                                        {{ $OylikTulovlar['statis'][4]['Naqt'] }},
                                        {{ $OylikTulovlar['statis'][5]['Naqt'] }},
                                        {{ $OylikTulovlar['statis'][6]['Naqt'] }}
                                    ],
                                    backgroundColor: ['#0000F6']
                                },{
                                    label: 'Plastik to\'lov',
                                    data: [
                                        {{ $OylikTulovlar['statis'][1]['Plastik'] }},
                                        {{ $OylikTulovlar['statis'][2]['Plastik'] }},
                                        {{ $OylikTulovlar['statis'][3]['Plastik'] }},
                                        {{ $OylikTulovlar['statis'][4]['Plastik'] }},
                                        {{ $OylikTulovlar['statis'][5]['Plastik'] }},
                                        {{ $OylikTulovlar['statis'][6]['Plastik'] }},
                                    ],
                                    backgroundColor: ['#006262']
                                },{
                                    label: 'Payme to\'lov',
                                    data: [
                                        {{ $OylikTulovlar['statis'][1]['Payme'] }},
                                        {{ $OylikTulovlar['statis'][2]['Payme'] }},
                                        {{ $OylikTulovlar['statis'][3]['Payme'] }},
                                        {{ $OylikTulovlar['statis'][4]['Payme'] }},
                                        {{ $OylikTulovlar['statis'][5]['Payme'] }},
                                        {{ $OylikTulovlar['statis'][6]['Payme'] }},
                                    ],
                                    backgroundColor: ['#21B3B8']
                                },{
                                    label: 'Chegirmalar',
                                    data: [
                                        {{ $OylikTulovlar['statis'][1]['Chegirma'] }},
                                        {{ $OylikTulovlar['statis'][2]['Chegirma'] }},
                                        {{ $OylikTulovlar['statis'][3]['Chegirma'] }},
                                        {{ $OylikTulovlar['statis'][4]['Chegirma'] }},
                                        {{ $OylikTulovlar['statis'][5]['Chegirma'] }},
                                        {{ $OylikTulovlar['statis'][6]['Chegirma'] }},
                                    ],
                                    backgroundColor: ['#F4CA16']
                                },{
                                    label: 'Qaytarilgan to\'lovlar',
                                    data: [
                                        {{ $OylikTulovlar['statis'][1]['Qaytarilgan'] }},
                                        {{ $OylikTulovlar['statis'][2]['Qaytarilgan'] }},
                                        {{ $OylikTulovlar['statis'][3]['Qaytarilgan'] }},
                                        {{ $OylikTulovlar['statis'][4]['Qaytarilgan'] }},
                                        {{ $OylikTulovlar['statis'][5]['Qaytarilgan'] }},
                                        {{ $OylikTulovlar['statis'][6]['Qaytarilgan'] }},
                                    ],
                                    backgroundColor: ['#EB4C42']
                                },{
                                    label: 'Xarajatalar',
                                    data: [
                                        {{ $OylikTulovlar['statis'][1]['Xarajat'] }},
                                        {{ $OylikTulovlar['statis'][2]['Xarajat'] }},
                                        {{ $OylikTulovlar['statis'][3]['Xarajat'] }},
                                        {{ $OylikTulovlar['statis'][4]['Xarajat'] }},
                                        {{ $OylikTulovlar['statis'][5]['Xarajat'] }},
                                        {{ $OylikTulovlar['statis'][6]['Xarajat'] }},
                                    ],
                                    backgroundColor: ['#E000f0']
                                },{
                                    label: 'Umumiy xarajat',
                                    data: [
                                        {{ $OylikTulovlar['statis'][1]['UmumiyXarajat'] }},
                                        {{ $OylikTulovlar['statis'][2]['UmumiyXarajat'] }},
                                        {{ $OylikTulovlar['statis'][3]['UmumiyXarajat'] }},
                                        {{ $OylikTulovlar['statis'][4]['UmumiyXarajat'] }},
                                        {{ $OylikTulovlar['statis'][5]['UmumiyXarajat'] }},
                                        {{ $OylikTulovlar['statis'][6]['UmumiyXarajat'] }},
                                    ],
                                    backgroundColor: ['#E000fF']
                                },{
                                    label: 'Ish haqi',
                                    data: [
                                        {{ $OylikTulovlar['statis'][1]['IshHaqi'] }},
                                        {{ $OylikTulovlar['statis'][2]['IshHaqi'] }},
                                        {{ $OylikTulovlar['statis'][3]['IshHaqi'] }},
                                        {{ $OylikTulovlar['statis'][4]['IshHaqi'] }},
                                        {{ $OylikTulovlar['statis'][5]['IshHaqi'] }},
                                        {{ $OylikTulovlar['statis'][6]['IshHaqi'] }},
                                    ],
                                    backgroundColor: ['#00fff0']
                                },{
                                    label: 'Daromad',
                                    data: [
                                        {{ $OylikTulovlar['statis'][1]['Daromat'] }},
                                        {{ $OylikTulovlar['statis'][2]['Daromat'] }},
                                        {{ $OylikTulovlar['statis'][3]['Daromat'] }},
                                        {{ $OylikTulovlar['statis'][4]['Daromat'] }},
                                        {{ $OylikTulovlar['statis'][5]['Daromat'] }},
                                        {{ $OylikTulovlar['statis'][6]['Daromat'] }},
                                    ],
                                    backgroundColor: ['#00ff00']
                                }
                            ]
                            },
                            options: {scales: {y: {beginAtZero: true}}}
                        });
                    });
                </script>
                <div class="table-responsive">
                    <table class="table table-bordered mt-3" style="font-size:12px">
                        <tr>
                            <th style="text-align:left">Status</th>
                            <th>{{ $OylikStatistiakOylar[0] }}</th>
                            <th>{{ $OylikStatistiakOylar[1] }}</th>
                            <th>{{ $OylikStatistiakOylar[2] }}</th>
                            <th>{{ $OylikStatistiakOylar[3] }}</th>
                            <th>{{ $OylikStatistiakOylar[4] }}</th>
                            <th>{{ $OylikStatistiakOylar[5] }}</th>
                        </tr>
                        <tr>
                            <th style="text-align:left">Naqt</th>
                            <td>{{ $OylikTulovlar['view'][1]['Naqt'] }}</td>
                            <td>{{ $OylikTulovlar['view'][2]['Naqt'] }}</td>
                            <td>{{ $OylikTulovlar['view'][3]['Naqt'] }}</td>
                            <td>{{ $OylikTulovlar['view'][4]['Naqt'] }}</td>
                            <td>{{ $OylikTulovlar['view'][5]['Naqt'] }}</td>
                            <td>{{ $OylikTulovlar['view'][6]['Naqt'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Plastik</th>
                            <td>{{ $OylikTulovlar['view'][1]['Plastik'] }}</td>
                            <td>{{ $OylikTulovlar['view'][2]['Plastik'] }}</td>
                            <td>{{ $OylikTulovlar['view'][3]['Plastik'] }}</td>
                            <td>{{ $OylikTulovlar['view'][4]['Plastik'] }}</td>
                            <td>{{ $OylikTulovlar['view'][5]['Plastik'] }}</td>
                            <td>{{ $OylikTulovlar['view'][6]['Plastik'] }}</td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left">Payme</th>
                            <td>{{ $OylikTulovlar['view'][1]['Payme'] }}</td>
                            <td>{{ $OylikTulovlar['view'][2]['Payme'] }}</td>
                            <td>{{ $OylikTulovlar['view'][3]['Payme'] }}</td>
                            <td>{{ $OylikTulovlar['view'][4]['Payme'] }}</td>
                            <td>{{ $OylikTulovlar['view'][5]['Payme'] }}</td>
                            <td>{{ $OylikTulovlar['view'][6]['Payme'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Chegirma</th>
                            <td>{{ $OylikTulovlar['view'][1]['Chegirma'] }}</td>
                            <td>{{ $OylikTulovlar['view'][2]['Chegirma'] }}</td>
                            <td>{{ $OylikTulovlar['view'][3]['Chegirma'] }}</td>
                            <td>{{ $OylikTulovlar['view'][4]['Chegirma'] }}</td>
                            <td>{{ $OylikTulovlar['view'][5]['Chegirma'] }}</td>
                            <td>{{ $OylikTulovlar['view'][6]['Chegirma'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Qaytarildi</th>
                            <td>{{ $OylikTulovlar['view'][1]['Qaytarilgan'] }}</td>
                            <td>{{ $OylikTulovlar['view'][2]['Qaytarilgan'] }}</td>
                            <td>{{ $OylikTulovlar['view'][3]['Qaytarilgan'] }}</td>
                            <td>{{ $OylikTulovlar['view'][4]['Qaytarilgan'] }}</td>
                            <td>{{ $OylikTulovlar['view'][5]['Qaytarilgan'] }}</td>
                            <td>{{ $OylikTulovlar['view'][6]['Qaytarilgan'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Xarajatlar</th>
                            <td>{{ $OylikTulovlar['view'][1]['Xarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][2]['Xarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][3]['Xarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][4]['Xarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][5]['Xarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][6]['Xarajat'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Umumiy xarajatlar</th>
                            <td>{{ $OylikTulovlar['view'][1]['UmumiyXarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][2]['UmumiyXarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][3]['UmumiyXarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][4]['UmumiyXarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][5]['UmumiyXarajat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][6]['UmumiyXarajat'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Ish haqi</th>
                            <td>{{ $OylikTulovlar['view'][1]['IshHaqi'] }}</td>
                            <td>{{ $OylikTulovlar['view'][2]['IshHaqi'] }}</td>
                            <td>{{ $OylikTulovlar['view'][3]['IshHaqi'] }}</td>
                            <td>{{ $OylikTulovlar['view'][4]['IshHaqi'] }}</td>
                            <td>{{ $OylikTulovlar['view'][5]['IshHaqi'] }}</td>
                            <td>{{ $OylikTulovlar['view'][6]['IshHaqi'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Daromad</th>
                            <td>{{ $OylikTulovlar['view'][1]['Daromat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][2]['Daromat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][3]['Daromat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][4]['Daromat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][5]['Daromat'] }}</td>
                            <td>{{ $OylikTulovlar['view'][6]['Daromat'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection