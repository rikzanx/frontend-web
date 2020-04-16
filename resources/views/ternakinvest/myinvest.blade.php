@extends('layouts.ternakinvest.page')
@push('after_styles')
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/input-counter.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/myinvest.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
@endpush

@section('content')
{{ Form::open(['route' => "ternakinvest.postPayment", 'files' => true]) }}
<div class="col-md-12 section-top">
    <div class="container-data">
        <div class="row">
            <div class="col-lg-6 text-center">
                <div class="container-active-invest">
                    <h6 class="title-medium color-ternakinvest-paragraph">Jumlah Investasi Kamu</h6>
                    <h2 class="title-big color-ternakinvest">Rp. 10.000.000</h2>
                    <p class="title-small color-ternakinvest-paragraph">Di hitung dari proyek yang aktif</p>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="col-lg-12 container-data-total">
                    <p class="title-small color-ternakinvest-paragraph">Total Proyek</p>
                    <h3 class="title-medium color-ternakinvest">4 Proyek</h3>
                </div>
                <div class="col-lg-12">
                    <p class="title-small color-ternakinvest-paragraph">Investasi Aktif</p>
                    <h3 class="title-medium color-ternakinvest">2 Proyek</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-detail-invest">
    <div class="col-md-12">
        <h4 class="title">Proyek Investasiku</h4>
    </div>
	<div class="col-md-12 container-content">
		<div class="description">
			<div class="row container-body">
                <div class="col-lg-2">
                    <img src="{{ asset('img/invest/IMG_4192.png') }}" width="200px" height="200px">
                </div>
                <div class="col-lg-10">
                    <a class="name">Proyek Domba</a>
                    <div class="container-data-roi">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="60%">
                                    <p>ROI</p>
                                </td>
                                <td>
                                    <p class="roi title-big color-ternakinvest font-bold">
                                        10% - 20%
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        Kontrak Berakhir
                                    </p>
                                </td>
                                <td>
                                    <p class="end-contract title-big color-ternakinvest-paragraph font-bold">
                                        20 Des 2020
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row footer">
                <div class="col-lg-6">
                    <h6 class="title-small color-ternakinvest-paragraph">Nilai Investasi</h6>
                    <h3 class="title-medium color-ternakinvest">Rp. 5.000.000</h3>
                    <p class="title-small color-ternakinvest-paragraph">10 Lembar</p>
                </div>
                <div class="col-lg-6 status">
                    <div class="row">
                        <h5 class="title-big color-ternakinvest-paragraph">Status</h5>
                        <button class="btn btn-large btn-detail-invest">
                            Proses Investasi
                        </button>
                    </div>
                </div>
            </div>
		</div>
	</div>
    <div class="col-md-12 container-content">
        <div class="description">
            <div class="row container-body">
                <div class="col-lg-2">
                    <img src="{{ asset('img/invest/IMG_4192.png') }}" width="200px" height="200px">
                </div>
                <div class="col-lg-10">
                    <a class="name" href="{{ route('myinvest.detail') }}">Proyek Domba</a>
                    <div class="container-data-roi">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="60%">
                                    <p>ROI</p>
                                </td>
                                <td>
                                    <p class="roi title-big color-ternakinvest font-bold">
                                        10% - 20%
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        Kontrak Berakhir
                                    </p>
                                </td>
                                <td>
                                    <p class="end-contract title-big color-ternakinvest-paragraph font-bold">
                                        20 Des 2020
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row footer">
                <div class="col-lg-6">
                    <h6 class="title-small color-ternakinvest-paragraph">Nilai Investasi</h6>
                    <h3 class="title-medium color-ternakinvest">Rp. 5.000.000</h3>
                    <p class="title-small color-ternakinvest-paragraph">10 Lembar</p>
                </div>
                <div class="col-lg-6 status">
                    <div class="row">
                        <h5 class="title-big color-ternakinvest-paragraph">Status</h5>
                        <button class="btn btn-large btn-detail-invest">
                            Proses Investasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 container-content">
        <div class="description">
            <div class="row container-body">
                <div class="col-lg-2">
                    <img src="{{ asset('img/invest/IMG_4192.png') }}" width="200px" height="200px">
                </div>
                <div class="col-lg-10">
                    <a class="name">Proyek Domba</a>
                    <div class="container-data-roi">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="60%">
                                    <p>ROI</p>
                                </td>
                                <td>
                                    <p class="roi title-big color-ternakinvest font-bold">
                                        10% - 20%
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        Kontrak Berakhir
                                    </p>
                                </td>
                                <td>
                                    <p class="end-contract title-big color-ternakinvest-paragraph font-bold">
                                        20 Des 2020
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row footer">
                <div class="col-lg-6">
                    <h6 class="title-small color-ternakinvest-paragraph">Nilai Investasi</h6>
                    <h3 class="title-medium color-ternakinvest">Rp. 5.000.000</h3>
                    <p class="title-small color-ternakinvest-paragraph">10 Lembar</p>
                </div>
                <div class="col-lg-6 status">
                    <div class="row">
                        <h5 class="title-big color-ternakinvest-paragraph">Status</h5>
                        <button class="btn btn-large btn-detail-invest">
                            Proses Investasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 container-content">
        <div class="description">
            <div class="row container-body">
                <div class="col-lg-2">
                    <img src="{{ asset('img/invest/IMG_4192.png') }}" width="200px" height="200px">
                </div>
                <div class="col-lg-10">
                    <a class="name">Proyek Domba</a>
                    <div class="container-data-roi">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="60%">
                                    <p>ROI</p>
                                </td>
                                <td>
                                    <p class="roi title-big color-ternakinvest font-bold">
                                        10% - 20%
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        Kontrak Berakhir
                                    </p>
                                </td>
                                <td>
                                    <p class="end-contract title-big color-ternakinvest-paragraph font-bold">
                                        20 Des 2020
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row footer">
                <div class="col-lg-6">
                    <h6 class="title-small color-ternakinvest-paragraph">Nilai Investasi</h6>
                    <h3 class="title-medium color-ternakinvest">Rp. 5.000.000</h3>
                    <p class="title-small color-ternakinvest-paragraph">10 Lembar</p>
                </div>
                <div class="col-lg-6 status">
                    <div class="row">
                        <h5 class="title-big color-ternakinvest-paragraph">Status</h5>
                        <button class="btn btn-large btn-detail-invest">
                            Proses Investasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 container-content">
        <div class="description">
            <div class="row container-body">
                <div class="col-lg-2">
                    <img src="{{ asset('img/invest/IMG_4192.png') }}" width="200px" height="200px">
                </div>
                <div class="col-lg-10">
                    <a class="name">Proyek Domba</a>
                    <div class="container-data-roi">
                        <table cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="60%">
                                    <p>ROI</p>
                                </td>
                                <td>
                                    <p class="roi title-big color-ternakinvest font-bold">
                                        10% - 20%
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        Kontrak Berakhir
                                    </p>
                                </td>
                                <td>
                                    <p class="end-contract title-big color-ternakinvest-paragraph font-bold">
                                        20 Des 2020
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row footer">
                <div class="col-lg-6">
                    <h6 class="title-small color-ternakinvest-paragraph">Nilai Investasi</h6>
                    <h3 class="title-medium color-ternakinvest">Rp. 5.000.000</h3>
                    <p class="title-small color-ternakinvest-paragraph">10 Lembar</p>
                </div>
                <div class="col-lg-6 status">
                    <div class="row">
                        <h5 class="title-big color-ternakinvest-paragraph">Status</h5>
                        <button class="btn btn-large btn-detail-invest">
                            Proses Investasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@push('after_scripts')
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
@endpush
@endsection
