@extends('SuperAdmin.layout.home')
@section('title','Statistika')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>Statistika</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('filial')}}">Filiallar</a></li>
            <li class="breadcrumb-item active">Kunlik to'lovlar</li>
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
            <div class="card-body">
                <h5 class="card-title w-100 text-center">Kunlik to'lovlar</h5>
                <table class="table table-bordered text-center" style="font-size:12px;">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Summa</th>
                        <th>Type</th>
                        <th>Tulov haqida</th>
                        <th>Tulov Vaqti</th>
                        <th>Meneger</th>
                    </tr>
                    @forelse($Tulov as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['User'] }}</td>
                            <td>{{ $item['summa'] }}</td>
                            <td>{{ $item['type'] }}</td>
                            <td>{{ $item['about'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                            <td>{{ $item['Admiin'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan=7 class="text-center">Kunlik to'lovlar mavjud emas.</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>

</main>

@endsection