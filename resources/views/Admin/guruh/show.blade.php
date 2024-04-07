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
                            <button class="btn btn-primary w-100" style="font-size:14px;"><i class="bi bi-clock"></i> Eslatma Saqlash</button>
                        </div>
                        <div class="col-lg-3 col-6 pt-lg-0 pt-1">
                            <button class="btn btn-primary w-100" style="font-size:14px;"><i class="bi bi-messenger"></i> SMS yuborish</button>
                        </div>
                        <div class="col-lg-3 col-6 pt-lg-0 pt-1">
                            <button class="btn btn-primary w-100" style="font-size:14px;"><i class="bi bi-messenger"></i> Qarzdorlarga SMS</button>
                        </div>
                        <div class="col-lg-3 col-6 pt-lg-0 pt-1">
                            <button class="btn btn-danger w-100" style="font-size:14px;"><i class="bi bi-trash"></i> Talaba o'chirish</button>
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
                        <table class="table text-center table-bordered table-hover" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Talaba</th>
                                    <th class="text-center">Guruhga qo'shildi</th>
                                    <th class="text-center">Izoh</th>
                                    <th class="text-center">Balans</th>
                                    <th class="text-center">Meneger</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td style="text-align:left"><a href="">Elshod Musurmonov</a></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Faol</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td style="text-align:left"><a href="">Elshod Musurmonov</a></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>O'chirildi</td>
                                </tr>
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

    <div class="card">
        <div class="card-body text-center">
            <div class="table-responsive">
                <h5 class="card-title pb-1"><i class="bi bi-disc"></i> Guruh uchun chegirmalar</h5>
                <table class="table text-center table-bordered table-hover" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Talaba</th>
                            <th class="text-center">Chegirma Summasi</th>
                            <th class="text-center">Chegirma Vaqti</th>
                            <th class="text-center">Chegirma Haqida</th>
                            <th class="text-center">Meneger</th>
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

    <div class="text-center">
        <button class="btn btn-danger" style="font-size:14px;"><i class="bi bi-trash"></i> Guruhni o'chirish</button>
        <button class="btn btn-primary" style="font-size:14px;"><i class="bi bi-arrow-right-square"></i> Guruhni davom etish</button>
    </div>

</section>

</main>

@endsection