@extends('adminlte::page')
@section('title', 'Seguridad y medio ambiente')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Seguridad y medio ambiente</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
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
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section2)
    <form action="{{ route('company.content.updateInfo') }}" method="post" data-async="no" enctype="multipart/form-data" class="mb-5">
        @csrf
        <input type="hidden" name="id" value="{{$section2->id}}">
        <div class="form-group">
            <input type="text" name="content_1" value="{{$section2->content_1}}" class="form-control">
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section2->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <textarea name="content_3" class="ckeditor" cols="30" rows="10">{{$section2->content_3}}</textarea>
                </div>
            </div>
        </div>
        <button class="btn btn-primary w-100">Actualizar</button>
    </form>  
@endisset
<div class="row my-3">
    <div class="col-sm-12">
        <div class="d-flex">
            <h4 class="mr-2">Descargables</h4>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-recorrido">crear</button>
        </div>
        <table id="page_table_recorrido" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section4)
    <form action="{{ route('company.content.updateInfo') }}" method="post" data-async="no" enctype="multipart/form-data" class="mb-5">
        @csrf
        <input type="hidden" name="id" value="{{$section4->id}}">
        <div class="form-group">
            <input type="text" name="content_1" value="{{$section4->content_1}}" class="form-control">
        </div>
        <div class="form-group">
            <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section4->content_2}}</textarea>
        </div>
        <button class="btn btn-primary w-100">Actualizar</button>
    </form>  
@endisset
<div class="row my-3">
    <div class="col-sm-12">
        <div class="d-flex">
            <h4 class="mr-2">Artículos</h4>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-descargables">crear</button>
        </div>
        <table id="page_table_descargables" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Icono</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.security.modals.create')
@includeIf('administrator.security.modals.update')
@includeIf('administrator.security.recorrido.create')
@includeIf('administrator.security.recorrido.update')
@includeIf('administrator.security.descargables.create')
@includeIf('administrator.security.descargables.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('security.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/security/index.js') }}"></script>
@stop

