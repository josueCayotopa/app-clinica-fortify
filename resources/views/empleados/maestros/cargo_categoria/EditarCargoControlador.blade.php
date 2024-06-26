@extends('home')

@section('home')
    <div class="container">
        <form action="{{ route('actualizar-relacion-categoria-cargo', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="border rounded p-3 mb-3">
                <h6 class="border-bottom pb-2 mb-3">Nueva Categoria Laboral</h6>
                <div class="row">

                    <!-- Campos de Categoría -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="empresa_id">Empresa<span class="campo-obligatorio">*</span></label>
                            <select class="form-control" id="empresa_id" name="empresa_id" required>
                                @foreach ($empresas as $id => $nombre_comercial)
                                    <option value="{{ $id }}"
                                        {{ old('empresa_id', $categoria->empresa_id ?? '') == $id ? 'selected' : '' }}>
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
                            <label for="codigo">Código Categoría<span class="campo-obligatorio">*</span></label>
                            <input id="codigo" type="text" class="form-control" name="codigo"
                                value="{{ old('codigo', $categoria->codigo) }}" readonly>
                            @if ($errors->has('codigo'))
                                <span class="error text-danger">{{ $errors->first('codigo') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="descripcion">Descripción Categoría<span class="campo-obligatorio">*</span></label>
                            <input id="descripcion" type="text" class="form-control" name="descripcion"
                                value="{{ old('descripcion', $categoria->descripcion) }}" readonly>
                            @if ($errors->has('descripcion'))
                                <span class="error text-danger">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nivel">Nivel:<span class="campo-obligatorio">*</span></label>
                            <input id="nivel" type="text" class="form-control" name="nivel"
                                value="{{ old('nivel', $categoria->nivel) }}" readonly>
                            @if ($errors->has('nivel'))
                                <span class="error text-danger">{{ $errors->first('nivel') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="factor_hora_extra">Factor de pago por hora extra<span
                                    class="campo-obligatorio">*</span></label>
                            <input id="factor_hora_extra" type="text" class="form-control" name="factor_hora_extra"
                                value="{{ old('factor_hora_extra', $categoria->factor_hora_extra) }}" readonly>
                            @if ($errors->has('factor_hora_extra'))
                                <span class="error text-danger">{{ $errors->first('factor_hora_extra') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="factor_dia_viaje">Factor de pago por viaje<span
                                    class="campo-obligatorio">*</span></label>
                            <input id="factor_dia_viaje" type="text" class="form-control" name="factor_dia_viaje"
                                value="{{ old('factor_dia_viaje', $categoria->factor_dia_viaje) }}" readonly>
                            @if ($errors->has('factor_dia_viaje'))
                                <span class="error text-danger">{{ $errors->first('factor_dia_viaje') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabla de Cargos -->
            <h6 class="border-bottom pb-2 mb-3">Cargos</h6>

            <div class="scroll-container" style="max-height: 300px; overflow-y: auto;">

                <table class="table table-striped table-hover table-responsive" id="dynamicTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Seleccionar</th>
                            <th>Código Cargo</th>
                            <th>Descripción Cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cargos as $cargo)
                            <tr>
                                <td>
                                    <input type="checkbox" name="cargos[]" value="{{ $cargo->id }}"
                                        {{ $categoriaCargos->contains('cargo_id', $cargo->id) ? 'checked' : '' }}>
                                </td>
                                <td>{{ $cargo->codigo }}</td>
                                <td>{{ $cargo->descripcion }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Botón para agregar nueva fila -->
            <div class="form-group">
                <button type="button" id="addRow" class="el-button el-button--primary">Añadir Cargo</button>
            </div>

            <!-- Botones de acción -->
            <div class="row">
                <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="el-button el-button--primary" name="accion" value="crear_relacion">Crear
                        Relación</button>

                    <a href="{{ route('categoria-cargo.indexcargocategoria') }}"
                        class="el-button el-button--danger">Cancelar</a>
                </div>
            </div>

        </form>
    </div>
    <script>
        document.getElementById('addRow').addEventListener('click', function() {
            var tableBody = document.querySelector('#dynamicTable tbody');
            var newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td><input type="checkbox" name="new_cargos[]" checked></td>
                <td><input type="text" name="new_codigo_cargo[]" class="form-control" required></td>
                <td><input type="text" name="new_descripcion_cargo[]" class="form-control" required></td>
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
@endsection
