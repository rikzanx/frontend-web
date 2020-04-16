@extends('layouts.smartqurban.app')

@section('style')
<link href="{{ asset('plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('css/smartqurban/main.css') }}" rel="stylesheet">
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
			<button href="#" class="btn nav-link btn-navbar">Masuk</button>
		</li>
@endsection

@section('content')
<div id="banner">
    <div id="bannerContent">
        <div class="banner-wrapper">
            {{-- <img src="{{asset('img/assets/beranda/bg-banner.png')}}" class="bg-banner">
            <img src="{{asset('img/assets/beranda/bg-banner-mobile.png')}}" class="bg-banner-mobile"> --}}
        </div>
        <div class="title-container">
            <div class="text-banner">
                <p>Saatnya Berqurban</p>
                <p>Tanpa Ribet</p>
                <a href="#" class="btn btn-banner">Qurban Sekarang</a>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div id="content-1">
        <div class="container">
            <div class="title-wrapper">
                <h2>Idul Adha Sebentar Lagi Sob</h2>
            </div>
            <div class="timer-wrapper">
                <ul id="countdown">
                    <li><span class="days timenumbers">101</span>
                        <p class="timedescription">Hari</p>
                    </li>
                    <li><span class="timenumbers">'</span>
                    </li>
                    <li><span class="hours timenumbers">09</span>
                        <p class="timedescription">Jam</p>
                        <li><span class="timenumbers">'</span>
                        </li>
                    </li>
                    <li><span class="minutes timenumbers">35</span>
                        <p class="timedescription">Menit</p>
                        <li><span class="timenumbers">'</span>
                        </li>
                    </li>
                    <li><span class="seconds timenumbers">20</span>
                        <p class="timedescription">Detik</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="content-2">
        <div class="container">
            <div class="title-wrapper">
                <h2>Hewan Qurban Kami</h2>
            </div>
            <div class="carousel-wrapper">
                <div class="carousel-galeri">
                    <div class="image">
                        <img src="{{asset('img/assets/ternak-invest/DSC03460.png')}}" alt="">
                    </div>
                    <div class="image">
                        <img src="{{asset('img/assets/ternak-invest/DSC03460.png')}}" alt="">
                    </div>
                    <div class="image">
                        <img src="{{asset('img/assets/ternak-invest/DSC03460.png')}}" alt="">
                    </div>
                    <div class="image">
                        <img src="{{asset('img/assets/ternak-invest/DSC03460.png')}}" alt="">
                    </div>
                    <div class="image">
                        <img src="{{asset('img/assets/ternak-invest/DSC03460.png')}}" alt="">
                    </div>
                </div>
                <div class="btn-wrapper">
                    <img src="{{asset('img/assets/beranda/btn-left.png')}}" class="btn-galeri-prev">
                    <img src="{{asset('img/assets/beranda/btn-right.png')}}" class="btn-galeri-next">
                </div>
            </div>
            <div class="desc-wrapper">
                <p>Hewan qurban dijamin sehat</p>
                <p>dan pilihan terbaik dari peternak Indonesia</p>
            </div>
        </div>
    </div>
    <div id="content-3">
    </div>
    <div id="content-4">
    </div>
</div>
@endsection

@section('script')
	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/slick/slick.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/beranda.js') }}"></script>
	<script type="text/javascript">
	 $(document).ready(function() {
		$('.carousel-galeri').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			arrows: true,
			dots: false,
			centerMode: true,
			variableWidth: true,
			infinite: true,
			focusOnSelect: true,
			cssEase: 'linear',
			touchMove: true,
			prevArrow: '.btn-galeri-prev',
			nextArrow: '.btn-galeri-next',
		});

		var imgs = $('.carousel-galeri img');
		imgs.each(function() {
			var item = $(this).closest('.image');
			item.css({
				'background-image': 'url(' + $(this).attr('src') + ')',
				'background-position': 'center',
				'-webkit-background-size': 'cover',
				'background-size': 'cover',
			});
			$(this).hide();
		});
    });

    (function($) {
        $.fn.countdown = function(options, callback) {
            thisEl = $(this);

            var settings = {
                'date': null,
                'format': null
            };

            if (options) {
                $.extend(settings, options);
            }

            function countdown_proc() {
                var eventDate = Date.parse(settings.date) / 1000;
                var currentDate = Math.floor($.now() / 1000);

                if (eventDate <= currentDate) {
                    callback.call(this);
                    clearInterval(interval);
                }

                var seconds = eventDate - currentDate;
                var days = Math.floor(seconds / (60 * 60 * 24));

                seconds -= days * 60 * 60 * 24;

                var hours = Math.floor(seconds / (60 * 60));
                seconds -= hours * 60 * 60;

                var minutes = Math.floor(seconds / 60);
                seconds -= minutes * 60;

                if (settings.format == "on") {
                    days = (String(days).length >= 2) ? days : "0" + days;
                    hours = (String(hours).length >= 2) ? hours : "0" + hours;
                    minutes = (String(minutes).length >= 2) ? minutes : "0" + minutes;
                    seconds = (String(seconds).length >= 2) ? seconds : "0" + seconds;
                }

                thisEl.find(".days").text(days);
                thisEl.find(".hours").text(hours);
                thisEl.find(".minutes").text(minutes);
                thisEl.find(".seconds").text(seconds);
            }

            countdown_proc();
            interval = setInterval(countdown_proc, 1000);
        };
    })(jQuery);

    $("#countdown").countdown({
        date: "31 July 2020 06:00:00",
        format: "on"
    },

    function() {
        console.log('Idul Adha')
    });
	</script>
@endsection
