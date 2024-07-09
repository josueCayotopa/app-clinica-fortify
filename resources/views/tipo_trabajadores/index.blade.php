<div class="card-body mt-5">
    <div id="messages">
        @include('layouts.messege')
    </div>
    <div class="el-row is-justify-space-between row-bg mb-3">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Tipos de Personal</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            <a href="{{ route('tipo_trabajadores.create') }}" class="el-button el-button--danger">Crear</a>
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

    <div class="table-responsive"> <!-- Agregado para hacer la tabla responsive -->
        <table class="table table-striped table-hover">
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Nivel</th>
                <th>Factor Hora Extra</th>
                <th>Factor Día Viaje</th>
                <th>Ver ocupaciones</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($tiposTrabajador as $tipoTrabajador)
                    <tr>
                        <td>{{ $tipoTrabajador->id }}</td>
                        <td>{{ $tipoTrabajador->codigo_sunat }}</td>
                        <td>{{ $tipoTrabajador->descripcion }}</td>
                        <td>{{ $tipoTrabajador->nivel }}</td>
                        <td>{{ $tipoTrabajador->factor_hora_extra }}</td>
                        <td>{{ $tipoTrabajador->factor_dia_viaje }}</td>
                        <td>
                            <button class="el-button el-button--primary ver-ocupaciones-btn"
                                data-tipo-trabajador-id="{{ $tipoTrabajador->id }}">Ver Ocupaciones</button>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('tipo_trabajadores.edit', $tipoTrabajador->id) }}"
                                    class="el-button el-button--primary el-button--small"><i
                                        class='bx bx-edit-alt'></i></a>
                                <button class="el-button el-button--danger el-button--small"
                                    onclick="confirmDeleteRelations({{ $tipoTrabajador->id }}, '{{ $tipoTrabajador->descripcion }}')">
                                    <i class='bx bxs-x-circle'></i></button>
                                <form id="delete-relations-form-{{ $tipoTrabajador->id }}"
                                    action="{{ route('tipo_trabajadores.destroy', $tipoTrabajador->id) }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de Ocupaciones -->
    <div class="modal fade" id="modalOcupaciones" tabindex="-1" role="dialog" aria-labelledby="modalOcupacionesLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalOcupacionesLabel">Ocupaciones</h5>
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
                        <tbody id="ocupacionesBody">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="el-button el-button--danger" data-dismiss="modal"
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
                    <button type="button" class="el-button el-button--danger" data-dismiss="modal"
                        onclick="cancelDeleteRelations()">Cancelar</button>
                    <button type="button" class="el-button el-button--danger" id="confirmDeleteRelationsButton"
                        onclick="deleteRelations()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Función para manejar el clic en el botón "Ver Ocupaciones"
            $('.ver-ocupaciones-btn').click(function() {
                var tipoTrabajadorId = $(this).data('tipo-trabajador-id');

                // Petición AJAX para obtener las ocupaciones
                $.ajax({
                    url: '/tipos-trabajador/' + tipoTrabajadorId + '/ocupaciones',
                    method: 'GET',
                    success: function(data) {
                        // Limpiar el cuerpo de la tabla de ocupaciones
                        $('#ocupacionesBody').empty();

                        // Iterar sobre las ocupaciones y agregarlas a la tabla en el modal
                        data.forEach(function(ocupacion) {
                            var row = `<tr>
                            <td>${ocupacion.id}</td>
                            <td>${ocupacion.codigo_sunat}</td>
                            <td>${ocupacion.descripcion}</td>
                            <td>
                                <button class="el-button el-button--danger el-button--small" onclick="eliminarOcupacion(${ocupacion.id})"><i class='bx bxs-x-circle'></i></button>
                            </td>
                        </tr>`;
                            $('#ocupacionesBody').append(row);
                        });

                        // Abrir el modal de ocupaciones
                        $('#modalOcupaciones').modal('show');
                    },
                    error: function(error) {
                        console.error('Error al obtener las ocupaciones:', error);
                    }
                });
            });
        });

        function eliminarOcupacion(ocupacionId) {
            if (confirm('¿Estás seguro de eliminar esta ocupación?')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/ocupaciones/' + ocupacionId,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#messages').html(`
                    <div class="alert alert-danger">
                        ${response.message}
                    </div>
                `);
                        $('#modalOcupaciones').modal('hide');
                        console.log('Ocupación eliminada correctamente.');
                    },
                    error: function(error) {
                        console.error('Error al eliminar la ocupación:', error);
                    }
                });
            }
        }

        function cancelDeleteModal() {
            $('#modalOcupaciones').modal('hide');
        }

        function confirmDeleteRelations(id, descripcion) {
            var message =
                `¿Estás seguro de que deseas eliminar todas las relaciones del tipo de trabajador "${descripcion}"?`;
            $('#confirmRelationsMessage').text(message);
            $('#confirmDeleteRelationsButton').data('id', id);
            $('#confirmRelationsModal').modal('show');
        }

        function deleteRelations() {
            var id = $('#confirmDeleteRelationsButton').data('id');
            $('#delete-relations-form-' + id).submit();
        }

        function cancelDeleteRelations() {
            $('#confirmRelationsModal').modal('hide');
        }
    </script>
