<div class="modal fade" id="modal-create-recorrido">
    <form action="{{ route('quality.content.storeRecorrido') }}" method="post" class="modal-dialog" data-info="reset" data-async="no" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="section_id" value="12">
                <div class="form-group">
                    <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control-file">
                    <small>la imagen debe ser al menos 1300x471</small>
                </div>    
                <div class="form-group">
                    <textarea name="content_1" class="ckeditor" cols="30" rows="10" placeholder="Contenido"></textarea>
                </div>  
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>