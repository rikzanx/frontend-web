@extends('layouts.ternakmart.app')  

@section('style')
    <title>Transaksi</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link href="{{ asset('css/ternakmart/transaksi.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="container navbar-padding">
        <div class="row">
            <div class="col-md-12">
            <nav aria-label="breadcrumb trans-bg">
                <ol class="breadcrumb trans-bg">
                    <li class="breadcrumb-item"><a href="{{ route('ternakmart.produk') }}">Ternakmart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                </ol>
            </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Transaksi</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="menu-transaksi">
                    <button class="btn yellow-button">Semua Terkini</button>
                    <button class="btn btn-secondary">Ternakmart</button>
                    <button class="btn btn-secondary">TernakInvest</button>
                    <button class="btn btn-secondary">SmartQurban</button>
                </div>
            </div>
        </div>
        @if(count($transaksi)>0)
        @foreach($transaksi as $trans)
        <!-- Daftar Transaksi -->
        <div class="row">
            <div class="col-sm-12">
                <div class="transaksi-outline" onclick="location.href='{{ url("/ternakmart/transaksi/".$trans['id']) }}';">
                    <div class="transaksi">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>{{$trans['tanggal_transaksi']}}</p>
                                <h5>{{$trans['no_invoice']}}</h>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div id="container-timeline">
                                    @php
                                        $blue=1;
                                        $white=4;
                                        if($trans['delivery_status'] == 'delivered'){
                                            $blue=5;
                                            $white=0;
                                        }else if($trans['delivery_status'] == 'on_delivery'){
                                            $blue=4;
                                            $white=1;
                                        }else if($trans['delivery_status'] == 'prepared'){
                                            $blue=3;
                                            $white=2;
                                        }else if($trans['delivery_status'] == 'on_process'){
                                            $blue=2;    
                                            $white=3;
                                        }else{
                                            $blue=1;
                                            $white=4;
                                        }
                                    @endphp
                                    <div class="box-timeline 
                                    @if(1<=$blue)
                                    active-timeline
                                    @endif
                                    ">
                                        <img class="img-timeline" src="{{ url('img/marketplace/status-1.png') }}" alt="">
                                    </div>
                                    <div class="box-timeline
                                    @if(2<=$blue)
                                    active-timeline
                                    @endif
                                    ">
                                        <img class="img-timeline" src="{{ url('img/marketplace/status-2.png') }}" alt="">
                                    </div>
                                    <div class="box-timeline
                                    @if(3<=$blue)
                                    active-timeline
                                    @endif
                                    ">
                                        <img class="img-timeline" src="{{ url('img/marketplace/status-3.png') }}" alt="">
                                    </div>
                                    <div class="box-timeline
                                    @if(4<=$blue)
                                    active-timeline
                                    @endif
                                    ">
                                        <img class="img-timeline" src="{{ url('img/marketplace/status-4.png') }}" alt="">
                                    </div>
                                    <div class="box-timeline
                                    @if(5<=$blue)
                                    active-timeline
                                    @endif
                                    ">
                                        <img class="img-timeline" src="{{ url('img/marketplace/status-5.png') }}" alt="">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <p>{{$trans['delivery_status_text']}}</p>
                                <p class="status-pengiriman yellow-text">Status pengiriman</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Daftar Transaksi -->
        @endforeach
        @else
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>Belum ada Transaksi</h3>
            </div>
        </div>
        @endif



    </div>
@endsection

@section('script')
<script type="text/javascript" src="{{ url('js/ternakmart/transaksi.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
@endsection