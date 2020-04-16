<nav class="navbar navbar-expand-lg fixed-top navbar-main" id="navBar">
    <div class="container" id="navBarContainer">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset('img/logo/ternaknesia_logo.png')}}" class="logo" id="logo">
            <img src="{{asset('img/logo/ternaknesia_logo_text.png')}}" class="logo-text" id="logoText">
            <img src="{{asset('img/logo/ternaknesia_logo_orange.png')}}" class="logo" id="logoOrange" style="display: none">
            <img src="{{asset('img/logo/ternaknesia_logo_text_black.png')}}" class="logo-text" id="logoTextBlack" style="display: none;">
        </a>
        <button class="navbar-toggler menu-hidden" id="navbarToggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{asset('img/assets/bars.png')}}" class="icon-bars" id="bars">
            <img src="{{asset('img/assets/bars_black.png')}}" class="icon-bars" id="barsBlack" style="display: none;">
            <img src="{{asset('img/assets/close.png')}}" class="icon-close" id="close" style="display: none">
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                <form class="form-inline" id="formSearch">
                    <div class="input-group nav-search">
                        <i class="fa fa-search icon"></i>
                        <input class="form-control input-search" type="search" placeholder="Mau cari Susu Sapi" aria-label="Search">
                    </div>
                </form>
                @yield('navbar')
                
            </ul>
        </div>
    </div>
</nav>
