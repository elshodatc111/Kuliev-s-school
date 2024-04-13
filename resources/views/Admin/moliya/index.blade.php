@extends('Admin.layout.home')
@section('title','Moliya')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Moliya</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item active">Moliya</li>
        </ol>
    </nav>
</div>
@if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error') }}</div>
@endif
<section class="section dashboard row mb-0 pb-0">
    <div class="col-lg-4">
        <div class="card mb-2">
            <div class="card-body text-center">
                <h5 class="card-title mb-0 pb-2"><i class="bi bi-bag-check"></i> Kassada mavjud</h5>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="card-title p-0 m-0" style="font-size:14px;"><i class="bi bi-cash"></i> Naqt:</b>
                        <span class="badge bg-success rounded-pill">{{ $Kassa['Naqt'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="card-title p-0 m-0" style="font-size:14px;"><i class="bi bi-credit-card-2-back"></i> Plastik:</b>
                        <span class="badge bg-success rounded-pill">{{ $Kassa['Plastik'] }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-2">
            <div class="card-body text-center">
                <h5 class="card-title mb-0 pb-2"><i class="bi bi-capslock"></i> Chiqim kutilmoqda</h5>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="card-title p-0 m-0" style="font-size:14px;"><i class="bi bi-cash"></i> Naqt:</b>
                        <span class="badge bg-warning rounded-pill">{{ $Kassa['ChiqimNaqt'] }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b class="card-title p-0 m-0" style="font-size:14px;"><i class="bi bi-credit-card-2-back"></i> Plastik:</b>
                        <span class="badge bg-warning rounded-pill">{{ $Kassa['ChiqimPlastik'] }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-2">
            <div class="card-body text-center">
                <div class="table-responsive">
                    <h5 class="card-title m-0 pb-2"><i class="bi bi-cart4"></i> Xarajat kutilmoqda</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b class="card-title p-0 m-0" style="font-size:14px;"><i class="bi bi-cash"></i> Naqt:</b>
                            <span class="badge bg-info rounded-pill">{{ $Kassa['XarajatNaqt'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b class="card-title p-0 m-0" style="font-size:14px;"><i class="bi bi-credit-card-2-back"></i> Plastik:</b>
                            <span class="badge bg-info rounded-pill">{{ $Kassa['XarajatPlastik'] }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="row text-center pb-3 mt-0 pt-0">
    <div class="col-lg-6">
        <button class="btn btn-warning text-white w-100 mt-2" data-bs-toggle="modal" data-bs-target="#KassadanChiqim"><i class="bi bi-capslock"></i> Kassadan chiqim</button>
    </div>
    <div class="col-lg-6">
        <button class="btn btn-info text-white w-100 mt-2" data-bs-toggle="modal" data-bs-target="#XarajatChiqim"><i class="bi bi-cart4"></i> Xarajat uchun chiqim</button>
    </div>
</div>

<div class="modal fade" id="KassadanChiqim" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="card-title p-0 m-0 w-100 text-center"><i class="bi bi-capslock"></i> Kassadan chiqim</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('AdminMoliyaCHiqim') }}" method="post" id="form1">
                    @csrf
                    <input type="hidden" name="xodisa" value="Chiqim">
                    <input type="hidden" name="status" value="false">
                    <input type="hidden" name="naqt" value="{{ $Kassa['Naqt'] }}">
                    <input type="hidden" name="plastik" value="{{ $Kassa['Plastik'] }}">
                    <div class="row">
                        <div class="col-6">
                            <label for="summa" class="mb-1">Chiqim summasi</label>
                            <input type="text" name="summa" id="summa1" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label for="type" class="mb-1">Chiqim turi</label>
                            <select name="type" class="form-select" required>
                                <option value="">Tanlang</option>
                                <option value="Naqt">Naqt</option>
                                <option value="Plastik">Plastik</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="about" class="mt-3 mb-1">Chiqim haqida</label>
                            <textarea name="about" class="form-control" required></textarea>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary mt-3 w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary mt-3 w-100">Chiqim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="XarajatChiqim" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="card-title p-0 m-0 w-100 text-center"><i class="bi bi-cart4"></i> Xarajat uchun chiqim</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('AdminMoliyaXarajat') }}" method="post" id="form2">
                    @csrf
                    <input type="hidden" name="xodisa" value="Xarajat">
                    <input type="hidden" name="status" value="false">
                    <input type="hidden" name="naqt" value="{{ $Kassa['Naqt'] }}">
                    <input type="hidden" name="plastik" value="{{ $Kassa['Plastik'] }}">
                    <div class="row">
                        <div class="col-6">
                            <label for="summa" class="mb-1">Xarajat summasi</label>
                            <input type="text" name="summa" id="summa2" class="form-control" required>
                        </div>
                        <div class="col-6">
                            <label for="type" class="mb-1">Xarajat turi</label>
                            <select name="type" class="form-select" required>
                                <option value="">Tanlang</option>
                                <option value="Naqt">Naqt</option>
                                <option value="Plastik">Plastik</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="about" class="mt-3 mb-1">Xarajat haqida</label>
                            <textarea name="about" class="form-control" required></textarea>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary mt-3 w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary mt-3 w-100">Xarajat</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body pt-3">
        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="home-tab" 
                data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" 
                role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-capslock"></i> Tasdiqlanmagan chiqimlar</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="profile-tab" 
                data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" 
                role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-cart4"></i> Tasdiqlanmagan xarajatlar</button>
            </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
            <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                <div class="table-responsive">
                    <table class="table text-center table-hover" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Guruh</th>
                                <th class="text-center">Boshlanish vaqti</th>
                                <th class="text-center">Yakunlanish vaqti</th>
                                <th class="text-center">Talabalar</th>
                                <th class="text-center">Guruh holati</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table text-center table-hover" style="font-size:14px;">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Guruh</th>
                                <th class="text-center">Boshlanish vaqti</th>
                                <th class="text-center">Yakunlanish vaqti</th>
                                <th class="text-center">Talabalar</th>
                                <th class="text-center">Guruh holati</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</main>

@endsection