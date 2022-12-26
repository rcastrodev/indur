<div class="card producto p-3 position-relative mb-4">
    <div class="card-body ps-0 text-center">
        <div class="mb-2">  
            @if (count($p->images))
                <img src="{{ asset($p->images()->first()->image) }}" class="img-fluid d-block mx-auto" width="75">
            @endif
        </div>
        <p class="card-text mb-0 text-truncate text-center fw-bold text-green mb-3 font-size-18">{{$p->name}}</p>
    </div>
    <a href="{{ route('producto', ['product'=> $p->id ]) }}" class="mas bg-white text-decoration-none font-size-14 text-green fw-bold fw-light text-center py-2 px-4 text-uppercase position-absolute text-green"><span>ver más</span> <i class="fas fa-chevron-right ms-2 mt-1"></i></a>
</div>