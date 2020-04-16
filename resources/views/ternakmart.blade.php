@extends('layouts.app')

@section('style')
<link href="{{ asset('plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('css/ternakmart.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/beranda-edit.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="banner">
    <div id="bannerContent">
    	<div class="container">
	        <div id="banner-1">
				<div id="bannerContent-1">
					<div class="title-container">
						<div class="link-wrapper">
							<a href="#" class="link-banner is-visible">
								<span>Belanja di Ternakmart</span>
							</a>
							<a href="#" class="link-banner">
								<span>Investasi di Ternakinvest</span>
							</a>
							<a href="#" class="link-banner">
								<span>Qurban di Smartqurban</span>
							</a>
							<a href="#" class="link-banner">
								<span>Donasi di PahlawanPangan</span>
							</a>
						</div>
					</div>
				</div>
			</div>

	        <div class="img-banner">
	        	<img src="{{asset('img/assets/ternakmart/rere.png')}}">
	        </div>
	        <img class="banner-koin" src="{{asset('img/assets/ternakmart/egg2.png')}}">
	        <img class="banner-koin-2" src="{{asset('img/assets/ternakmart/egg.png')}}">
    	</div>
    </div>
</div>

<div id="content">
	<!-- 
	<div id="content-1">
		<div class="container">
			<div class="row">
				
				
				<div class="col content-1-text-1 text-center">
					<p class="font-weight-bold">Produk Kami</p>
					<!--
					<p class="text-19 font-weight-bold">Dari <span class="text-orange text-32">8%</span> sampai <span class="text-orange text-32">30%</span></p> -->
					<!--
				</div>
				<div class="col text-center">
					<img class="img-content-1 text-center" src="{{asset('img/assets/ternak-invest/sususegar.png')}}">
				</div>

				<div class="col content-1-text-2 text-center">
					<p class="font-weight-bold">Ternakfresh merupakan suatu susu segar asli dari <br> peternakan yang diproses secara higienis dan <br> bersertifikat BPOM RI</p>
					<!--
					<p class="text-19 font-weight-bold">Dari <span class="text-orange text-32">8%</span> sampai <span class="text-orange 
					text-32">30%</span></p> -->
					<!--
				</div>
			
			</div>
		</div>
	</div> -->
	<div id="content-4">
		<div class="container">
			<p class="text-title text-center">Kenapa Belanja di Ternakmart?</p>
			<div class="row cards">
				<div class="col-sm text-center">
					<div class="card-content-4">
						<div class="card-image">
							<img src="{{asset('img/assets/ternakmart/jalan.png')}}">
						</div>
						<div class="card-title">
							<span class="text-22 font-weight-bold">Beli dimanapun dan kapanpun</span>
							<p>Anda tidak perlu keluar rumah, cukup duduk manis jadi hemat energi dan biaya.</p>
						</div>
						<div class="card-body">
							
						</div>
					</div>
				</div>
				<div class="col-sm text-center">
					<div class="card-content-4">
						<div class="card-image">
							<img src="{{asset('img/assets/ternakmart/halal.png')}}">
						</div>
						<div class="card-title">
							<span class="text-22 font-weight-bold">Dijamin Halal</span>
							<p>Diproses dengan halal</p>
						</div>
						<div class="card-body">
							<!--<p>Diproses dengan halal</p>-->
						</div>
					</div>
				</div>
				<div class="col-sm text-center">
					<div class="card-content-4">
						<div class="card-image">
							<img src="{{asset('img/assets/ternakmart/Group-972.png')}}">
						</div>
						<div class="card-title">
							<span class="text-22 font-weight-bold">Produk Berkualitas</span>
							<p>Produk peternakan asli yang aman sehat dan utuh</p>
						</div>
						<div class="card-body">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="content-4-1">
		<div class="container">
			<div class="row cards">
				<div class="col-sm text-center">
					<div class="card-content-4-1">
						<div class="card-title">
							<span class="">Produk Kami</span><br>
							<img src="{{asset('img/assets/ternakmart/line.png')}}" width="500px" height="-15px">
						</div>
						<div class="card-image">
							<img src="{{asset('img/assets/ternakmart/sususegar.png')}}">
						</div>
						
						<div class="card-body">
							<p>Ternakfresh merupakan susu segar asli dari <br>	 peternakan yang diproses secara higienis dan <br> bersertifikat BPOM RI </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<div id="content-4-2">
		<div class="container">
			<div class="row cards">
				<div class="col-sm text-left">
					<div class="card-content-4-2">
						<div class="card-image">
							<img src="{{asset('img/assets/ternakmart/telur.png')}}">
						</div>
					</div>
				</div>
				<div class="title col-sm text-left">
					<h1>TELUR<br>
					 	KUALITAS<br>
						PREMIUM</h1>
					<p>Telur yang anda terima dalam keadaan utuh dan baik.<br> Pecah atau busuk? kami GANTI.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!--
