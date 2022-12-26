<div class="modal fade" id="modal-update-element">
    <form action="{{ route('company.content.updateSlider') }}" method="post" id="form-update-slider" class="modal-dialog" data-async="no" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
                <div class="form-group">
                    <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
                </div>
                <div class="form-group">
                    <textarea name="content_1" id="content_11" class="ckeditor" cols="30" rows="10" placeholder="Contenido"></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control-file">
                    <small>la imagen debe ser al menos 1300x471</small>
                </div> 
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>