@extends('Admin.layout.home')
@section('title','Hodimlar')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Hodimlar</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Bosh sahifa</a></li>
            <li class="breadcrumb-item active">Hodimlar</li>
        </ol>
    </nav>
</div>
@if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success') }}</div>
@elseif (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error') }}</div>
@endif
<section class="section dashboard">
    <div class="card info-card sales-card">
        <div class="card-body text-center">
            <h5 class="card-title">Hodimlar</span></h5>
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
                        @forelse($User as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td style="text-align:left">{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if(Auth::user()->type != 'Operator')
                                    <a href="{{ route('adminHodim',$item->id) }}" class="btn btn-primary py-0 px-1"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('adminHodimDelete',$item->id) }}" class="btn btn-danger py-0 px-1"><i class="bi bi-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan=6 class="text-center">Hodimlar mavjud emas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(Auth::user()->type != 'Operator')
    <div class="card info-card sales-card">
      <div class="card-body text-center">
        <h5 class="card-title">Yangi Hodim</span></h5>
        <form action="{{ route('adminCreateHodimlar') }}" method="post">
            @csrf 
            <div class="row">
                <div class="col-lg-6">
                    <label for="name">FIO</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                    <label for="phone" class=" mt-2">Telefon Raqam</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="phone form-control @error('phone') is-invalid @enderror" required>
                    <label for="phone2" class=" mt-2">Ikkinchi Telefon Raqam</label>
                    <input type="text" name="phone2" value="{{ old('phone2') }}" class="phone form-control @error('phone2') is-invalid @enderror" required>
                    <label for="addres" class=" mt-2">Yashash Manzili</label>
                    <input type="text" name="addres" value="{{ old('addres') }}" class="form-control @error('addres') is-invalid @enderror" required>
                </div>
                <div class="col-lg-6">
                    <label for="tkun">Tug'ilgan Kuni</label>
                    <input type="date" name="tkun" value="{{ old('tkun') }}" class="form-control @error('tkun') is-invalid @enderror" required>
                    <label for="email " class=" mt-2">Login</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                    <label for="type" class=" mt-2">Lavozimi</label>
                    <select name="type" class="form-select">
                        <option value="">Tanlang</option>
                        <option value="Operator">Operator</option>
                        @if(Auth::user()->type=='SuperAdmin')
                        <option value="Admin">Admin</option>
                        @endif
                    </select>
                    <label for="about" class=" mt-2">Hodim Haqida</label>
                    <input type="text" name="about" value="{{ old('about') }}" class="form-control @error('about') is-invalid @enderror" required>
                </div>
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary mt-2">Yangi Hodimni Saqlash</button>
                </div>
            </div>
        </form>
      </div>
    </div>  
    @endif
</section>

</main>

@endsection