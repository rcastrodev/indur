@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <h3>Sliders</h3>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@if ($section2)
    <form action="{{ route('home.content.update-info') }}" class="mb-3" data-async="no" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $section2->id }}">
        <div class="form-group">
            <label for="">Contenido</label>
            <textarea name="content_1" class="ckeditor" cols="30" rows="10">{{ $section2->content_1 }}</textarea>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Actualizar</button>
    </form>
@endif
@isset($section3s)
    @if(count($section3s))
        <div class="row">
            @foreach ($section3s as $s3)
                @if ($s3->order == 'DD')
                    <div class="col-sm-12 col-md-4">
                        <form action="{{ route('home.content.update-info') }}" class="mb-3" data-async="no" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $s3->id }}">
                            <div class="form-group">
                                <label for="">Banner</label>
                            </div>
                            <div class="form-group">
                                @if (Storage::disk('custom')->exists($s3->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($s3->image) }}" class="img-fluid d-block mx-auto">
                                    </div>
                                @endif
                            </div>
                            <input type="file" name="image" class="form-control-file">
                            <small>Tamaño recomendado 66x66px</small>
                            <button type="submit" class="btn btn-sm btn-primary w-100">Actualizar</button>
                        </form>  
                    </div>
                @else
                    <div class="col-sm-12 col-md-4">
                        <form action="{{ route('home.content.update-info') }}" class="mb-3" data-async="no" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $s3->id }}">
                            <div class="form-group">
                                <label for="">Contenido</label>
                                <input type="text" name="content_1" value="{{ $s3->content_1 }}" class="form-control" placeholder="Contenido">
                            </div>
                            <div class="form-group">
                                <label>Imagen</label>
                                @if (Storage::disk('custom')->exists($s3->image))
                                    <div class="mt-2">
                                        <img src="{{ asset($s3->image) }}" class="img-fluid d-block mx-auto">
                                    </div>
                                @endif
                            </div>
                            <input type="file" name="image" class="form-control-file">
                            <small>Tamaño recomendado 66x66px</small>
                            <button type="submit" class="btn btn-sm btn-primary w-100">Actualizar</button>
                        </form>  
                    </div>
                @endif
            @endforeach
        </div>
    @endif
@endisset
@isset ($section4)
    <form action="{{ route('home.content.update-info') }}" class="mb-3" data-async="no" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $section4->id }}">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-8">
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="content_1" value="{{ $section4->content_1 }}" class="form-control" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="">Contenido</label>
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{ $section4->content_2 }}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (Storage::disk('custom')->exists($section4->image))
                    <div class="mt-2">
                        <img src="{{ asset($section4->image) }}" class="img-fluid d-block mx-auto">
                    </div>
                @endif
                <input type="file" name="image" class="form-control-file">
                <small>Tamaño recomendado 238x110px</small>
                <button type="submit" class="btn btn-sm btn-primary w-100">Actualizar</button>
            </div>
        </div>
    </form>
@endisset
@includeIf('administrator.home.modals.create')
@includeIf('administrator.home.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
@stop

