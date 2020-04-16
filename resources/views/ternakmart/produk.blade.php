@extends('layouts.ternakmart.app')

@section('style')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link href="{{ asset('css/ternakmart/produk.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<!-- Banner -->
<div class="container banner">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ url('img/marketplace/banner.png') }}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ url('img/marketplace/banner.png') }}" alt="First slide">
      </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ url('img/marketplace/banner.png') }}" alt="First slide">
        </div>
    </div>
  </div>
</div>
<!-- End Banner -->

<!-- Menu produk -->
<div class="container horizontal-scrollable">
  <div class="row produk-menu">
    @foreach($category_list as $c)
        <div class="col-xs-4 menu 
        @if($category==$c["id"])
        active
        @endif
        " onclick="change_category({{$c['id']}})">
          {{$c['nama']}}
        </div>
    @endforeach
  </div>
</div>

<!-- End Menu produk -->

<!-- PRoduk -->
<div class="container">
  <div id="daftar-produk">
    <div class="row">
        @if(empty($produk) && empty($lat) && empty($lng))
          <div class="col-md-12 text-center my-auto">
              <br>
              <h3>Untuk melihat produk klik tambahkan lokasi</h3>  
              <p>
              <button class="btn btn-primary" onclick="select_location()">Tambah Lokasi</button>
              </p>          
              <div class="maps-container">
                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <div id="map"></div>
              </div>
          </div>
        @elseif(empty($produk))
          <div class="maps-container" style="display:none">
            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
            <div id="map"></div>
          </div>
          <div class="col-md-12 text-center">
              <br>
              <h3>Produk Kosong</h3>  
              <p>
              </p>          
          </div>
        @else
          <div class="maps-container" style="display:none">
            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
            <div id="map"></div>
          </div>
          @foreach($produk as $p)
            @foreach($p['harga_produk'] as $harga)
                @php
                    $harga_asli = $harga['harga_asli'];
                    $harga_jual = $harga['harga_jual'];
                    $jumlah=0;
                @endphp
                 @php
                    $harga_asli = $harga['harga_asli'];
                    $harga_jual = $harga['harga_jual'];
                    $jumlah=0;
                    foreach($cart_data as $key=>$cart){
                      if($cart['id'] == $p['id']){
                        $jumlah = $cart['jumlah'];
                      }
                    }
                @endphp 
            @endforeach
          <div class="col-md-6 col-sm-12 produk-container">
            <div class="row produk">
              <div class="col-md-4 col-4" onclick='showmodal("{{$p['id']}}")'>
                <img style="width:100%;" class="image-product" src="https://api.ternaknesia.com/{{ $p['image_url'][0] }}" alt="">
              </div>
              <div class="col-md-8 col-8">
                <div class="name-produk">
                  <h4 onclick='showmodal("{{$p['id']}}")'>{{ $p['nama'] }}</h4>
                  <i class="fas fa-heart favorit"></i>
                </div>
                <div class="detail">
                  <h6 class="price">{{ $harga_asli }}</h6>
                  <h5 class="price-now">{{ $harga_jual }}</h5>
                  @if($jumlah>0)
                    <button style="display:none;" class="btn btn-large btn-primary btn-beli {{$p['id']}}" onclick='btnbeli("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")'>Beli</button>
                    <div style="display:flex;" class="form-inline btn-jumlah {{$p['id']}}">
                      <button class="btn btn-primary btn-minus {{$p['id']}} mb-2" onclick='btnminus("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >-</button>
                      <h2 class="jumlah {{$p['id']}}">{{$jumlah}}</h2>
                      <button class="btn btn-primary btn-plus {{$p['id']}} mb-2" onclick='btnplus("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >+</button>
                    </div>
                  @else
                    <button class="btn btn-large btn-primary btn-beli {{$p['id']}}" onclick='btnbeli("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")'>Beli</button>
                    <div class="form-inline btn-jumlah {{$p['id']}}">
                      <button class="btn btn-primary btn-minus {{$p['id']}} mb-2" onclick='btnminus("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >-</button>
                      <h2 class="jumlah {{$p['id']}}">0</h2>
                      <button class="btn btn-primary btn-plus {{$p['id']}} mb-2" onclick='btnplus("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >+</button>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @endif
    </div>

    @if(!empty($produk))
      <div class="row">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" onclick="prev_page({{$pagination}})">Previous</a></li>
            @for ($i = 1; $i <= $pagination ; $i++)
            <li class="page-item"><a class="page-link" onclick="change_page({{$i}})">{{ $i }}</a></li>
            @endfor
            <li class="page-item"><a class="page-link" onclick="next_page({{$pagination}})">Next</a></li>
          </ul>
        </nav>
      </div>
    @endif

  </div>
