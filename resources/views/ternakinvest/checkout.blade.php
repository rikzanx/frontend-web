@extends('layouts.ternakinvest.page')
@push('after_styles')
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/input-counter.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/checkout-invest.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
@endpush

@section('content')
<form action="{{ route('ternakinvest.postCheckout') }}" method="POST">
@csrf
<div class="container-detail-invest">
	<div class="col-md-12">
		<div class="profile row">
			<div class="col-md-2 col-sm-2">
				<div class="image-profile">
					<img src="{{ asset('img/invest/assets/TFI-7454.png') }}" />
				</div>
			</div>
			<div class="col-md-10 col-sm-10">
				<div class="data-profile">
					<div class="title-profile">
						Proyek Domba Blitar
					</div>
					<div class="description-profile">
						<p>ROI <span>{{ $data->invest->est_roi_min }}% - {{ $data->invest->est_roi_max }}%</span></p>
						<p>Periode <span>{{ $data->invest->period }}</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="title">
			<p>Detail Pembayaran</p>
			<div class="line"></div>
		</div>
		<table class="detail-payment">
			<tr>
				<td class="left">{{ session()->get('qty_order') }} Lembar<br><a href="#change-qty">ubah</a></td>
				<td class="right">{{ "Rp " . number_format((int)session()->get('grand_total'),2,',','.') }}</td>
			</tr>
			<tr>
				<td class="left">Biaya Pembelian</td>
				<td class="right"><span>Gratis</span></td>
			</tr>
			<tr>
				<td style="position: relative;" colspan="2"><div class="line"></td>
			</tr>
			<tr>
				<td class="left"><span>Total Harga</span></td>
				<td class="right grand_total"><strong>{{ "Rp " . number_format((int)session()->get('grand_total'),2,',','.') }}</strong></td>
			</tr>
		</table>
	</div>
	<div class="col-md-12">
		<div class="title">
			<p>Metode Pembayaran</p>
		</div>
		<table class="detail-payment">
			<tr>
				<td class="left">
                    <span class="logo-bank">
                        <p>Pilih Pembayaran Dahulu</p>
                    </span>
				</td>
				<td class="right"><a href="#open-modal">ubah</a></td>
			</tr>
		</table>
	</div>
	<div class="col-md-12">
		<div class="submit">
			<a href="{{ route('ternakinvest.index') }}" class="btn btn-large btn-grey">
				Kembali
			</a>
            @if($is_login)
                <button type="submit" class="btn btn-large btn-detail-invest" disabled="disabled">
                    Beli Investasi
                </button>
            @else
    			<a href="#open-auth" class="btn btn-large btn-detail-invest">
    				Beli Investasi
    			</a>
            @endif
		</div>
	</div>
</div>
<div id="open-modal" class="modal-window">
    <div class="form-payment">
        <a href="#" title="Close" class="modal-close">
            <i class="fa fa-times"></i>
        </a>
        <h1>Pilih Metode Pembayaran</h1>
        @foreach($payments as $payment)
            <label class="radio">
                <input 
                    class="change-logo" 
                    type="radio" 
                    name="payment_bank_id" 
                    value="{{ $payment->id }}"
                    required 
                >
                <span data-logo="{{ env('URL_ADMIN') . $payment->logo }}">{{ $payment->name }}<!-- <img src=""/> --></span>
            </label>
        @endforeach
    </div>
</div>
</form>
<div id="open-auth" class="modal-window">
    <div class="form-payment">
        <a href="#" title="Close" class="modal-close">
            <i class="fa fa-times"></i>
        </a>
        <h1>Login Atau Register</h1>
        <table>
            <tr>
                <td class="left">
                    <a href="{{ route('login') }}" class="btn btn-large btn-detail-invest">
                        Login
                    </a>
                </td>
                <td class="right">
                    <a href="{{ route('register') }}" class="btn btn-large btn-detail-invest">
                        Register
                    </a>
                </td>
            </tr>
        </table>
    </div>
</div>
<div id="change-qty" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">
            <i class="fa fa-times"></i>
        </a>
        <h1>Proyek Domba Blitar</h1>
        <form action="{{ route('ternakinvest.checkout') }}" method="POST">
        @csrf
        {!! Form::hidden('id', $data->id) !!}
        <table>
            <tr>
                <td class="left">Nilai 1 Lembar</td>
                <td class="right"><strong>{{ "Rp " . number_format((int)$data->invest->price,2,',','.') }}</strong></td>
            </tr>
            <tr>
                <td class="left">Potensi Return</td>
                <td class="right"><strong>{{ $data->invest->est_roi_min }}%-{{ $data->invest->est_roi_max }}%</strong></td>
            </tr>
            <tr>
                <td class="left last">Beli</td>
                <td class="right last">
                    <div class='ctrl'>
                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                        <div class='ctrl__counter'>
                            <input min="1" name="qty" class='ctrl__counter-input' maxlength='10' type='text' value="{{ session()->get('qty_order') }}">
                            <div class='ctrl__counter-num'>{{ session()->get('qty_order') }}</div>
                        </div>
                        <div class='ctrl__button ctrl__button--increment'>+</div>
                    </div>
                </td>
            </tr>
        </table>
        <div>
            <button class="btn btn-large btn-detail-invest">
                Ubah
            </button>
        </div>
        </form>
    </div>
</div>
@push('after_scripts')
    <script type="text/javascript" src="{{ asset('js/invest/input-counter.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $('input[type=radio][name=payment_bank_id]').change(function() {
            var $this = $(this);
            var span = $(this).parent().find("span").data('logo');
            $(".logo-bank").html("<img  src='"+span+"'/>");
            $(".submit .btn-detail-invest").removeAttr('disabled')
        });

        function rubah(angka){
           var reverse = angka.toString().split('').reverse().join(''),
           ribuan = reverse.match(/\d{1,3}/g);
           ribuan = ribuan.join('.').split('').reverse().join('');
           return ribuan;
         }
    </script>
@endpush
@endsection
