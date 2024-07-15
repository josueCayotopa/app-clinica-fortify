
<div id="editZona{{ $zona->id }}" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>        
        </div>
        <div class="modal-body">
            <form id="modal-form-edit"  method="post" action="{{ route('zona.update', $zona->id) }}">

            @csrf
            
            <div class="form-group">    

                <label for="recipient-name" class="col-form-label">Profesion</label>
                <input type="text" class="form-control" id="nombre" name="descrip_zona"
                value="{{ $zona->descrip_zona }}" >

            </div>
            
            

            </div>

                <div class="modal-footer">
                    <button type="button" class="el-button el-button--secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="el-button el-button--primary" id="submitButton-Editar" >Actualizar</button>
                </div>
            </div>
        </form>
        </div>
</div>