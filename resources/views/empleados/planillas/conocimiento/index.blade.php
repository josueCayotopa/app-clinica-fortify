@extends('home')
@section('home')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h4>Conocimientos</h4>
    <div class="search-container mb-3">
        <div class="input-group me-3">
            <select class="form-select" id="filter-by">
                <option value="" disabled selected>--Seleccione--</option>
                <option value="">hola</option>
                <option value="">hola</option>  
                <option value="">hola</option>
                <option value="">hola</option>
                <option value="">hola</option>
            </select>
        </div>
        <div class="input-group flex-grow-1">
            <input type="text" class="form-control" id="search-input" placeholder="BUSCAR">
        </div>
        
        <button type="button" class="btn btn-primary ms-3 open-modal-btn-new" 
        id="new-button" data-toggle="modal" data-target="#modalnuevo"> Nuevo 
        <span><i class='bx bx-user-plus'></i></span> 
        </button>

    </div>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Conocimiento</th>
                <th>Nivel</th>               
                <th>Fecha</th>
                <th text-right>Opciones</th>
            </tr>
        </thead>
        <tbody id="user-table">
            @foreach ($conocimientos as $con)
                    <tr>
                        <td>{{ $con->id }}</td>
                        <td>{{ $con->nombre }}</td>
                        <td>{{ $con->nivel }}</td>
                        <td>{{ $con->created_at }}</td>
                        <td text-right>
                            <div class="action-buttons"
                            style=" display: flex;
                                    justify-content: center;
                                    margin-top: 20px;">
                                    
                            
                            <button  class="btn btn-warning " data-toggle="modal"
                            data-target="#editConocimiento{{ $con->id }}"                           
                                style="margin: 0 2px;">
                                <span><i class='bx bx-edit-alt'></i></span>
                            </button>

                            
                            <div>

                                <form action="{{ route('conocimiento.delete', $con->id) }}" method="POST"
                                    onsubmit="return confirm('¿Seguro que quieres eliminar este elemento? ')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" style="margin: 0 2px;">
                                        <span><span><i class='bx bxs-user-x'></i></span>
                                    </button>

                                </form>
                                
                            </div>                      

                        </div>



                        </td>
                    </tr>

                    
                    @include('empleados.planillas.conocimiento.modalEditar')
                    
                    

                @endforeach
            
        </tbody>
    </table>

    
</div>

</div>



<!--

<script>
    $(document).ready(function() {
                
                $('.open-modal-btn-new').on('click', function(event) {
                    event.preventDefault(); 
                    var modalId = $(this).data('modal'); 
                    $('#' + modalId).modal('show'); 
                });

                
                $('.open-modal-editar').on('click', function(event) {

                    event.preventDefault(); 
                    var modalId = $(this).data('modal'); 
                    $('#' + modalId).modal('show'); 
                    
                });

            });
</script>

-->


<!-- Modal Nuevo conocimiento-->

<div id="modalnuevo" class="modal fade"  tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear</h5>
            
        </div>
        <div class="modal-body">
            <form id="modal-form" action="{{ route('conocimiento.store') }}" method="post" autocomplete="off">

            @csrf
            <div class="form-group">

                <label for="recipient-name" class="col-form-label">Conocimiento</label>
                <input type="text" class="form-control" id="recipient-name" name="nombre"
                value="{{ old('name') }}" >

                @if ($errors->has('nombre'))
                        <span class="error text-danger"> {{ $errors->first('nombre') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Nivel</label>
                <select class="form-select" id="filter-by" name="nivel">
                    <option value="" disabled selected>Seleccionar nivel</option>
                    <option value="Básico" {{ old('nivel') == 'Básico' ? 'selected' : '' }}>Básico</option>
                    <option value="Intermedio" {{ old('nivel') == 'Intermedio' ? 'selected' : '' }}>Intermedio</option>  
                    <option value="Avanzado" {{ old('nivel') == 'Avanzado' ? 'selected' : '' }}>Avanzado</option>
                    
                </select>

                @if ($errors->has('nivel'))
                    <span class="error text-danger">{{ $errors->first('nivel') }}</span>
                @endif
            </div>
            

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" id="submitButton" value="Guardar">
        </div>
        </div>
        </form>
    </div>
    </div>

@endsection

