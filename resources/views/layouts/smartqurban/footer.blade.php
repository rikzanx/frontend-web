<div id="footer">
	<div class="container">
		<div class="row ft-sec-1">
			<div class="col-2" id="ftSec1">
				<div class="logo-content">
					<img src="{{asset('img/logo/ternaknesia_logo_with_text.png')}}" class="ft-logo">
				</div>
			</div>
			<div class="col-2" id="ftSec2">
				<ul class="footer">
					<li class="ft-item">
						<a href="{{ route('home') }}" class="ft-link">Beranda</a>
					</li>
					<li class="ft-item">
						<a href="{{ route('tentang-kami') }}" class="ft-link">Tentang Kami</a>
					</li>
					<li class="ft-item">
						<a href="#blog" class="ft-link">Blog</a>
					</li>
					<li class="ft-item">
						<a href="#karir" class="ft-link">Karir</a>
					</li>
					<li class="ft-item">
						<a href="#donasi" class="ft-link">Donasi</a>
					</li>
				</ul>
			</div>
			<div class="col" id="ftSec3">
				<ul class="footer">
					<li class="ft-item">
						<a href="{{ route('ternakmart') }}" class="ft-link">Ternakmart</a>
					</li>
					<li class="ft-item">
						<a href="{{ route('ternak-invest') }}" class="ft-link">TernakInvest</a>
					</li>
					<li class="ft-item">
						<a href="{{ route('pahlawanPangan.index') }}" class="ft-link">Pahlawan Pangan</a>
					</li>
					<li class="ft-item">
						<a href="{{ route('smartqurban.index') }}" class="ft-link">Smartqurban</a>
					</li>
				</ul>
			</div>
			<div class="col" id="ftSec4"></div>
			<div class="col-3" id="ftSec5">
				<div class="text-unduh">Unduh aplikasi Ternaknesia</div>
				<div id="imgStore">
					<div class="store-item">
						<a href="https://play.google.com/store/apps/details?id=com.ternaknesia.app" class="ft-link">
							<img src="{{asset('img/assets/google_play.png')}}" class="img-store-google">
						</a>
					</div>
					{{-- <div class="store-item">
						<a href="#" class="ft-link">
							<img src="{{asset('img/assets/app_store.png')}}" class="img-store-apple">
						</a>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="container footer-bottom">
		<div class="row ft-sec-2">
			<div class="col" id="copyright">
				&copy; 2019 PT Ternaknesia Farm Innovation
			</div>
			<div class="col-sm social-media" id="socialMedia">
				<a href="#"><img src="{{asset('img/assets/facebook.png')}}" class="social-icon"></a>
				<a href="#"><img src="{{asset('img/assets/instagram.png')}}" class="social-icon"></a>
				<a href="#"><img src="{{asset('img/assets/linkedin.png')}}" class="social-icon"></a>
				<a href="#"><img src="{{asset('img/assets/twitter.png')}}" class="social-icon"></a>
				<a href="#"><img src="{{asset('img/assets/youtube.png')}}" class="social-icon"></a>
			</div>
			<div class="col-sm text-right" id="faq">
				<a href="#">Syarat dan Ketentuan</a> <strong>|</strong> <a href="#">FAQ</a>
			</div>
		</div>
	</div>
</div>