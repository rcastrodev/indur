@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-light py-2 font-size-14">
    <ol class="breadcrumb container">
        <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('mercados') }}" class="text-decoration-none">mercados</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$mercado->name}}</li>
    </ol>
</div> 
<div class="py-sm-2 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <img src="{{ asset($mercado->image) }}" class="w-100 img-fluid" style="border-radius: 30px;">
            </div>
            <div class="col-sm-12 col-md-6">
                <h1 class="text-green font-size-35 mb-4">{{ $mercado->name }}</h1>
                <div>{!! $mercado->content !!}</div>
            </div>
        </div>
    </div>
</div>
@if ($mercado->categories)
    @if (count($mercado->categories))
        <div class="py-sm-2 py-md-5 bg-light">
            <div class="container">
                <h1 class="text-green font-size-30 mb-4 text-center">PRODUCTOS RELACIONADOS</h1>
                <div class="row">
                    @foreach ($mercado->categories as $item)
                        <div class="col-sm-12 col-md-4 mb-4">
                            @includeIf('paginas.partials.categoria', ['c' => $item])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>   
    @endif
@endif
@endsection
