@extends('layouts.ternakinvest.page')
@push('after_styles')
	<link href="{{ asset('css/invest/input-counter.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/detail-invest.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/slick/slick.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/footer.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
@endpush

@section('content')
<form action="{{ route('ternakinvest.checkout') }}" method="POST">
@csrf
<div class="container-detail-invest">
	<div class="content-data">
		<ol class="cd-breadcrumb custom-separator">
			<li><a href="{{ route('ternakinvest.index') }}">Beranda</a></li>
			<li class="current"><em>Produk Investasi</em></li>
		</ol>
		<div class="container-data">
			<div class="container-left">
				@if(!empty($data->invest->feat_image_url))
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				 	<ol class="carousel-indicators">
				 		@foreach($data->invest->feat_image_url as $key => $image)
				 			<li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
						@endforeach
				 	</ol>
				 	<div class="carousel-inner">
			 			@foreach($data->invest->feat_image_url as $key => $image)
						    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
								<img class="d-block w-100" src="{{ env('URL_ADMIN') . $image }}" alt="First slide">
						    </div>
						@endforeach
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
				@else
					<img class="d-block w-100" src="{{ env('URL_ADMIN') . $data->invest->image_url }}">
				@endif
				<div class="clear"></div>
				<div class="container-share">
					<div class="left">
						<ul>
							<li><embed src="{{ asset('img/invest/facebook.svg') }}"></li>
							<li><embed src="{{ asset('img/invest/twitter.svg') }}"></li>
							<li><embed src="{{ asset('img/invest/whatsapp.svg') }}"></li>
						</ul>
					</div>
					<div class="right">
						<div class="circle">
							<img src="{{ asset('img/invest/like.svg') }}" />
						</div>
					</div>
				</div>
			</div>
			<div class="container-right">
				<div class="profile">
					<div class="image-profile">
						<img src="{{ env('URL_ADMIN') . $data->invest->image_url }}" />
					</div>
					<div class="data-profile">
						<div class="title-profile">
							{{ $data->nama }}
						</div>
						<table>
							<tr>
								<td class="field">Lokasi</td>
								<td class="data">{{ $data->invest->instansi_kota }}</td>
							</tr>
							<tr>
								<td class="field">Peternak</td>
								<td class="data">{{ $data->invest->instansi }}</td>
							</tr>
							<tr>
								<td class="field">Jenis</td>
								<td class="data">{{ $data->category }}</td>
							</tr>
							<tr>
								<td class="field">Periode</td>
								<td class="data">{{ $data->invest->period }}</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="clear"></div>
				<div class="status">
					<button class="btn btn-md btn-detail-invest">Status : {{ $data->invest->status }}</button>
					<div class="data">
						<div class="container-total">
							<p>
								<img src="{{ asset('img/invest/stationery-stacked-papers.svg') }}">
								Nilai 1 Lembar <strong>{{ $data->invest->price }}</strong>
							</p>
						</div>
						<div class="container-roi">
							<p>
								<img src="{{ asset('img/invest/kids-couple.svg') }}">
								ROI <strong>{{ $data->invest->est_roi_min }}% - {{ $data->invest->est_roi_max }}%</strong>
							</p>
						</div>
					</div>
					<div class="progress-container">
					 	<progress class="progressplayer" id="playerhealth" value="{{ $data->invest->stock }}" max="{{ $data->invest->total_stock }}"></progress>
					</div>
					<div class="desc">
						<p>Tersisa {{ $data->invest->stock }} lembar dari {{ $data->invest->total_stock }} lembar</p>
					</div>
				</div>
				<div class="clear"></div>
				<div class="container-confirmation">
					<a class="btn btn-large btn-detail-invest btn-grey">
						Simulasi
					</a>
					<a href="#open-modal" class="btn btn-large btn-detail-invest">
						Investasi
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="content-description">
		<div class="title">
			Tentang Proyek
		</div>
		<div class="description">
			{!! $data->deskripsi !!}
			<div class="container-confirmation">
				@if($data->invest->video_link != null)
					<a href="{{ $data->invest->video_link }}" class="btn btn-large btn-detail-invest btn-grey">
						Lihat Video
					</a>
				@endif
				@if($data->invest->proposal_url != null)
					<a href="{{ $data->invest->video_link }}" class="btn btn-large btn-detail-invest btn-grey">
						Lihat Proposal
					</a>
				@endif
			</div>
		</div>
	</div>
</div>
{!! Form::hidden('id', $data->id) !!}
<div id="open-modal" class="modal-window">
	<div>
    	<a href="#" title="Close" class="modal-close">
    		<i class="fa fa-times"></i>
    	</a>
    	<h1>Proyek Domba Blitar</h1>
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
							<input min="1" name="qty" class='ctrl__counter-input' maxlength='10' type='text' value='0'>
				   			<div class='ctrl__counter-num'>0</div>
				  		</div>
					  	<div class='ctrl__button ctrl__button--increment'>+</div>
					</div>
    			</td>
    		</tr>
    	</table>
		<div>
			<input required type="checkbox" name="agree">
			Saya mensetujui isi dan <a href="https://google.com" target="_blank">Syarat</a> & <a href="https://google.com" target="_blank">Ketentuan Ternak Invest</a>
		</div>
		<div>
			<button type="submit" class="btn btn-large btn-detail-invest">
				Lanjutkan
			</button>
		</div>
    </div>
</div>
</form>
@push('after_scripts')
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/invest/input-counter.js') }}"></script>
@endpush
@endsection
