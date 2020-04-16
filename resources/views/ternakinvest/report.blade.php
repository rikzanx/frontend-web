@extends('layouts.ternakinvest.page')
@push('after_styles')
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/input-counter.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/report.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
@endpush

@section('content')
{{ Form::open(['route' => "ternakinvest.postPayment", 'files' => true]) }}
<div class="container-breadcrumb">
    <div class="col-md-12">
        <ol class="cd-breadcrumb custom-separator">
            <li><a href="{{ route('ternakinvest.index') }}">Beranda</a></li>
            <li><a href="{{ route('ternakinvest.index') }}">Portofolio</a></li>
            <li class="current"><em>Laporan Bulan Desember</em></li>
        </ol>
    </div>
</div>
<div class="col-md-12 section-top">
    <div class="container-detail-data">
        <div class="col-md-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('img/invest/IMG_1656.png') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/invest/IMG_1656.png') }}" alt="First slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="container-detail-date">
                <h4 class="color-ternakinvest font-bold">Laporan Bulan Desember</h4>
                <p class="font-bold">di terbitkan  20 januari 2020</p>
            </div>
        </div>
    </div>
</div>
<div class="container-detail-invest">
    
</div>
<div class="col-md-12 section-top">
    <div class="container-data">
        <div class="container-detail-data">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#about" role="tab" aria-controls="pills-home" aria-selected="true">
                        Aktivitas Proyek
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#timeline" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Keuangan Proyek
                    </a>
                </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="pills-home-tab">
                        <p>
                            Pada Qurban 1441 H kali ini Ternaknesia menggunakan skema baru dalam memenuhi permintaan pasar sekaligus melakukan pemberdayaan terhadap para peternak kecil. Skema kali ini adalah menggunakan pola kemitraan inti plasma, dimana Ternaknesia memberikan modal berupa bakalan ternak kepada peternak untuk dilakukan penggemukan selama 4-6 bulan. Hasil penggemukan tersebut akan diambil kembali oleh Ternaknesia. Selain itu Ternaknesia juga memberikan fasilitas pasokan pakan selama penggemukan. Diharapkan melalui pola kemitraan inti plasma ini Ternaknesia dapat memenuhi permintaan pasar yang terus meningkat serta membantu banyak peternak kecil di beberapa daerah untuk kepastian pasarnya. Proyek Qurban Ternaknesia 2020 merupakan proyek dengan aktivitas utama adalah skema kemitraan inti plasma, program penggemukan reguler, serta penjualan Qurban.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="container-detail-report">
                            <div class="col-md-12">
                                <div class="row container-price">
                                    <div class="col-md-6">
                                        <h4>Saldo Awal</h4>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h4>Rp. 1.000.000</h4>
                                    </div>
                                </div>
                                <div class="container-price">
                                    <div class="line"></div>
                                </div>
                                <div class="row container-price">
                                    <div class="col-md-6 text">
                                        <h4 class="color-ternakinvest-title">Pemasukan</h4>
                                    </div>
                                </div>
                                <table class="detail-payment">
                                    <tr>
                                        <td class="left"><h5>Penjualan 50.000kg</h5></td>
                                        <td class="right"><h5>Rp 10.000</h5></td>
                                    </tr>
                                </table>
                                <div class="container-price">
                                    <div class="line"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text">
                                        <h4 class="color-ternakinveest-other">Pengeluaran</h4>
                                    </div>
                                </div>
                                <table class="detail-payment">
                                    <tr>
                                        <td class="left">Penjualan 50.000kg</td>
                                        <td class="right">Rp 10.000</td>
                                    </tr>
                                    <tr>
                                        <td class="left">Penjualan 50.000kg</td>
                                        <td class="right">Rp 10.000</td>
                                    </tr>
                                </table>
                                <div class="container-price">
                                    <div class="line"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 text">
                                        <h4>Saldo Akhir</h4>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h4>Rp. 1.000.000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</div>
</form>
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/assets/ternakmart/bg.png') }}" width="100%">
            </div>
        </div>
    </div>
</div>
@push('after_scripts')
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
@endpush
@endsection
