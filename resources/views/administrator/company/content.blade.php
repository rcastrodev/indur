@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
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
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section2)
    <form action="{{ route('company.content.updateInfo') }}" method="post" data-async="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section2->id}}">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-8">
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section2->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                @if (Storage::disk('custom')->url($section2->image))
                    <img src="{{ asset($section2->image) }}" alt="" width="300">
                @endif
                <div class="form-group">
                    <label>Imagen</label>
                    <small>Tamaño recomendado 663x424</small>
                    <input type="file" name="image" class="form-control-file">
                </div>
                <button class="btn btn-primary w-100">Actualizar</button>
            </div>
        </div>
    </form>  
@endisset
<div class="row my-3">
    <div class="col-sm-12">
        <div class="d-flex">
            <h4 class="mr-2">Recorrido histórico</h4>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-recorrido">crear</button>
        </div>
        <table id="page_table_recorrido" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section4)
    <form action="{{ route('company.content.updateInfo') }}" method="post" data-async="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section4->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                @if (Storage::disk('custom')->url($section4->image))
                    <img src="{{ asset($section4->image) }}" class="img-fluid">
                @endif
                <div class="form-group">
                    <label>Imagen</label>
                    <small>Tamaño recomendado 663x424</small>
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section4->content_1}}" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section4->content_2}}</textarea>
                </div>
                <div class="form-group">
                    <input type="text" name="content_3" value="{{$section4->content_3}}" class="form-control" placeholder="Separar item por un | ejemplo perro|gato|tortuga etc">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary w-100">Actualizar</button>
                </div>
            </div>
        </div>
    </form>  
@endisset
@isset($section5s)
    @if(count($section5s))
        <div class="row">
            @foreach ($section5s as $s5)
                <div class="col-sm-12 col-md-4">
                    <form action="{{ route('company.content.updateInfo') }}" method="post" data-async="no" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$s5->id}}">
                        <div class="form-group">
                            <input type="text" name="content_1" value="{{$s5->content_1}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$s5->content_2}}</textarea>
                        </div>
                        @if (Storage::disk('custom')->url($s5->image))
                            <img src="{{ asset($s5->image) }}" class="img-fluid mx-auto d-block">
                        @endif
                        <div class="form-group">
                            <label>Imagen</label>
                            <small>Tamaño recomendado 70x60</small>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <button class="btn btn-primary w-100">Actualizar</button>
                    </form>  
                </div>
            @endforeach
        </div>
    @endif
@endisset
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@includeIf('administrator.company.recorrido.create')
@includeIf('administrator.company.recorrido.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

