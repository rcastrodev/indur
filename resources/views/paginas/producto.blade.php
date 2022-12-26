@extends('paginas.partials.app')
@section('content')
@isset($product)
<div aria-label="breadcrumb" class="bg-light py-2 font-size-14">
    <ol class="breadcrumb container">
        <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></li>
        <li class="breadcrumb-item">
            <a href="{{ route('productos') }}" class="text-decoration-none">Productos</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('categoria', ['id'=> $product->subCategory->category->id]) }}" class="text-decoration-none">{{$product->subCategory->category->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subCategoria', ['id'=> $product->subCategory->id]) }}" class="text-decoration-none">{{$product->subCategory->short_name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
</div> 
@endisset
<div class="py-sm-2 py-md-5">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3">
                <ul class="p-0 font-size-14" style="list-style: none;">
                    @foreach ($categories as $c)
                    <li class="py-2 text-white @if($c->id == $product->subCategory->category->id) active bg-purple2 @endif"> 
                        <a href="#" class="category toggle d-block p-2 text-decoration-none position-relative {{ ($c->id == $product->subCategory->category->id) ? 'text-white' : 'text-dark' }}">{{$c->name}} <i class="fas position-absolute {{ ($c->id == $product->subCategory->category->id) ? 'fa-chevron-down text-white' : 'fa-chevron-right text-dark' }}" style="right: 10px;"></i> </a>
                        @if (count($c->subCategories))
                            <ul class="bg-purple2 py-1 px-0 {{ ($c->id == $product->subCategory->category->id) ? '' : 'rd-none' }}" style="list-style: none">
                                @foreach ($c->subCategories as $sc)
                                    <li class="py-1">
                                        <a href="#" class="category position-relative toggle color-link-gris text-decoration-none text-blue ms-4 d-block py-1">{{$sc->short_name}} <i class="fas position-absolute {{ ($sc->id == $product->subCategory->id) ? 'fa-chevron-down' : 'fa-chevron-right' }}" style="right: 10px;"></i></a>
                                        @if (count($sc->products))
                                            <ul class="bg-purple2 px-0" {{ ($c->id == $product->subCategory->category->id) ? '' : 'rd-none' }}" style="list-style: none;">
                                                @foreach($sc->products as $p)
                                                    <li class="py-2 ps-5 text-truncate" style="{{ ($p->id == $product->id) ? 'background-color:#2B2B2B;' : '' }}">
                                                        <a href="{{ route('producto', ['product'=> $p->id]) }}" class="text-blue text-decoration-none {{ ($p->id == $product->id) ? 'active' : '' }}">{{$p->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>               
                                            
                                        @endif
                                    </li>
                                @endforeach        
                            </ul>
                        @endif
                    </li>                      
                    @endforeach
                </ul>
            </aside>
            <section class="producto col-sm-12 col-md-9 font-size-14">
                <strong class="text-green font-size-16 d-block mb-4">{{$product->subCategory->name}}</strong>
                <div class="row">
                    <div class="col-sm-12 col-md-9">
                        <div class="mb-sm-3 mb-md-5">
                            <h1 class="text-green mb-4 font-size-35">{{ $product->name }}</h1>
                            <div class="" style="color:#455560;">{!! $product->description !!}</div>
                        </div>
                        @if ($product->extra )
                            @if (Storage::disk('custom')->exists($product->extra))
                                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="bg-purple2 text-white fw-bold text-uppercase rounded-pill text-decoration-none py-2 px-4" style="box-shadow: 0px 3px 6px #00000059;">ver ficha técnica</a>   
                            @endif
                        @endif
                        @if (count($product->applications))
                            <div class="mt-5">
                                <h3 class="text-uppercase text-green text-uppercase mb-3 font-size-22 fw-bold">aplicaciones</h3>
                                <div class="row">
                                    @foreach ($product->applications as $item)
                                        <div class="col-sm-12 col-md-3"> 
                                            <img src="{{ asset('images/Icon-feather-check-square.svg') }}" alt=""> <span class="ms-2">{{ $item->name }}</span> 
                                        </div>
                                    @endforeach
                                </div>
                            </div>  
                        @endif
                        @if (count($product->presentations))
                            <div class="mt-5">
                                <h3 class="text-uppercase text-green text-uppercase mb-3 font-size-22 fw-bold">presentaciones</h3>
                                <div class="row">
                                    @foreach ($product->presentations as $item)
                                        <div class="col-sm-12 col-md-3"> 
                                            <img src="{{ asset('images/Icon-feather-check-square.svg') }}" alt=""> <span class="ms-2">{{ $item->name }}</span> 
                                        </div>
                                    @endforeach
                                </div>
                            </div>  
                        @endif
                    </div>
                    @if (count($product->images))
                        @if (Storage::disk('custom')->exists($product->images()->first()->image))
                            <div class="col-sm-12 col-md-3 d-sm-none d-md-block">
                                <img src="{{ asset($product->images()->first()->image) }}" class="img-fluid">
                            </div> 
                        @endif
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
