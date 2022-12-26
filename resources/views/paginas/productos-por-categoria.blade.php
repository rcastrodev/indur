@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="bg-breadcrumb py-2 font-size-14">
	<div class="container">
		<ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i></li>
			<li class="breadcrumb-item"><a href="{{ route('productos') }}">productos</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
		</ol>
	</div>
</div>
@isset($categories)
    @if (count($categories))
        <section class="categorias">
            <div class="container row py-md-5 py-sm-2 mx-auto px-0">
                <aside class="col-sm-12 col-md-3">
                    <ul class="p-0 font-size-14" style="list-style: none;">
                        @foreach ($categories as $c)
                        <li class="py-2 text-white @if($c->id == $category->id) active bg-purple2 @endif"> 
                            <a href="#" class="category toggle d-block p-2 text-decoration-none position-relative {{ ($c->id == $category->id) ? 'text-white' : 'text-dark' }}">{{$c->name}} <i class="fas position-absolute {{ ($c->id == $category->id) ? 'fa-chevron-down text-white' : 'fa-chevron-right text-dark' }}" style="right: 10px;"></i> </a>
                            </i>
                            @if (count($c->subCategories))
                                <ul class="bg-purple2 py-1 px-0 {{ ($c->id == $category->id) ? '' : 'rd-none' }}" style="list-style: none">
                                    @foreach ($c->subCategories as $sc)
                                        <li class="py-1">
                                            <a href="#" class="category toggle text-white text-decoration-none text-blue ms-4 d-block py-1 position-relative">{{$sc->short_name}} <i class="fas position-absolute fa-chevron-right" style="right: 10px;"></i></a>
                                            @if (count($sc->products))
                                                <ul class="rd-none bg-purple2 px-0" style="list-style: none;">
                                                    @foreach($sc->products as $p)
                                                        <li class="py-2 ps-5 text-truncate">
                                                            <a href="{{ route('producto', ['product'=> $p->id]) }}" class="text-blue text-decoration-none {{ ($p->name) ? 'active' : '' }}">{{$p->name}}</a>
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
                <section class="col-sm-12 col-md-9 font-size-14">
                        @isset($products)
                            @if (count($products))
                                @foreach ($products as $p)
                                    <div class="card categoria p-3 position-relative d-flex flex-row align-items-center mb-4" style="min-height: 150px;">
                                        <div class="card-body w-100">
                                            <p class="card-text mb-0 text-truncate fw-bold text-green mb-3 font-size-22">{{$p->name}}</p>
                                        </div>
                                        <a href="{{ route('subCategoria', ['id'=> $p->id ]) }}" class="btcategory bg-white text-decoration-none font-size-14 text-green fw-bold fw-light py-2 px-4 text-uppercase position-absolute" style="bottom: 20px; border-radius:20px;">ver más<i class="fas fa-chevron-right ms-3"></i></a>
                                    </div>
                                @endforeach  
                            @else 
                                <h2 class="text-center">No tiene productos cargados esta categoría</h2>
                            @endif                  
                        @endisset
                </section>
            </div>
        </section>
    @endif
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
