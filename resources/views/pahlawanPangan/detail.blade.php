@extends('layouts.pahlawan.app')

@section('style')
<link href="{{ asset('plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('css/pahlawan/detail.css') }}" rel="stylesheet">
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
  <li class="nav-item">
      <button href="#" class="btn nav-link btn-navbar">Masuk</button>
  </li>
@endsection

@section('content')
@foreach ($results as $result)
<div id="content">
    <div id="content-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 text-center">
                    <div class="image">
                        @foreach($result->image_url as $key => $image)
                           <img src="{{ env('URL_ADMIN') . $image }}">
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 text-left">
                    <div class="title-wrapper">
                        <h2>{{ $result->nama }}</h2>
                        <img src="{{asset('img/assets/pahlawan-pangan/line.png')}}" class="line">
                    </div>
                    <div class="mt-2 desc-container">
                        <ul>
                            <li><img class="mr-2" src="{{asset('img/assets/pahlawan-pangan/detail/home.svg')}}">
                                <label class="text">Jalan Manyar Jaya 23, Surabaya</label>
                            </li>
                            <li><img class="mr-2" src="{{asset('img/assets/pahlawan-pangan/detail/kids-couple.svg')}}">
                                <label class="text">55 Anak Yatim Piatu</label>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-donasi">Donasi Sekarang</a>
                    </div>
                    <div class="foot-container">
                        <a href="#" class="btn btn-share mr-4"><img class="mr-2" src="{{asset('img/assets/pahlawan-pangan/detail/share.svg')}}"> Bagikan</a>
                        <a href="#" class="icon-share"><img class="mr-2" src="{{asset('img/assets/pahlawan-pangan/detail/facebook.svg')}}"></a>
                        <a href="#" class="icon-share"><img class="mr-2" src="{{asset('img/assets/pahlawan-pangan/detail/twitter.svg')}}"></a>
                        <a href="#" class="icon-share"><img class="mr-2" src="{{asset('img/assets/pahlawan-pangan/detail/whatsapp.svg')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content-2">
        <hr class="menu-line">
        <div class="container" role="tablist">
            <div class="menu-wrapper">
                <ul class="row detail-menu nav">
                    <li role="presentation" class="col-sm-4 menu active" style="padding-right:20px;">
                        <a href="#detail" aria-controls="detail" role="tab" data-toggle="tab"> <span>Detail</span></a>
                    </li>
                    <li role="presentation" class="col-sm-4 menu" style="padding-right:20px;">
                        <a href="#laporan" aria-controls="laporan" role="tab" data-toggle="tab"> <span>Laporan</span></a>
                    </li>
                    <li role="presentation" class="col-sm-4 menu" style="padding-right:20px;">
                        <a href="#donatur" aria-controls="donatur" role="tab" data-toggle="tab"> <span>Donatur</span></a>
                    </li>
                </ul>
            </div>

            <div class="row tab-content">
                <div role="tabpanel" class="desc-wrapper tab-pane active" id="detail">
                    <div class="title-wrapper">
                        <h2>{{ $result->nama }}</h2>
                    </div>
                    {!! $result->donasi->content !!}
                </div>
                <div role="tabpanel" class="laporan-wrapper tab-pane" id="laporan">
                    @foreach ($result->laporan_donasi as $laporan_donasi)
                    @if($laporan_donasi->status == 'publish')
                    <div class="carousel-card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-wrapper">
                                    <img class="laporan-slick-prev slick-prev-{{ $loop->iteration }}" src="{{asset('img/assets/pahlawan-pangan/btn-prev.png')}}">
                                    <img class="laporan-slick-next slick-next-{{ $loop->iteration }}" src="{{asset('img/assets/pahlawan-pangan/btn-next.png')}}">
                                </div>
                                <div class="carousel-laporan-{{ $loop->iteration }}">
                                        <div class="carousel-item">
                                            <div class="card-img">
                                                @foreach($laporan_donasi->image as $key => $image)
                                                   <img src="{{ env('URL_ADMIN') . $image }}">
                                                   {{-- <img src="{{asset('img/assets/pahlawan-pangan/detail/anak-yatim-piatu-berdoa-saat.png')}}"> --}}
                                                @endforeach
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-content">
                                    {{-- <div class="title-wrapper">
                                        <h2>Panti Asuhan Cinta Anak</h2>
                                    </div> --}}
                                    {!! str_limit($laporan_donasi->content, 295) !!}
                                    <div class="date-wrapper">
                                        <p>{{ $laporan_donasi->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <a href="#" class="btn btn-lihat-lebih mt-5">Lihat lebih banyak</a>

            </div>
            <div role="tabpanel" class="desc-wrapper tab-pane" id="donatur">
                <div class="title-wrapper">
                    <h2>Donatur</h2>
                </div>
                <p></p>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach
<hr class="end-line">
@endsection

@section('script')
	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('plugins/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pahlawan-pangan.js') }}"></script>
    <script>
        $(".detail-menu li").on("click", function() {
            $(".detail-menu li").removeClass("active");
            $(this).addClass("active");

            for (let index = 1; index < 4; index++) {
                $('.carousel-laporan-' + index).slick('refresh');
            }
        });

        for (let index = 1; index < 4; index++) {
            $('.carousel-laporan-' + index).slick({
                prevArrow: '.slick-prev-' + index,
                nextArrow: '.slick-next-' + index,
                dots: true,
                // autoplay: true,
                autoplaySpeed: 2000,
            });
        }
    </script>
@endsection
