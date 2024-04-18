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
                    <thead>
                      <tr>
                          <th rowspan=2 class="align-middle">Filial</th>
                          <th rowspan=2 class="align-middle">Tashriflar</th>
                          <th colspan=4>Guruhlar</th>
                          <th colspan=2>Hodimlar</th>
                      </tr>
                      <tr>
                          <th style="font-size:10px;">Jami</th>
                          <th style="font-size:10px;">Yangi</th>
                          <th style="font-size:10px;">Aktiv</th>
                          <th style="font-size:10px;">Yakunlangan</th>
                          <th style="font-size:10px;">O'qituvchilar</th>
                          <th style="font-size:10px;">Menegerlar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($Filial as $item)
                      <tr>
                          <th style="text-align:left">{{ $item['filial_name'] }}</th>
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