</div>
<!-- End produk -->

<!-- Modal -->
@if(!empty($produk))
  <!-- Floating Div -->
  <div class="fixed-bottom">
    <div class="container">
      <div class="row floating-div" onclick="showcart()">
        <div class="col-6 col-md-6">
          <h4>Lihat keranjang</h4>
        </div>
        <div class="col-6 col-md-6 total">
        <h4><span class="cart-jumlah">{{$cart_jumlah}}</span> Item | Rp. <span class="total-harga">{{$total_harga}}</span> </h4>
        </div>
      </div>
    </div>
  </div>
  <!-- End Floating Div -->

  <!-- Modal produk -->
  @php
      $index=0;
    @endphp
    @foreach($produk as $p)
      @foreach($p['harga_produk'] as $harga)
          @php
              $harga_asli = $harga['harga_asli'];
              $harga_jual = $harga['harga_jual'];
              $jumlah=0;
          @endphp
          @php
              $harga_asli = $harga['harga_asli'];
              $harga_jual = $harga['harga_jual'];
              $jumlah=0;
              foreach($cart_data as $key=>$cart){
                if($cart['id'] == $p['id']){
                  $jumlah = $cart['jumlah'];
                }
              }
          @endphp
      @endforeach
    <div class="modal fade {{$p['id']}} modal-{{$index}}" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        {{-- modal content --}}
        <div class="modal-content">
          {{-- modal header --}}
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="modal-close-btn"><i class="fas fa-times"></i></span>
            </button>
          </div>
          {{-- end modal header --}}

          {{-- modal-body --}}
          <div class="modal-body">
            <div class="row">
              {{-- modal kiri --}}
              <div class="col-sm-6">
                <div class="row">
                  {{-- nama produk --}}
                  <div class="col-sm-7">
                    <div class="title-wrapper">
                      <h5>Telur Ayam Negeri</h5>
                    </div>
                  </div>
                  {{-- end nama produk --}}
                  {{-- btn-share --}}
                  <div class="col-sm-5">
                    <div class="btn-share-wrapper">
                      <button class="btn btn-primary"><img class="mr-2" src="{{ asset("img/assets/ternakmart/share.svg") }}"> Share</button>
                    </div>
                  </div>
                  {{-- end btn-share --}}
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    {{-- foto dan love --}}
                    <img class="foto-detail img-responsive" style="width:100%; " src="https://api.ternaknesia.com/{{ $p['image_url'][0] }}" alt="">
                    <div class="circle">
                      <img  src="{{ url('img/marketplace/like-red.png') }}" alt="">
                    </div>
                    {{-- end foto dan love --}}
                  </div>
                </div>
              </div>
              {{-- end modal-kiri --}}

              {{-- modal kanan --}}
              <div class="col-sm-6">
                {{-- informasi kanan --}}
                <div class="info-wrapper">
                  <h6>Informasi</h6>
                </div>
                {{-- end informasi kanan --}}

                {{-- bintang rating dan ulasan --}}
                <div class="rating-wrapper">
                  <p class="rating">
                    @for($a=1;$a<=$p["rating"];$a++)
                      <i class="fas fa-star y-star"></i>
                    @endfor
                    @for($a=1;$a<=(5-$p["rating"]);$a++)
                      <i class="fas fa-star"></i>
                    @endfor
                  </p>
                  <p class="jumlah-ulasan">
                    545 Ulasan
                  </p>
                </div>
                {{-- end bintang rating dan ulasan --}}

                {{-- judul untuk mobile --}}
                <div class="title-wrapper-mobile">
                  <h5>Telur Ayam Negeri</h5>
                </div>
                {{-- end judul untuk mobile --}}

                {{-- detail --}}
                <div class="container-detail">
                  {{-- harga --}}
                  <div class="price-wrapper">
                    <p class="modal-price">Rp. {{ $harga_asli }}</p>
                    <p class="modal-price-now">Rp. {{ $harga_jual }}<span class="modal-unit"> / 10Kg</span</p>
                  </div>
                  {{-- end harga --}}
                  {{-- detail terjual terbeli --}}
                  <div class="detail-wrapper">
                    <p>
                    <img src="{{ url('img/marketplace/shopping-cart.png') }}" alt=""> 
                    terjual <span class="terjual">12</span>
                    </p>
                    <p>
                    <img src="{{ url('img/marketplace/fair-stand.png') }}" alt=""> 
                    tersedia > <span class="stock">{{$p["available_stock"]}}</span> stok
                    </p>
                    <p>
                    <img src="{{ url('img/marketplace/favorite-heart-button.png') }}" alt=""> 
                    difavoritkan <span class="jumlah-favorit">1500</span>
                    </p>
                  </div>
                  {{-- end detail terjual terbeli --}}
                  {{-- desc --}}
                  <div class="desc-wrapper">
                    <p class="stock-desc">Stok lebih dari <span class="stock">{{$p["available_stock"]}}</span> kg</p>
                    <p class="title-desc"><b>Deskripsi</b></p>
                    <p class="deskripsi">
                      @php
                      echo str_replace("<b/>","</b>",$p['deskripsi']);
                      @endphp
                    </p>
                  </div>
                  {{-- end desc --}}
                </div>
                {{-- end detail --}}
              </div>
              {{-- end modal-kanan --}}
            </div>
          </div>
          {{-- end modal-body --}}
          <div class="modal-footer">
            {{-- kiri --}}
            <div class="col-sm-6 btn-back-wrapper">
            <div style="display:flex" class="row {{$p['id']}}">
            <div class="col-md-12">
            <button class="btn btn-secondary btn-block {{$p['id']}}" onclick='btnplus("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >Kembali</button>
            </div>
            </div>  
            </div>
            {{-- end kiri --}}
            {{-- kanan --}}
            <div class="col-sm-6 btn-wrapper">
              @if($jumlah>0)
                <div style="display:none" class="row btn-beli-modal {{$p['id']}}">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-block  {{$p['id']}}" onclick='btnbeli("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >Tambahkan ke keranjang</button>
                  </div>
                </div> 
                <div style="display:flex" class="row btn-jumlah {{$p['id']}}">
                  <div class="col-md-53 btn-qty-minus">
                    <button class="btn btn-primary btn-block btn-minus {{$p['id']}}" onclick='btnminus("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >-</button>
                  </div>
                  <div class="col-md-2 btn-qty">
                    <h2 class="jumlah-modal {{$p['id']}}">{{$jumlah}}</h2>
                  </div>
                  <div class="col-md-5 btn-qty-plus">
                    <button class="btn btn-primary btn-block btn-plus {{$p['id']}}" onclick='btnplus("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >+</button>
                  </div>
                </div>
              @else
                <div style="display:flex" class="row btn-beli-modal {{$p['id']}}">
                  <div class="col-md-12">
                  <button class="btn btn-primary btn-block  {{$p['id']}}" onclick='btnbeli("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >Tambahkan ke keranjang</button>
                  </div>
                </div> 
                <div style="display:none" class="row btn-jumlah {{$p['id']}}">
                  <div class="col-md-5 btn-qty-minus">
                    <button class="btn btn-primary btn-block btn-minus {{$p['id']}}" onclick='btnminus("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >-</button>
                  </div>
                  <div class="col-md-2 btn-qty">
                    <h2 class="jumlah-modal {{$p['id']}}">0</h2>
                  </div>
                  <div class="col-md-5 btn-qty-plus">
                    <button class="btn btn-primary btn-block btn-plus {{$p['id']}}" onclick='btnplus("{{$p['id']}}","{{$p['nama']}}","{{$harga_jual}}")' >+</button>
                  </div>
                </div>
              @endif  
            </div>
            {{-- end kanan --}}
          </div>
        </div>
        {{-- end modal content --}}
      </div>
    </div>
    @php
      $index++;
    @endphp
  @endforeach
  <!-- End Modal produk -->
