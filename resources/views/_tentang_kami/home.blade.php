@extends('_tentang_kami.layouts.app')

@section('script_header')
<style type="text/css">
	#banner { background-image: url('{{ asset("img/_tentang_kami/hero.png") }}');
			background-size: auto;
    		background-repeat: no-repeat; }
    .carousel-control-prev-icon { background-image: url('{{ asset("img/_tentang_kami/previous.png") }}'); }
	.carousel-control-next-icon { background-image: url('{{ asset("img/_tentang_kami/next.png") }}'); }
	#firstDivSmgtKami { background-image: url('{{ asset("img/_tentang_kami/backgroundSemangatKami.png") }}');
						background-size: cover;
						background-position: -80px; }			
</style>
@endsection

@section('content')
<div class="d-flex justify-content-center position-relative" id="banner">
	<div class="w-100 mw-100" id="bannerContent">
		<div class="text-center displayWeb">
			<div class="position-absolute w-100">
				<h1 class="text-white font-weight-bold tentangKamiFont">Tentang Kami</h1>
			</div>
			<img class="mw-100" src="{{ asset('img/_tentang_kami/hero.png') }}" alt="Hero">
		</div>
		<div class="displayPhone">
			<div class="position-absolute">
				<h1 class="text-white font-weight-bold tentangKamiFont">Tentang Kami</h1>
			</div>
			<img class="w-100" src="{{ asset('img/_tentang_kami/hero_mobile.png') }}" alt="Hero">
		</div>
	</div>
</div>
<div class="container contentContainer">
	<div class="content">
		<div class="text-center displayWeb mb-5">
			<img class="lineTitle" src="{{ asset('img/_tentang_kami/line.png') }}">
			<h3 class="font-weight-bold titleSection">Kedaulatan Pangan</h3>
		</div>
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-center mt-0">
				<img class="w-100 displayWeb kedaulatan_pangan" src="{{ asset('img/_tentang_kami/anak-ditinggal-ibunya.png') }}" srcset="{{ asset('img/_tentang_kami/anak-ditinggal-ibunya@2x.png') }} 2x" alt="Kedaulatan Pangan">
				<img class="m-auto mw-100 displayPhone w-100 kedaulatan_pangan" src="{{ asset('img/_tentang_kami/anak-ditinggal-ibunya_responsive.png') }}" alt="Kedaulatan Pangan">
			</div>
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-left d-flex justify-content-center align-items-center mt-0">
				<div class="row mt-0 displayPhone">
					<div class="col-12 mt-0">
						<div class="text-left">
							<img class="lineTitle" src="{{ asset('img/_tentang_kami/line.png') }}">
							<h3 class="font-weight-bold pl-4 titleSection">Kedaulatan Pangan</h3>
						</div>
					</div>
					<div class="col-12">
						<p class="pl-4 kedaulatanPanganFont"><span class="font-weight-bold h4 kedaulatanPanganFontFirst">K</span>ami melihat di masa kini bangsa Indonesia masih memiliki tantangan dalam permasalahan kedaulatan pangan. Pertama, lambatnya regenerasi peternak yang diakibatkan oleh rendahnya minat anak muda untuk beternak. Kedua, rendahnya produktivitas peternakan Indonesia sehingga sebagaian besar pemenuhan kebutuhan dalam negeri harus import dari negara lain. Dan ketiga, kurangnya kesejahteraan peternak karena hasil panen ternak dihargai rendah oleh pasar.</p>
					</div>
				</div>
				<p class="displayWeb kedaulatanPanganFont"><span class="font-weight-bold h4 kedaulatanPanganFontFirst">K</span>ami melihat di masa kini bangsa Indonesia masih memiliki tantangan dalam permasalahan kedaulatan pangan. Pertama, lambatnya regenerasi peternak yang diakibatkan oleh rendahnya minat anak muda untuk beternak. Kedua, rendahnya produktivitas peternakan Indonesia sehingga sebagaian besar pemenuhan kebutuhan dalam negeri harus import dari negara lain. Dan ketiga, kurangnya kesejahteraan peternak karena hasil panen ternak dihargai rendah oleh pasar.</p>
			</div>
		</div>
	</div>
