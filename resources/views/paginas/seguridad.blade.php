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
					<div class="carousel-caption d-none d-md-block text-start" style="min-width: 60%; top: 10%; margin: auto; left: 0; right: 0;">
						<h1 class="font-size-30 fw-normal text-center mb-4">{!! $v->content_1 !!}</h1>
					</div>
				</div>				
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@if ($section2)
	<div class="pt-3 pb-5">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-sm-12">
					<div class="fw-bolder font-size-30 text-green mb-5">{{ $section2->content_1 }}</div>
				</div>
				<div class="col-sm-12 col-md-6 mb-4">{!! $section2->content_2 !!}</div>
				<div class="col-sm-12 col-md-6 mb-4">{!! $section2->content_3 !!}</div>
				@isset ($section3s)
					@if (count($section3s))
						@foreach ($section3s as $item)
							<div class="col-sm-12 col-md-6 mb-4">
								<div class="bg-light d-flex justify-content-between align-items-center py-2 px-4">
									<div class="">
										<h6 class="font-size-16">{{ $item->content_1 }}</h6>
										<span class="font-size-14">{{ $item->content_2 }}</span>
									</div>
									@if ($item->image)
										@if (Storage::disk('custom')->exists($item->image))
											<a href="{{ route('descargable', ['id'=> $item->id, 'campo' => 'image']) }}"><img src="{{ asset('images/baseline-get_app-24px.svg') }}" class="img-fluid" width="24"></a>	
										@endif
									@endif
								</div>
							</div>		
						@endforeach
					@endif
				@endisset
			</div>
		</div>
	</div>	
@endif
@isset($section4)
<div class="py-5 bg-light">
	<div class="container row mx-auto">
		<div class="col-sm-12">
			<h2 class="text-green">{{ $section4->content_1 }}</h2>
			<div class="mb-4">{!! $section4->content_2 !!}</div>
		</div>
		@isset ($section5s)
			@if (count($section5s))
				@foreach ($section5s as $item)
					<div class="col-sm-12 col-md-4 mb-5">
						<div class="card p-3 h-100" style="background-image: url({{ asset($item->image) }}); background-size: 100% 100%;">
							<img src="{{ asset($item->content_3) }}" class="img-fluid my-3 d-block mx-auto" style="max-width: 53px; max-height: 53px; min-height: 53px; min-width: 53px;">
							<div class="card-body">
							  <h5 class="card-title text-white mb-4 text-center">{{ $item->content_1 }}</h5>
							  <div class="card-text text-white">{!! $item->content_2 !!}</div>
							</div>
						  </div>
					</div>		
				@endforeach
			@endif
		@endisset
	</div>
</div>	
@endisset
@endsection
@push('head')
	<style>
		#sliderHeroEmpresa img{
			height: 237px;
		}
	</style>
@endpush