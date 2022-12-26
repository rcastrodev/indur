@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-breadcrumb py-2 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></a></li>
			<li class="breadcrumb-item active" aria-current="page">mercados</li>
		</ol>
	</div>
</div>
@if (count($mercados))
    <div class="py-sm-2 py-md-5">
        <div class="container">
            <div class="">
                <section class="producto row font-size-14">
                    @foreach ($mercados as $mercado)
                        <div  class="col-sm-12 col-md-4 mb-sm-3 mb-md-5">
                            <div class="card mercado text-decoration-none d-block position-relative">
                                <a href="{{ route('mercado', ['market'=> $mercado->id]) }}" class="position-absolute pantallax text-decoration-none"><i class="fas fa-plus text-white font-size-42"></i></a>
                                <img src="{{ asset($mercado->image) }}" class="img-fluid w-100">
                                <div class="card-body">
                                    <h5 class="card-title text-center fw-bold text-dark">{{ $mercado->name }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach                
                </section>    
            </div>
        </div>
    </div>       
@endif


@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
