@extends('layouts.ternakmart.app')

@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link href="{{ asset('css/ternakmart/detail-transaksi.css') }}" rel="stylesheet">
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
                    <li class="breadcrumb-item"><a href="{{ route('ternakmart.transaksi') }}">Transaksi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail transaksi</li>
                </ol>
            </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Detail Transaksi</h3>
            </div>
        </div>


        <!-- Daftar Transaksi -->
        <div class="row">
            <div class="col-sm-12">
                <div class="transaksi-outline">
                    <div class="transaksi">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>{{ $transaksi['tanggal_transaksi'] }}</p>
                                <h5>{{ $transaksi['no_invoice'] }}</h>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div id="container-timeline">
                                    @php
                                        $blue=1;
                                        $white=4;
                                        if($transaksi['delivery_status'] == 'delivered'){
                                            $blue=5;
                                            $white=0;
                                        }else if($transaksi['delivery_status'] == 'on_delivery'){
                                            $blue=4;
                                            $white=1;
                                        }else if($transaksi['delivery_status'] == 'prepared'){
                                            $blue=3;
                                            $white=2;
                                        }else if($transaksi['delivery_status'] == 'not_proccess'){
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
                                <p>{{ $transaksi['status_text'] }}</p>
                                <p class="yellow-text" style="cursor:pointer;" data-toggle="modal" data-target="#modaltimeline">Status pengiriman</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Daftar Transaksi -->

        <!-- Detail Pembayaran -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <h4>Detail Pembayaran</h4>
                    <hr>
                        @foreach($transaksi['order_detail'] as $detail)
                        <div class="row produk">
                            <div class="col-md-7">
                                <b>{{ $detail['produk'] }}</b>
                            </div>
                            <div class="col-md-2 text-right">
                                <b>{{$detail['qty']}}</b>
                            </div>
                            <div class="col-md-3 text-right">
                                <b>Rp.{{$detail['harga']}}</b>
                            </div>
                        </div>
                        @endforeach
                        <div class="row produk">
                            <div class="col-md-7">
                                <b>Biaya Pengiriman</b>
                            </div>
                            <div class="col-md-2 text-right">
                                <b></b>
                            </div>
                            <div class="col-md-3 text-right">
                                <b>Rp. {{$transaksi['ongkos_kirim']}}</b>
                            </div>
                        </div>
                    <hr>
                    <div class="row produk-total">
                        <div class="col-md-9">
                            <b class="blue-text">Total</b>
                        </div>
                        <div class="col-md-3 text-right">
                            <b class="blue-text">Rp. {{$transaksi['grand_total']}}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail Pembayaran -->

        <!-- Alamat -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="media">
                        <img style="width:150px;height:150px;" src="{{ url('img/marketplace/maps.png') }}" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Dikirim ke</h5>
                            <p class="alamat">{{$transaksi['alamat_label']}}</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- End Alamat -->

        <!-- Pesan untuk orang lain -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="row">
                        <div class="col-sm-10">
                        <h4>Memesan untuk orang lain</h4>
                        </div>
                        <div class="col-sm-2 text-right" >
                            <i class="fas fa-arrow-down show-hide-icon" onclick="showform()"></i>
                        </div>
                    </div>
                    <p class="red-text">Diisi saat penerima orang lain</p>
                    <form style="" class="form-penerima hilang">
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <label for="inputName" class=" col-form-label">{{$transaksi['name']}}</label>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <label for="inputEmail" class="col-form-label">{{$transaksi['email']}}</label>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Pesan untuk orang lain -->

        <!-- Jadwal Pengiriman -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <h4>Tanggal pengiriman</h4>
                    <div class="row">
                        <div class="col-sm-1">
                            <img src="{{ url('img/marketplace/time-icon.png') }}" alt="">
                        </div>
                        <div class="col-sm-10">
                            <h5>{{$transaksi['delivery_date']}}</h5>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <!-- End Jadwal Pengiriman -->

        <!-- Metode Pembayaran -->
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <h4>Metode pembayaran</h4>
                    <div class="row">
                        <div class="col-sm-1">
                            <img src="{{ url('img/marketplace/cod.png') }}" alt="">
                        </div>
                        <div class="col-md-10">
                            <p class="metode-byr">{{$transaksi['metode_bayar_text']}}</p>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Metode Pembayaran -->

        <!-- Button -->
        <div class="row padding-bottom">
            <div class="col-sm-12 text-center">
                <h4>Klik tombol untuk dapatkan poin</h4>
                <button class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#modalsukses">Sudah diterima</button>
            </div>
        </div>
        <!-- End Button -->

        <!-- Modal timeline -->
        <div class="modal fade" id="modaltimeline" tabindex="-1" role="dialog" aria-labelledby="modalsuksesLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header d-block">
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="row judul">
                            <div class="col-sm-4 offset-sm-2">
                                Tanggal
                            </div>
                            <div class="col-sm-6 text-left">Status Pengiriman</div>
                        </div>
                        <div class="row timeline-jadwal">
                            <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            23 Oktober 2019
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            Shipment paymant gateway
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            23 Oktober 2019
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            Shipment paymant gateway
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            23 Oktober 2019
                                        </div>
                                        <div class="col-sm-7 text-left">
                                            Shipment paymant gateway
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer d-block text-center">
                        <div class="col-sm-8 offset-sm-2">
                            <button type="button" class="btn btn-block yellow-button"  data-toggle="modal" data-target="#modalulasan" data-dismiss="modal">Beri Ulasan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal timelines -->


        <!-- Modal sukses -->
        <div class="modal fade" id="modalsukses" tabindex="-1" role="dialog" aria-labelledby="modalsuksesLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header d-block">
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <h5>Terimakasih Telah Belanja di Ternakmart</h5>
                        <h5 class="yellow-text">Kamu dapat 500 coin</h5>
                        <img class="w-100" src="{{ url('img/marketplace/get_coin.png') }}" alt="">
                        <p>Yuk Ceritakan Pengalamanmu</p>
                    </div>
                    <div class="modal-footer d-block text-center">
                        <div class="col-sm-8 offset-sm-2">
                            <button type="button" class="btn btn-block yellow-button"  data-toggle="modal" data-target="#modalulasan" data-dismiss="modal">Beri Ulasan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal sukses -->

        <!-- Modal ulasan -->
        <div class="modal fade" id="modalulasan" tabindex="-1" role="dialog" aria-labelledby="modalulasanLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header d-block">
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <h5>Beri Bintang</h5>
                        <p>Ceritakan Pada yang lain apa yang anda pikirkan</p>
                        <p>
                            <i class="fas fas fa-star"></i>
                            <i class="fas fas fa-star"></i>
                            <i class="fas fas fa-star"></i>
                            <i class="fas fas fa-star"></i>
                            <i class="fas fas fa-star"></i>
                        </p>
                        <form action="">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Jelaskan pengalaman anda"></textarea>
                        </form>
                    </div>
                    <div class="modal-footer d-block text-center">
                        <div class="col-sm-8 offset-sm-2">
                            <button type="button" class="btn btn-block yellow-button" data-dismiss="modal">Beri Ulasan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal ulasan -->

        





    </div>
@endsection

@section('script')
<script type="text/javascript" src="{{ url('js/ternakmart/detail-transaksi.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY3pxEXVMMycamj5ImFQW2D2yhfZ2eR3A&callback=initialize" async defer></script>
@endsection