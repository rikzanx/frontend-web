@extends('layouts.ternakinvest.page')

@section('style')
<link href="{{ asset('plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('css/invest/ternak-invest.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="banner" style="background: url({{asset('img/invest/bg-banner.png')}}) center no-repeat;">
    <div id="bannerContent" style="background: url({{asset('img/invest/bg-banner.png')}}) center no-repeat;">
    	<div class="container">
	        <div class="text-banner">
	        	<p>Kemudahan Berinvestasi</p>
	        	<p>dengan membantu</p>
	        	<p>Peternak Lokal</p>
	        	<a href="#" class="btn btn-banner">Cari Proyek Investasi</a>
	        </div>
	        <div class="img-banner">
	        	<img src="{{asset('img/invest/man-with-laptop.png')}}">
	        </div>
	        <img class="banner-koin" src="{{asset('img/invest/koin6.png')}}">
	        <img class="banner-koin-2" src="{{asset('img/invest/koin6.png')}}">
    	</div>
    </div>
</div>
<div id="content">
	<div id="content-1">
		<div class="container">
			<div class="row">
				<div class="box-left">
				</div>
				<div class="col">
					<img class="img-content-1" src="{{asset('img/invest/a-young-businessman-with-smartphone-excited-by-32U8SAX.png')}}">
				</div>
				<div class="col content-1-text">
					<p class="text-19 font-weight-bold">Range ROI Mulai</p>
					<p class="text-19 font-weight-bold">Dari <span class="text-orange text-32">8%</span> sampai <span class="text-orange text-32">30%</span></p>
				</div>
			</div>
		</div>
	</div>
	<div id="content-2">
		<div class="container">
			<div class="row">
				<div class="box-right">
				</div>
				<div class="col content-2-text">
					<p class="text-19 font-weight-bold">Bersama Investor TernakInvest telah membantu</p>
					<p class="text-19 font-weight-bold">lebih dari <span class="text-orange text-32">30 Peternak Lokal</span></p>
				</div>
				<div class="col">
					<img class="img-content-2" src="{{asset('img/invest/IMG_4205.png')}}">
					<img class="img-koin" src="{{asset('img/invest/koin3.png')}}">
				</div>
			</div>
		</div>
	</div>
	<div id="content-3">
		<div class="container">
			<div class="row">
				<div class="box-left">
				</div>
				<div class="col">
					<img class="img-content-3" src="{{asset('img/invest/austin-distel-fEedoypsW_U-unsplash.png')}}">
					<img class="img-koin" src="{{asset('img/invest/koin6.png')}}">
				</div>
				<div class="col content-3-text">
					<p class="text-19 font-weight-bold">Ternak Invest Telah Mengelola</p>
					<p class="text-19 font-weight-bold">Dana Sebesar <span class="text-orange text-32">800 Milyar Rupiah</span></p>
				</div>
			</div>
		</div>
	</div>
	<div id="content-4">
		<div class="container">
			<p class="text-title text-center">Kenapa Investasi di TernakInvest?</p>
			<div class="row cards">
				<div class="col-sm text-center">
					<div class="card-content-4">
						<div class="card-image">
							<img src="{{asset('img/invest/undraw_btc_p2p_lth5.svg')}}">
						</div>
						<div class="card-title">
							<span class="text-22 text-orange font-weight-bold">Untung</span>
						</div>
						<div class="card-body">
							<p>Investasi di sektor riil, terbukti</p>
							<p>menghasilkan keuntungan</p>
							<p>yang tinggi</p>
						</div>
					</div>
				</div>
				<div class="col-sm text-center">
					<div class="card-content-4">
						<div class="card-image">
							<img src="{{asset('img/invest/undraw_Security_on_ff2u.svg')}}">
						</div>
						<div class="card-title">
							<span class="text-22 text-orange font-weight-bold">Aman</span>
						</div>
						<div class="card-body">
							<p>Bekerja sama dengan peternak</p>
							<p>yang memiliki track record yang</p>
							<p>baik dan jelas</p>
						</div>
					</div>
				</div>
				<div class="col-sm text-center">
					<div class="card-content-4">
						<div class="card-image">
							<img src="{{asset('img/invest/undraw_QA_engineers_dg5p.svg')}}">
						</div>
						<div class="card-title">
							<span class="text-22 text-orange font-weight-bold">Berdampak</span>
						</div>
						<div class="card-body">
							<p>Membantu manajemen keuangan</p>
							<p>peternak agar menjadi lebih</p>
							<p>tertib dan teratur, menyelesaikan</p>
							<p>permasalahan peterak</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="content-5">
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="text-title">Lihat proyek Investasi</p>
				</div>
				<div class="col" id="investNavButton">
					<div class="text-center">
						<img class="invest-slick-prev" src="{{asset('img/invest/btn-prev.png')}}">
						<img class="invest-slick-next" src="{{asset('img/invest/btn-next.png')}}">
					</div>
				</div>
			</div>
			<div class="carousel-invest">
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/DSC03460.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/IMG_4192.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/TFI-7187.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/DSC03460.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/IMG_4192.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/DSC03460.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/IMG_4192.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/TFI-7187.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/DSC03460.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/invest/IMG_4192.png')}}">
						</div>
						<div class="card-content">
							<p class="content-title">Proyek Domba Blitar</p>
							<p class="content-body">ROI 12% - 20%</p>
							<a href="#">Selengkapnya <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="content-6">
		<div class="container">
			<div class="text">
				<p class="text-26">Sudah lebih dari <span class="text-42">10.000</span> orang</p>
				<p class="text-26">Ber investasi di TernakInvest</p>
			</div>
		</div>
		<div class="image">
			<img class="img-1" src="{{asset('img/invest/a-young-businessman-circle.png')}}">
			<img class="img-2" src="{{asset('img/invest/TFI-7454.png')}}">
			<img class="img-3" src="{{asset('img/invest/koin1.png')}}">
			<img class="img-4" src="{{asset('img/invest/koin3.png')}}">
			<img class="img-5" src="{{asset('img/invest/koin4.png')}}">
			<p class="img-text">TernakInvest</p>
		</div>
	</div>
	<div id="content-7">
		<div class="container">
			<div class="title text-center">
				<p class="text-title">Kata Mereka</p>
			</div>
			<div class="carousel">
				<img class="img-quotes" src="{{asset('img/invest/right-quotes-symbol.svg')}}">
				<img class="kata-slick-prev" src="{{asset('img/invest/btn-prev.png')}}">
				<img class="kata-slick-next" src="{{asset('img/invest/btn-next.png')}}">
				<div class="carousel-kata-mereka">
					<div class="carousel-item">
						<div class="card-img">
							<img src="{{asset('img/invest/a-young-businessman-small.png')}}">
						</div>
						<div class="card-content">
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis dignissim est vel ornare. Cras lobortis, lacus vitae.."</p>
							<p class="nama">- Supratman</p>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card-img">
							<img src="{{asset('img/invest/a-young-businessman-small.png')}}">
						</div>
						<div class="card-content">
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis dignissim est vel ornare. Cras lobortis, lacus vitae.."</p>
							<p class="nama">- Suparmi</p>
						</div>
					</div>
				</div>
			</div>
			<div class="ojk">
				<strong>Proses daftar</strong>
				<img src="{{asset('img/invest/ojk.png')}}">
			</div>
		</div>
	</div>
	<div id="content-download">
		<div class="container">
			<div class="row">
				<div class="col">
			        <div class="text-download">
			        	<p>Tunggu apa lagi?</p>
			        	<p>Gabung Bersama kami sekarang juga</p>
			        	<a href="#" class="btn btn-download">Download Aplikasi</a>
			        </div>
				</div>
				<div class="col text-center">
	        		<img class="image-download" src="{{asset('img/invest/phone-ternaknesia.png')}}">
				</div>
			</div>
    	</div>
	</div>
</div>

@endsection

@section('script')
	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/slick/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/invest/ternak-invest.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('.carousel-invest').slick({
				slidesToShow: 1.3,
				// arrows: false,
				infinite: false,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
				prevArrow: '.invest-slick-prev',
				nextArrow: '.invest-slick-next',
				mobileFirst: true,
				responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 3.6,
			        slidesToScroll: 1,
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2.3,
			        slidesToScroll: 1
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1.3,
			        slidesToScroll: 1
			      }
			    }]
	      	});

      	 	$('.carousel-kata-mereka').slick({
      	 		prevArrow: '.kata-slick-prev',
				nextArrow: '.kata-slick-next',
				dots: true,
				autoplay: true,
				autoplaySpeed: 2000,
      	 	});
	    });
	</script>
@endsection
