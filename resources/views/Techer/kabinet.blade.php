@extends('Techer.layout.home')
@section('title','Kabinet')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Kabinet</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('Techer')}}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item active">Kabinet</li>
                </ol>
            </nav>
        </div>
    
        <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title w-100 text-center">Elshod Musurmonov</h4>
                        <form action="" method="post">
                            <div class="row ">
                                <div class="col-lg-6">
                                    <label for="">FIO</label>
                                    <input type="text" class="form-control mb-2" required>
                                    <label for="">Manzil</label>
                                    <input type="text" class="form-control mb-2" required>
                                    <label for="">Telefon raqma</label>
                                    <input type="text" class="form-control mb-2" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Login</label>
                                    <input type="text" class="form-control mb-2" disabled required>
                                    <label for="">Tug'ilgan kun</label>
                                    <input type="text" class="form-control mb-2" disabled required>
                                    <label for="">Ishga olindi</label>
                                    <input type="text" class="form-control mb-2" disabled required>
                                </div>
                                <div class="col-12 text-center"><button class="btn btn-primary w-50 mt-2">O'zgarishlarni saqlash</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title w-100 text-center">Parolni Yangilash</h4>
                        <form action="" method="post">
                            <label for="">Joriy parol</label>
                            <input type="password" class="form-control mb-2" required>
                            <label for="">Yangi parol</label>
                            <input type="password" class="form-control mb-2" required>
                            <label for="">Parolni takrorlang</label>
                            <input type="password" class="form-control mb-2" required>
                            <button class="btn btn-primary w-100 mt-2">Parolni yangilash</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
                
    </section>

    </main>

@endsection