<div class="container">
    <form method="POST" action="{{ route('afp.descuentos.store') }}">
        @csrf
        <h6 class="border-bottom pb-2 mb-3">Nueva Categoria Laboral</h6>
        <div class="row">

            <!-- Campos de AFP -->
            <div class="col-md-3 mb-4">
                <div class="form-group">
                    <label for="codigo_afp">Código AFP<span class="campo-obligatorio">*</span></label>
                    <input id="codigo_afp" type="text" class="form-control" name="codigo_afp"
                        placeholder="Ingrese codigo" value="{{ old('codigo_afp') }}">
                    @if ($errors->has('codigo_afp'))
                        <span class="error text-danger">{{ $errors->first('codigo_afp') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="form-group">
                    <label for="nombre_afp">Nombre AFP<span class="campo-obligatorio">*</span></label>
                    <input id="nombre_afp" type="text" class="form-control" name="nombre_afp"
                        placeholder="Ingrese nombre" value="{{ old('nombre_afp') }}">
                    @if ($errors->has('nombre_afp'))
                        <span class="error text-danger">{{ $errors->first('nombre_afp') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="form-group">
                    <label for="fecha_baja_afp">Fecha de baja AFP<span class="campo-obligatorio">*</span></label>
                    <input id="fecha_baja_afp" type="date" class="form-control" name="fecha_baja_afp"
                        value="{{ old('fecha_baja_afp') }}">
                    @if ($errors->has('fecha_baja_afp'))
                        <span class="error text-danger">{{ $errors->first('fecha_baja_afp') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="selected_descuento_id">Tipo de descuento<span class="campo-obligatorio">*</span></label>
                    <select class="form-control" id="selected_descuento_id" name="selected_descuento_id">
                        <option value="" disabled {{ old('selected_descuento_id') ? '' : 'selected' }}>Selecciona
                            Tipo descuento</option>
                        @foreach ($tiposDescuentos as $id => $tipoDescuento)
                            <option value="{{ $tipoDescuento->id }}">{{ $tipoDescuento->descripcion }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('selected_descuento_id'))
                        <span class="error text-danger">{{ $errors->first('selected_descuento_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="estado_afp" name="estado_afp" checked>
                    <label class="form-check-label" for="estado_afp">Estado AFP<span
                            class="campo-obligatorio">*</span></label>
                    @if ($errors->has('estado_afp'))
                        <span class="error text-danger">{{ $errors->first('estado_afp') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Botón para enviar el formulario -->
        <div class="row">
            <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('afp.descuentos.index') }}" class="el-button el-button--danger">Cancelar</a>
                @can('user_create')
                    <button type="submit" class="el-button el-button--primary">Crear</button>
                @endcan
            </div>
        </div>
    </form>


    <!-- Barra de búsqueda -->
    <div class="row">

        <div class="col-md-1 gap-2 d-md-flex justify-content-md-end">

            <button type="button" id="addDescuentoBtn" class="el-button el-button--primary">Añadir</button>

        </div>
    </div>

    <!-- Botón Añadir -->


    <!-- Tabla de Tipos de Descuento -->
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="descuentosTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Código</th>
                                <th>Año Proceso</th>
                                <th>Mes Proceso</th>
                                <th>Descripción</th>
                                <th>Porcentaje Descuento</th>
                                <th>Índice Tope</th>
                                <th>Importe Tope</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tiposDescuentos as $tipoDescuento)
                                <tr>
                                    <td>{{ $tipoDescuento->codigo }}</td>
                                    <td>{{ $tipoDescuento->anio_proceso }}</td>
                                    <td>{{ $tipoDescuento->mes_proceso }}</td>
                                    <td>{{ $tipoDescuento->descripcion }}</td>
                                    <td>{{ $tipoDescuento->porcentaje_descuento }}</td>
                                    <td>{{ $tipoDescuento->indice_tope }}</td>
                                    <td>{{ $tipoDescuento->importe_tope }}</td>
                                    <td>
                                        <button type="button"
                                            class="el-button el-button--warning remove-row">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Template for new discount row -->
    <template id="descuentoTemplate">
        <tr>
            <td><input type="text" class="form-control" name="new_codigo[]" required></td>
            <td><input type="number" class="form-control" name="new_anio_proceso[]" required></td>
            <td><input type="number" class="form-control" name="new_mes_proceso[]" required></td>
            <td><input type="text" class="form-control" name="new_descripcion[]" required></td>
            <td><input type="number" class="form-control" name="new_porcentaje_descuento[]" required></td>
            <td><input type="text" class="form-control" name="new_indice_tope[]"></td>
            <td><input type="number" class="form-control" name="new_importe_tope[]"></td>
            <td><button type="button" class="el-button el-button--danger remove-row"><span><i
                            class='bx bxs-x-circle'></i></span></button></td>
        </tr>
    </template>
</div>
<script>
    document.getElementById('addDescuentoBtn').addEventListener('click', function() {
        var template = document.getElementById('descuentoTemplate').content.cloneNode(true);
        document.querySelector('#descuentosTable tbody').appendChild(template);

        // Añadir evento de eliminación a los nuevos botones
        var newRemoveBtn = document.querySelector('#descuentosTable tbody tr:last-child .remove-row');
        newRemoveBtn.addEventListener('click', function() {
            this.closest('tr').remove();
        });
    });

    // Añadir evento de eliminación a los botones existentes
    document.querySelectorAll('.remove-row').forEach(function(button) {
        button.addEventListener('click', function() {
            this.closest('tr').remove();
        });
    });

    // Implementar la funcionalidad de búsqueda
</script>
