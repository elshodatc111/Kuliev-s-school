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
                                    backgroundColor: ['#006262']
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
                            options: {scales: {y: {beginAtZero: true}}}
                        });
                    });
                </script>
                <div class="table-responsive">
                    <table class="table table-bordered mt-3" style="font-size:12px">
                        <tr>
                            <th style="text-align:left">Status</th>
                            <td>{{ $KunlikStatistika["kunlar"][0] }}</td>
                            <td>{{ $KunlikStatistika["kunlar"][1] }}</td>
                            <td>{{ $KunlikStatistika["kunlar"][2] }}</td>
                            <td>{{ $KunlikStatistika["kunlar"][3] }}</td>
                            <td>{{ $KunlikStatistika["kunlar"][4] }}</td>
                            <td>{{ $KunlikStatistika["kunlar"][5] }}</td>
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
                    </table>
                </div>
            </div>
        </div>

        
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title mb-0 pb-0">Kunlik to'lovlar</h5>
                <canvas id="oyliktulovlar" style="max-height: 400px;"></canvas>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#oyliktulovlar'), {
                            type: 'bar',
                            data: {
                            labels: ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun'],
                            datasets: [{
                                    label: 'Naqt to\'lov',
                                    data: [65, 59, 80, 81, 56, 55],
                                    backgroundColor: ['#0000F6']
                                },{
                                    label: 'Plastik to\'lov',
                                    data: [65, 59, 80, 81, 56, 55],
                                    backgroundColor: ['#006262']
                                },{
                                    label: 'Payme to\'lov',
                                    data: [65, 59, 80, 81, 56, 55],
                                    backgroundColor: ['#21B3B8']
                                },{
                                    label: 'Chegirmalar',
                                    data: [65, 59, 80, 81, 56, 55],
                                    backgroundColor: ['#F4CA16']
                                },{
                                    label: 'Qaytarilgan to\'lovlar',
                                    data: [65, 59, 80, 81, 56, 55],
                                    backgroundColor: ['#EB4C42']
                                },{
                                    label: 'Xarajatalar',
                                    data: [65, 59, 80, 81, 56, 55],
                                    backgroundColor: ['#E000f0']
                                },{
                                    label: 'Ish haqi',
                                    data: [65, 59, 80, 81, 56, 55],
                                    backgroundColor: ['#00fff0']
                                },{
                                    label: 'Daromad',
                                    data: [65, 59, 80, 81, 56, 55],
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
                            <th>02-04</th>
                            <th>03-04</th>
                            <th>04-04</th>
                            <th>05-04</th>
                            <th>06-04</th>
                            <th>07-04</th>
                        </tr>
                        <tr>
                            <th style="text-align:left">Naqt</th>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Plastik</th>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left">Payme</th>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Chegirma</th>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Qaytarildi</th>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Xarajatlar</th>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Ish haqi</th>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Daromad</th>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                            <td>100 000</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection