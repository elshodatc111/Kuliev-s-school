@extends('Admin.layout.home')
@section('title','Bosh sahifa')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Bosh sahifa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Bosh sahifa</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                @foreach($Rooms as $key => $value)
                    <h5 class="card-title text-center">Dars jadvali: {{ $value['room_name'] }}</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thaed>
                                <tr>
                                    <th  class="bg-primary text-white">Soat/Hafta</th>
                                    <th  class="bg-primary text-white">08:00</th>
                                    <th  class="bg-primary text-white">09:30</th>
                                    <th  class="bg-primary text-white">11:00</th>
                                    <th  class="bg-primary text-white">12:30</th>
                                    <th  class="bg-primary text-white">14:00</th>
                                    <th  class="bg-primary text-white">15:30</th>
                                    <th  class="bg-primary text-white">17:00</th>
                                    <th  class="bg-primary text-white">18:30</th>
                                    <th  class="bg-primary text-white">20:00</th>
                                </tr>
                            </thaed>
                            <tbody>
                                @foreach ($value['hafta_kun'] as $key => $hafta_kun)
                                    <tr>
                                        @if($key==0)<th style='text-align:left;' class="bg-primary text-white">Dushanba</th>
                                        @elseif($key==1)<th style='text-align:left;' class="bg-primary text-white">Seshanba</th>
                                        @elseif($key==2)<th style='text-align:left;' class="bg-primary text-white">Chorshanba</th>
                                        @elseif($key==3)<th style='text-align:left;' class="bg-primary text-white">Payshanba</th>
                                        @elseif($key==4)<th style='text-align:left;' class="bg-primary text-white">Juma</th>
                                        @elseif($key==5)<th style='text-align:left;' class="bg-primary text-white">Shanba</th>@endif
                                        @foreach ($hafta_kun as $keys => $soat)
                                            @if($soat=='bosh')
                                            <td class="bg-danger text-white">bo'sh</td>
                                            @else
                                            <td class="bg-success text-white" title="{{ $soat['guruh_name'] }}" style="cursor:pointer">
                                                <a href="{{ route('AdminGuruhShow',$soat['guruh_id'] ) }}" class="text-white">Band</a>
                                            </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</main>

@endsection