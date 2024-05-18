@extends('SuperAdmin.layout.home')
@section('title','Yuborilgan smslar')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>SMS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item"><a href="{{ route('smsSend')}}">SMS</a></li>
            <li class="breadcrumb-item active">Yuborilgan smslar</li>
        </ol>
    </nav>
</div>
    <section class="section dashboard">
        <div class="card info-card sales-card">
            <div class="card-body text-center">
                <h1 class="card-title w-100 text-center">Yuborilgan smslar</h1>
                <table class="table table-bordered" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Telefon raqam</th>
                            <th>SMS matni</th>
                            <th>Status</th>
                            <th>Yuborilgan vaqt</th>
                        </tr>
                    </thead>
                    <thead>
                        @foreach($SendMessege as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['phone'] }}</td>
                            <td style="text-align:left">{{ $item['text'] }}</td>
                            <td>{{ $item['status'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                        </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </section>

</main>

@endsection