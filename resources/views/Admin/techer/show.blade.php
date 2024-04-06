@extends('Admin.layout.home')
@section('title','O\'qituvchi')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>O'qituvchi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('AdminTecher') }}">O'qituvchilar</a></li>
            <li class="breadcrumb-item active">O'qituvchi</li>
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
        <div class="col-lg-8">
            <div class="card info-card sales-card">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $Techer->name }}</span></h5>
                    <table class="table table-bordered text-center table-hover" style="font-size:14px;">
                        <tr>
                            <td style="text-align:left;width:25%;">Manzil</td>
                            <td style="text-align:right;width:25%;">{{ $Techer->addres }}</td>
                            <td style="text-align:left;width:25%;">Login</td>
                            <td style="text-align:right;width:25%;">{{ $Techer->email }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Telefon raqam</td>
                            <td style="text-align:right;width:25%;">{{ $Techer->phone }}</td>
                            <td style="text-align:left;width:25%;">Telefon raqam</td>
                            <td style="text-align:right;width:25%;">{{ $Techer->phone2 }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Tyg'ilgan kuni</td>
                            <td style="text-align:right;width:25%;">{{ $Techer->tkun }}</td>
                            <td style="text-align:left;width:25%;">O'qituvchi haqida</td>
                            <td style="text-align:right;width:25%;">{{ $Techer->about }}</td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-lg-6 mt-lg-0 bt-2">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#editpassword">Parolni yangilash</button>
                        </div>
                        <div class="col-lg-6 mt-lg-0 bt-2">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#taxrirlash">Taxrirlash</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card info-card sales-card">
                <div class="card-body text-center">
                    <h5 class="card-title">Statistika</span></h5>
                    <table class="table table-bordered text-center table-hover" style="font-size:14px;">
                        <tr>
                            <td style="text-align:left">Yangi guruhlari</td>
                            <td style="text-align:right">15</td>
                        </tr>
                        <tr>
                            <td style="text-align:left">Aktiv guruhlari</td>
                            <td style="text-align:right">15</td>
                        </tr>
                        <tr>
                            <td style="text-align:left">Yakunlangan guruhlari</td>
                            <td style="text-align:right">15</td>
                        </tr>
                    </table>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ishhaqi">Ish haqi to'lov</button>
                </div>
            </div>
        </div>
    </div>
    <!-- O'qituvchini Taxrirlash -->
    <div class="modal fade" id="taxrirlash" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">O'qituvchini taxrirlash</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('AdminTecherUpdate') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $Techer->id }}">
                        <label for="name">FIO</label>
                        <input type="text" name="name" class="form-control" value="{{ $Techer->name }}" required>
                        <label for="addres" class="mt-2">Manzil</label>
                        <input type="text" name="addres" class="form-control" value="{{ $Techer->addres }}" required>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="phone" class="mt-2">Telefon raqam 1</label>
                                <input type="text" name="phone" class="form-control phone" value="{{ $Techer->phone }}" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone2" class="mt-2">Telefon raqam 2</label>
                                <input type="text" name="phone2" class="form-control phone" value="{{ $Techer->phone2 }}" required>
                            </div>
                        </div>
                        <label for="tkun" class="mt-2">Tugilgan kuni</label>
                        <input type="date" name="tkun" class="form-control" value="{{ $Techer->tkun }}" required>
                        <label for="about" class="mt-2">O'qituvchi haqida</label>
                        <input type="text" name="about" class="form-control" value="{{ $Techer->about }}" required>
                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-success w-100">Taxrirlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Ish haqi to'lov -->
    <div class="modal fade" id="ishhaqi" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">O'qituvchiag ish haqi to'lov</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td colspan=2>Kassada mavjud</td>
                        </tr>
                        <tr>
                            <td>Naqt: 15000</td>
                            <td>Plastik: 15000</td>
                        </tr>
                    </table>
                    <form action="#" method="post" id="form1">
                        @csrf
                        <input type="hidden" name="Naqt" value="#">
                        <input type="hidden" name="Plastik" value="#">
                        <input type="hidden" name="user_id" value="#">
                        <div class="row mt-3">
                            <div class="col-12">
                                <label for="summa">Guruhni tanlang</label>
                                <select name="" class="form-select mb-2" required>
                                    <option value="">Tanlang</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="summa">To'lov summasi</label>
                                <input type="text" id="summa2" name="summa" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <label for="type">To'lov turi</label>
                                <select name="type" class="form-control" required>
                                    <option value="">Tanlang</option>
                                    <option value="Naqt">Naqt</option>
                                    <option value="Plastik">Plastik</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3 mt-2">
                                <label for="about">To'lov summasi</label>
                                <textarea name="about" class="form-control" required></textarea>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-success w-100">To'lov qilish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edet Password -->
    <div class="modal fade" id="editpassword" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Parol yangilansinmi?</h5>
                </div>
                <div class="modal-body text-center p-0">
                    <form action="{{ route('AdminTecherUpdatePassword') }}" method="post" class="p-0 m-0 w-100 py-2">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $Techer->id }}">
                        <button type="button" class="btn btn-danger" style="width:47%;" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit66" class="btn btn-success" style="width:47%;">Yangilash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card info-card sales-card">
      <div class="card-body text-center">
        <h5 class="card-title">O'qituvchi guruhlari</span></h5>
        <div class="table-responsive">
            <table class="table table-bordered text-center table-striped table-hover" style="font-size:14px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Guruh</th>
                        <th>Boshlanish vaqti</th>
                        <th>Tugash vaqti</th>
                        <th>Talabalar</th>
                        <th>Bonus</th>
                        <th>Ish haqi</th>
                        <th>To'langan</th>
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
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>  

    <div class="card info-card sales-card">
      <div class="card-body text-center">
        <h5 class="card-title">To'langan ish haqi</span></h5>
        <div class="table-responsive">
            <table class="table table-bordered text-center table-striped table-hover" style="font-size:14px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Guruh</th>
                        <th>To'lov Summa</th>
                        <th>To'lov vaqti</th>
                        <th>To'lov haqida</th>
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
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>  
</section>

</main>

@endsection