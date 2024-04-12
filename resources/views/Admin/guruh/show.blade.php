@extends('Admin.layout.home')
@section('title','Guruh')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Guruh</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('AdminGuruh') }}">Guruhlar</a></li>
            <li class="breadcrumb-item active">Guruh</li>
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
        <div class="card-body text-center pt-3">
            <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                     data-bs-target="#home-justified" type="button" role="tab" 
                     aria-controls="home" aria-selected="true"><i class="bi bi-handbag"></i> Guruh haqida</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" 
                    data-bs-target="#profile-justified" type="button" role="tab" 
                    aria-controls="profile" aria-selected="false"><i class="bi bi-calendar-date"></i> Dars kunlari</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" 
                    data-bs-target="#contact-justified" type="button" role="tab" 
                    aria-controls="contact" aria-selected="false"><i class="bi bi-people"></i> Guruh talabalari</button>
                </li>
            </ul>
            <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                    <h5 class="card-title pt-0 my-0 pb-1">{{ $Guruh['guruh_name'] }}</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-hover table-bordered" style="font-size:14px;">
                                <tr>
                                    <th style="text-align:left;width:50%">Guruh narxi</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['guruh_price'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">O'qituvchi</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['techer_id'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">O'qituvchiga to'lov</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['techer_price'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">O'qituvchiga bonus</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['techer_bonus'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">Boshlanish vaqti</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['guruh_start'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">Yakunlasnish vaqti</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['guruh_end'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-hover table-bordered" style="font-size:14px;">
                                <tr>
                                    <th style="text-align:left;width:50%">Kurs</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['cours_id'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">Dars xonasi</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['room_id'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">Dars vaqti</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['guruh_vaqt'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">Guruh yaratildi</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['created_at'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">Guruh yangilandi</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['updated_at'] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;width:50%">Meneger</th>
                                    <td style="text-align:right;width:50%">{{ $Guruh['admin_id'] }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-6 pt-lg-0 pt-1">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#esltama" style="font-size:14px;"><i class="bi bi-clock"></i> Eslatma Saqlash</button>
                        </div>
                        <div class="col-lg-3 col-6 pt-lg-0 pt-1">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#alluserSendMessege" style="font-size:14px;"><i class="bi bi-messenger"></i> SMS yuborish</button>
                        </div>
                        <div class="col-lg-3 col-6 pt-lg-0 pt-1">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#GuruhDebetUserSendMessege" style="font-size:14px;"><i class="bi bi-messenger"></i> Qarzdorlarga SMS</button>
                        </div>
                        <div class="col-lg-3 col-6 pt-lg-0 pt-1">
                            @if(Auth::user()->type!="Operator")
                            <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#GuruhDeleteUser" style="font-size:14px;"><i class="bi bi-trash"></i> Talaba o'chirish</button>
                            @endif
                        </div>
                        <!-- Guruh uchun eslatma qoldirish -->
                        <div class="modal fade" id="esltama" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title w-100 text-center">Guruh uchun eslatma qoldirish.</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <textarea name="" placeholder="Eslatma matni..." required class="form-control mb-3"></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilisk</button>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-success w-100">Eslatma qoldirish</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Guruh Talabalariga SMS yuborish +++ -->
                        <div class="modal fade" id="alluserSendMessege" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title w-100 text-center">Guruh talabalariga sms yuborish.</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('userSendMessege') }}" method="post">
                                            @csrf
                                            <div class="row px-3">
                                                <input type="hidden" name="guruh_id" value="{{ $Guruh['id'] }}">
                                                @foreach($Talabalar as $item)
                                                @if($item['status']=='Faol')
                                                <div class="form-check form-switch my-1">
                                                    <input class="form-check-input" type="checkbox" id="{{ $item['user_id'] }}" name="User{{ $item['user_id'] }}">
                                                    <label class="form-check-label w-100" style="text-align:left;" for="{{ $item['user_id'] }}">{{ $item['User'] }}</label>
                                                </div>
                                                @endif
                                                @endforeach
                                                <textarea name="text" placeholder="SMS matni..." required class="form-control my-3"></textarea>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilisk</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <button type="submit" class="btn btn-success w-100">SMS yuborish</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Gurugdagi qarzdorlarga SMS yuborish +++ -->
                        <div class="modal fade" id="GuruhDebetUserSendMessege" tabindex="-1">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title w-100 text-center">Qarzdor talabalarga SMS yuborilsinmi?</h5>
                                    </div>
                                    <div class="modal-body text-center p-0">
                                        <form action="{{ route('debitSendMessege') }}" method="post" class="p-0 m-0 w-100 py-2">
                                            @csrf
                                            <input type="hidden" name="guruh_id" value="{{ $Guruh['id'] }}">
                                            <button type="button" class="btn btn-secondary" style="width:47%;" data-bs-dismiss="modal">Bekor qilish</button>
                                            <button type="submit66" class="btn btn-success" style="width:47%;">SMS yuborish</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Guruhdan talaba o'chirish +++ -->
                        <div class="modal fade" id="GuruhDeleteUser" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title w-100 text-center">Guruhdan talaba o'chirish.</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('guruhDeletesUserss') }}" method="post" id="form1">
                                            <div class="row">
                                                <div class="col-12">
                                                    @csrf
                                                    <input type="hidden" name="guruh_price" value="{{ $UsersDeletes['guruh_price'] }}">
                                                    <input type="hidden" name="guruh_id" value="{{ $Guruh['id'] }}">
                                                    <label for="" class="mb-1">O'chiriladigan talabani tanlang</label>
                                                    <select name="user_id" class="form-select" required>
                                                        <option value="user_id">Tanlang...</option>
                                                        @foreach($UsersDeletes['user'] as $item)
                                                        <option value="{{ $item['user_id'] }}">{{ $item['user_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="jarima" class="mt-2 mb-1">Jarima Summasi(max: {{ $UsersDeletes['guruh_price'] }})</label>
                                                    <input type="text" name="jarima" id="summa1" class="form-control" required>
                                                    <label for="commit_end" class="mt-2 mb-1">Guruhdan o'chirish sababi</label>
                                                    <textarea name="commit_end" placeholder="Sabab..." required class="form-control mb-3"></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilisk</button>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-success w-100">Guruhdan o'chirish</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="card-title pt-0 my-0 pb-1">Dars kunlari</h5>
                            <table class="table table-hover table-bordered" style="font-size:12px;">
                                <tr>
                                    <th style="text-align:left;">1-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][0] }}</td>
                                    <th style="text-align:left;">6-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][5] }}</td>
                                    <th style="text-align:left;">11-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][10] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;">2-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][1] }}</td>
                                    <th style="text-align:left;">7-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][6] }}</td>
                                    <th style="text-align:left;">12-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][12] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;">3-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][2] }}</td>
                                    <th style="text-align:left;">8-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][7] }}</td>
                                    <th style="text-align:left;">13-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][11] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;">4-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][3] }}</td>
                                    <th style="text-align:left;">9-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][8] }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align:left;">5-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][4] }}</td>
                                    <th style="text-align:left;">10-dars</th>
                                    <td style="text-align:right;">{{ $Guruh['Kunlar'][9] }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="table-responsive">
                        <h5 class="card-title pt-0 my-0 pb-1">Guruh talabalari</h5>
                        <table class="table text-center table-bordered table-hover" style="font-size:12px;">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Talaba</th>
                                    <th class="text-center">Guruhga qo'shildi</th>
                                    <th class="text-center">Meneger</th>
                                    <th class="text-center">Izoh</th>
                                    <th class="text-center">Guruhdan o'chirildi</th>
                                    <th class="text-center">Meneger</th>
                                    <th class="text-center">Izoh</th>
                                    <th class="text-center">Balans</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($Talabalar as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td style="text-align:left"><a href="{{ route('StudentShow',$item['user_id']) }}">{{ $item['User'] }}</a></td>
                                    <td>{{ $item['created_at'] }}</td>
                                    <td>{{ $item['admin_id_start'] }}</td>
                                    <td>{{ $item['commit_start'] }}</td>
                                    <td>{{ $item['updated_at'] }}</td>
                                    <td>{{ $item['admin_id_end'] }}</td>
                                    <td>{{ $item['commit_end'] }}</td>
                                    <td>{{ $item['balans'] }}</td>
                                    <td>{{ $item['status'] }}</td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body text-center">
            <div class="table-responsive">
                <h5 class="card-title pb-1"><i class="bi bi-clipboard-check"></i> Davomat</h5>
                <table class="table text-center table-bordered table-hover" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th class="text-center">Talaba</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                            <th class="text-center" style="font-size:12px;">01-01</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align:left">Elshod Musurmonov</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align:left">Elshod Musurmonov</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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

    <div class="card">
        <div class="card-body text-center">
            <div class="table-responsive">
                <h5 class="card-title pb-1"><i class="bi bi-clock"></i> Eslatmalar</h5>
                <table class="table text-center table-bordered table-hover" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Eslatma matni</th>
                            <th class="text-center">Eslatma vaqti</th>
                            <th class="text-center">Eslatma holati</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
    
    <div class="text-center">
        @if(Auth::user()->type!="Operator")
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGuruh" style="font-size:14px;"><i class="bi bi-trash"></i> Guruhni o'chirish</button>
        @endif
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nextGuruh" style="font-size:14px;"><i class="bi bi-arrow-right-square"></i> Guruhni davom etish</button>
    </div>
    <!-- Guruhni davom ettirish -->
    <div class="modal fade" id="nextGuruh" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Guruhni davom ettiritsh</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('CreateGuruhNext') }}" method="post" id="form4">
                        @csrf 
                        @method('put')
                        <input type="hidden" name="guruh_id" value="{{ $Guruh['id'] }}">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h5 class="card-title mt-0 pt-0">
                                    Yangi guruh haqida ma`lumotlarini to'ldiring.
                                </h5>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="guruh_name" id="guruh_name" required>
                                    <label for="guruh_name">Yangi guruh nomi</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <select class="form-select" name="guruh_price" id="guruh_price" required>
                                        <option value>Tanlang...</option>
                                        @foreach($TulovSetting as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['tulov_summa'] }}</option>
                                        @endforeach
                                    </select>
                                    <label for="guruh_price">Yangi guruh narxi</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <input type="date" class="form-control" name="dars_boshlanish_vaqti" id="dars_boshlanish_vaqti" required>
                                    <label for="dars_boshlanish_vaqti">Dars boshlanish</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <select class="form-select" name="hafta_kuni" id="hafta_kuni" required>
                                        <option value>Tanlang...</option>
                                        <option value="toq">Toq kunlar</option>
                                        <option value="juft">Juft kunlar</option>
                                    </select>
                                    <label for="hafta_kuni">Hafta kuni</label>
                                </div>  
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <select class="form-select" name="room_id" id="room_id" required>
                                        <option value="">Tanlang...</option>
                                        @foreach($Room as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['room_name'] }}</option>
                                        @endforeach
                                    </select>
                                    <label for="room_id">Dars xonasi</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <select class="form-select" name="cours_id" id="cours_id" required>
                                        <option value="{{ $Guruh['cours_cours'] }}">{{ $Guruh['cours_id'] }}</option>
                                    </select>
                                    <label for="cours_id">Guruh uchun kurs</label>
                                </div>
                                <div class="form-floating mt-2">
                                    <select class="form-select" name="techer_id" id="techer_id" required>
                                        <option value="{{ $Guruh['techer_techer'] }}">{{ $Guruh['techer_id'] }}</option>
                                    </select>
                                    <label for="techer_id">Guruh o'qituvchisi</label>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mt-2">
                                            <input type="text" id="summa1" class="form-control" name="techer_price" value="{{ $Guruh['techer_price'] }}" id="techer_price" required>
                                            <label for="techer_price">O'qituvchiga to'lov</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mt-2">
                                            <input type="text" id="summa2" class="form-control"  name="techer_bonus" value="{{ $Guruh['techer_bonus'] }}" id="techer_bonus" required>
                                            <label for="techer_bonus">O'qituvchiga bonus</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary my-2 w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-success my-2 w-100">Kiyingi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Guruhni o'chirish -->
    <div class="modal fade" id="deleteGuruh" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Guruh o'chirilsinmi?</h5>
                </div>
                <div class="modal-body text-center p-0">
                    <form action="#" method="post" class="p-0 m-0 w-100 py-2">
                        @csrf
                        <input type="hidden" name="user_id" value="#">
                        <button type="button" class="btn btn-secondary" style="width:47%;" data-bs-dismiss="modal">Bekor qilish</button>
                        <button type="submit66" class="btn btn-success" style="width:47%;">O'chirish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

</main>

@endsection