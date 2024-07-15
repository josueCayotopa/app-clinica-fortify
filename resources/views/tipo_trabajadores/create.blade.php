<div class="container" style="height: 100%; width:100%;">
    <form action="{{ route('tipo_trabajadores.store') }}" method="POST">
        @csrf

        <div class="border rounded p-3 mb-3">
            <h6 class="border-bottom pb-2 mb-3">Nuevo Tipo de Trabajador</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="empresa_id">Empresa<span class="campo-obligatorio">*</span></label>
                        <select class="form-control" id="empresa_id" name="empresa_id" required>
                            @foreach ($empresas as $id => $nombre_comercial)
                                <option value="{{ $id }}"
                                    {{ old('empresa_id', $sucursal->empresa_id ?? '') == $id ? 'selected' : '' }}>
                                    {{ $nombre_comercial }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('empresa_id'))
                            <span class="text-danger">{{ $errors->first('empresa_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="codigo_sunat">Código Sunat<span class="campo-obligatorio">*</span></label>
                        <input id="codigo_sunat" type="text" class="form-control" name="codigo_sunat" placeholder="Código" value="{{ old('codigo_sunat') }}" required>
                        @if ($errors->has('codigo_sunat'))
                            <span class="text-danger">{{ $errors->first('codigo_sunat') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="descripcion">Descripción<span class="campo-obligatorio">*</span></label>
                        <input id="descripcion" type="text" class="form-control" name="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}" required>
                        @if ($errors->has('descripcion'))
                            <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nivel">Nivel<span class="campo-obligatorio">*</span></label>
                        <input id="nivel" type="text" class="form-control" name="nivel" placeholder="Nivel" value="{{ old('nivel') }}" required>
                        @if ($errors->has('nivel'))
                            <span class="text-danger">{{ $errors->first('nivel') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="factor_hora_extra">Factor Hora Extra<span class="campo-obligatorio">*</span></label>
                        <input id="factor_hora_extra" type="number" class="form-control" name="factor_hora_extra" placeholder="Factor Hora Extra" value="{{ old('factor_hora_extra') }}" required>
                        @if ($errors->has('factor_hora_extra'))
                            <span class="text-danger">{{ $errors->first('factor_hora_extra') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="factor_dia_viaje">Factor Día Viaje<span class="campo-obligatorio">*</span></label>
                        <input id="factor_dia_viaje" type="number" class="form-control" name="factor_dia_viaje" placeholder="Factor Día Viaje" value="{{ old('factor_dia_viaje') }}" required>
                        @if ($errors->has('factor_dia_viaje'))
                            <span class="text-danger">{{ $errors->first('factor_dia_viaje') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Ocupaciones -->
            <h6 class="border-bottom pb-2 mb-3">Ocupaciones</h6>
            <div class="row">
                <div class="col-md-12">
                    <div class="scroll-container" style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-striped table-hover table-responsive" id="dynamicTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="codigo_ocupacion[]" class="form-control" required></td>
                                    <td><input type="text" name="descripcion_ocupacion[]" class="form-control" required></td>
                                    <td><button type="button" class="el-button el-button--danger remove-row"><span><i class='bx bxs-x-circle'></i></span></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Botón para agregar nueva fila -->
            <div class="col-md-1">
                <button type="button" class="el-button el-button--primary" id="addRow">Añadir Ocupación</button>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="row">
            <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="el-button el-button--primary">Crear Tipo de Trabajador</button>
                <a href="{{ route('tipo_trabajadores.index') }}" class="el-button el-button--danger">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('addRow').addEventListener('click', function() {
        var tableBody = document.querySelector('#dynamicTable tbody');
        var newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td><input type="text" name="codigo_ocupacion[]" class="form-control" required></td>
            <td><input type="text" name="descripcion_ocupacion[]" class="form-control" required></td>
            <td><button type="button" class="el-button el-button--danger remove-row"><span><i class='bx bxs-x-circle'></i></span></button></td>
        `;

        tableBody.appendChild(newRow);

        newRow.querySelector('.remove-row').addEventListener('click', function() {
            this.closest('tr').remove();
        });
    });

    document.querySelectorAll('.remove-row').forEach(function(button) {
        button.addEventListener('click', function() {
            this.closest('tr').remove();
        });
    });
</script>
