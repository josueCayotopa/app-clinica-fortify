
<div id="editConocimiento{{ $con->id }}" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>        
        </div>
        <div class="modal-body">
            <form id="modal-form-edit"  method="post" action="{{ route('conocimiento.update', $con->id) }}">

                
            @csrf
            
            <div class="form-group">    

                <label for="recipient-name" class="col-form-label">Conocimiento</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                value="{{ $con->nombre }}" >

            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Nivel</label>
                <select class="form-select" id="nivel" name="nivel" >                                   
                    <option value="Básico" @if($con->nivel == 'Básico') selected @endif>Básico</option>
                    <option value="Intermedio" @if($con->nivel == 'Intermedio') selected @endif>Intermedio</option>  
                    <option value="Avanzado" @if($con->nivel == 'Avanzado') selected @endif>Avanzado</option>

                </select>
                
            </div>
            

            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="submitButton-Editar" >Actualizar</button>
                </div>
            </div>
        </form>
        </div>
</div>