<div id="content-3">
		<div class="container">
			<div class="row">
				
				<div class="col">
					<img class="img-content-3" src="{{asset('img/assets/ternak-invest/eggg.png')}}">
				</div>
				<!--<div class="col content-3-text">
					<p class="">TELUR </p>
					<p>KUALITAS </p>
					<p>PREMIUM</p>
				</div>
			</div>
		</div>
	</div>  -->
	<div id="content-5">
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="text-title">Dan Produk Peternakan Lainnya</p>
				</div>
				<div class="col" id="investNavButton">
					<div class="text-right">
						<img class="invest-slick-prev" src="{{asset('img/assets/ternakmart/btn-prev.png')}}">
						<img class="invest-slick-next" src="{{asset('img/assets/ternakmart/btn-next.png')}}">
					</div>
				</div>
			</div>
			<div class="carousel-invest">
				<div class="carousel-item">
					<div class=" invest-card">
						<div class="">
							<img class="" src="{{asset('img/assets/ternakmart/sususapi.png')}}"width="165px">
						</div>
					</div>
					<div class="invest-card">
						<div class="">
							<img class="" src="{{asset('img/assets/ternakmart/yogurt-rasa.png')}}"width="165px">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="invest-card">
						<div class="">
							<img class="" src="{{asset('img/assets/ternakmart/daging-ayam.png')}}"width="165px">
						</div>
					</div>
					<div class="invest-card">
						<div class="">
							<img class="" src="{{asset('img/assets/ternakmart/telur-ayam.png')}}"width="165px">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="invest-card">
						<div class="">
							<img class="" src="{{asset('img/assets/ternakmart/telur-asin.png')}}"width="165px">
						</div>
					</div>
					<div class="invest-card">
						<div class="">
							<img class="" src="{{asset('img/assets/ternakmart/daging-bebek.png')}}"width="165px">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="invest-card">
						<div class="">
							<img class="" src="{{asset('img/assets/ternakmart/madu-rasa.png')}}"width="165px">
						</div>
					</div>
					<div class="card invest-card">
						<div class="background-block">
							<img class="background" src="{{asset('img/assets/ternakmart/daging-kambing.png')}}"width="165px">
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="invest-card">
						<div class="">
							<img class="" src="{{asset('img/assets/ternakmart/susu-kambing.png')}}" width="165px">
						</div>
					</div>
					<div class="invest-card">
						<div class="">
							<img class="" src="{{asset('img/assets/ternakmart/daging-sapi.png')}}"width="165px">
						</div>
					</div>
				</div>
			</div>
			<img class="potoo" src="{{asset('img/assets/ternakmart/20191214_101835.png')}}">
		</div>
	</div>
	<!--
	<div id="content-6">
		<div class="container">
			<div class="text">
				<p class="text-26">Sudah lebih dari <span class="text-42">10.000</span> orang</p>
				<p class="text-26">Ber investasi di TernakInvest</p>
			</div>
		</div>
		<div class="image">
			<img class="img-1" src="{{asset('img/assets/ternak-invest/a-young-businessman-circle.png')}}">
			<img class="img-2" src="{{asset('img/assets/ternak-invest/TFI-7454.png')}}">
			<img class="img-3" src="{{asset('img/assets/ternak-invest/koin1.png')}}">
			<img class="img-4" src="{{asset('img/assets/ternak-invest/koin3.png')}}">
			<img class="img-5" src="{{asset('img/assets/ternak-invest/koin4.png')}}">
			<p class="img-text">TernakInvest</p>
		</div>
	</div>
	<div id="content-7">
		<div class="container">
			<div class="title text-center">
				<p class="text-title">Kata Mereka</p>
			</div>
			<div class="carousel">
				<img class="img-quotes" src="{{asset('img/assets/ternak-invest/right-quotes-symbol.svg')}}">
				<img class="kata-slick-prev" src="{{asset('img/assets/ternak-invest/btn-prev.png')}}">
				<img class="kata-slick-next" src="{{asset('img/assets/ternak-invest/btn-next.png')}}">
				<div class="carousel-kata-mereka">
					<div class="carousel-item">
						<div class="card-img">
							<img src="{{asset('img/assets/ternak-invest/a-young-businessman-small.png')}}">
						</div>
						<div class="card-content">
							<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis dignissim est vel ornare. Cras lobortis, lacus vitae.."</p>
							<p class="nama">- Supratman</p>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card-img">
							<img src="{{asset('img/assets/ternak-invest/a-young-businessman-small.png')}}">
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
				<img src="{{asset('img/assets/ternak-invest/ojk.png')}}">
			</div>
		</div>
	</div> -->
	<div id="content-download-1">
		<div class="container">
			<div class="row">
				<div class="col">
			        <div class="text-download text-left">
			        	<p>Belanjaan Anda  </p>
			        	<p>Siap Kami Antarkan Sob!</p> 
			        	<img src="{{asset('img/assets/ternakmart/pin.svg')}}" width="20px">
			        </div>
				</div>	
				<div class="col text-center">
	        		<img class="image-download-1" src="{{asset('img/assets/ternakmart/driver.png')}}">
				</div>	
			</div>
			<div class="pin">
				<img src="{{asset('img/assets/ternakmart/pin.svg')}}">
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
	        		<img class="image-download" src="{{asset('img/assets/ternakmart/phone-ternaknesia.png')}}">
				</div>	
			</div>
    	</div>
	</div>
</div>

@endsection

@section('script')
	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/slick/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/ternakmart.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		     $('.carousel-invest').slick({
				slidesToShow: 2,
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
			      breakpoint: 1199,
			      settings: {
			        slidesToShow: 3.6,
			        slidesToScroll: 1,
			      }
			    },
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 1,
			      }
			    },
			     {
			      breakpoint: 767,
			      settings: {
			        slidesToShow: 2.1,
			        slidesToScroll: 1
			      }
			     },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2.9,
			        slidesToScroll: 1
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 2.5,
			        slidesToScroll: 1
			      }
			    },
			    {
			      breakpoint: 410,
			      settings: {
			        slidesToShow: 2.2,
			        slidesToScroll: 1
			      }
			    },
			     {
			      breakpoint: 365,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 1
			      }
			    },
			     {
			      breakpoint: 300,
			      settings: {
			        slidesToShow: 1.7,
			        slidesToScroll: 1
			      }
			    }
			    ]
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
	<script type="text/javascript" src="{{ asset('js/beranda.js') }}"></script>
@endsection