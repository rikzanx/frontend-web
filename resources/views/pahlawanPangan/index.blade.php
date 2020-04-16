@extends('layouts.pahlawan.app')

@section('style')
<link href="{{ asset('plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('css/pahlawan/main.css') }}" rel="stylesheet">
@endsection

@section('navbar')
  <li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('tentang-kami') }}">Tentang Kami</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#blog">Blog</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="#donasi">Donasi</a>
  </li>
@endsection

@section('content')
<div id="banner">
    <div id="bannerContent">
    	<div class="banner-wrapper">
        <img src="{{asset('img/assets/pahlawan-pangan/bg-banner.svg')}}" class="bg-banner">
        <img src="{{asset('img/assets/pahlawan-pangan/circle-banner.png')}}" class="circle-banner">
      </div>
      <div class="title-container">
        <div class="row">
          <div class="col">
          </div>
          <div class="col text">
            <p>Jadilah Pahlawan Pangan</p>
            <p>dengan memberi Donasi</p>
          <a href="{{ route('pahlawanPangan.detail') }}" class="btn btn-donasi">Donasi Sekarang</a>
          </div>
        </div>
      </div>
    </div>
    <img src="{{asset('img/assets/pahlawan-pangan/gadis.png')}}" class="gadis">
</div>
<div id="content">
	<div id="content-1">
		<div class="box-left">
      <div class="wrapper">
        <span class="header">
          Bagikan Kebahagiaan Untuk Mereka
        </span>
        <span class="description">
          mari berbagi rezeki untuk anak Yatim dan Dhuafa di Surabaya
        </span>
        <div class="btn-wrapper">
          <img src="{{asset('img/assets/pahlawan-pangan/btn-prev.png')}}" class="btn-berbagi-prev">
          <img src="{{asset('img/assets/pahlawan-pangan/btn-next.png')}}" class="btn-berbagi-next">
        </div>
      </div>
    </div>
    <div class="box-right">
      <div class="wrapper">
        <div class="carousel-berbagi">
          @foreach ($results as $result)
          @if($result->is_published)
          <div class="carousel-item">
            <div class="card berbagi-card">
              <div class="background-block">
                @foreach($result->image_url as $key => $image)
                   <img class="background" src="{{ env('URL_ADMIN') . $image }}">
                @endforeach
  						</div>
              <div class="card-content">
                <span class="content-title">{{ $result->nama }}</span>
  							<span class="content-body">{{ str_limit($result->deskripsi, 37) }}</span>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
	</div>
  <div id="content-2">
    <div class="container">
      <div class="title-wrapper">
        <h2>Manfaat Berdonasi</h2>
        <img src="{{asset('img/assets/pahlawan-pangan/line.png')}}" class="line">
      </div>
      <div class="row">
        <div class="col text-center">
          <div class="image">
            <img src="{{asset('img/assets/pahlawan-pangan/merasa-bahagia.png')}}" class="">
          </div>
          <div class="text">
            Merasa lebih bahagia
          </div>
        </div>
        <div class="col text-center">
          <div class="image">
            <img src="{{asset('img/assets/pahlawan-pangan/membantu.png')}}" class="">
          </div>
          <div class="text">
            Membantu yang membutuhkan
          </div>
        </div>
        <div class="col text-center">
          <div class="image">
            <img src="{{asset('img/assets/pahlawan-pangan/pahala-berlipat.png')}}" class="">
          </div>
          <div class="text">
            Pahala berlipat ganda
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="content-3" style="background: url({{asset('img/assets/pahlawan-pangan/bg-donasi-pangan.png')}});">
		<div class="text">
      <p>Donasi Pangan telah menyalurkan</p>
			<p>Produk Peternakan senilai <span class="larger">Rp 105.000.000</span></p>
			<p>dan membantu <span class="larger">10.000</span> penerima manfaat</p>
		</div>
    <div class="image">
			<img class="img-1" src="{{asset('img/assets/pahlawan-pangan/_DSC5083.png')}}">
			<img class="img-2" src="{{asset('img/assets/pahlawan-pangan/DSC07596.png')}}">
			<p class="img-text">Donasi Pangan</p>
		</div>
  </div>
  <div id="content-4">
    <div class="container">
      <div class="title-wrapper">
        <h2>Galeri Berbagi</h2>
        <img src="{{asset('img/assets/pahlawan-pangan/line.png')}}" class="line">
      </div>
      <div class="carousel-wrapper">
        <div class="carousel-galeri">
          <div class="image">
            <img src="{{asset('img/assets/pahlawan-pangan/mengaji.jpg')}}">
          </div>
          <div class="image">
            <img src="{{asset('img/assets/pahlawan-pangan/khataman.jpg')}}">
          </div>
        </div>
        <div class="btn-wrapper">
          <img src="{{asset('img/assets/pahlawan-pangan/btn-prev.png')}}" class="btn-galeri-prev">
          <img src="{{asset('img/assets/pahlawan-pangan/btn-next.png')}}" class="btn-galeri-next">
        </div>
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
	        		<img class="image-download" src="{{asset('img/assets/pahlawan-pangan/phone-ternaknesia.png')}}">
				</div>
			</div>
    	</div>
	</div>
</div>

@endsection

@section('script')
	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/slick/slick.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/pahlawan-pangan.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel-berbagi').slick({
        slidesToShow: 1.1,
        // arrows: false,
        infinite: false,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        prevArrow: '.btn-berbagi-prev',
        nextArrow: '.btn-berbagi-next',
        mobileFirst: true,
        responsive: [
          {
            breakpoint: 1280,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 1023,
            settings: {
              slidesToShow: 2.2,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 800,
            settings: {
              slidesToShow: 1.8,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1.4,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 660,
            settings: {
              slidesToShow: 2.5,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 530,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1.5,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 375,
            settings: {
              slidesToShow: 1.4,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 360,
            settings: {
              slidesToShow: 1.2,
              slidesToScroll: 1
            }
          }]
      });
      $('.carousel-galeri').slick({
        infinite: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        prevArrow: '.btn-galeri-prev',
        nextArrow: '.btn-galeri-next',
      });
    });
  </script>
@endsection
