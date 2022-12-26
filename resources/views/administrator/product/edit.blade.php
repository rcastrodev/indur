@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <!-- /.card-header -->
    <!-- form start -->
    <div class="row">
        <div class="form-group col-sm-12 col-md-8">
            <label>Nombre</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-4 align-items-center d-flex flex-column">
            <label>Es destacada</label>
            <input type="checkbox" name="outstanding" @if ($product->outstanding == 1) checked @endif>
        </div> 
        <div class="form-group col-sm-12 col-md-10">
            <label>Sub categoría</label>
            <select name="sub_category_id" class="form-control select2">
                @foreach ($subCategories as $sCategory)
                    <option value="{{$sCategory->id}}" @if($sCategory->id == $product->sub_category_id) selected @endif>{{$sCategory->name}} - {{$sCategory->category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <label>Orden</label>
            <input type="text" name="order" value="{{$product->order}}" class="form-control" placeholder="Orden ej AA AB AC">
        </div>
        <div class="form-group col-sm-12">
            <label>Descripción</label>
            <textarea name="description" class="ckeditor" cols="30" rows="10" placeholder="Descripción del producto">{{$product->description}}</textarea>
        </div>
        @if ($product->extra)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="btn btn-sm btn-primary rounded-pill">Ficha técnica</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt" id="borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id]) }}"></button>
            </div>          
        @endif
        <div class="form-group col-sm-12">
            <label>Ficha técnica</label>
            <input type="file" name="extra" class="form-control-file">
        </div> 
        @if ($product->images)
            @if (count($product->images))
                @foreach ($product->images as $pi)
                    <div class="form-group col-sm-12 col-md-4 ">
                        <div class="position-relative">
                            <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $pi->id]) }}"></button>
                            <img src="{{ asset($pi->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                        </div>
                        <label>imagen</label>
                        <small>Tamaño recomendado 70x70</small>
                        <input type="file" name="images[]" class="form-control-file">
                    </div>                    
                @endforeach
            @else
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image">imagen</label>
                    <small>Tamaño recomendado 70x70</small>
                    <input type="file" name="images[]" class="form-control-file">
                </div>  
            @endif
        @endif 
        <div class="form-group col-sm-12">
            <label for="">Aplicaciones</label>
            <select name="applications[]" class="select2 form-control" multiple="multiple">
                @foreach ($applications as $app)
                    <option 
                    value="{{$app->id}}"
                    @if(in_array($app->id, $product->applications->pluck('id')->toArray(), true)) selected @endif
                    >{{$app->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12 mt-4">
            <label for="">Presentaciones</label>
            <select name="presentations[]" class="select2 form-control" multiple="multiple">
                @foreach ($presentations as $acc)
                    <option 
                    value="{{$acc->id}}"
                    @if(in_array($acc->id, $product->presentations->pluck('id')->toArray(), true)) selected @endif
                    >{{$acc->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
    <script>
        
        let buttonsDestroyImgProduct = document.querySelectorAll('.destroyImgProduct')

        function modalDestroy(e)
        {
            e.preventDefault()

            Swal.fire({
                title: 'Deseas eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    elementDestroy(this)
                }
            })
        }

        function elementDestroy(elemet)
        {
            axios.delete(elemet.dataset.url).then(r => {
                Swal.fire(
                    'Eliminado!',
                    '',
                    'success'
                )
            
                elemet.parentElement.remove()
            }).catch(error => console.error(error))

        }

        if (buttonsDestroyImgProduct) {
            buttonsDestroyImgProduct.forEach(buttonDestroyImgProduct => {
                buttonDestroyImgProduct.addEventListener('click', modalDestroy)
            });   
        }

        let borrarFicha = document.getElementById('borrarFicha')
        if(borrarFicha){
            borrarFicha.addEventListener('click', function(e){
                e.preventDefault()
                axios.delete(borrarFicha.dataset.url)
                borrarFicha.closest('.form-group').remove()
            })
        }
    </script>
@stop