</div>
<div class="container contentContainer displayWeb">
	<div class="content">
		<div class="text-center">
			<img class="lineTitle" src="{{ asset('img/_tentang_kami/line.png') }}">
			<h3 class="font-weight-bold titleSection">Ternaknesia Hadir</h3>
		</div>
		<div class="row">
			<div class="col-12 text-center" id="ternaknesiaHadir">
				<img id="quotesSymbol" class="position-absolute" src="{{ asset('img/_tentang_kami/quotes-symbol.png') }}" alt="Quotes">
				<div class="row mt-0">
					<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mt-0 mb-2" id="ternaknesiaHadirText">
						<div class="text-left">
							<h5 class="font-weight-bold ternaknesiaHadirFontFirst">Pada tahun 2014, Dalu Nuzlul Kirom meluncurkan Ternaknesia sebagai bentuk solusi dari permasalahan pangan dan peternakan di Indonesia.</h5>
						</div>
						<div class="text-right">
							<p class="ternaknesiaHadirFontSecond">Kontribusi Ternaknesia adalah merajut semua titik yang terlibat di dunia peternakan, melalui satu platform digital. Tidak hanya berdiri sebagai bisnis digital. Lebih dari itu, Ternaknesia adalah sebuah gerakan. Gerakan untuk memajukan peternakan di Indonesia dan mewujudkan ketahanan pangan bagi bangsa Indonesia</p>
						</div>
					</div>
					<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 mt-4" id="ternaknesiaHadirGambar">
						<img class="w-100" src="{{ asset('img/_tentang_kami/dalu.png') }}" srcset="{{ asset('img/_tentang_kami/dalu@2x.png') }} 2x" alt="Ternaknesia Hadir">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content displayPhone flex-column">
	<div class="position-relative m-auto w-100" id="ternaknesiaHadirPhone">
		<div class="position-absolute w-100 h-100 mh-100" id="ternaknesiaHadirPhoneContent">
			<div id="backgroundTernaknesiaHadirRight" class="h-100 mh-100 position-absolute"></div>
			<div class="position-relative h-100 m-auto">
				<p class="position-absolute font-weight-bold">Ternaknesia</p>
				<p id="lastPHadir" class="position-absolute font-weight-bold">Hadir</p>
				<img id="daluHadirPhone" class="position-absolute" src="{{ asset('img/_tentang_kami/dalu.png') }}" srcset="{{ asset('img/_tentang_kami/dalu@2x.png') }} 2x" alt="Ternaknesia Hadir">
				<img id="quoteHadirPhone" class="position-absolute" src="{{ asset('img/_tentang_kami/quotes-symbol.png') }}" alt="Quotes">
			</div>
		</div>
	</div>
	<div class="position-relative w-100">
		<div class="container contentContainer">
			<div class="row">
				<div class="col-12">
					<h5 class="font-weight-bold ternaknesiaHadirFontFirst pl-4 pr-2">Pada tahun 2014, Dalu Nuzlul Kirom meluncurkan Ternaknesia sebagai bentuk solusi dari permasalahan pangan dan peternakan di Indonesia.</h5>
				</div>
				<div class="col-12">
					<p class="ternaknesiaHadirFontSecond pl-4 pr-2">Kontribusi Ternaknesia adalah merajut semua titik yang terlibat di dunia peternakan, melalui satu platform digital. Tidak hanya berdiri sebagai bisnis digital. Lebih dari itu, Ternaknesia adalah sebuah gerakan. Gerakan untuk memajukan peternakan di Indonesia dan mewujudkan ketahanan pangan bagi bangsa Indonesia.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container contentContainer">
	<div class="content">
		<div class="text-center">
			<img class="lineTitle" src="{{ asset('img/_tentang_kami/line.png') }}">
			<h3 class="font-weight-bold titleSection">Mari Berkontribusi</h3>
		</div>
		<div class="m-auto w-75 text-center" id="contentSubTitleMariBerkontribusi">
			<p class="mt-5 mb-5" id="mariBerkontribusiFont">Kami meyakini bahwa kedaulatan pangan hanya bisa terwujud apabila <strong>semua elemen bangsa Indonesia</strong> ikut berkontribusi. Oleh karena itu kami ingin mengajak semakin banyak orang bersama-sama berkontribusi untuk mencapai tujuan tersebut.</p>
		</div>
		<div class="row">
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-center">
				<img class="mb-3 mariBerkontribusi" src="{{ asset('img/_tentang_kami/peternak.png') }}" alt="Peternak"/>
				<br/>
				<label class="font-weight-bold mariBerkontribusiFontIcon">Peternak</label>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-center">
				<img class="mb-3 mariBerkontribusi" src="{{ asset('img/_tentang_kami/masyarakat.png') }}" alt="Masyarakat"/>
				<br/>
				<label class="font-weight-bold mariBerkontribusiFontIcon">Masyarakat</label>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-center">
				<img class="mb-3 mariBerkontribusi" src="{{ asset('img/_tentang_kami/pemerintah.png') }}" alt="Pemerintah"/>
				<br/>
				<label class="font-weight-bold mariBerkontribusiFontIcon">Pemerintah</label>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-center">
				<img class="mb-3" src="{{ asset('img/_tentang_kami/Logo Ternaknesia4.png') }}" alt="Ternaknesia">
				<br/>
				<label class="font-weight-bold mariBerkontribusiFontIcon">Ternaknesia</label>
			</div>
		</div>
	</div>
