@extends('layouts.ternakinvest.page')
@push('after_styles')
	<link href="{{ asset('css/invest/produk.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/detail-invest.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/slick/slick.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/footer.css') }}" rel="stylesheet">
	<link href="{{ asset('css/invest/button.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-detail-invest">
	<div class="col-md-12">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		 	<ol class="carousel-indicators">
	 			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	 			<li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
		 	</ol>
		 	<div class="carousel-inner">
	 			<div class="carousel-item active">
					<img class="d-block w-100" src="{{ asset('img/assets/beranda/sapi.jpg') }}" alt="First slide">
			    </div>
			    <div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('img/assets/beranda/sapi.jpg') }}" alt="First slide">
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
	<div class="divider"></div>
	<div class="col-md-12">
		<h3 class="title">Proyek TernakInvest</h3>
	</div>
	<div class="divider"></div>
	<div class="container-data">
		<div class="col-md-12">
			<div class="row container-load-more">
				@foreach($results as $result)
					{!! App\Http\Controllers\Invest\InvestController::template($result) !!}
				@endforeach
			</div>
		</div>
		<div class="col-md-12">
			@if($pagination->per_page >= 10)
				<button class="btn btn-large btn-invest load-more" next-page="{{ $next_page }}">
					Load More
				</button>
			@endif
		</div>
	</div>
</div>
@push('after_scripts')
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script>
		$(document).ready(function(){
			$(document).on('click','.load-more',function(){
				next_page = $(this).attr('next-page');
		    	$(".load-more").html("Loading....");
		       	$.ajax({
					url : '{{ route("ternakinvest.loadData") }}',
					method : "GET",
					data: {page: next_page},
					dataType : "text",
		           	success : function (data)
		           	{
		           		var obj = JSON.parse(data);
						if(data != '') 
						{
							if(obj.last_page <= obj.next_page){
								$('.container-load-more').append(obj.data);
								$(".load-more").attr('next-page', obj.next_page);
								$(".load-more").html("Load More");
							} else {
								$(".load-more").css("display", "none");
							}
						}
						else
						{
							$('#btn-more').html("No Data");
						}
		        	}
		       	});
			});  
		}); 
	</script>
@endpush
@endsection
