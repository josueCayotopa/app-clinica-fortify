<div class="card-body mt-5">
    <div id="messages">
        @include('layouts.messege')
    </div>
    <div class="el-row is-justify-space-between row-bg mb-3">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Descuentos Pensionarios</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            <button class="el-button el-button--primary crear-regimen-btn" data-toggle="modal"
                data-target="#modalRegimen">Regimen</button>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            <button class="el-button el-button--primary crear-regimen-afp-btn" data-toggle="modal"
                data-target="#modalafp">Afp</button>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            <a href="{{ route('descuentos.create') }}" class="el-button el-button--danger">Crear</a>
        </div>
    </div>
    <div class="el-row is-justify-space-between row-bg">
        <div class="col-lg-3">
            <div class="el-select" style="width: 100%;">
                <div class="el-select__wrapper is-focused el-tooltip__trigger el-tooltip__trigger" tabindex="-1">
                    <div class="el-select__selection">
                        <div class="el-select__selected-item el-select__input-wrapper">
                            <select id="regimen_id" name="regimen_id" class="el-select__input" style="width: 100%;"
                                onchange="filterDescuentos()">
                                <option value="">Todo</option>
                                @foreach ($regimenes as $regimen)
                                    <option value="{{ $regimen->id }}">{{ $regimen->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="el-select__suffix">
                        <i class="el-icon el-select__caret el-select__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                <path fill="currentColor"
                                    d="M831.872 340.864 512 652.672 192.128 340.864a30.592 30.592 0 0 0-42.752 0 29.12 29.12 0 0 0 0 41.6L489.664 714.24a32 32 0 0 0 44.672 0l340.288-331.712a29.12 29.12 0 0 0 0-41.728 30.592 30.592 0 0 0-42.752 0z">
                                </path>
                            </svg>
                        </i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
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
        <div class="col-lg-3">
            <button aria-disabled="false" type="button" class="el-button el-button--success">
                <span class="">Generar Excel</span>
            </button>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>AFP</th>
                    <th>Descuento</th>
                    <th>Tipo de Comisión</th>
                    <th>Fecha</th>
                    <th>Porcentaje</th>
                    <th>Importe Tope</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="descuentosTableBody">
                @foreach ($descuentos as $descuento)
                    <tr data-regimen-id="{{ $descuento->regimen_id }}">
                        <td>{{ $descuento->id }}</td>
                        <td>{{ $descuento->afp->nombre }}</td>
                        <td>{{ $descuento->descuento->descripcion }}</td>
                        <td>{{ $descuento->tipo_comision }}</td>
                        <td>{{ $descuento->fecha }}</td>
                        <td>{{ $descuento->porcentaje }}</td>
                        <td>{{ $descuento->importe_tope }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#crearDescuentoModal"
                                        data-afp-id="{{ $descuento->afp->id }}">Nuevo Descuento</a>
                                    <a class="dropdown-item"
                                        href="{{ route('descuentos.edit', $descuento->id) }}">Editar</a>
                                    <form action="{{ route('descuentos.destroy', $descuento->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal para crear nuevo régimen -->
<div class="modal fade" id="modalRegimen" tabindex="-1" role="dialog" aria-labelledby="modalRegimenLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegimenLabel">Nuevo Régimen Pensionario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="cancelDeleteModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCrearRegimen" action="{{ route('regimen_pencionarios.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="codigo_sunat">Código Sunat:</label>
                        <input type="text" class="form-control" id="codigo_sunat" name="codigo_sunat"
                            placeholder="Código Sunat">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                            placeholder="Descripción">
                    </div>
                    <!-- Aquí puedes agregar más campos según tus necesidades -->


                </div>
                <div class="modal-footer">

                    <button type="button" class="el-button el-button--danger" data-dismiss="modal"
                        onclick="cancelDeleteModal()">Cerrar</button>
                    <button type="submit" class="el-button el-button--primary">Crear</button>
                </div>
            </form>
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
    function filterDescuentos() {
        var regimenId = document.getElementById('regimen_id').value;
        var rows = document.querySelectorAll('#descuentosTableBody tr');

        rows.forEach(row => {
            if (regimenId === "" || row.getAttribute('data-regimen-id') === regimenId) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        // Función para manejar el clic en el botón "Ver Ocupaciones"
        $('.crear-regimen-btn').click(function() {
            $('#modalRegimen').modal('show');

        });
    });
    $(document).ready(function() {
        // Captura el evento de envío del formulario
        $('#formCrearRegimen').submit(function(event) {
            event.preventDefault(); // Evita que el formulario se envíe de manera convencional

            // Realiza la solicitud AJAX
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(), // Serializa los datos del formulario
                success: function(response) {
                    $('#messages').html(`
                        <div class="alert alert-success">
                            ${response.message}
                        </div>
                    `);
                    $('#modalRegimen').modal('hide'); // Cierra el modal después de guardar
                    console.log('Régimen pensionario creado correctamente.');

                    // Opcional: Puedes recargar la tabla de regímenes pensionarios o actualizar la vista según sea necesario
                },
                error: function(error) {
                    console.error('Error al crear el régimen pensionario:', error);
                    // Manejar errores aquí si es necesario
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
                    $('#modalRegimen').modal('hide');
                    console.log('Ocupación eliminada correctamente.');
                },
                error: function(error) {
                    console.error('Error al eliminar la ocupación:', error);
                }
            });
        }
    }

    function cancelDeleteModal() {
        $('#modalRegimen').modal('hide');
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