</div>
<div class="content position-relative">
	<div class="position-absolute displayPhone w-100" id="smgtKamiPhoneFirst">
		<img class="h-100 w-100" src="{{ asset('img/_tentang_kami/semangatKami.png') }}" alt="bckgSmgtKami">
	</div>
	<div id="smgtKamiRsponsive">
		<div class="text-center">
			<img class="lineTitle" src="{{ asset('img/_tentang_kami/line.png') }}">
			<h3 class="font-weight-bold titleSection">Semangat Kami</h3>
		</div>
		<div class="m-auto w-75 text-center">
			<p class="mt-5 mb-5 font-weight-bold" id="semangatKamiFont">Keluarga Ternaknesia memiliki semangat <span id="semangatKamiPaculFont">PACUL</span> untuk menciptakan dan memberikan layanan terbaik bagi para sobat di Indonesia</p>
		</div>
		<div class="text-center position-relative" id="semangatKami">
			<div class="position-absolute mw-100 displayWeb" id="firstDivSmgtKami"></div>
			<div id="semangatKamiDiv">
				<div class="position-relative h-100 mh-100">
					<div class="mt-3 mr-auto ml-auto semangatKamiContent">
						<div class="row h-100">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2 mb-2 p-0 d-flex align-items-center justify-content-center">
								<img id="semangatKamiIconP" src="{{ asset('img/_tentang_kami/agriculture.png') }}" alt="Agriculture">
							</div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 mt-2 mb-2 p-0 text-left">
								<div class="d-flex align-items-center mt-0 h-100">
									<label class="font-weight-bold mb-0 semangatKamiPaculDivFont">P</label>
									<div class="d-flex flex-column besideSemangatUp">
										<label class="font-weight-bold mb-0 semangatKamiPaculDivFont2">emberdayaan</label>
										<small class="semangatKamiPaculDivFont3">memberdayakan peternak, petani, dan penambak tradisional hingga meningkatkan efisiensi kerja mereka</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-3 mr-auto ml-auto semangatKamiContent">
						<div class="row h-100">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2 mb-2 p-0 d-flex align-items-center justify-content-center">
								<img id="semangatKamiIconA" src="{{ asset('img/_tentang_kami/loyalty.png') }}" alt="Loyalty">
							</div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 mt-2 mb-2 p-0 text-left">
								<div class="d-flex align-items-center mt-0 h-100">
									<label class="font-weight-bold mb-0 semangatKamiPaculDivFont">A</label>
									<div class="d-flex flex-column besideSemangatUp">
										<label class="font-weight-bold mb-0 semangatKamiPaculDivFont2">manah</label>
										<small class="semangatKamiPaculDivFont3">mewujudkan visi dengan kejujuran dan transparansi proses secara profesional</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-3 mr-auto ml-auto semangatKamiContent">
						<div class="row h-100">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2 mb-2 p-0 d-flex align-items-center justify-content-center">
								<img id="semangatKamiIconC" src="{{ asset('img/_tentang_kami/faster.png') }}" alt="Faster">
							</div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 mt-2 mb-2 p-0 text-left">
								<div class="d-flex align-items-center mt-0 h-100">
									<label class="font-weight-bold mb-0 semangatKamiPaculDivFont">C</label>
									<div class="d-flex flex-column besideSemangatUp">
										<label class="font-weight-bold mb-0 semangatKamiPaculDivFont2">epat</label>
										<small class="semangatKamiPaculDivFont3">dengan cepat meningkatkan portofolio</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-3 mr-auto ml-auto semangatKamiContent">
						<div class="row h-100">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2 mb-2 p-0 d-flex align-items-center justify-content-center">
								<img id="semangatKamiIconU" src="{{ asset('img/_tentang_kami/team.png') }}" alt="Team">
							</div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 mt-2 mb-2 p-0 text-left">
								<div class="d-flex align-items-center mt-0 h-100">
									<label class="font-weight-bold mb-0 semangatKamiPaculDivFont">U</label>
									<div class="d-flex flex-column besideSemangatUp">
										<label class="font-weight-bold mb-0 semangatKamiPaculDivFont2">nggul</label>
										<small class="semangatKamiPaculDivFont3">selalu berusaha menjadi lebih baik dari yang lain</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mt-3 mr-auto ml-auto semangatKamiContent">
						<div class="row h-100">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2 mb-2 p-0 d-flex align-items-center justify-content-center">
								<img id="semangatKamiIconL" src="{{ asset('img/_tentang_kami/respect.png') }}" alt="Respect">
							</div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 mt-2 mb-2 p-0 text-left">
								<div class="d-flex align-items-center mt-0 h-100">
									<label class="font-weight-bold mb-0 semangatKamiPaculDivFont">L</label>
									<div class="d-flex flex-column besideSemangatUp">
										<label class="font-weight-bold mb-0 semangatKamiPaculDivFont2">ove</label>
										<small class="semangatKamiPaculDivFont3">saling memahami dan selalu sharing permasalahan maupun kebahagiaan</small>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="text-center">
		<img class="lineTitle" src="{{ asset('img/_tentang_kami/line.png') }}">
		<h3 class="font-weight-bold titleSection">Bersama Anda</h3>
		<h3 class="font-weight-bold displayPhone justify-content-center titleSection">Ternaknesia dapat meraih</h3>
	</div>
	<div class="position-relative w-100 text-center" id="bckgCarousel">		
		<div class="position-absolute displayPhone" id="bersamaAndaCarousel">
			<img id="phoneCarouselLogo" class="mr-auto ml-auto mt-5 displayPhone" src="{{ asset('img/_tentang_kami/Logo Ternaknesia3.png') }}" alt="Logo">
		</div>
		<img id="webCarousel" class="displayWeb mw-100" src="{{ asset('img/_tentang_kami/carousel.png') }}" alt="carousel">
		<img id="phoneCarousel" class="mt-5 mr-auto ml-auto displayPhone mw-100 mh-100" src="{{ asset('img/_tentang_kami/carousel2.png') }}" alt="carousel">
		<div class="position-absolute" id="contentCarousel">
			<div id="carouselExampleIndicators" class="carousel slide w-100 h-100" data-ride="carousel">
				<ol class="carousel-indicators m-auto">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner m-auto text-center text-white">
					<div class="carousel-item active">
						<h3 class="font-weight-bold bersamaAndaAstraFont">ASTRA AWARDS</h3>
						<small class="bersamaAndaAstraDetailFont">Pemenang juara visioner menuju hidup yang lebih baik</small>
					</div>
					<div class="carousel-item">
						<h3 class="font-weight-bold bersamaAndaAstraFont">ASTRA AWARDS</h3>
						<small class="bersamaAndaAstraDetailFont">Pemenang juara visioner menuju hidup yang lebih baik</small>
					</div>
					<div class="carousel-item">
						<h3 class="font-weight-bold bersamaAndaAstraFont">ASTRA AWARDS</h3>
						<small class="bersamaAndaAstraDetailFont">Pemenang juara visioner menuju hidup yang lebih baik</small>
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
		</div>
	</div>
