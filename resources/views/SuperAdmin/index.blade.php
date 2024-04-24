@extends('SuperAdmin.layout.home')
@section('title','Bosh sahifa')
@section('content')

<main id="main" class="main">

  <div class="pagetitle">
      <h1>Bosh sahifa</h1>
      <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Bosh sahifa</li>
          </ol>
      </nav>
  </div>

    @if($Block=='true')
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            To'lov muddat yaqinlashmoqda. To'lovlarni o'z vaqtida amalga oshirishni unitmang!!!
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


<section class="section dashboard">
    <div class="card">
        <div class="card-body text-center">
            <h5 class="card-title">Filiallar</span></h5>
            <div class="table-responsive">
                <table class="table table-bordered" style="font-size:14px;">
                    <thead class="">
                      <tr>
                          <th rowspan=2 class="align-middle bg-primary text-white"><i class="bi bi-house-door-fill"></i> Filial</th>
                          <th rowspan=2 class="align-middle bg-primary text-white"><i class="bi bi-people"></i> Tashriflar</th>
                          <th colspan=4 class="bg-primary text-white"><i class="bi bi-menu-button-wide"></i> Guruhlar</th>
                          <th colspan=2 class="bg-primary text-white"><i class="bi bi-microsoft-teams"></i> Hodimlar</th>
                      </tr>
                      <tr>
                          <th style="font-size:10px;" class="bg-warning text-white">Jami</th>
                          <th style="font-size:10px;" class="bg-warning text-white">Yangi</th>
                          <th style="font-size:10px;" class="bg-warning text-white">Aktiv</th>
                          <th style="font-size:10px;" class="bg-warning text-white">Yakunlangan</th>
                          <th style="font-size:10px;" class="bg-info text-white">O'qituvchilar</th>
                          <th style="font-size:10px;" class="bg-info text-white">Menegerlar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($Filial as $item)
                      <tr>
                          <th style="font-weight:900" class="text-primary">{{ $item['filial_name'] }}</th>
                          <td>{{ $item['user'] }}</td>
                          <td>{{ $item['guruhlar'] }}</td>
                          <td>{{ $item['yangiguruh'] }}</td>
                          <td>{{ $item['aktivguruh'] }}</td>
                          <td>{{ $item['endguruh'] }}</td>
                          <td>{{ $item['techer'] }}</td>
                          <td>{{ $item['meneger'] }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body pt-2">
            <canvas id="stakedBarChart" style="width:100%;height:400px"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#stakedBarChart'), {
                    type: 'bar',
                    data: {
                      labels: [
                        '{{ $SMM["oy"][0] }}',
                        '{{ $SMM["oy"][1] }}',
                        '{{ $SMM["oy"][2] }}',
                        '{{ $SMM["oy"][3] }}',
                        '{{ $SMM["oy"][4] }}',
                        '{{ $SMM["oy"][5] }}'
                      ],
                      datasets: [{
                          label: 'Telegram',
                          data: [
                            '{{ $SMM["svod"][0]["Telegram"] }}',
                            '{{ $SMM["svod"][1]["Telegram"] }}',
                            '{{ $SMM["svod"][2]["Telegram"] }}',
                            '{{ $SMM["svod"][3]["Telegram"] }}',
                            '{{ $SMM["svod"][4]["Telegram"] }}',
                            '{{ $SMM["svod"][5]["Telegram"] }}'
                          ],
                          backgroundColor: '#6495ED',
                        },{
                          label: 'Instagram',
                          data: [
                            '{{ $SMM["svod"][0]["Instagram"] }}',
                            '{{ $SMM["svod"][1]["Instagram"] }}',
                            '{{ $SMM["svod"][2]["Instagram"] }}',
                            '{{ $SMM["svod"][3]["Instagram"] }}',
                            '{{ $SMM["svod"][4]["Instagram"] }}',
                            '{{ $SMM["svod"][5]["Instagram"] }}'
                          ],
                          backgroundColor: '#8B008B',
                        },{
                          label: 'Facebook',
                          data: [
                            '{{ $SMM["svod"][0]["Facebook"] }}',
                            '{{ $SMM["svod"][1]["Facebook"] }}',
                            '{{ $SMM["svod"][2]["Facebook"] }}',
                            '{{ $SMM["svod"][3]["Facebook"] }}',
                            '{{ $SMM["svod"][4]["Facebook"] }}',
                            '{{ $SMM["svod"][5]["Facebook"] }}'
                        ],
                          backgroundColor: '#B0E0E6',
                        },{
                          label: 'Bannerlar',
                          data: [
                            '{{ $SMM["svod"][0]["Bannerlar"] }}',
                            '{{ $SMM["svod"][1]["Bannerlar"] }}',
                            '{{ $SMM["svod"][2]["Bannerlar"] }}',
                            '{{ $SMM["svod"][3]["Bannerlar"] }}',
                            '{{ $SMM["svod"][4]["Bannerlar"] }}',
                            '{{ $SMM["svod"][5]["Bannerlar"] }}'
                        ],
                          backgroundColor: '#FFD700',
                        },{
                          label: 'Tanishlar',
                          data: [
                            '{{ $SMM["svod"][0]["Tanishlar"] }}',
                            '{{ $SMM["svod"][1]["Tanishlar"] }}',
                            '{{ $SMM["svod"][2]["Tanishlar"] }}',
                            '{{ $SMM["svod"][3]["Tanishlar"] }}',
                            '{{ $SMM["svod"][4]["Tanishlar"] }}',
                            '{{ $SMM["svod"][5]["Tanishlar"] }}'
                        ],
                          backgroundColor: '#00FF00',
                        },{
                          label: 'Boshqalar',
                          data: [
                            '{{ $SMM["svod"][0]["Boshqa"] }}',
                            '{{ $SMM["svod"][1]["Boshqa"] }}',
                            '{{ $SMM["svod"][2]["Boshqa"] }}',
                            '{{ $SMM["svod"][3]["Boshqa"] }}',
                            '{{ $SMM["svod"][4]["Boshqa"] }}',
                            '{{ $SMM["svod"][5]["Boshqa"] }}'
                        ],
                          backgroundColor: '#2F4F4F',
                        },
                      ]
                    },
                    options: {
                      plugins: {title: {display: true,text: 'Markazga tashriflar'},},
                      responsive: true,
                      scales: {x: {stacked: true,},y: {stacked: true}}
                    }
                  });
                });
            </script>
        </div>
    </div>

</section>


</main>

@endsection