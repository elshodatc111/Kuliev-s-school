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
                          <th style="text-align:left" class="text-primary">{{ $item['filial_name'] }}</th>
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
</section>


</main>

@endsection