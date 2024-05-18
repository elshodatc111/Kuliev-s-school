@extends('SuperAdmin.layout.home')
@section('title','Filiallar')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
    <h1>SMS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('SuperAdmin')}}">Bosh sahifa</a></li>
            <li class="breadcrumb-item active">SMS</li>
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
                        <h1 class="card-title w-100 text-center">Barcha talabalarga sms yuborish</h1>
                        <form action="{{ route('smsSendCreate') }}" method="post">
                            @csrf 
                            <input type="hidden" name="status" value="Yuborilmoqda">
                            <input type="hidden" name="admin" value="{{ Auth::user()->name }}">
                            <label for="text">SMS matni</label>
                            <textarea name="text" class="form-control" style="height:115px;" required></textarea>
                            <button class="btn btn-success mt-2" type="submit">Barcha talabalarga yuborish</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card info-card sales-card">
                    <div class="card-body text-center">
                        <h1 class="card-title w-100 text-center">Yuborilgan SMSlar</h1>
                        <table class="table text-center table-bordered">
                            <tr>
                                <th>Mavjud SMSlar</th>
                                <th>Yuborilgan SMSlar</th>
                            </tr>
                            <tr>
                                <td>{{ $SmsCounter['maxsms'] }}</td>
                                <td>{{ $SmsCounter['counte'] }}</td>
                            </tr>
                        </table>
                        <form action="{{ route('smsSendShow')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" name="start" class="form-control" required>
                                </div>
                                <div class="col-6">
                                    <input type="date" name="end" class="form-control" required>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 mt-2">Yuborilgan SMSlar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title w-100 text-center">Yuborilgan smslar tarixi</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Yuboruvchi</th>
                                    <th>SMS matni</th>
                                    <th>SMS xolati</th>
                                    <th>Yuborilgan vaqt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($AllSMS as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                    <td>{{ $item['admin'] }}</td>
                                    <td>{{ $item['text'] }}</td>
                                    <td>{{ $item['status'] }}</td>
                                    <td style="text-align:right">{{ $item['created_at'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main>

@endsection