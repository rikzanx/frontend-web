<nav class="navbar navbar-expand-lg fixed-top navbar-floating" id="navBar">
    <div class="container" id="navBarContainer">
    <a class="navbar-brand" href="{{ route('ternakmart.index') }}">
        <img src="{{ url('img/marketplace/TFI_Ternaknesia logo.png') }}" >
        <img src="{{ url('img/marketplace/kata.png') }}" >
    </a>
    <button class="navbar-toggler menu-hidden" id="navbarToggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <img src="{{asset('img/assets/bars.png')}}" class="icon-bars" id="bars">
           
            <img src="{{asset('img/assets/close.png')}}" class="icon-close" id="close" style="display: none">
    </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
        <a class="nav-link" href="#"><img src="{{ url('img/marketplace/search.png') }}"></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('ternakmart.produk') }}">Layanan<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Portofolio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('ternakmart.transaksi') }}">Transaksi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><img src="{{ url('img/marketplace/notification.png') }}"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><img src="{{ url('img/marketplace/like-1.png') }}"></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ url('img/marketplace/account.png') }}"></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          @if(Session::has('is_login'))
            <a class="dropdown-item" href="#">Akun Saya</a>
            <a class="dropdown-item" href="#">Promo</a>
            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
          @else
          <a class="dropdown-item" href="{{ route('login') }}">Login</a>
          @endif
          
        </div>
      </li>
            </ul>
        </div>
    </div>
</nav>
<!-- 
<nav class="navbar navbar-expand-lg fixed-top navbar-floating">
  <div class="container">
  <a class="navbar-brand" href="#"><img src="{{ url('img/marketplace/TFI_Ternaknesia logo.png') }}" ><img src="{{ url('img/marketplace/kata.png') }}" ></a>
  <button class="navbar-toggler menu-hidden" id="navbarToggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{asset('img/assets/bars_black.png')}}" class="icon-bars" id="barsBlack">
            <img src="{{asset('img/assets/close.png')}}" class="icon-close" id="close" style="display: none">
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item active">
        <a class="nav-link" href="#"><img src="{{ url('img/marketplace/search.png') }}"></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Layanan<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Portofolio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Transaksi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><img src="{{ url('img/marketplace/notification.png') }}"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><img src="{{ url('img/marketplace/like-1.png') }}"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><img src="{{ url('img/marketplace/account.png') }}"></a>
      </li>
    </ul>
    
  </div>
  </div>
</nav> -->
