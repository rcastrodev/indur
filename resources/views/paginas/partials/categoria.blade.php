<div class="card categoria p-3 position-relative d-flex flex-row align-items-center bg-white" style="min-height: 198px;">
    <div class="card-body w-100">
        <p class="card-text mb-0 text-truncate fw-bold text-green mb-3 font-size-18">{{$c->name}}</p>
    </div>
    <a href="{{ route('categoria', ['id'=> $c->id ]) }}" class="btcategory bg-white text-decoration-none font-size-14 text-green fw-bold fw-light py-2 px-4 text-uppercase position-absolute" style="bottom: 20px; border-radius:20px; box-shadow: 0px 3px 6px #00000029;">ver más<i class="fas fa-chevron-right ms-2 mt-1"></i></a>
</div>