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
						<h1 class="text-white font-size-30 fw-normal mb-4">{!! $v->content_1 !!}</h1>
					</div>
				</div>				
				@endforeach
			</div>
		</div>		
	@endif
@endisset
@if ($section2)
	<div class="pt-3 pb-5">
		<div class="container mx-auto">
			<div class="row justify-content-between">
				<div class="col-sm-12 col-md-3 d-flex align-items-center">
					<div class="fw-bolder font-size-30 text-green">{{ $section2->content_1 }}</div>
				</div>
				<div class="col-sm-12 col-md-8">{!! $section2->content_2 !!}</div>
			</div>
		</div>
	</div>	
@endif
@isset ($section3s)
	@if (count($section3s))
		<div class="py-5 bg-light">
			<div class="container mx-auto row">
				@foreach ($section3s as $item)
					<div class="col-sm-12 col-md-4 mb-5">
						<div class="text-center">
							<div class="mb-4" style="box-sizing: content-box; padding: 12px 20px; border: 1px solid #8CBD28; display: inline-block;
							border-radius: 100%;">
								<img src="{{ asset($item->image) }}" class="d-block mx-auto" width="35" height="47">
							</div>
							<div class="font-size-14">{!! $item->content_1 !!}</div>
						</div>
					</div>		
				@endforeach
			</div>
		</div>	
	@endif
@endisset
@isset ($section4s)
	@if (count($section4s))
		<div class="py-5">
			<div class="container row mx-auto">
				@foreach ($section4s as $item)
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
			</div>
		</div>	
	@endif
@endisset
@endsection