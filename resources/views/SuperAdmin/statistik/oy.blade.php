@extends('SuperAdmin.layout.home')
@section('title','Statistika')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Statistika</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item active">Statistika Tulovlar</li>
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
                <h5 class="card-title mb-0 pb-0">Oylik to'lovlar</h5>
                <canvas id="stakedBarChart"  style="width:100%;height:400px"></canvas>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#stakedBarChart'), {
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