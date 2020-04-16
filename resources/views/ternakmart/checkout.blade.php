@extends('layouts.ternakmart.app')

@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link href="{{ asset('css/ternakmart/checkout.css') }}" rel="stylesheet">
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
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
            </div>
        </div>
        <!-- Alamat -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="media">
                        <img style="width:150px;height:150px;" src="{{ url('img/marketplace/maps.png') }}" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Dikirim ke</h5>
                            <p class="alamat">{{ $location['alamat_lengkap'] }}</p>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary btn-block" onclick="showform_down()">Catatan tambahan mengenai pengiriman anda</button>
                    <form id="alamat" style="display:none;">
                            <input type="hidden" name="lat" value="{{ $location['lat'] }}">
                            <input type="hidden" name="lng" value="{{ $location['lng'] }}">
                            <input type="hidden" name="provinsi_id" value="{{ $location['provinsi_id'] }}">
                            <input type="hidden" name="kota_id" value="{{ $location['kota_id'] }}">
                            <input type="hidden" name="kecamatan_id" value="{{ $location['kecamatan_id'] }}">
                            <input type="hidden" name="desa_id" value="{{ $location['desa_id'] }}">
                            <input type="hidden" name="alamat_kirim" value="{{ $location['alamat_kirim'] }}">
                            <input type="hidden" name="alamat_lengkap" value="{{ $location['alamat_lengkap'] }}">
                            <input type="hidden" name="kode_pos" value="{{ $location['kode_pos'] }}">
                    </form>
                </div>
            </div> 
        </div>
        <!-- End Alamat -->

        <!-- Detail Pembayaran -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <h4>Detail Pembayaran</h4>
                    <hr>
                    @if(!empty($product))
                        @foreach($product as $p)
                            <div class="row produk">
                                <div class="col-7 col-sm-7">
                                    <b>{{ $p['name'] }}</b>
                                    <p>
                                        <a href="{{ url()->previous() }}">
                                            <b class="yellow-text">Ubah</b>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-2 col-sm-2 text-right">
                                    <b>{{$p['jumlah']}}</b>
                                </div>
                                <div class="col-3 col-sm-3 text-right">
                                    <b>Rp.{{$p['harga']}}</b>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="row produk">
                        <div class="col-12 col-md-12 text-center">
                            <b>Tidak ada produk yang dipilih</b>
                        </div>
                    </div>
                    @endif
                    
                    
                    <hr>
                    <div class="row produk-total">
                        <div class="col-9 col-md-9">
                            <b>Total</b>
                        </div>
                        <div class="col-3 col-md-3 text-right">
                            <b>Rp.{{$total_harga}}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail Pembayaran -->

        <!-- Pesan untuk orang lain -->
        <div class="row" id="memesan">
            <div class="col-md-12">
                <div class="box">
                    <div class="row">
                        <div class="col-10 col-sm-10">
                        <h4>Memesan untuk orang lain</h4>
                        </div>
                        <div class="col-2 col-sm-2 text-right" >
                            <i class="fas fa-arrow-down show-hide-icon" onclick="showform()"></i>
                        </div>
                    </div>
                    
                    <p class="red-text">Diisi saat penerima orang lain</p>
                    <form style="" class="form-penerima hilang">
                        <div class="form-group row">
                        <label for="inputName" class="col-2 col-sm-2 col-form-label">Nama</label>
                            <div class="col-10 col-sm-10">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputEmail" class="col-2 col-sm-2 col-form-label">Email</label>
                            <div class="col-10 col-sm-10">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
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
                    <h4>Mau dikirim kapan?</h4>
                    <div class="row">
                        <div class="col-1 col-sm-1">
                            <img src="{{ url('img/marketplace/time-icon.png') }}" alt="">
                        </div>
                        <div class="col-11 col-sm-11">
                            <div class="input-group date">
                                <input type="text" class="form-control" id="datepicker" placeholder="dd-mm-yyyy" value="{{$date}}">
                            </div>
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
                    <h4>Pilih metode pebayaran</h4>
                    <div class="row">
                        <div class="col-1 col-sm-1">
                            <img src="{{ url('img/marketplace/cod.png') }}" alt="">
                        </div>
                        <div class="col-10 col-sm-10">
                            <p class="metode-byr">COD - Cash On Delivery</p>
                            
                        </div>
                        <div class="col-1 col-sm-1 text-right">
                            <p class="change-btn-wrapper">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <b class="yellow-text">Ubah</b>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Metode Pembayaran -->

        <!-- Voucher -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <h4>Voucher</h4>
                    <div class="row">
                    <div class="col-1 col-sm-1">
                    <img src="{{ url('img/marketplace/time-icon.png') }}" alt="">
                        </div>
                        <div class="col-11 col-sm-11">
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-12 voucher">
                                        <input type="text" class="form-control" id="inputPassword" placeholder="Masukkan Voucher">
                                        <button class="btn">Gunakan Voucher</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End Voucher -->

        <!-- Button -->
        <div class="row padding-bottom">
            <div class="col-sm-6 btn-wrapper">
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-block">Kembali</a>
            </div>
            <div class="col-sm-6 btn-wrapper">
                @if(!empty($product))
                    <button class="btn btn-primary btn-block" onclick="order()">Pesan Sekarang</button>
                @else
                    <button class="btn btn-primary btn-block" disabled>Pessan Sekarang</button>
                @endif
            </div>
        </div>
        <!-- End Button -->

        <!-- Modal metode pembayaran -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  " role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="col-12 modal-title text-center" id="exampleModalLabel">Pilih Metode Pembayaran
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </h5>
                </div>
                <div class="modal-body">
                    <form>
                        @foreach($bank['data']['result'] as $b)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode" id="exampleRadios1" value="{{ $b['id'] }}">
                            <input type="hidden" class="nama_bank {{$b['id']}}" value="Transfer ke Rek {{ $b['name'] }}">
                            <input type="hidden" class="metode_byr {{$b['id']}}" value="transfer">
                            <input type="hidden" class="nama_rek {{$b['id']}}" value="{{ $b['nama_rekening'] }}">
                            <input type="hidden" class="no_rek {{$b['id']}}" value="{{ $b['nomor_rekening'] }}">
                            <label class="form-check-label" for="exampleRadios1">
                            <img src="https://api.ternaknesia.com/{{ $b['logo'] }}" width="100px">
                            </label>
                        </div>
                        @endforeach
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode" id="exampleRadios5" value="cod" checked>
                            <input type="hidden" class="nama_bank cod" value="COD - Cash On Delivery">
                            <input type="hidden" class="metode_byr cod" value="cod">
                            <label class="form-check-label" for="exampleRadios5">COD - Cash On Delivery
                            </label>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block" onclick="ubahmetode()" data-dismiss="modal">Simpan</button>
                </div>
                </div>
            </div>
        </div>
        <!-- End Modal metode pembayaran -->

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
                        <h5>Terima Kasih</h5>
                        <h5>Pesananmu telah kami terima</h5>
                        <img class="w-100" src="{{ url('img/marketplace/sukses_checkout.png') }}" alt="">
                        <p>Yuk Selesaikan Pembayaranmu</p>
                    </div>
                    <div class="modal-footer d-block text-center">
                        <div class="col-sm-8 offset-sm-2">
                            <a type="button" class="btn btn-block yellow-button lihat-tagihan" href="{{ route('ternakmart.tagihan') }}">Lihat Tagihan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal sukses -->

    </div>
@endsection

@section('script')
<script type="text/javascript" src="{{ url('js/ternakmart/checkout.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

@endsection