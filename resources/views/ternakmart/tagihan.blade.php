@extends('layouts.ternakmart.app')

@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link href="{{ asset('css/ternakmart/tagihan.css') }}" rel="stylesheet">
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
                <h3>Tagihan Pesanan</h3>
            </div>
        </div>

        <!-- Detail Pembayaran -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <p>Batas Waktu</p>
                            <h4 class="blue-text">{{ $batas_pembayaran }}</h4>
                            <p>Jumlah Tagihan</p>
                            <h4 class="blue-text">Rp. {{ $grand_total }}</h4>
                            <p>Pembelianmu tercatat dengan nomor pembayaran</p>
                            <p>{{$no_invoice}}1 <a href="{{ url('ternakmart/transaksi') }}/{{$order_id}}" class="yellow-text">Detail</a></p>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
        <!-- Detail Pembayaran -->
        @if($pembayaran==null)
        <!-- Konfirmasi pembayaran -->
        <div class="row">
            <div class="col-sm-12">
                <div class="box text-center">
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <img src="https://api.ternaknesia.com/{{ $data_bank['logo'] }}" width="200px">
                            <h6>Nomor Rekening {{ $data_bank['name'] }}</h6>
                            <h5>{{ $data_bank['nomor_rekening'] }}</h5>
                            <p><a href="" class="yellow-text">Salin nomer</a></p>
                            <p class="text-left">Cara Pembayaran</p>

                            <div class="box-pembayaran text-left">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4>{{ $data_bank['name'] }} Online</h4>
                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <i class="fas fa-arrow-down icon-show" onclick="showtext()"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ol class="bca-text">
                                            <li>Buka Aplikasi {{ $data_bank['name'] }} Online dan masukkan PIN.</li>
                                            <li>Dimenu Utama, pilih ternaknesia</li>
                                            <li>Masukkan Kode Pembayaran dan Jumlah Tagihan lalu tekan kirim</li>
                                            <li>Cek Jumlah tagihan, masukkan PIN, lalu tunggu notifikasi</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <p class="text-left bukti-text">Bukti Pembayaran</p>
                            <div class="foto-upload" style="background-image:url('{{url("img/marketplace/bukti-tf.png") }}');">
                            </div>
                            <form  method="POST" enctype="multipart/form-data" id="form-confirm">
                                {{ csrf_field() }}
                                <input type="hidden" name="company_id" value="3">
                                <input type="hidden" name="order_id" value="{{$order_id}}">
                                <input type="hidden" name="payment_bank_id" value="{{$data_bank['id'] }}">
                                <input type="hidden" name="jumlah" value="{{$grand_total }}">
                                <input id="input-image" name="proof" type='file' onchange="readURL(this);" />
                                <a class="btn red-button btn-block btn-upload-img white-text"><i class="fas fa-camera"></i>Upload Bukti Pembayaran</a>
                            <p class="text-upload red-text">Jika dalam batas waktu tidak upload bukti pembayaran maka pesanan dianggap batal</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 offset-sm-2">
                            <button class="btn btn-secondary btn-block btn-lg">Lihat Transaksi</button>
                        </div>
                        <div class="col-sm-4">
                            <a class="btn btn-primary btn-block btn-lg white-text" onclick="send()" >Konfirmasi Pembayaran</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Konfirmasi pembayaran -->
        @else
        <!-- Konfirmasi pembayaran -->
        <div class="row">
            <div class="col-sm-12">
                <div class="box text-center">
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <img src="https://api.ternaknesia.com/{{ $data_bank['logo'] }}" width="200px">
                            <h6>Nomor Rekening {{ $data_bank['name'] }}</h6>
                            <h5>{{ $data_bank['nomor_rekening'] }}</h5>
                            <p><a href="" class="yellow-text">Salin nomer</a></p>
                            <p class="text-left">Cara Pembayaran</p>

                            <div class="box-pembayaran text-left">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h4>{{ $data_bank['name'] }} Online</h4>
                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <i class="fas fa-arrow-down icon-show" onclick="showtext()"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ol class="bca-text">
                                            <li>Buka Aplikasi {{ $data_bank['name'] }} Online dan masukkan PIN.</li>
                                            <li>Dimenu Utama, pilih ternaknesia</li>
                                            <li>Masukkan Kode Pembayaran dan Jumlah Tagihan lalu tekan kirim</li>
                                            <li>Cek Jumlah tagihan, masukkan PIN, lalu tunggu notifikasi</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <p class="text-left bukti-text">Bukti Pembayaran</p>
                            <div class="foto-upload" style="background-image:url('https://api.ternaknesia.com/{{$pembayaran['bukti']}}');display:block;">
                            </div>
                            <p class="text-upload red-text">Anda sudah mengirim bukti transfer</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <a class="btn btn-secondary btn-block btn-lg" href="{{ route('ternakmart.transaksi') }}">Lihat Transaksi</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Konfirmasi pembayaran -->
        @endif
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
                        <h5>Pembayaran Telah Dikonfirmasi</h5>
                        <img class="w-100" src="{{ url('img/marketplace/tagihan_konfirmasi.png') }}" alt="">
                        <p>Status pembayaranmu akan kami proses</p>
                    </div>
                    <div class="modal-footer d-block text-center">
                        <div class="col-sm-10 offset-sm-1">
                            <a type="button" class="btn btn-block yellow-button" href="{{ route('ternakmart.transaksi') }}">Lihat status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal sukses -->

        





    </div>
@endsection

@section('script')
<script type="text/javascript" src="{{ url('js/ternakmart/tagihan.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
});

function send(){
    var form = document.getElementById('form-confirm');
    $.ajax({
            url: "/ternakmart/tagihan/confirm",
            method: "POST",
            data: new FormData(form),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                console.log(data);
                if(data['status'] == 'ok'){
                    $('#modalsukses').modal('show');
                }
            }
        });
}
</script>
@endsection