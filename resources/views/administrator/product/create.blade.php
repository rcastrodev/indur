@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
    <div class="card-body row">
        @csrf
        <div class="form-group col-sm-8">
            <label for="">Nombre del producto</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-4 align-items-center d-flex flex-column">
            <label>Es destacada</label>
            <input type="checkbox" name="outstanding" value="1">
        </div> 
        <div class="form-group col-sm-12 col-md-10">
            <label>Sub categoría</label>
            <select name="sub_category_id" class="form-control select2">
                @foreach ($subCategories as $sCategory)
                    <option value="{{$sCategory->id}}">{{$sCategory->name}} - {{$sCategory->category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="Ej AA AB AC">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Descripción</label>
            <textarea name="description" class="ckeditor" cols="30" rows="10" placeholder="Descripción del producto">{{old('description')}}</textarea>
        </div>
        <div class="form-group col-sm-12">
            <label>Ficha técnica</label>
            <input type="file" name="extra" class="form-control-file">
        </div> 
        <div class="form-group col-sm-12 col-md-4">
            <label for="">imagen <small>la imagen debe ser al menos 70x270</small> </label>
            <input type="file" name="images[]" class="form-control-file">
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

