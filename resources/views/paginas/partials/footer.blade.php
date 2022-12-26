@php 
    $telephone1 = Str::of($data->phone1)->explode('|');
    $telephone2 = Str::of($data->phone2)->explode('|');
    $telephone3 = Str::of($data->phone3)->explode('|');
    $telephone4 = Str::of($data->phone4)->explode('|');
    $telephone5 = Str::of($data->phone5)->explode('|');
    $emails = Str::of($data->email)->explode('|');
@endphp
<footer class="font-size-14 text-sm-center text-md-start" style="background-color: #2f323a;">
    <div class="row justify-content-between container mx-auto">
        <div class="col-sm-12 col-md-2 py-sm-3 py-md-4 plogo-footer text-center d-sm-none d-lg-block">
            <a href="{{ route('index') }}">
                <img src="{{ asset($data->logo_footer) }}">
            </a>
            <div class="mt-3 iconos-footer d-flex justify-content-between">
                @if ($data->linkedin)
                    <a href="{{ $data->linkedin }}" class="px-2 font-size-20 text-decoration-none">
                        <i class="fab fa-linkedin-in text-white"></i>
                    </a>                
                @endif
                @if($data->instagram)
                    <a href="{{ $data->instagram }}" class="px-2 font-size-20 text-decoration-none">
                        <i class="fab fa-instagram text-white"></i>
                    </a>          
                @endif
                @if ($data->facebook)
                    <a href="{{ $data->facebook }}" class="px-2 font-size-20 text-decoration-none">
                        <i class="fab fa-facebook-f text-white"></i>
                    </a>            
                @endif
                @if ($data->youtube)
                    <a href="{{ $data->youtube }}" class="px-2 font-size-20 text-decoration-none">
                        <i class="fab fa-youtube text-white"></i>
                    </a>
                @endif
            </div>
        </div>
        <div class="col-sm-12 col-md-3 py-sm-2 py-md-5 d-sm-none d-lg-block">
            <div class="row justify-content-between">
                <div class="col-sm-12">    
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-white fw-bold mb-3">Mapa del sitio</h6>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ route('index') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15 underline">Inicio</a>
                            <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15 underline">Empresa</a>
                            <a href="{{ route('productos') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15 underline">Productos</a>
                            <a href="{{ route('mercados') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15 underline">Mercados</a>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ route('calidad') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15 underline">Calidad</a>
                            <a href="{{ route('seguridad') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15 underline">Seguridad y medio ambiente</a>
                            <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1 font-size-15 underline">Contacto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-7 font-size-13 px-sm-3 px-md-0 py-sm-3 py-md-5">
            <h6 class="text-uppercase text-white fw-bold mb-3">{{ env('APP_NAME') }}</h6>
            <div class="row">
                <div class="d-flex align-items-start mb-3 col-sm-12 col-md-6">
                    <i class="fas fa-map-marker-alt text-white d-block me-3 mb-3 text-blue font-size-24"></i>
                    <div class="text-start">
                        <address class="d-block text-light m-0"> {{ $data->address }}</address>
                    </div>   
                </div>
                <div class="d-flex align-items-start col-sm-12 col-md-6">
                    <i class="fab fa-whatsapp text-white d-block me-3 mb-3 text-blue font-size-24"></i>
                    @if (count($telephone5))
                    <div class="text-start">
                        <a href="https://wa.me/{{$telephone5[0]}}" class="text-light text-decoration-none underline">{{$telephone5[1]}}</a>
                    </div>  
                    @else
                    <div class="text-start">
                        <a href="https://wa.me/{{$data->phone5}}" class="text-light text-decoration-none underline">{{$data->phone5}}</a>
                    </div>                          
                    @endif

                </div>
                <div class="d-flex align-items-start col-sm-12 col-md-6 mb-sm-2 mb-md-0">
                    <i class="fas fa-phone-alt text-white d-block me-3 mb-3 text-blue font-size-24"></i>
                    <div class="text-start">
                        <div class="d-flex">
                            @if (count($telephone1) > 1)
                                <a href="tel:{{ $telephone1[0] }}" class="text-light text-decoration-none d-block underline">{{ $telephone1[1] }}</a>
                            @else 
                                <a href="tel:{{ $data->phone1 }}" class="text-light text-decoration-none d-block underline">{{ $data->phone1 }}</a>
                            @endif
                            <span class="mx-1 text-light">/</span>
                            @if (count($telephone2) > 1)
                                <a href="tel:{{ $telephone2[0] }}" class="text-light text-decoration-none underline">{{ $telephone2[1] }}</a>
                            @else 
                                <a href="tel:{{ $data->phone2 }}" class="text-light text-decoration-none d-block underline">{{ $data->phone2 }}</a>
                            @endif 
                        </div>
                        <div class="d-flex">
                            @if (count($telephone3) > 1)
                                <a href="tel:{{ $telephone3[0] }}" class="text-light text-decoration-none d-block underline">{{ $telephone3[1] }}</a>
                            @else 
                                <a href="tel:{{ $data->phone3 }}" class="text-light text-decoration-none d-block underline">{{ $data->phone3 }}</a>
                            @endif
                            <span class="mx-1 text-light">/</span>
                            @if (count($telephone4) > 1)
                                <a href="tel:{{ $telephone4[0] }}" class="text-light text-decoration-none underline">{{ $telephone4[1] }}</a>
                            @else 
                                <a href="tel:{{ $data->phone4 }}" class="text-light text-decoration-none d-block underline">{{ $data->phone4 }}</a>
                            @endif 
                        </div>
                    </div>  
                </div>
                <div class="d-flex align-items-start col-sm-12 col-md-6">
                    <i class="far fa-envelope text-white d-block me-3 mb-3 fw-bold text-blue font-size-24"></i><span class="d-block"></span>
                    <div class="text-start">
                        @foreach ($emails as $email)
                            <a href="mailto:{{ $email }}" class="text-light text-decoration-none d-block underline">{{ $email }}</a> 
                        @endforeach 
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</footer>
@isset($data->phone5)
    @if (count($telephone5))
        <a href="https://wa.me/{{$telephone5[0]}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>    
    @else
        <a href="https://wa.me/{{$data->phone5}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
            <i class="fab fa-whatsapp"></i>
        </a>        
    @endif
 
@endisset

