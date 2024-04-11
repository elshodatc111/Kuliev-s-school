@extends('Admin.layout.home')
@section('title','Hodim')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Hodim</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('adminHodimlar') }}">Hodimlar</a></li>
            <li class="breadcrumb-item active">Hodim</li>
        </ol>
    </nav>
</div>

Kassada mavjud naqt va plastik summalar to'g'irlanmagan

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
                    <h5 class="card-title"><i class="bi bi-person"></i> {{ $User->name }}</span></h5>
                    <table class="table table-bordered table-hover" style="font-size:12px;">
                        <tr>
                            <td style="text-align:left;width:25%;">Manzil</td>
                            <td style="text-align:right;width:25%;">{{ $User->addres }}</td>
                            <td style="text-align:left;width:25%;">Login</td>
                            <td style="text-align:right;width:25%;">{{ $User->email }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Telefon 1</td>
                            <td style="text-align:right;width:25%;">{{ $User->phone }}</td>
                            <td style="text-align:left;width:25%;">Telefon 2</td>
                            <td style="text-align:right;width:25%;">{{ $User->phone2 }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Tyg'ilgan kuni</td>
                            <td style="text-align:right;width:25%;">{{ $User->tkun }}</td>
                            <td style="text-align:left;width:25%;">Lavozimi</td>
                            <td style="text-align:right;width:25%;">{{ $User->type }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Hodim haqida</td>
                            <td style="text-align:right;width:25%;">{{ $User->about }}</td>
                            <td style="text-align:left;width:25%;">Ishga olindi</td>
                            <td style="text-align:right;width:25%;">{{ $User->created_at }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Ish faoliyati</td>
                            <td style="text-align:right;width:25%;">{{ $User->status }}</td>
                            <td style="text-align:left;width:25%;">Oxirgi taxrir</td>
                            <td style="text-align:right;width:25%;">{{ $User->updated_at }}</td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-lg-4 pt-lg-0 pt-2">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updatePassword">Parol Yangilash</button>
                        </div>
                        <div class="col-lg-4 pt-lg-0 pt-2">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#userTaxrir">Taxrirlash</button>
                        </div>
                        <div class="col-lg-4 pt-lg-0 pt-2">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ishhaqi">Ish haqi to'lov</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card info-card sales-card">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="bi bi-person"></i> Statistika</span></h5>
                    <table class="table table-bordered table-hover"  style="font-size:12px;">
                        <tr>
                            <td style="text-align:left;width:25%;">Naqt</td>
                            <td style="text-align:right;width:25%;">{{ $Kassa['naqt'] }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Plastik</td>
                            <td style="text-align:right;width:25%;">{{ $Kassa['plastik'] }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Chegirma</td>
                            <td style="text-align:right;width:25%;">{{ $Kassa['chegirma'] }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Qaytarildi</td>
                            <td style="text-align:right;width:25%;">{{ $Kassa['qaytarildi'] }}</td>
                        </tr>
                        <tr>
                            <td style="text-align:left;width:25%;">Tashriflar</td>
                            <td style="text-align:right;width:25%;">{{ $Kassa['tashriflar'] }}</td>
                        </tr>
                    </table>
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#clearStatistik">Statistika tozalash</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Ish haqi to'lov -->
    <div class="modal fade" id="ishhaqi" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Hodimga ish haqi to'lov</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td colspan=2>Kassada mavjud</td>
                        </tr>
                        <tr>
                            <td>Naqt: {{ $Kassa['MavjudNaqt'] }}</td>
                            <td>Plastik: {{ $Kassa['MavjudPlastik'] }}</td>
                        </tr>
                    </table>
                    <form action="{{ route('adminPayHodimlarIshHaqi') }}" method="post" id="form1">
                        @csrf
                        <input type="hidden" name="Naqt" value="{{ $Kassa['MavjudNaqt'] }}">
                        <input type="hidden" name="Plastik" value="{{ $Kassa['MavjudPlastik'] }}">
                        <input type="hidden" name="user_id" value="{{ $User->id }}">
                        <div class="row mt-3">
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
    <!-- User Taxrirlash -->
    <div class="modal fade" id="userTaxrir" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Taxrirlash</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('adminUpdateHodimlarUser') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $User->id }}">
                        <label for="name">FIO</label>
                        <input type="text" name="name" class="form-control" value="{{ $User->name }}" required>
                        <label for="addres" class="mt-2">Manzil</label>
                        <input type="text" name="addres" class="form-control" value="{{ $User->addres }}" required>
                        <label for="phone" class="mt-2">Telefon raqam 1</label>
                        <input type="text" name="phone" class="form-control phone" value="{{ $User->phone }}" required>
                        <label for="phone2" class="mt-2">Telefon raqam 2</label>
                        <input type="text" name="phone2" class="form-control phone" value="{{ $User->phone2 }}" required>
                        <label for="tkun" class="mt-2">Tugilgan kuni</label>
                        <input type="date" name="tkun" class="form-control" value="{{ $User->tkun }}" required>
                        <label for="type" class="mt-2">Lavozimi</label>
                        <select name="type" class="form-select">
                            <option value="">Tanlang</option>
                            <option value="Operator">Operator</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <label for="about" class="mt-2">Hodim haqida</label>
                        <input type="text" name="about" class="form-control" value="{{ $User->about }}" required>
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
    <!-- Update Password -->
    <div class="modal fade" id="updatePassword" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Parol yangilansinmi?</h5>
                </div>
                <div class="modal-body text-center p-0">
                    <form action="{{ route('adminUpdateHodimlarPassword') }}" method="post" class="p-0 m-0 w-100 py-2">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $User->id }}">
                        <button type="button" class="btn btn-danger" style="width:47%;" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit66" class="btn btn-success" style="width:47%;">Yangilash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Clear Statistika -->
    <div class="modal fade" id="clearStatistik" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Statistika tozalansinmi?</h5>
                </div>
                <div class="modal-body text-center p-0">
                    <form action="{{ route('adminClearHodimlarStatistik') }}" method="post" class="p-0 m-0 w-100 py-2">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $User->id }}">
                        <button type="button" class="btn btn-danger" style="width:47%;" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit66" class="btn btn-success" style="width:47%;">Tozalash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card info-card sales-card">
        <div class="card-body text-center">
            <h5 class="card-title">Hodimga to'langan ish haqi</span></h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center table-striped table-hover" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>To'lov Summa</th>
                            <th>To'lov turi</th>
                            <th>To'lov vaqti</th>
                            <th>To'lov haqida</th>
                            <th>Operator</th>
                            @if(Auth::User()->type=="SuperAdmin")
                            <th>O'chirish</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ishHaqi as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['summa'] }}</td>
                            <td>{{ $item['type'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>{{ $item['about'] }}</td>
                            <td>{{ $item['admin_email'] }}</td>
                            @if(Auth::User()->type=="SuperAdmin")
                            <th><a href="{{ route('adminPayHodimlarIshHaqiDelete',$item['id'] ) }}" class="btn btn-danger py-0 px-1"><i class="bi bi-trash"></i></a></th>
                            @endif
                        </tr>
                        @empty
                            <tr>
                            @if(Auth::User()->type=="SuperAdmin")
                                <td class="text-center" colspan=7>Ish haqi to'lovlari mavjud emas.</td>
                            @else 
                                <td class="text-center" colspan=6>Ish haqi to'lovlari mavjud emas.</td>
                            @endif
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
</section>

</main>

@endsection