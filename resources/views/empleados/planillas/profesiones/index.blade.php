

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h4>Profesiones</h4>
    <div class="search-container mb-3">
        <div class="input-group me-3">
        
        </div>
        <div class="input-group flex-grow-1">
        
        </div>
        
        <button type="button" class="el-button el-button--primary ms-2 open-modal-btn-new" 
        id="new-button" data-toggle="modal" data-target="#modalNewProfesion"> Nuevo 
        <span><i class='bx bx-user-plus'></i></span> 
        </button>

    </div>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Profesión</th>             
                <th>Fecha</th>
                <th text-right>Opciones</th>
            </tr>
        </thead>
        <tbody id="user-table">
           
            @foreach ($profesiones as $pro)
                    <tr>
                        <td>{{ $pro->id }}</td>
                        <td>{{ $pro->nombre }}</td>
                        <td>{{ $pro->created_at }}</td>
                        <td text-right>
                            <div class="action-buttons"
                                style=" display: flex;
                                        justify-content: center;
                                        margin-top: 20px;">
            
                                <button  class="el-button el-button--primary " data-toggle="modal"
                                data-target="#editProfesion{{ $pro->id }}"                           
                                    style="margin: 0 2px;">
                                    <span><i class='bx bx-edit-alt'></i></span>
                                </button>                           
                                <div>
                                    <form action="{{ route('profesion.delete', $pro->id) }}" method="post"
                                        onsubmit="return confirm('¿Seguro que quieres eliminar este elemento? ')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="el-button el-button--danger" type="submit" style="margin: 0 2px;">
                                            <span><span><i class='bx bxs-user-x'></i></span>
                                        </button>

                                    </form>   
                                </div>                      

                        </div>



                        </td>
                    </tr>
            

                    @include('empleados.planillas.profesiones.modalEditar')

                    @endforeach
        </tbody>
    </table>

    
</div>

</div>

<!-- Modal -->

<div id="modalNewProfesion" class="modal fade"  tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear</h5>
            
        </div>
        <div class="modal-body">
            <form id="modal-form" action="{{ route('profesion.store') }}" method="post" autocomplete="off">

            @csrf
            <div class="form-group">

                <label for="recipient-name" class="col-form-label">Profesión</label>
                <input type="text" class="form-control" id="recipient-name" name="nombre"
                value="{{ old('name') }}" >

                @if ($errors->has('nombre'))
                        <span class="error text-danger"> {{ $errors->first('nombre') }}</span>
                @endif
            </div>
            
            

        </div>
        <div class="modal-footer">
            <button type="button" class="el-button el-button--secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="el-button el-button--primary" id="submitButton" value="Guardar">
        </div>
        </div>
        </form>
    </div>
    </div>



