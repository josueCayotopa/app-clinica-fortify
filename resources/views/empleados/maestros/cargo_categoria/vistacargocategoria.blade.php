<div class="container mt-5">
    <div id="messages">
        @include('layouts.messege')
    </div>
    <div class="el-row is-justify-space-between row-bg mb-3">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Categorias</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            <a href="{{ route('crear-relacion-categoria-cargo') }}" class="el-button el-button--danger">Crear</a>
        </div>
    </div>
    <div class="el-row is-justify-space-between row-bg">
        <div class="col-lg-4"><br>
            <div class="el-input el-input--prefix" style="width: 100%;">
                <div class="el-input__wrapper" tabindex="-1">
                    <span class="el-input__prefix">
                        <span class="el-input__prefix-inner">
                            <i class="el-icon el-input__icon"></i>
                        </span>
                    </span>
                    <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Buscar"
                        id="el-id-4745-11" spellcheck="false" data-ms-editor="true">
                </div>
            </div>
        </div>
        <div class="col-lg-4"></div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-3">
            <br>
            <button aria-disabled="false" type="button" class="el-button el-button--success">
                <span class="">Generar Excel</span>
            </button>
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Código Categoría</th>
                <th>Descripción Categoría</th>
                <th>Cargos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $categoriasUnicas = collect();
            @endphp

            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->categoria->id }}</td>
                    <td>{{ $categoria->categoria->codigo }}</td>
                    <td>{{ $categoria->categoria->descripcion }}</td>
                    <td>
                        <button class="btn btn-info btn-sm ver-cargos-btn"
                            data-categoria-id="{{ $categoria->categoria->id }}">Ver Cargos</button>


                    </td>
                    <td>
                        <a href="{{ route('editar-relacion-categoria-cargo', $categoria->categoria->id) }}"
                            class="btn btn-warning btn-sm">Editar</a>

                        <button class="btn btn-danger btn-sm"
                            onclick="confirmDeleteRelations({{ $categoria->categoria->id }}, '{{ $categoria->categoria->descripcion }}')">Eliminar
                        </button>

                        <form id="delete-relations-form-{{ $categoria->categoria->id }}"
                            action="{{ route('categorias.destroy', $categoria->categoria->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Modal de Cargos -->
<div class="modal fade" id="modalCargos" tabindex="-1" role="dialog" aria-labelledby="modalCargosLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCargosLabel">Cargos Asociados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="cancelDeleteModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="cargosBody">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    onclick="cancelDeleteModal()">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal para confirmación de eliminación de relaciones -->
<div class="modal fade" id="confirmRelationsModal" tabindex="-1" role="dialog"
    aria-labelledby="confirmRelationsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmRelationsModalLabel">Confirmar eliminación de relaciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="cancelDeleteRelations()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="confirmRelationsMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    onclick="cancelDeleteRelations()">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteRelationsButton"
                    onclick="deleteRelations()">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Función para manejar el clic en el botón "Ver Cargos"
        $('.ver-cargos-btn').click(function() {
            var categoriaId = $(this).data('categoria-id');
            var cargos = {!! json_encode($categoriasCargos->toArray()) !!}; // Obtener todos los datos de categorías y cargos

            // Filtrar los cargos por la categoría seleccionada
            var cargosCategoria = cargos.filter(function(cargo) {
                return cargo.categoria_id === categoriaId;
            });

            // Limpiar el cuerpo de la tabla de cargos
            $('#cargosBody').empty();

            // Iterar sobre los cargos filtrados y agregarlos a la tabla en el modal
            cargosCategoria.forEach(function(cargo) {
                var row = `<tr>
                        <td>${cargo.cargo.id}</td>
                        <td>${cargo.cargo.codigo}</td>
                        <td>${cargo.cargo.descripcion}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="eliminarCargo(${cargo.id})">Eliminar</button>
                        </td>
                    </tr>`;
                $('#cargosBody').append(row);
            });

            // Abrir el modal de cargos
            $('#modalCargos').modal('show');
        });

        // Función para eliminar un cargo (aquí puedes implementar la lógica real de eliminación)



    });

    function eliminarCargo(cargoId) {
        // Confirmar antes de proceder
        if (confirm('¿Estás seguro de eliminar este cargo?' + cargoId)) {
            // URL del endpoint para eliminar
            var url = '/eliminar-cargo/' + cargoId;

            // Petición AJAX DELETE
            $.ajax({
                type: 'DELETE',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Token CSRF para Laravel
                },
                success: function(response) {
                    // Mostrar mensaje de éxito
                    var messageDiv = $('#messages');
                    messageDiv.html(`
                    <div class="alert alert-success">
                        ${response.message}
                    </div>
                `);

                    // Cerrar el modal si está presente
                    $('#modalCargos').modal('hide');
                    console.log('Cargo eliminado correctamente.');

                },
                error: function(error) {
                    console.error('Error al eliminar el cargo:', error);
                }
            });
        }
    }

    function cancelDeleteModal() {
        $('#modalCargos').modal('hide');
    }
</script>
<script>
    // Función para manejar el clic en el botón "Ver Cargos"


    // Función para confirmar la eliminación de todas las relaciones de una categoría
    function confirmDeleteRelations(id, categoriaDescripcion) {
        var message =
            `¿Estás seguro de que deseas eliminar todas las relaciones de la categoría "${categoriaDescripcion}"?`;
        $('#confirmRelationsMessage').text(message);
        $('#confirmDeleteRelationsButton').data('id', id);
        $('#confirmRelationsModal').modal('show');
    }

    // Función para enviar el formulario de eliminación de relaciones
    function deleteRelations() {
        var id = $('#confirmDeleteRelationsButton').data('id');
        $('#delete-relations-form-' + id).submit();
    }

    // Función para cancelar la eliminación de relaciones
    function cancelDeleteRelations() {
        $('#confirmRelationsModal').modal('hide');
    }
</script>
