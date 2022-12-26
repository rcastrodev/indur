@extends('paginas.partials.app')
@section('content')
@isset($sliders)
	@if (count($sliders))
		<div id="sliderHeroEmpresa" class="carousel slide mb-4" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($sliders as $k => $v)
					<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{ $k}}"></button>					
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($sliders as $k => $v)
				<div class="carousel-item @if(!$k) active @endif">
					<img src="{{ asset($v->image) }}" class="d-block w-100">
					<div class="carousel-caption d-none d-md-block text-start">
						<h2 class="text-white font-size-35 fw-normal mb-4">{!! $v->content_1 !!}</h2>
						<div class="text-white font-size-16 fw-bold">{!! $v->content_2 !!}</div>
					</div>
				</div>				
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@if ($company)
	<div class="pt-3 pb-5">
		<div class="container">
			<div class="row fw-light">
				<div class="col-sm-12 col-md-6">
					<div class="font-size-15 fw-bolder">{!! $company->content_2 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6">
					@if (Storage::disk('custom')->url($company->image))
						<img src="{{ asset($company->image) }}" class="img-fluid">
					@endif
				</div>
			</div>
		</div>
	</div>	
@endif
@isset($section3s)
	@if (count($section3s))
	<div class="bg-light py-1">
		<div id="timeline" class="container mx-auto">
			<ul id="dates">
				@foreach ($section3s as $item)
					<li><a href="#{{$item->content_1}}" class="text-decoration-none text-green">{{$item->content_1}}</a></li>
				@endforeach
			</ul>
			<ul id="issues">
				@foreach ($section3s as $item)
					<li id="{{$item->content_1}}">
						<div class="">{!!$item->content_2!!}</div>
					</li>
				@endforeach
			</ul>
			<div id="grad_left"></div>
			<div id="grad_right"></div>
			<a href="#" id="next">+</a>
			<a href="#" id="prev">-</a>
		  </div>
	</div>
	@endif
@endisset
@isset ($section4)
	<div class="pt-3 pb-5">
		<div class="container row mx-auto">
			<div class="col-sm-12 col-md-6 mb-sm-2 mb-md-0">
				<img src="{{ asset($section4->image) }}" class="img-fluid">
			</div>
			<div class="col-sm-12 col-md-6">
				<h3 class="text-green fw-bold mb-4">{{ $section4->content_1 }}</h3>
				<div class="font-size-14">{!! $section4->content_2 !!}</div>
				@php $items = Str::of($section4->content_3)->explode('|') @endphp
				<ul class="p-0 font-size-14" style="list-style: none">
					@foreach ($items as $item)
						<li><img src="{{ asset('images/Icon-feather-check-square.svg') }}" class="img-fluid me-3">  {{ $item }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>	
@endisset

@isset ($section5s)
	@if (count($section5s))
		<div class="py-5 bg-light">
			<div class="container row mx-auto">
				@foreach ($section5s as $item)
					<div class="col-sm-12 col-md-4">
						<div class="text-center">
							<img src="{{ asset($item->image) }}" class="d-block mx-auto mb-3">
							<h4 class="text-green fw-bold font-size-14 mb-4">{{$item->content_1}}</h4>
							<div class="font-size-14">{!! $item->content_2 !!}</div>
						</div>
					</div>		
				@endforeach
			</div>
		</div>	
	@endif
@endisset
@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/timelinr-0.9.7/css/style.css') }}">
@endpush
@push('scripts')
	<script src="{{ asset('vendor/timelinr-0.9.7/js/jquery.timelinr-0.9.7.js') }}"></script>
	<script>
		$(function(){
		  $().timelinr({
			arrowKeys: 'true'
		  })
		});
	</script>
@endpush