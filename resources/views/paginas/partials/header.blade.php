@php $telephone3 = Str::of($data->phone3)->explode('|'); @endphp
@php $emails = Str::of($data->email)->explode('|'); @endphp
<header class="header bg-purple2 d-sm-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-end redes-sociales">
                        <div class="bg-purple px-2 py-1 d-flex align-items-center">
                            @if (count($telephone3) > 1)
                                <span class="mb-xs-2 mb-md-0 me-3">
                                    <i class="fab fa-whatsapp text-white font-size-14 me-2"></i> 
                                    <a href="https://wa.me/{{$telephone3[0]}}" class="text-white text-decoration-none font-size-14">{{$telephone3[1]}}</a>
                                </span>
                            @endif
                            @if (count($emails))
                                <a href="mailto:{{ $emails[0] }}" class="mb-xs-2 mb-md-0 text-white text-decoration-none font-size-14 me-3">
                                    <i class="fas fa-envelope text-white font-size-14 me-2"></i> {{ $emails[0] }}
                                </a>
                            @else
                                <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-white text-decoration-none font-size-14 me-3">
                                    <i class="fas fa-envelope text-white font-size-14 me-2"></i> {{ $data->email }}
                                </a>                
                            @endif
                            <form action="{{ route('productos') }}" method="get" class="position-sm-static rposition" style="right: 0px;">
                                <div class="input-group">
                                    <input type="text" class="form-control p-0 ps-2" name="b">
                                    <button class="nav-link text-dark font-size-14 btn" style="border-radius: 100%; border: 1px solid white;
                                    padding: 5px 10px;">
                                        <i class="fas fa-search text-white"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="navbar rbg-dark navbar-expand-lg navbar-light w-100" style="z-index: 10">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
            <ul class="navbar-nav position-relative w-100">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link font-size-13 text-green @if(Request::is('/')) active @endif" href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link font-size-13 text-green @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('productos') || Request::is('producto/*') || Request::is('categoria/*')) position-relative @endif">
                    <a class="nav-link font-size-13 text-green @if(Request::is('productos') || Request::is('producto/*') || Request::is('categoria/*')) active @endif" href="{{ route('productos') }}">Productos</a>
                </li>
                <li class="nav-item @if(Request::is('mercados') or Request::is('mercado/*')) position-relative @endif">
                    <a class="nav-link font-size-13 text-green @if(Request::is('mercados') or Request::is('mercado/*')) active @endif" href="{{ route('mercados') }}" >Mercados</a>
                </li>
                <li class="nav-item @if(Request::is('calidad')) position-relative @endif">
                    <a class="nav-link font-size-13 text-green @if(Request::is('calidad')) active @endif" href="{{ route('calidad') }}" >Calidad</a>
                </li>
                <li class="nav-item @if(Request::is('seguridad-y-medio-ambiente')) position-relative @endif">
                    <a class="nav-link font-size-13 text-green @if(Request::is('seguridad-y-medio-ambiente')) active @endif" href="{{ route('seguridad') }}" >Seguridad y Medio Ambiente</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link font-size-13 text-green @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
