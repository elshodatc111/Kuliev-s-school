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
                                    'Boshqa'
                                ],
                                datasets: [{
                                    label: 'Oylik tashriflar',
                                    data: [70, 50, 35,15,45],
                                    backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(0, 255, 235)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
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
                                    data: [300, 50, 100],
                                    backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
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
                            labels: ['04-04', '03-04', '04-04', '05-04', '06-04', '07-04'],
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