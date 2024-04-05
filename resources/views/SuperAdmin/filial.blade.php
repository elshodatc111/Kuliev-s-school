@extends('SuperAdmin.layout.home')
@section('title','Filiallar')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Filiallar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item active">Filiallar</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
      <div class="row">
        <div class="col-xxl-3 col-6">
          <div class="card info-card sales-card">
            <div class="card-body text-center">
              <h5 class="card-title">Filiallar</span></h5>
              <div class="d-flex align-items-center">
                <h6 class="w-100 text-center">145</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-6">
          <div class="card info-card sales-card">
            <div class="card-body text-center">
              <h5 class="card-title">O'qituvchilar</span></h5>
              <div class="d-flex align-items-center">
                <h6 class="w-100 text-center">145</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-6">
          <div class="card info-card sales-card">
            <div class="card-body text-center">
              <h5 class="card-title">Hodimlar</span></h5>
              <div class="d-flex align-items-center">
                <h6 class="w-100 text-center">145</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-3 col-6">
          <div class="card info-card sales-card">
            <div class="card-body text-center">
              <h5 class="card-title">Tashriflar</span></h5>
              <div class="d-flex align-items-center">
                <h6 class="w-100 text-center">145</h6>
              </div>
            </div>
          </div>
        </div>


      </div>
    </section>

</main>

@endsection