</div>
<div class="container contentContainerLast">
	<div class="content">
		<div class="text-center">
			<img class="lineTitle" src="{{ asset('img/_tentang_kami/line.png') }}">
			<h3 class="font-weight-bold titleSection">Jejak Kami</h3>
		</div>
		<div class="row">
			<div class="col-12 text-center" id="jejakKami">
				<div class="row mt-0">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<h3 class="jejakKamiTitleFont">Ternaknesia</h3>
						<hr/>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/facebook.svg') }}" srcset="{{ asset('img/_tentang_kami/facebook-1.svg') }} 1x, {{ asset('img/_tentang_kami/facebook-2.svg') }} 2x, {{ asset('img/_tentang_kami/facebook-3.svg') }} 3x, {{ asset('img/_tentang_kami/facebook-4.svg') }} 4x, {{ asset('img/_tentang_kami/facebook-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/instagram.svg') }}" srcset="{{ asset('img/_tentang_kami/instagram-1.svg') }} 1x, {{ asset('img/_tentang_kami/instagram-2.svg') }} 2x, {{ asset('img/_tentang_kami/instagram-3.svg') }} 3x, {{ asset('img/_tentang_kami/instagram-4.svg') }} 4x, {{ asset('img/_tentang_kami/instagram-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/linkedin.svg') }}" srcset="{{ asset('img/_tentang_kami/linkedin-1.svg') }} 1x, {{ asset('img/_tentang_kami/linkedin-2.svg') }} 2x, {{ asset('img/_tentang_kami/linkedin-3.svg') }} 3x, {{ asset('img/_tentang_kami/linkedin-4.svg') }} 4x, {{ asset('img/_tentang_kami/linkedin-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/twitter.svg') }}" srcset="{{ asset('img/_tentang_kami/twitter-1.svg') }} 1x, {{ asset('img/_tentang_kami/twitter-2.svg') }} 2x, {{ asset('img/_tentang_kami/twitter-3.svg') }} 3x, {{ asset('img/_tentang_kami/twitter-4.svg') }} 4x, {{ asset('img/_tentang_kami/twitter-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/youtube.svg') }}" srcset="{{ asset('img/_tentang_kami/youtube-1.svg') }} 1x, {{ asset('img/_tentang_kami/youtube-2.svg') }} 2x, {{ asset('img/_tentang_kami/youtube-3.svg') }} 3x, {{ asset('img/_tentang_kami/youtube-4.svg') }} 4x, {{ asset('img/_tentang_kami/youtube-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<h3 class="jejakKamiTitleFont">TernakInvest</h3>
						<hr/>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/facebook.svg') }}" srcset="{{ asset('img/_tentang_kami/facebook-1.svg') }} 1x, {{ asset('img/_tentang_kami/facebook-2.svg') }} 2x, {{ asset('img/_tentang_kami/facebook-3.svg') }} 3x, {{ asset('img/_tentang_kami/facebook-4.svg') }} 4x, {{ asset('img/_tentang_kami/facebook-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/instagram.svg') }}" srcset="{{ asset('img/_tentang_kami/instagram-1.svg') }} 1x, {{ asset('img/_tentang_kami/instagram-2.svg') }} 2x, {{ asset('img/_tentang_kami/instagram-3.svg') }} 3x, {{ asset('img/_tentang_kami/instagram-4.svg') }} 4x, {{ asset('img/_tentang_kami/instagram-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/linkedin.svg') }}" srcset="{{ asset('img/_tentang_kami/linkedin-1.svg') }} 1x, {{ asset('img/_tentang_kami/linkedin-2.svg') }} 2x, {{ asset('img/_tentang_kami/linkedin-3.svg') }} 3x, {{ asset('img/_tentang_kami/linkedin-4.svg') }} 4x, {{ asset('img/_tentang_kami/linkedin-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/twitter.svg') }}" srcset="{{ asset('img/_tentang_kami/twitter-1.svg') }} 1x, {{ asset('img/_tentang_kami/twitter-2.svg') }} 2x, {{ asset('img/_tentang_kami/twitter-3.svg') }} 3x, {{ asset('img/_tentang_kami/twitter-4.svg') }} 4x, {{ asset('img/_tentang_kami/twitter-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/youtube.svg') }}" srcset="{{ asset('img/_tentang_kami/youtube-1.svg') }} 1x, {{ asset('img/_tentang_kami/youtube-2.svg') }} 2x, {{ asset('img/_tentang_kami/youtube-3.svg') }} 3x, {{ asset('img/_tentang_kami/youtube-4.svg') }} 4x, {{ asset('img/_tentang_kami/youtube-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<h3 class="jejakKamiTitleFont">Ternakmart</h3>
						<hr/>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/facebook.svg') }}" srcset="{{ asset('img/_tentang_kami/facebook-1.svg') }} 1x, {{ asset('img/_tentang_kami/facebook-2.svg') }} 2x, {{ asset('img/_tentang_kami/facebook-3.svg') }} 3x, {{ asset('img/_tentang_kami/facebook-4.svg') }} 4x, {{ asset('img/_tentang_kami/facebook-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/instagram.svg') }}" srcset="{{ asset('img/_tentang_kami/instagram-1.svg') }} 1x, {{ asset('img/_tentang_kami/instagram-2.svg') }} 2x, {{ asset('img/_tentang_kami/instagram-3.svg') }} 3x, {{ asset('img/_tentang_kami/instagram-4.svg') }} 4x, {{ asset('img/_tentang_kami/instagram-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/linkedin.svg') }}" srcset="{{ asset('img/_tentang_kami/linkedin-1.svg') }} 1x, {{ asset('img/_tentang_kami/linkedin-2.svg') }} 2x, {{ asset('img/_tentang_kami/linkedin-3.svg') }} 3x, {{ asset('img/_tentang_kami/linkedin-4.svg') }} 4x, {{ asset('img/_tentang_kami/linkedin-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/twitter.svg') }}" srcset="{{ asset('img/_tentang_kami/twitter-1.svg') }} 1x, {{ asset('img/_tentang_kami/twitter-2.svg') }} 2x, {{ asset('img/_tentang_kami/twitter-3.svg') }} 3x, {{ asset('img/_tentang_kami/twitter-4.svg') }} 4x, {{ asset('img/_tentang_kami/twitter-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/youtube.svg') }}" srcset="{{ asset('img/_tentang_kami/youtube-1.svg') }} 1x, {{ asset('img/_tentang_kami/youtube-2.svg') }} 2x, {{ asset('img/_tentang_kami/youtube-3.svg') }} 3x, {{ asset('img/_tentang_kami/youtube-4.svg') }} 4x, {{ asset('img/_tentang_kami/youtube-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<h3 class="jejakKamiTitleFont">SmartQurban</h3>
						<hr/>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/facebook.svg') }}" srcset="{{ asset('img/_tentang_kami/facebook-1.svg') }} 1x, {{ asset('img/_tentang_kami/facebook-2.svg') }} 2x, {{ asset('img/_tentang_kami/facebook-3.svg') }} 3x, {{ asset('img/_tentang_kami/facebook-4.svg') }} 4x, {{ asset('img/_tentang_kami/facebook-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/instagram.svg') }}" srcset="{{ asset('img/_tentang_kami/instagram-1.svg') }} 1x, {{ asset('img/_tentang_kami/instagram-2.svg') }} 2x, {{ asset('img/_tentang_kami/instagram-3.svg') }} 3x, {{ asset('img/_tentang_kami/instagram-4.svg') }} 4x, {{ asset('img/_tentang_kami/instagram-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/linkedin.svg') }}" srcset="{{ asset('img/_tentang_kami/linkedin-1.svg') }} 1x, {{ asset('img/_tentang_kami/linkedin-2.svg') }} 2x, {{ asset('img/_tentang_kami/linkedin-3.svg') }} 3x, {{ asset('img/_tentang_kami/linkedin-4.svg') }} 4x, {{ asset('img/_tentang_kami/linkedin-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/twitter.svg') }}" srcset="{{ asset('img/_tentang_kami/twitter-1.svg') }} 1x, {{ asset('img/_tentang_kami/twitter-2.svg') }} 2x, {{ asset('img/_tentang_kami/twitter-3.svg') }} 3x, {{ asset('img/_tentang_kami/twitter-4.svg') }} 4x, {{ asset('img/_tentang_kami/twitter-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/youtube.svg') }}" srcset="{{ asset('img/_tentang_kami/youtube-1.svg') }} 1x, {{ asset('img/_tentang_kami/youtube-2.svg') }} 2x, {{ asset('img/_tentang_kami/youtube-3.svg') }} 3x, {{ asset('img/_tentang_kami/youtube-4.svg') }} 4x, {{ asset('img/_tentang_kami/youtube-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<h3 class="jejakKamiTitleFont">SobatTernak</h3>
						<hr/>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/facebook.svg') }}" srcset="{{ asset('img/_tentang_kami/facebook-1.svg') }} 1x, {{ asset('img/_tentang_kami/facebook-2.svg') }} 2x, {{ asset('img/_tentang_kami/facebook-3.svg') }} 3x, {{ asset('img/_tentang_kami/facebook-4.svg') }} 4x, {{ asset('img/_tentang_kami/facebook-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/instagram.svg') }}" srcset="{{ asset('img/_tentang_kami/instagram-1.svg') }} 1x, {{ asset('img/_tentang_kami/instagram-2.svg') }} 2x, {{ asset('img/_tentang_kami/instagram-3.svg') }} 3x, {{ asset('img/_tentang_kami/instagram-4.svg') }} 4x, {{ asset('img/_tentang_kami/instagram-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/linkedin.svg') }}" srcset="{{ asset('img/_tentang_kami/linkedin-1.svg') }} 1x, {{ asset('img/_tentang_kami/linkedin-2.svg') }} 2x, {{ asset('img/_tentang_kami/linkedin-3.svg') }} 3x, {{ asset('img/_tentang_kami/linkedin-4.svg') }} 4x, {{ asset('img/_tentang_kami/linkedin-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/twitter.svg') }}" srcset="{{ asset('img/_tentang_kami/twitter-1.svg') }} 1x, {{ asset('img/_tentang_kami/twitter-2.svg') }} 2x, {{ asset('img/_tentang_kami/twitter-3.svg') }} 3x, {{ asset('img/_tentang_kami/twitter-4.svg') }} 4x, {{ asset('img/_tentang_kami/twitter-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
						<div class="mt-2 mb-0">
							<img class="mr-2" src="{{ asset('img/_tentang_kami/youtube.svg') }}" srcset="{{ asset('img/_tentang_kami/youtube-1.svg') }} 1x, {{ asset('img/_tentang_kami/youtube-2.svg') }} 2x, {{ asset('img/_tentang_kami/youtube-3.svg') }} 3x, {{ asset('img/_tentang_kami/youtube-4.svg') }} 4x, {{ asset('img/_tentang_kami/youtube-5.svg') }} 5x"/>
							<label class="jejakKamiContentFont">@ternaknesia</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="w-100 text-white d-flex align-items-center" id="endContent">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 displayWeb">
				<p class="h4 font-weight-bold" id="downloadAplikasiFont">Tunggu apa lagi?</p>
				<p class="h4 font-weight-bold" id="downloadAplikasiFont">Bergabunglah menjadi bagian kedaulatan pangan Indonesia</p>
				<br/>
				<a id="downloadAplikasiButtonFont" href="#" class="btn btn-light font-weight-bold p-3">Download Aplikasi</a>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 displayPhone text-center">
				<div class="d-block m-auto mw-100">
					<p class="h4 font-weight-bold mb-3" id="downloadAplikasiFont">Tunggu apa lagi?</p>
					<p class="h4 font-weight-bold" id="downloadAplikasiFont">Bergabunglah menjadi bagian kedaulatan pangan Indonesia</p>
					<br/>
					<div class="mt-3 mw-100">
						<a id="downloadAplikasiButtonFont" href="#" class="btn btn-light font-weight-bold p-3 mw-100">Download Aplikasi</a>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-items-center" id="endContentHp">
				<img class="w-100 h-auto position-relative" src="{{ asset('img/_tentang_kami/phone.png') }}" alt="Phone">
			</div>
		</div>
	</div>
</div>
@endsection