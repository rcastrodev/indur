@php $emails = Str::of($data->email)->explode('|'); @endphp
@extends('paginas.partials.app')
@section('content')
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3287.500752891494!2d-58.565208585555474!3d-34.5155390804824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcba7b77cbd689%3A0xdb5b6d3c22803504!2sLos%20Ceibos%20455%2C%20B1609AVK%20Boulogne%2C%20Provincia%20de%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses!2sve!4v1641756654249!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" ></iframe>
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 pe-md-5 pe-sm-0">
                    <h3 class="text-green text-uppercase mb-3 fw-bold font-size-20">{{ env('APP_NAME') }}</h3>
                    <p class="mb-5 font-size-14" style="font-weight: 500; color:#455560;">Para m&aacutes informaci&oacuten comun&iacutequese con nuestros especialistas.</p>
                    @php 
                        $telephone1 = Str::of($data->phone1)->explode('|');
                        $telephone2 = Str::of($data->phone2)->explode('|');
                        $telephone3 = Str::of($data->phone3)->explode('|');
                        $telephone4 = Str::of($data->phone4)->explode('|');
                        $telephone5 = Str::of($data->phone5)->explode('|');
                    @endphp
                    <div class="d-flex mb-4">
                        <i style="width: 40px;" class="fas fa-map-marker-alt text-green font-size-18 d-block mb-3"></i>
                        <div class="font-size-14" style="color:#455560;">{{ $data->address }}</div>
                    </div>
                    <div class="d-flex mb-4">
                        <i style="width: 40px;" class="fas fa-phone-alt text-green font-size-18 d-block mb-3"></i>
                        <div class="">
                            <div class="d-flex">
                                @if (count($telephone1) > 1)
                                    <a href="tel:{{ $telephone1[0] }}" class="text-decoration-none d-block font-size-14 underline" style="color:#455560;">{{ $telephone1[1] }}</a>
                                @else 
                                    <a href="tel:{{ $data->phone1 }}" class=" text-decoration-none d-block font-size-14 underline" style="color:#455560;">{{ $data->phone1 }}</a>
                                @endif
                                <span class="mx-1">/</span>
                                @if (count($telephone2) > 1)
                                    <a href="tel:{{ $telephone2[0] }}" class=" text-decoration-none font-size-14 underline" style="color:#455560;">{{ $telephone2[1] }}</a>
                                @else 
                                    <a href="tel:{{ $data->phone2 }}" class=" text-decoration-none d-block font-size-14 underline" style="color:#455560;">{{ $data->phone2 }}</a>
                                @endif 
                            </div>
                            <div class="d-flex">
                                @if (count($telephone3) > 1)
                                    <a href="tel:{{ $telephone3[0] }}" class=" text-decoration-none d-block font-size-14 underline" style="color:#455560;">{{ $telephone3[1] }}</a>
                                @else 
                                    <a href="tel:{{ $data->phone3 }}" class=" text-decoration-none d-block font-size-14 underline" style="color:#455560;">{{ $data->phone3 }}</a>
                                @endif
                                <span class="mx-1 ">/</span>
                                @if (count($telephone4) > 1)
                                    <a href="tel:{{ $telephone4[0] }}" class=" text-decoration-none font-size-14 underline" style="color:#455560;">{{ $telephone4[1] }}</a>
                                @else 
                                    <a href="tel:{{ $data->phone4 }}" class=" text-decoration-none d-block font-size-14 underline" style="color:#455560;">{{ $data->phone4 }}</a>
                                @endif 
                            </div>  
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <i style="width: 40px;" class="fab fa-whatsapp text-green font-size-18 d-block mb-3"></i>
                        <div>
                            @if (count($telephone5))
                                <a href="https://wa.me/{{ $telephone5[0] }}" class=" text-decoration-none d-block font-size-14 underline" style="color:#455560;">{{ $telephone5[1] }}</a> 
                            @else
                                <a href="https://wa.me/{{ $data->phone5 }}" class=" text-decoration-none d-block font-size-14 underline" style="color:#455560;">{{ $data->phone5 }}</a>                                 
                            @endif
                        </div>                    
                    </div>
                    <div class="d-flex mb-4">
                        <i style="width: 40px;" class="fas fa-envelope text-green font-size-18 d-block mb-3"></i>
                        <div>
                            @foreach ($emails as $email)
                                <a href="mailto:{{ $email }}" class="text-decoration-none d-block font-size-14 underline" style="color:#455560;">{{ $email }}</a> 
                            @endforeach 
                        </div>                    
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Ingresar nombre *" value="{{ old('name') }}" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="lastname" placeholder="Ingrese su apellido" value="{{ old('last_name') }}" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Ingresar su correo electr&oacute;nico *" value="{{old('email')}}" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="company" placeholder="Su empresa" value="{{ old('company') }}" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control font-size-14" placeholder="Escriba su mensaje ..." cols="30" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end">
                            <button type="submit" class="text-uppercase btn bg-purple2 fw-bold font-size-14 py-2 px-4 rounded-pill mb-sm-3 mb-md-0 text-white">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection