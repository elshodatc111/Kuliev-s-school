@extends('SuperAdmin.layout.home')
@section('title','Moliya')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Moliya</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('filial')}}">Filiallar</a></li>
            <li class="breadcrumb-item active">Moliya</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center pb-2">
                            <h5 class="card-title w-100 text-center pb-0">{{ $Filial['filial_name'] }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="mb-0 pb-1 card-title"><i class="bi bi-coin"></i> Naqt</h6>
                                    <p class="p-0 m-0 text-danger">Balans</p>
                                    <h5 class="text-success" style="font-weight:900">{{ $Filial['naqt'] }}</h5>
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-0 pb-1 card-title"><i class="bi bi-clock"></i> Chiqim</h6>
                                    <p class="p-0 m-0 text-danger">Kassada</p>
                                    <h5 class="text-primary" style="font-weight:900">{{ $Filial['naqtkassa'] }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="card-title mb-0 pb-1"><i class="bi bi-credit-card-2-back"></i> Plastik</h6>
                                    <p class="p-0 m-0 text-danger">Balans</p>
                                    <h5 class="text-success" style="font-weight:900">{{ $Filial['plastik'] }}</h5>
                                </div>
                                <div class="col-6">
                                    <h6 class="card-title mb-0 pb-1"> <i class="bi bi-clock"></i> Chiqim</h6>
                                    <p class="p-0 m-0 text-danger">Kassada</p>
                                    <h5 class="text-primary" style="font-weight:900">{{ $Filial['plastikkassa'] }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h6 class="card-title mb-0 pb-1">Payme</h6>
                            <p class="p-0 m-0 text-danger">Balans</p>
                            <h5 class="text-success" style="font-weight:900">{{ $Filial['payme'] }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 pt-1 pt-lg-0">
                    <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#kassagaQaytar"><i class="bi bi-reply-all"></i> Filial kassasiga qaytarish</button>
                    
                    <div class="modal fade" id="kassagaQaytar" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title w-100 text-center">Filial kassasiga qaytarish</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="" id="form1" method="post">
                                        <label for="" class="mb-1">Qaytariladigan summa</label>
                                        <input type="text" id="summa1" class="form-control" required>
                                        <label for="" class="mt-2 mb-1">Qaytariladigan summa turi</label>
                                        <select name="" class="form-select" required>
                                            <option value="">Tanlang</option>
                                            <option value="Naqt">Naqt</option>
                                            <option value="Plastik">Plastik</option>
                                        </select>
                                        <label for="" class="mt-2 mb-1">Qaytarish haqida</label>
                                        <textarea type="text" class="form-control mb-3" required></textarea>

                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary w-100">Tasdiqlash</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pt-1 pt-lg-0">
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#balamsXarajat"><i class="bi bi-cart-check"></i> Filial balansidan xarajat</button>
                    <div class="modal fade" id="balamsXarajat" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title w-100 text-center">Filial balansidan xarajat</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="" id="form2" method="post">
                                        <label for="" class="mb-1">Xarajat summa</label>
                                        <input type="text" id="summa1" class="form-control" required>
                                        <label for="" class="mt-2 mb-1">Xarajat summa turi</label>
                                        <select name="" class="form-select" required>
                                            <option value="">Tanlang</option>
                                            <option value="Naqt">Naqt</option>
                                            <option value="Plastik">Plastik</option>
                                            <option value="Payme">Payme</option>
                                        </select>
                                        <label for="" class="mt-2 mb-1">Xarajat haqida</label>
                                        <textarea type="text" class="form-control mb-3" required></textarea>

                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary w-100">Tasdiqlash</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Filial balansi tarixi (oxirgi 3 oy)</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-striped table-hover" style="font-size:14px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hodim</th>
                                            <th>Phone</th>
                                            <th>Lavozim</th>
                                            <th>Login</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

  


     
</section>

</main>

@endsection