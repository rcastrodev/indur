@extends('paginas.partials.app')
@section('content')
@isset($section1s)
	@if (count($section1s))
		<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($section1s as $k => $v)
					<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($section1s as $k => $v)
					<div class="carousel-item @if(!$k) active @endif">
						<img src="{{ asset($v->image) }}" class="d-block w-100">
						<div class="carousel-caption d-none d-md-block text-start">
							<h2 class="text-white font-size-35">{!! $v->content_1 !!}</h2>
						</div>
					</div>
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@if (count($products))
	<section class="py-5 bg-white">
		<h2 class="text-center fw-bold mb-5 text-uppercase font-size-22 text-green">Productos destacados</h2>
		<div class="container row mx-auto mt-5">
			@foreach ($products as $p)
				<div class="col-sm-12 col-md-3 mb-3">
					@include('paginas.partials.producto', ['p' => $p])
				</div>
			@endforeach
		</div>
	</section>
@endif
@isset($section2)
	<section id="section2" class="bg-light py-sm-3 py-md-5">
		<div class="container row mx-auto">
			<div class="col-sm-12 col-md-8 mx-auto text-center">
				<h3 class="font-size-42">{!!$section2->content_1!!}</h3>
			</div>
		</div>
	</section>
@endisset
@isset($section3s)
	@if (count($section3s))
		<section id="section3" style="background-image: url({{ asset('images/2022-01-11.jpeg') }}); background-size: 100% 100%;">
			<div class="container d-flex flex-wrap justify-content-between" style="min-height:306px;">
				@foreach ($section3s as $s3)
					<div class="d-flex align-items-center">
						<img src="{{ asset($s3->image) }}" alt="">
						<p class="text-white fw-bold m-b-0 ms-3 font-size-20">{{$s3->content_1}}</p>
					</div>
				@endforeach
			</div>
		</section>
	@endif
@endisset
@isset($section4)
	<section id="section4" class="bg-light py-sm-3 py-md-5">
		<div class="container row mx-auto">
			<div class="col-sm-12 text-center">
				<h3 class="font-size-22 text-green fw-bold mb-5">{{$section4->content_1}}</h3>
			</div>
			<div class="w-100"></div>
			<div class="col-sm-12 text-center">
				<div class="font-size-21" style="color: #5B5B5B;">{!!$section4->content_2!!}</div>
			</div>
		</div>
	</section>
@endisset
@endsection