@extends('adminlte::page')
@section('title', 'Crear mercado')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear mercado</h1>
        <a href="{{ route('market.content') }}" class="btn btn-sm btn-primary">ver mercados</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('market.content.store') }}" method="post" enctype="multipart/form-data">
    <div class="card-body row">
        @csrf
        <div class="form-group col-sm-12 col-md-10">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="Ej AA AB AC">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Categorías</label>
            <select name="categories[]" class="select2 form-control" multiple="multiple">
                @foreach ($categories as $app)
                    <option value="{{$app->id}}">{{$app->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label for="">Descripción</label>
            <textarea name="content" class="ckeditor" cols="30" rows="10" placeholder="Descripción del producto">{{old('content')}}</textarea>
        </div>
        <div class="form-group col-sm-12">
            <label>Imagen</label>
            <small>la imagen debe ser al menos 574x273</small> 
            <input type="file" name="image" class="form-control-file">
        </div>       
    </div>
  <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

