@extends('adminlte::page')
@section('title', 'Editar mercado')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar mercado</h1>
        <a href="{{ route('market.content') }}" class="btn btn-sm btn-primary">ver mercados</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('market.content.update') }}" method="post" enctype="multipart/form-data" class="">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $market->id }}">
    <!-- /.card-header -->
    <!-- form start -->
    <div class="row">
        <div class="form-group col-sm-12 col-md-10">
            <label>Nombre</label>
            <input type="text" name="name" value="{{$market->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <label>Orden</label>
            <input type="text" name="order" value="{{$market->order}}" class="form-control" placeholder="Orden ej AA AB AC">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Categorías</label>
            <select name="categories[]" class="select2 form-control" multiple="multiple">
                @foreach ($categories as $app)
                    <option  value="{{$app->id}}" @if(in_array($app->id, $market->categories->pluck('id')->toArray(), true)) selected @endif
                    >{{$app->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-12">
            <label>Descripción</label>
            <textarea name="content" class="ckeditor" cols="30" rows="10">{{$market->content}}</textarea>
        </div>
        <div class="form-group col-sm-12">
            <label>Imagen</label>
            <small>la imagen debe ser al menos 574x273</small><br>
            @if (Storage::disk('custom')->exists($market->image))
                <img src="{{ asset($market->image) }}" class="img-fluid">
                <br>
            @endif
            <input type="file" name="image" class="form-control-file">
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
    <meta name="url" content="{{route('market.content')}}">
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

