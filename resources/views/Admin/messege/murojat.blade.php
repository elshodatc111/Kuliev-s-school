@extends('Admin.layout.home')
@section('title','Murojatlar')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Murojatlar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item active">Murojatlar</li>
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
      <div class="card-body row pt-4">
        <div class="col-4">
            <div class="list-group border" style="height:400px;overflow-x: hidden;overflow-y: scroll">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex p-0 w-100 justify-content-between">
                        <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                        <small class="text-muted" style="font-size:8px;padding-top:7px;">2024-01-02 15:15:00</small>
                    </div>   
                    <p class="p-0 m-0 d-none d-lg-block text-muted">Text oxirgisi</p>                        
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex p-0 w-100 justify-content-between">
                        <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                        <small class="text-muted" style="font-size:8px;padding-top:7px;">2024-01-02 15:15:00</small>
                    </div>
                    <p class="p-0 m-0 d-none d-lg-block text-muted">Text oxirgisi</p>   
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex p-0 w-100 justify-content-between">
                        <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                        <small class="text-muted" style="font-size:8px;padding-top:7px;">2024-01-02 15:15:00</small>
                    </div>
                    <p class="p-0 m-0 d-none d-lg-block text-muted">Text oxirgisi</p>   
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex p-0 w-100 justify-content-between">
                        <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                        <small class="text-muted" style="font-size:8px;padding-top:7px;">2024-01-02 15:15:00</small>
                    </div>
                    <p class="p-0 m-0 d-none d-lg-block text-muted">Text oxirgisi</p>   
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex p-0 w-100 justify-content-between">
                        <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                        <small class="text-muted" style="font-size:8px;padding-top:7px;">2024-01-02 15:15:00</small>
                    </div>
                    <p class="p-0 m-0 d-none d-lg-block text-muted">Text oxirgisi</p>   
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex p-0 w-100 justify-content-between">
                        <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                        <small class="text-muted" style="font-size:8px;padding-top:7px;">2024-01-02 15:15:00</small>
                    </div>
                    <p class="p-0 m-0 d-none d-lg-block text-muted">Text oxirgisi</p>   
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex p-0 w-100 justify-content-between">
                        <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                        <small class="text-muted" style="font-size:8px;padding-top:7px;">2024-01-02 15:15:00</small>
                    </div>
                    <p class="p-0 m-0 d-none d-lg-block text-muted">Text oxirgisi</p>   
                </a>
            </div>
        </div>
          <div class="col-8">
              <div class="border">
                  <div class="list-group " style="height:360px;overflow-x: hidden;overflow-y: scroll">
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                      
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;margin-left: 29%;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                      
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;margin-left: 29%;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                      
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;margin-left: 29%;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                      
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;margin-left: 29%;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                      
                      <div style="width: 70%;background-color: #CCCED3;margin: 5px;border-radius: 5px;padding: 5px;margin-left: 29%;">
                          <div class="d-flex p-0 w-100 justify-content-between">
                              <h6 class="p-0 m-0">Elshod Musurmonov</h6>
                              <small class="text-muted">2024-01-02 15:15:00</small>
                          </div>
                          <p class="p-0 m-0 px-3" style="font-family:Georgia, 'Times New Roman', Times, serif">Text oxirgisi</p>
                      </div>
                  </div>
                  <form action="" method="post">
                      <div class="input-group">
                          <input type="text" class="form-control" style="border-radius: 0;" placeholder="Javob matni..." required>
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-primary" style="border-radius: 0;"><i class="bi bi-send"></i></button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>   
  </section>

</main>

@endsection
