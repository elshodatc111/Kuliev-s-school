@extends('SuperAdmin.layout.home')
@section('title','Hodimlar')
@section('content')

<main id="main" class="main">

  <div class="pagetitle">
      <h1>Hodimlar</h1>
      <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
              <li class="breadcrumb-item active">Hodimlar</li>
          </ol>
      </nav>
  </div>

  <section class="section dashboard">
    <div class="card info-card sales-card">
      <div class="card-body text-center">
        <h5 class="card-title">Hodimlar</span></h5>
        <div class="table-responsive">
          <table class="table table-bordered text-center table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Chiqim Summasi</th>
                <th>Chiqim Turi</th>
                <th>Chiqim vaqti</th>
                <th>Chiqim haqida</th>
                <th>Operator</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <a href="" class="btn btn-success px-1 py-0" title="Parolni yangilash"><i class="bi bi-lock"></i></a>
                  <a href="" class="btn btn-danger px-1 py-0"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    
    <div class="card info-card sales-card">
      <div class="card-body text-center">
        <h5 class="card-title">Yangi Admin</span></h5>
        <form action="" method="post">
          <div class="row">
            <div class="col-lg-6">
              <label for="">FIO</label>
              <input type="text" name="" class="form-control" required>
              <label for="" class=" mt-2">Telefon raqam</label>
              <input type="text" name="" class="form-control" required>
              <label for="" class=" mt-2">Yashash manzili</label>
              <input type="text" name="" class="form-control" required>
            </div>
            <div class="col-lg-6">
              <label for="">Tug'ilgan kuni</label>
              <input type="text" name="" class="form-control" required>
              <label for="" class=" mt-2">Login</label>
              <input type="text" name="" class="form-control" required>
              <label for="" class=" mt-2">Admin haqida</label>
              <input type="text" name="" class="form-control" required>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-primary mt-2">Yangi adminni saqlash</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

</main>

@endsection