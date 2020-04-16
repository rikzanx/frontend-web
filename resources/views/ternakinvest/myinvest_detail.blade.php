@extends('layouts.ternakinvest.page')
@push('after_styles')
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/input-counter.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/myinvest-detail.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
@endpush

@section('content')
{{ Form::open(['route' => "ternakinvest.postPayment", 'files' => true]) }}
<div class="container-detail-invest">
    <div class="col-md-12">
        <div class="row">
        	<div class="col-md-6 container-content">
        		<div class="description">
        			<div class="row container-body">
                        <div class="col-lg-4">
                            <img src="{{ asset('img/invest/TFI-7187.png') }}" width="150px" height="150px">
                        </div>
                        <div class="col-lg-8">
                            <div class="name">
                                <a>Proyek Domba Blitar</a>
                            </div>
                            <div class="status">
                                <button class="btn btn-detail-invest">
                                    Status : Pendanaan
                                </button>
                            </div>
                            <h6 class="title-small color-ternakinvest-paragraph">Pembelian Anda</h6>
                            <h6 class="title-medium color-ternakinvest">20 Lembar Saham</h6>
                        </div>
                    </div>
        		</div>
        	</div>
            <div class="col-md-6 container-content">
                <div class="description">
                    <div class="row container-body">
                        <div class="col-lg-4">
                            <img src="{{ asset('img/invest/IMG_4205.png') }}" width="150px" height="150px">
                        </div>
                        <div class="col-lg-8">
                            <table>
                                <tr>
                                    <td class="field">Lokasi</td>
                                    <td class="data">Blitar</td>
                                </tr>
                                <tr>
                                    <td class="field">Peternak</td>
                                    <td class="data">Sueb</td>
                                </tr>
                                <tr>
                                    <td class="field">Jenis</td>
                                    <td class="data">Kambing</td>
                                </tr>
                                <tr>
                                    <td class="field">Periode</td>
                                    <td class="data">20 Januari 2020 - 18 April 2021</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <a href="#" class="color-ternakinveest-other">ikhtisar saham</a>
    </div>
</div>
<div class="col-md-12 section-top">
    <div class="container-data">
        <div class="container-detail-data">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#about" role="tab" aria-controls="pills-home" aria-selected="true">
                        Tentang Proyek
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#timeline" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Timeline Investasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#certificate" role="tab" aria-controls="pills-contact" aria-selected="false">
                        Sertifikat
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
                        <div class="timeline">
                            <div class="line text-muted"></div>
                            <article class="panel panel-danger panel-outline">
                                <div class="panel-heading icon">
                                    <embed src="{{ asset('img/invest/info.svg') }}"></embed>
                                </div>
                                <div class="panel-body">
                                    <strong class="color-ternakinvest">Laporan Bulan Pertama</strong> 
                                    <div class="date">
                                        30 Oktober 2020
                                    </div>
                                </div>
                            </article>
                            <article class="panel panel-danger panel-outline">
                                <div class="panel-heading icon">
                                    <embed src="{{ asset('img/invest/reward.svg') }}"></embed>
                                </div>
                                <div class="panel-body">
                                    <strong class="color-ternakinveest-other">Ikhtiar Saham</strong> 
                                    <div class="date">
                                        30 Agustus 2020
                                    </div>
                                </div>
                            </article>
                            <article class="panel panel-danger panel-outline">
                                <div class="panel-heading icon">
                                    <embed src="{{ asset('img/invest/tick.svg') }}"></embed>
                                </div>
                                <div class="panel-body">
                                    <strong>Pembayaran Diterima dan Terverifikasi</strong> 
                                    <div class="date">
                                        28 Agustus 2020
                                    </div>
                                </div>
                            </article>
                            <article class="panel panel-danger panel-outline">
                                <div class="panel-heading icon">
                                    <embed src="{{ asset('img/invest/tick.svg') }}"></embed>
                                </div>
                                <div class="panel-body">
                                    <strong>Konfirmasi Pembayaran</strong> 
                                    <div class="date">
                                        20 Agustus 2020
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="tab-pane fade text-center" id="certificate" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div>
                            <img src="{{ asset('img/assets/ternakmart/bg.png') }}" width="500px" height="300px">
                        </div>
                        <br>
                        <button type="button" class="btn btn-large btn-grey" data-toggle="modal" data-target="#exampleModalCenter">
                            Lihat Sertifikat
                        </button>
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
