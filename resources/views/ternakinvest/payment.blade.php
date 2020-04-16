@extends('layouts.ternakinvest.page')
@push('after_styles')
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/input-counter.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/payment-invest.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
@endpush

@section('content')
{{ Form::open(['route' => "ternakinvest.postPayment", 'files' => true]) }}
<div class="container-detail-invest">
	<div class="col-md-12 section-top">
		<div class="container-data">
			<h5>Batas Waktu</h5>
            <h3>{{ \Carbon\Carbon::parse($data_order->batas_pembayaran)->formatLocalized('%A, %d %B %Y %H:%I') }}</h3>
		</div>
        <div class="container-data">
            <h5>Jumlah Tagihan</h5>
            <h3>{{ "Rp " . number_format((int)$data_order->grand_total,2,',','.') }}</h3>
        </div>
        <div class="container-data">
            <p>Pembelianmu tercatat dengan nomor pembayaran</p>
            <p>{{ $data_order->no_order }} <!-- <a>detail</a> --></p>
        </div>
	</div>
	<div class="col-md-12">
		<div class="description">
			<img src="{{ env('URL_ADMIN') . "storage/master/payment_bank/" . $payment_detail->data->logo }}"/>
            <div class="bank-name">
                Nomor {{ $data_order->nama_akun }}
            </div>
            <div class="bank-account">
                {{ $data_order->no_rekening }}
            </div>
            <a href="#" class="copy-text">salin nomor</a>
            <div class="container-payment">
                <div class="form">
                    <label>Cara Pembayaran</label>
                </div>
                <div class="form-group">
                    {!! Form::select('payment_bank_id', $data_payments, null) !!}
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-large btn-red file-input">
                        <embed src="{{ asset('img/assets/ternak-invest/camera.svg') }}">
                        Upload Bukti Pembayaran
                    </button>
                    <input name="proof" type="file" class="input-file">
                </div>
                <p class="alert-description">
                    Jika dalam batas waktu tidak upload bukti pembayaran maka pesanan dianggap batal
                </p>
            </div>
		</div>
        <div class="submit">
            <button type="button" class="btn btn-large btn-grey">
                Lihat Transaksi
            </button>
            <button type="submit" class="btn btn-large btn-detail-invest">
                Konfirmasi Pembayaran
            </button>
        </div>
	</div>
</div>
</form>
@push('after_scripts')
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(".file-input").click(function(){
            $(".input-file").click();
        });

        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
        }

        $(".copy-text").click(function(){
            copyToClipboard('.bank-account')
        });
    </script>
@endpush
@endsection
