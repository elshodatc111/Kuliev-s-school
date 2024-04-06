@extends('SuperAdmin.layout.home')
@section('title','Filiallar')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Filiallar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('filial')}}">Filiallar</a></li>
            <li class="breadcrumb-item active">Filial</li>
        </ol>
    </nav>
</div>
@if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error') }}</div>
@endif
<section class="section dashboard">
    <div>
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title mb-0">{{ $Filial->filial_name }}</span></h5>
                <table class="table table-bordered text-center">
                    <tr>
                        <th style="with:33.333333%"><i class="bi bi-cash"></i> Naqt</th>
                        <th style="with:33.333333%"><i class="bi bi-credit-card"></i> Plastik</th>
                        <th style="with:33.333333%"><i class="bi bi-cash-coin"></i> Payme</th>
                    </tr>
                    <tr>
                        <td>150 000</td>
                        <td>150 000</td>
                        <td>150 000</td>
                    </tr>
                </table>

                <div class="row">
                    <div class="col-lg-3 my-lg-0 my-1 col-6">
                        <button class="btn btn-outline-primary w-100"><i class="bi bi-cash-stack"></i> Kassaga qaytarish</button>
                    </div>
                    <div class="col-lg-3 my-lg-0 my-1 col-6">
                        <button class="btn btn-outline-primary w-100"><i class="bi bi-cart4"></i> Xarajatlar</button>
                    </div>
                    <div class="col-lg-3 my-lg-0 my-1 col-6">
                        <button class="btn btn-outline-warning w-100"><i class="bi bi-cash-stack"></i> Chiqimlar tarixi</button>
                    </div>
                    <div class="col-lg-3 my-lg-0 my-1 col-6">
                        <button class="btn btn-outline-warning w-100"><i class="bi bi-cart4"></i> Xarajatlar tarixi</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">Filial xonalari</span></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-striped table-hover" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Filial xonasi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbodt>
                                @forelse($Room as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item->room_name }}</td>
                                    <td>
                                        <a href="{{ route('roomdelete',$item->id) }}" class="btn btn-danger py-0 px-1"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan=3 class="text-center">Xonalar mavjud emas</td>
                                </tr>
                                @endforelse
                            </tbodt>
                        </table>
                    </div>
                    <form action="{{ route('roomcreate') }}" method="post">
                        @csrf 
                        <input type="hidden" name="filial_id" value="{{ $Filial->id }}">
                        <input type="hidden" name="status" value="true">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" name="room_name" placeholder="Xona nomi" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary w-100">Saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title mb-0">To'lov sozlamalari</span></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-striped table-hover" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th>Summa</th>
                                    <th>Chegirma</th>
                                    <th>Admin Chegirma</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbodt>
                                @forelse($TulovSetting as $item)
                                <tr>
                                    <td>{{ $item['tulov_summa'] }}</td>
                                    <td>{{ $item['chegirma'] }}</td>
                                    <td>{{ $item['admin_chegirma'] }}</td>
                                    <td>
                                        <a href="{{ route('tulovSettingDelete',$item['id'] ) }}" class="btn btn-danger py-0 px-1"><i class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan=4>To'lov sozlamalari mavjud emas.</td>
                                </tr>
                                @endforelse
                            </tbodt>
                        </table>
                    </div>
                    <form action="{{ route('tulovSettingCreate') }}" method="post" id="form4">
                        @csrf
                        <input type="hidden" name="filial_id" value="{{ $Filial->id }}">
                        <input type="hidden" name="status" value="true">
                        <div class="row">
                            <div class="col-6 pt-2">
                                <input type="text" name="tulov_summa" id="summa1" class="form-control" placeholder="To'lov summasi" required>
                            </div>
                            <div class="col-6 pt-2">
                                <input type="text" name="chegirma" id="summa2" class="form-control" placeholder="Chegirma" required>
                            </div>
                            <div class="col-6 pt-2">
                                <input type="text" name="admin_chegirma" id="summa3" class="form-control" placeholder="Admin chegirma" required>
                            </div>
                            <div class="col-6 pt-2">
                                <button class="btn btn-primary w-100">Saqlash</button>
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