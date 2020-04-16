@extends('layouts.app')

@section('style')
<link href="{{ asset('plugins/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/beranda.css') }}" rel="stylesheet">
@endsection

@section('navbar')
		<li class="nav-item">
			<a class="nav-link active" href="{{ route('home') }}">Beranda</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ route('tentang-kami') }}">Tentang Kami</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#blog">Blog</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#donasi">Donasi</a>
		</li>
		@if(Session::has('is_login') && Session::get('is_login') )
		<li class="nav-item">
			<a class="nav-link" href="{{ url('logout') }}">Akun Saya</a>
			</li>
		@else
		<li class="nav-item">
		<a class="nav-link" href="{{ url('login') }}">Login</a>
		</li>
		@endif
@endsection

@section('content')
<div id="banner">
	<div id="bannerContent">
		<div class="banner-wrapper">
			<img src="{{asset('img/assets/beranda/bg-banner.png')}}" class="bg-banner">
			<img src="{{asset('img/assets/beranda/bg-banner-mobile.png')}}" class="bg-banner-mobile">
		</div>
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
<div id="content">
	<div id="content-1">
		<div class="bg-wrapper">
			<img src="{{asset('img/assets/beranda/bg-content-1-kanan.png')}}" class="img-fluid bg-kanan"/>
			<img src="{{asset('img/assets/beranda/bg-content-1-kiri.png')}}" class="img-fluid bg-kiri"/>
		</div>
		<div class="container-fluid text-wrapper">
			<div class="row justify-content-center">
			    <div class="col-12">
			      	<p>Ternaknesia merajut semua titik dunia peternakan melalui teknologi</p>
			    	<p class="text-orange">Mari Bela dan Beli produk Peternakan Lokal!</p>
			    </div>
			</div>
		</div>
	</div>
	<div id="content-2">
		<span class="text-title">Layanan Kami</span>
		<div class="row tab-row">
			<div class="col-3">
				<div class="nav flex-column align-items-end justify-content-center" id="vTab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="vTernakmartTab" data-toggle="tab" href="#vTernakmart" role="tab" aria-controls="vTernakmart" aria-selected="true">
						<img src="{{asset('img/assets/beranda/logo-ternakmart.png')}}" class="img-fluid img-content img-tab"/>
					</a>
					<a class="nav-link" id="vTernakInvestTab" data-toggle="tab" href="#vTernakInvest" role="tab" aria-controls="vTernakInvest" aria-selected="false">
						<img src="{{asset('img/assets/beranda/logo-ternakinvest.png')}}" class="img-fluid img-content img-tab"/>
					</a>
					<a class="nav-link" id="vPahlawanPanganTab" data-toggle="tab" href="#vPahlawanPangan" role="tab" aria-controls="vPahlawanPangan" aria-selected="false">
						<img src="{{asset('img/assets/beranda/logo-pahlawanpangan.png')}}" class="img-fluid img-content img-tab"/>
					</a>
					<a class="nav-link" id="vSmartQurbanTab" data-toggle="tab" href="#vSmartQurban" role="tab" aria-controls="vSmartQurban" aria-selected="false">
						<img src="{{asset('img/assets/beranda/logo-smartqurban.png')}}" class="img-fluid img-content img-tab"/>
					</a>
				</div>
			</div>
			<div class="col-9 col-tab-content">
				<div class="tab-content" id="vTabContent">
					<div class="tab-pane fade show active" id="vTernakmart" role="tabpanel" aria-labelledby="vTernakmart-tab">
						<div class="content-wrapper">
							<img src="{{asset('img/assets/beranda/img-ternakmart.png')}}" class="img-fluid img-content"/>
							<div class="d-flex flex-row-reverse">
								<div class="text-wrapper">
									<img src="{{asset('img/assets/beranda/ternakmart.png')}}" class="img-title"/>
									<p>Platform penjualan hasil ternak halal, bergizi dan berkualitas dari Peternak Lokal</p>
									<a href="/ternakmart" class="btn btn-ternakmart">Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="vTernakInvest" role="tabpanel" aria-labelledby="vTernakInvestTab">
						<div class="content-wrapper">
							<img src="{{asset('img/assets/beranda/img-ternakinvest.png')}}" class="img-fluid img-content"/>
							<div class="d-flex flex-row-reverse">
								<div class="text-wrapper">
									<img src="{{asset('img/assets/beranda/ternakinvest.png')}}" class="img-title"/>
									<p>Platform investasi kekinian yang</p>
									<a href="{{ route('ternakinvest.index') }}" class="btn btn-ternakinvest">Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="vPahlawanPangan" role="tabpanel" aria-labelledby="vPahlawanPanganTab">
						<div class="content-wrapper">
							<img src="{{asset('img/assets/beranda/img-pahlawanpangan.png')}}" class="img-fluid img-content"/>
							<div class="d-flex flex-row-reverse">
								<div class="text-wrapper">
									<img src="{{asset('img/assets/beranda/pahlawanpangan.png')}}" class="img-title"/>
									<p>Platform investasi kekinian yang</p>
									<a href="#" class="btn btn-pahlawanpangan">Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="vSmartQurban" role="tabpanel" aria-labelledby="vSmartQurbanTab">
						<div class="content-wrapper">
							<img src="{{asset('img/assets/beranda/img-smartqurban.png')}}" class="img-fluid img-content"/>
							<div class="d-flex flex-row-reverse">
								<div class="text-wrapper">
									<img src="{{asset('img/assets/beranda/smartqurban.png')}}" class="img-title"/>
									<p>Platform perencanaan, pembelian, dan penyaluran hewan qurban di momen qurban agar ibadah lebih tenang</p>
									<a href="#" class="btn btn-smartqurban">Selengkapnya</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="content-3">
		<h2 class="text-center text-title">Kata Mereka</h2>
		<div class="row mr-0">
			<div class="col-9 content-mobile">
				<div class="kata-box">
					<img src="{{asset('img/assets/beranda/right-quotes-symbol.png')}}" class="img-fluid quote"/>
					<div class="content-wrapper">
						<div class="img-container text-center">
							<img src="{{asset('img/assets/beranda/bg-nama.png')}}" class="img-fluid bg-nama">
							<div class="nama-wrapper">
								<p class="active animated">Mas Aringga - Bojonegoro</p>
								<p class="animated">Mas Joko - Mojokerto</p>
								<p class="animated">Mas Sukiman - Kediri</p>
							</div>
							<div class="img-wrapper animated active">
								<img src="{{asset('img/assets/beranda/TFI-7454.png')}}" class="img-fluid animated"/>
							</div>
							<div class="img-wrapper animated pre-active">
								<img src="{{asset('img/assets/beranda/Yoko J5.00_11_10_24.Still001.png')}}" class="img-fluid animated"/>
							</div>
							<div class="img-wrapper animated">
								<img src="{{asset('img/assets/beranda/kambing.jpeg')}}" class="img-fluid animated"/>
							</div>
							<div class="dot-container">
								<i class="fa fa-circle active"></i>
								<i class="fa fa-circle"></i>
								<i class="fa fa-circle"></i>
							</div>
						</div>
						<div class="text-container">
							<div class="text-content">
								<p class="active animated">"Beli hewan di Ternaknesia sangat amanah dan berkualitas, membantu dalam penyediaan hewan berkualitas"</p>
								<p class="animated">"Content 2"</p>
								<p class="animated">"Content 3"</p>
							</div>
							<div class="nama-wrapper-mobile">
								<img src="{{asset('img/assets/beranda/bg-nama.png')}}" class="img-fluid bg-nama">
								<p class="active animated">Mas Aringga - Bojonegoro</p>
								<p class="animated">Mas Joko - Mojokerto</p>
								<p class="animated">Mas Sukiman - Kediri</p>
							</div>
							<div class="btn-content">
								<img id="btnPrev" src="{{asset('img/assets/beranda/btn-left.png')}}" class="img-fluid">
								<img id="btnNext" src="{{asset('img/assets/beranda/btn-right.png')}}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-3"></div>
		</div>
	</div>
	<div id="content-4">
		<span class="text-title">Ikuti Cerita Kami</span>
		<div class="video-wrapper">
			<div class="video-container">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe id="player" class="embed-responsive-item" src="https://www.youtube.com/embed/uAVUl0cAKpo" allowfullscreen allow="autoplay; encrypted-media"></iframe>
					<img id="videoCover" src="{{asset('img/assets/beranda/sapi.jpg')}}" class="img-fluid video-cover">
					<img id="playButton" src="{{asset('img/assets/beranda/play-button.png')}}" class="play-button">
				</div>
			</div>
		</div>
	</div>
	<div id="content-5">
		<div class="text-center">
			<img src="{{asset('img/assets/beranda/blog-ternaknesia-terbaru.png')}}" class="img-fluid blog-title">
		</div>
		<div class="card-container">
			<div class="card blog-card">
				<div class="background-block">
					<img class="background" src="{{asset('img/assets/beranda/DSC03460.png')}}">
				</div>
				<div class="card-content">
					<p class="content-title">Proyek Domba Blitar</p>
					<a href="#">Selengkapnya <img class="" src="{{asset('img/assets/beranda/arrow.png')}}"></a>
				</div>
			</div>
			<div class="card blog-card">
				<div class="background-block">
					<img class="background" src="{{asset('img/assets/beranda/DSC03460.png')}}">
				</div>
				<div class="card-content">
					<p class="content-title">Proyek Domba Blitar</p>
					<a href="#">Selengkapnya <img class="" src="{{asset('img/assets/beranda/arrow.png')}}"></a>
				</div>
			</div>
			<div class="card blog-card">
				<div class="background-block">
					<img class="background" src="{{asset('img/assets/beranda/DSC03460.png')}}">
				</div>
				<div class="card-content">
					<p class="content-title">Proyek Domba Blitar</p>
					<a href="#">Selengkapnya <img class="" src="{{asset('img/assets/beranda/arrow.png')}}"></a>
				</div>
			</div>
		</div>
		<div class="link">
			<div></div>
			<div></div>
			<div class="text-right">
				<a href="#">lihat lebih banyak</a>
			</div>
		</div>
	</div>
	<div id="content-download">
		<div class="download-wrapper">
			<div class="content-text">
				<p>Tunggu apa lagi?</p>
				<p>Bergabunglah menjadi bagian</p>
				<p>kedaulatan pangan Indonesia</p>
				<a href="#" class="btn btn-download">Download Aplikasi</a>
			</div>
			<div class="content-image">
				<img class="img-fluid" src="{{asset('img/assets/beranda/phone-download.png')}}">
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script type="text/javascript" src="{{ asset('js/beranda.js') }}"></script>
@endsection