@endif
  <!-- Modal -->





@endsection

@section('script')
<script type="text/javascript" src="{{ url('js/ternakmart/produk.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY3pxEXVMMycamj5ImFQW2D2yhfZ2eR3A&libraries=places&callback=initAutocomplete" async defer></script>
<script type="text/javascript">
  var lat_select = "";
  var lng_select = "";
  var address_components;
  var formatted_address;
  var kode_pos;

  function select_location(){
    if(lat_select == "" && lng_select == ""){
      alert('Pilih lokasi terlebih dahulu');
    }else{
      cek_location(lat_select,lng_select,address_components,formatted_address,kode_pos);
    }
  }

  function cek_location(lat_select,lng_select,address_components,formatted_address,kode_pos){
    $.ajax({
        type: "POST",
        url: "/ternakmart/checkLocation",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            lat: lat_select,
            lng: lng_select,
            alamat_lengkap: formatted_address,
            address: address_components,
            kode_pos: kode_pos
        },
        success: function (data) {
            if(data['status'] == 'ok'){
              location.href = "produk?lat=" + data['lat'] + "&lng=" + data['lng'];
            }else{
              alert('pilih alamat lain');
            }
        },
        error: function (errorMessage) {
            alert("gagal");
            alert(errorMessage);
        }
    });
    if(address_components.length == 5){
      console.log("a");
    }else if(address_components.length == 6){
      console.log("b");
      
    }else{
      console.log("c");
    }
  }

  function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {
            lat: -7.2574719, 
            lng: 112.7520883
          },
          zoom: 14,
          mapTypeId: 'roadmap'
        });

        map.addListener('click', function(mapsMouseEvent) {
          console.log(mapsMouseEvent);

          // // Close the current InfoWindow.
          // infoWindow.close();

          // // Create a new InfoWindow.
          // infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
          // infoWindow.setContent(mapsMouseEvent.latLng.toString());
          // infoWindow.open(map);
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("bs");
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
              console.log("bs");
              console.log(place);
              console.log(place.geometry.location.lat());
              console.log(place.geometry.location.lng());
              console.log(place.address_components.length);
              var geocoder = new google.maps.Geocoder;
              var latlng = {
                  lat: place.geometry.location.lat(),
                  lng: place.geometry.location.lng()
              };
              geocoder.geocode({ 'location': latlng }, function (results, status) {
                  if (status === 'OK') {
                      if (results[0]) {
                          var c=results[0].address_components;
                          c.forEach(function(item) {
                              if(item['types'] == "postal_code"){
                                  kode_pos = item['long_name'];
                              }
                          });
                          rs = results[0].formatted_address;
                      } else {
                          rs = 'No results found';
                      }
                  } else {
                      rs = 'Geocoder failed due to: ' + status;
                  }
              });
              infoWindow = new google.maps.InfoWindow({position: place.geometry.location});
              if(place.address_components.length == 5)
              {
                lat_select = place.geometry.location.lat();
                lng_select = place.geometry.location.lng();
                address_components = place.address_components;
                formatted_address = place.formatted_address;

                console.log(place.address_components[0]['long_name']); // kelurahan
                console.log(place.address_components[1]['long_name']); // kecamatan
                console.log(place.address_components[2]['long_name']); //kota
                console.log(place.address_components[3]['long_name']); // provinsi
                console.log(place.address_components[4]['long_name']); // negara
                infoWindow.setContent(place.name.toString()+place.formatted_address.toString()+ "\r\n" +"Klik button diatas untuk melanjutkan");
                infoWindow.open(map);
              }else if(place.address_components.length == 6){
                lat_select = place.geometry.location.lat();
                lng_select = place.geometry.location.lng();
                address_components = place.address_components;
                formatted_address = place.formatted_address;

                console.log(place.address_components[0]['long_name']); // nama jalan
                console.log(place.address_components[1]['long_name']); // kelurahan
                console.log(place.address_components[2]['long_name']); // kecamatan
                console.log(place.address_components[3]['long_name']); //kota
                console.log(place.address_components[4]['long_name']); // provinsi
                console.log(place.address_components[5]['long_name']); // negara
                infoWindow.setContent(place.name.toString()+place.formatted_address.toString()+ "\r\n" +"Klik button diatas untuk melanjutkan");
                infoWindow.open(map);
              }else{
                console.log("kelurahan tidak ada");
                infoWindow.setContent("Pilih alamat yang lengkap");
                infoWindow.open(map);
              }
              
            } else {
              bounds.extend(place.geometry.location);
              console.log("b");
            }
          });
          map.fitBounds(bounds);
        });
      }
</script>

@endsection
