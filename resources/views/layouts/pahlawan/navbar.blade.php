<nav class="navbar navbar-expand-lg fixed-top navbar-floating" id="navBar">
    <div class="container" id="navBarContainer">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset('img/logo/ternaknesia_logo_orange.png')}}" class="logo" id="logoOrange">
            <img src="{{asset('img/logo/ternaknesia_logo_text_black.png')}}" class="logo-text" id="logoTextBlack">
        </a>
        <button class="navbar-toggler menu-hidden" id="navbarToggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{asset('img/assets/bars_black.png')}}" class="icon-bars" id="barsBlack">
            <img src="{{asset('img/assets/close.png')}}" class="icon-close" id="close" style="display: none">
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
                @yield('navbar')
            </ul>
        </div>
    </div>
</nav>
