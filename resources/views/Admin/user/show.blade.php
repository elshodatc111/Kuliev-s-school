@extends('Admin.layout.home')
@section('title','Talaba')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Talaba</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('Student') }}">Talabalar</a></li>
            <li class="breadcrumb-item active">Talaba</li>
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
            <div class="card-body pt-3">
                <div class="tab-content pt-2" id="myTabjustifiedContent">
                    <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                        <h5 class="card-title w-100 text-center py-1">{{ $Users['name'] }}</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Telefon Raqam:</b>
                                        <span class="badge text-dark">{{ $Users['phone'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Tanish Telefon Raqam:</b>
                                        <span class="badge text-dark">{{ $Users['phone2'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Yashash Manzil:</b>
                                        <span class="badge text-dark">{{ $Users['addres'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Tug'ilgan Kuni:</b>
                                        <span class="badge text-dark">{{ $Users['tkun'] }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Talaba Balansi:</b>
                                        @if($Users['balans']>0)
                                        <span class="badge bg-success">{{ $Users['balans'] }}</span>
                                        @elseif($Users['balans'] < 0)
                                        <span class="badge bg-danger">{{ $Users['balans'] }}</span>
                                        @else
                                        <span class="badge bg-primary">0</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Talaba Haqida:</b>
                                        <span class="badge text-dark">{{ $Users['about'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Biz Haqimizda:</b>
                                        <span class="badge text-dark">{{ $Users['smm'] }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <b>Login:</b>
                                        <span class="badge text-dark">{{ $Users['email'] }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                

    </section>
    <div class="card">
        <div class="card-body pt-3">
            <div class="tab-content pt-2" id="myTabjustifiedContent">
                <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <button class="btn my-1 btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#tulovPlus"><i class="bi bi-cash-coin"></i> To'lov qilish</button>
                        </div>
                        <div class="col-lg-3 col-6">
                            <button class="btn my-1 btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#sendMessege"><i class="bi bi-messenger"></i> SMS yuborish</button>
                        </div>
                        <div class="col-lg-3 col-6">
                            <button class="btn my-1 btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#eslatmaQoldirish"><i class="bi bi-messenger"></i> Eslatma qoldirish</button>
                        </div>
                        <div class="col-lg-3 col-6">
                            <button class="btn my-1 btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#guruhPlusUser"><i class="bi bi-cash-coin"></i> Guruhga qo'shish</button>
                        </div>
                        @if(Auth::user()->type!='Operator')
                        <div class="col-lg-3 col-6">
                            <button class="btn my-1 btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#userEdit"><i class="bi bi-pencil-square"></i> Taxrirlash</button>
                        </div>
                        <div class="col-lg-3 col-6">
                            <button class="btn my-1 btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#resetPassword"><i class="bi bi-lock"></i> Parolni yangilash</button>
                        </div>
                        <div class="col-lg-3 col-6">
                            <button class="btn my-1 btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#parRepetUsr"><i class="bi bi-cash-stack"></i> To'lovni qaytarish</button>
                        </div>
                        <div class="col-lg-3 col-6">
                            <button class="btn my-1 btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#chegirmaPlus"><i class="bi bi-coin"></i> Chegirma kiritish</button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
                
    <!-- To'lov qilish +++ -->
    <div class="modal fade" id="tulovPlus" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">To'lov qilish</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('AdminUserTulov') }}" method="post" id="form1">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $Users['id'] }}">
                        <label for="naqt" class="mb-1">To'lov summasi (NAQT)</label>
                        <input type="text" name="naqt" value="0" id="summa1" class="form-control" required>
                        <label for="plastik" class="mb-1 mt-2">To'lov summasi (PLASTIK)</label>
                        <input type="text" name="plastik" value="0" id="summa2" class="form-control" required>
                        <label for="guruh_id" class="mb-1 mt-2">Chegirmali guruhni tanlang.</label>
                        <select name="guruh_id"  class="form-select">
                            <option value="NULL">Tanlang...</option>
                            @foreach($ChegirmaGuruh as $item)
                            <option value="{{ $item['guruh_id'] }}">{{ $item['guruh_name'] }} (Tulov:{{ $item['chegirmaTulov'] }})</option>
                            @endforeach
                        </select>
                        <label for="about" class="mb-1 mt-2">To'lov haqida</label>
                        <textarea type="text" name="about" class="form-control mb-3"></textarea>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">To'lov</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- SMS yuborish +++ -->
    <div class="modal fade" id="sendMessege" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">SMS yuborish</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('AdminUserSendMessege') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $Users['id'] }}">
                        <label for="text">SMS matni</label>
                        <textarea name="text" class="form-control mb-3" required></textarea>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">SMS yuborish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Eslatma qilish -->
    <div class="modal fade" id="eslatmaQoldirish" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eslatma qoldirish</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary w-100">Yangilash</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Guruhga qo'shish +++ -->
    <div class="modal fade" id="guruhPlusUser" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Guruhga qo'shish</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('AdminUserGuruhPlus') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $Users['id'] }}">
                        <label for="" class="mb-1">Guruhni tanlang</label>
                        <select name="guruh_id" class="form-select" required>
                            <option value="">Tanlang</option>
                            @foreach($Guruhs as $item)
                            <option value="{{ $item['guruh_id'] }}">{{ $item['guruh_name']." (".$item['techer']." )" }}</option>
                            @endforeach
                        </select>
                        <label for="commit_start" class="mb-1 mt-3">Guruhga qo'shish uchun izoh</label>
                        <input type="text" name="commit_start" class="form-control mb-3" required>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- User Edet +++ -->
    <div class="modal fade" id="userEdit" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Talabani taxrirlash</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('AdminUserUpdate') }}" method="post">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{ $Users['id'] }}">
                        <label for="name" class="mb-1">Talaba FIO</label>
                        <input type="text" name="name" class="form-control"  value="{{ $Users['name'] }}" required>
                        <label for="phone" class="mt-2 mb-1">Telefon raqam</label>
                        <input type="text" name="phone" class="form-control phone"  value="{{ $Users['phone'] }}" required>
                        <label for="phone2" class="mt-2 mb-1">Tanish telefon raqami</label>
                        <input type="text" name="phone2" class="form-control phone"  value="{{ $Users['phone2'] }}" required>
                        <label for="addres" class="mt-2 mb-1">Yashash manzili</label>
                        <select name="addres" class="form-select">
                            <option value="">Tanlang</option>
                            <option value="Qarshi shaxar">Qarshi shaxar</option>
                            <option value="Qarshi tuman">Qarshi tuman</option>
                            <option value="Shaxrisabz shaxar">Shaxrisabz shaxar</option>
                            <option value="Shaxrisabz tuman">Shaxrisabz tuman</option>
                            <option value="Guzor tuman">Guzor tuman</option>
                            <option value="Nishon tuman">Nishon tuman</option>
                            <option value="Koson tuman">Koson tuman</option>
                            <option value="Kasbi tuman">Kasbi tuman</option>
                            <option value="Muborak tuman">Muborak tuman</option>
                            <option value="Mirishkor tuman">Mirishkor tuman</option>
                            <option value="Yakkabog' tuman">Yakkabog' tuman</option>
                            <option value="Qamashi tuman">Qamashi tuman</option>
                            <option value="Chiroqchi tuman">Chiroqchi tuman</option>
                            <option value="Ko'kdala tuman">Ko'kdala tuman</option>
                            <option value="Kitob tuman">Kitob tuman</option>
                            <option value="Dexqonobod tuman">Dexqonobod tuman</option>
                            <option value="Boshqa tuman">Boshqa</option>
                        </select>
                        <label for="tkun" class="mt-2 mb-1">Tug'ilgan kuni</label>
                        <input type="date" name="tkun" class="form-control"  value="{{ $Users['tkun'] }}" required>
                        <label for="about" class="mt-2 mb-1">Talaba haqida</label>
                        <input type="text" name="about" class="form-control mb-3"  value="{{ $Users['about'] }}" required>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Yangilash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Parolni yangilash +++ -->
    <div class="modal fade" id="resetPassword" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Paroni yangilash</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('AdminUserPasswordUpdate') }}" method="post">
                        @csrf 
                        <input type="hidden" name="id" value="{{ $Users['id'] }}">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Yangilash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- To'lovni qaytarish -->
    <div class="modal fade" id="parRepetUsr" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">To'lovni qaytarish</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary w-100">Yangilash</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chegirma kiritish -->
    <div class="modal fade" id="chegirmaPlus" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chegirma kiritish</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Bekor qilish</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary w-100">Yangilash</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body pt-3">
            <ul class="nav nav-tabs d-flex row" id="myTabjustified" role="tablist">
                <li class="nav-item flex-fill col-lg-3 col-6" role="presentation">
                    <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#Talaba_Tarixi" 
                    type="button" role="tab" aria-controls="history" aria-selected="true"><i class="bi bi-clock-history"></i> Talaba tarixi</button>
                </li>
                <li class="nav-item flex-fill col-lg-3 col-6" role="presentation">
                    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Talaba_guruhlari" 
                    type="button" role="tab" aria-controls="guruhlar" aria-selected="false"><i class="bi bi-people"></i> Talaba guruhlari</button>
                </li>
                <li class="nav-item flex-fill col-lg-3 col-6" role="presentation">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Talaba_eslatma" 
                    type="button" role="tab" aria-controls="eslatma" aria-selected="false"><i class="bi bi-messenger"></i> Eslatma</button>
                </li>
                <li class="nav-item flex-fill col-lg-3 col-6" role="presentation">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Talaba_Tulovlari" 
                    type="button" role="tab" aria-controls="tulovlar" aria-selected="false"><i class="bi bi-cash-stack"></i> Talaba to'lovlari</button>
                </li>
            </ul>
            <div class="tab-content pt-2" id="myTabjustifiedContent">
                <hr class="p-0 m-0">
                <div class="tab-pane fade show active" id="Talaba_Tarixi" role="tabpanel" aria-labelledby="history-tab">
                    <h5 class="card-title w-100 pt-1 p-0 text-center">Talaba tarixi</h5>
                    <div class="table-responsive" style="font-size:12px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Guruh</th>
                                    <th>Summa</th>
                                    <th>To'lov turi</th>
                                    <th>Hisoblash</th>
                                    <th>Balans</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($userHistory as $item)
                                    @if($item->status=='Markazga tashrif')
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>_</td>
                                        <td>_</td>
                                        <td>_</td>
                                        <td>_</td>
                                        <td>{{ $item['balans'] }}</td>
                                    </tr> 
                                    @elseif($item->status=="Guruhdan o'chirildi")
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['type'] }}</td>
                                        <td>{{ $item['summa'] }}</td>
                                        <td>Balansga qaytarildi.</td>
                                        <td>{{ $item['xisoblash'] }}</td>
                                        <td>{{ $item['balans'] }}</td>
                                    </tr> 
                                    @elseif($item->status=="Jarima")
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['type'] }}</td>
                                        <td>{{ $item['summa'] }}</td>
                                        <td>Guruhdagi darslari uchun jarima.</td>
                                        <td>{{ $item['xisoblash'] }}</td>
                                        <td>{{ $item['balans'] }}</td>
                                    </tr> 
                                    @elseif($item->status=="Chegirma")
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['type'] }}</td>
                                        <td>{{ $item['summa'] }}</td>
                                        <td>To'liq to'lov uchun chegirma.</td>
                                        <td>{{ $item['xisoblash'] }}</td>
                                        <td>{{ $item['balans'] }}</td>
                                    </tr> 
                                    @elseif($item->status=="Tulov Naqt")
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['type'] }}</td>
                                        <td>{{ $item['summa'] }}</td>
                                        <td>Naqt To'lov.</td>
                                        <td>{{ $item['xisoblash'] }}</td>
                                        <td>{{ $item['balans'] }}</td>
                                    </tr> 
                                    @elseif($item->status=="Tulov Plastik")
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['type'] }}</td>
                                        <td>{{ $item['summa'] }}</td>
                                        <td>Plastik To'lov.</td>
                                        <td>{{ $item['xisoblash'] }}</td>
                                        <td>{{ $item['balans'] }}</td>
                                    </tr> 
                                    @else
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['type'] }}</td>
                                        <td>{{ $item['summa'] }}</td>
                                        <td>Balansidan yichildi</td>
                                        <td>{{ $item['xisoblash'] }}</td>
                                        <td>{{ $item['balans'] }}</td>
                                    </tr> 
                                    @endif
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show" id="Talaba_guruhlari" role="tabpanel" aria-labelledby="guruhlar-tab">
                    <h5 class="card-title w-100 p-0 pt-1 text-center">Talaba Guruhlari</h5>
                    <div class="table-responsive" style="font-size:12px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Guruh</th>
                                    <th>Guruhga qo'shildi</th>
                                    <th>Meneger</th>
                                    <th>Qoshish haqida</th>
                                    <th>Guruhdan o'chirildi</th>
                                    <th>Meneger</th>
                                    <th>O'chirish haqida</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($userArxivGuruh as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                    <td><a href="{{ route('AdminGuruhShow',$item['guruh_id'] ) }}">{{ $item['guruh_name'] }}</a></td>
                                    <td>{{ $item['guruh_start'] }}</td>
                                    <td>{{ $item['admin_id_start'] }}</td>
                                    <td>{{ $item['commit_start'] }}</td>
                                    <td>{{ $item['updated_at'] }}</td>
                                    <td>{{ $item['admin_id_end'] }}</td>
                                    <td>{{ $item['commit_end'] }}</td>
                                    <td class="text-center">
                                        @if($item['status']=='false')
                                            <p class="bg-danger p-1 m-0 text-white">O'chirildi</p>
                                        @else
                                            <p class="bg-success p-1 m-0 text-white">Faol</p>
                                        @endif
                                    </td>
                                </tr> 
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show" id="Talaba_eslatma" role="tabpanel" aria-labelledby="eslatma-tab">
                    <h5 class="card-title w-100 p-0 pt-1 text-center">Talaba haqida eslatma</h5>
                    <div class="table-responsive" style="font-size:12px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FIO</th>
                                    <th>Manzil</th>
                                    <th>Telefon raqam</th>
                                    <th>Guruhlar</th>
                                    <th>Ro'yhatdan o'tdi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Bo'sh</td>
                                    <td>Bo'sh</td>
                                    <td>Bo'sh</td>
                                    <td>Bo'sh</td>
                                    <td>Bo'sh</td>
                                    <td>Bo'sh</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show" id="Talaba_Tulovlari" role="tabpanel" aria-labelledby="tulovlar-tab">
                    <h5 class="card-title w-100 p-0 pt-1 text-center">Talaba to'lovlari</h5>
                    <div class="table-responsive" style="font-size:12px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>To'lov summasi</th>
                                    <th>To'lov turi</th>
                                    <th>To'lov haqida</th>
                                    <th>To'lov vaqti</th>
                                    <th>Meneger</th>
                                    @if(Auth::user()->type!='Operator')
                                    <th>Status</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($Tulovlar as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                    <td>{{ $item['summa'] }}</td>
                                    <td>{{ $item['type'] }}</td>
                                    <td>{{ $item['about'] }}</td>
                                    <td>{{ $item['created_at'] }}</td>
                                    <td>{{ $item['admin'] }}</td>
                                    @if(Auth::user()->type!='Operator')
                                    <td class="text-center">
                                        <a href="{{ route('AdminUserTulovDelete',$item['id']) }}" class="btn btn-danger py-0 px-1">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                    @endif
                                </tr> 
                                @empty
                                @if(Auth::user()->type!='Operator')
                                <tr>
                                    <td colspan=7 class="text-center">To'lovlar mavjud emas.</td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan=6 class="text-center">To'lovlar mavjud emas.</td>
                                </tr>
                                @endif
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection