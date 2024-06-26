@extends('home')

@section('home')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card w-85">
        <div class="card-header">
            <h4 class="card-title text-center">Editar Descuento AFP</h4>
        </div>
        <div class="card-body">
            <form id="afp-descuento-form" action="{{ route('actualizar.afp.descuento', $afpDescuento->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campos de AFP -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="codigo_afp">Código AFP:</label>
                        <input type="text" name="codigo_afp" id="codigo_afp" class="form-control" value="{{ $afp->codigo }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nombre_afp">Nombre AFP:</label>
                        <input type="text" name="nombre_afp" id="nombre_afp" class="form-control" value="{{ $afp->nombre }}">
                    </div>
                    <div class="form-group col-md-2">
                        <br><br>
                        <label for="estado_afp">Estado:</label>
                        <input type="hidden" name="estado_afp" value="0">
                        <input type="checkbox" name="estado_afp" id="estado_afp" value="1" {{ $afp->estado ? 'checked' : '' }}>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fecha_baja_afp">Fecha Baja:</label>
                        <input type="date" name="fecha_baja_afp" id="fecha_baja_afp" class="form-control" value="{{ $afp->fecha_baja }}">
                    </div>
                </div>

                <!-- Tabla de Tipos de Descuento -->
                <div class="form-group">
                    <br>
                    <label for="selected_descuento_id">Tipo de Descuento:</label>
                </div>
                <div class="scroll-container" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-bordered" id="descuento-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Código</th>
                                <th>Año Proceso</th>
                                <th>Mes Proceso</th>
                                <th>Descripción</th>
                                <th>Porcentaje Descuento</th>
                                <th>Índice Tope</th>
                                <th>Importe Tope</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tiposDescuentos as $index => $tipoDescuento)
                            <tr>
                                <td>
                                    <input type="radio" name="selected_descuento_id" value="{{ $tipoDescuento->id }}" {{ $tipoDescuento->id == $afpDescuento->tipo_descuento_id ? 'checked' : '' }} required>
                                </td>
                                <td><input type="text" class="form-control input-medium" name="codigo[{{ $tipoDescuento->id }}]" value="{{ $tipoDescuento->codigo }}"></td>
                                <td><input type="number" class="form-control input-medium" name="anio_proceso[{{ $tipoDescuento->id }}]" value="{{ $tipoDescuento->anio_proceso }}"></td>
                                <td class="col-md-6">
                                    <select class="form-select" name="mes_proceso[{{ $tipoDescuento->id }}]">
                                        <option value="1" {{ $tipoDescuento->mes_proceso == 1 ? 'selected' : '' }}>Enero</option>
                                        <option value="2" {{ $tipoDescuento->mes_proceso == 2 ? 'selected' : '' }}>Febrero</option>
                                        <option value="3" {{ $tipoDescuento->mes_proceso == 3 ? 'selected' : '' }}>Marzo</option>
                                        <option value="4" {{ $tipoDescuento->mes_proceso == 4 ? 'selected' : '' }}>Abril</option>
                                        <option value="5" {{ $tipoDescuento->mes_proceso == 5 ? 'selected' : '' }}>Mayo</option>
                                        <option value="6" {{ $tipoDescuento->mes_proceso == 6 ? 'selected' : '' }}>Junio</option>
                                        <option value="7" {{ $tipoDescuento->mes_proceso == 7 ? 'selected' : '' }}>Julio</option>
                                        <option value="8" {{ $tipoDescuento->mes_proceso == 8 ? 'selected' : '' }}>Agosto</option>
                                        <option value="9" {{ $tipoDescuento->mes_proceso == 9 ? 'selected' : '' }}>Septiembre</option>
                                        <option value="10" {{ $tipoDescuento->mes_proceso == 10 ? 'selected' : '' }}>Octubre</option>
                                        <option value="11" {{ $tipoDescuento->mes_proceso == 11 ? 'selected' : '' }}>Noviembre</option>
                                        <option value="12" {{ $tipoDescuento->mes_proceso == 12 ? 'selected' : '' }}>Diciembre</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control input" name="descripcion[{{ $tipoDescuento->id }}]" value="{{ $tipoDescuento->descripcion }}"></td>
                                <td><input type="number" class="form-control input-medium" name="porcentaje_descuento[{{ $tipoDescuento->id }}]" value="{{ $tipoDescuento->porcentaje_descuento }}"></td>
                                <td class="col-md-6">
                                    <select class="form-select" name="indice_tope[{{ $tipoDescuento->id }}]">
                                        <option value="S" {{ $tipoDescuento->indice_tope == 'S' ? 'selected' : '' }}>S</option>
                                        <option value="N" {{ $tipoDescuento->indice_tope == 'N' ? 'selected' : '' }}>N</option>
                                    </select>
                                </td>
                                <td><input type="number" class="form-control input-medium" name="importe_tope[{{ $tipoDescuento->id }}]" value="{{ $tipoDescuento->importe_tope }}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Botones de acción -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('afp.descuentos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .input-medium {
        width: 82px; /* Ajusta el tamaño según tus necesidades */
    }
    .input {
        width: 200px; /* Ajusta el tamaño según tus necesidades */
    }
    .medium {
        width: 95px; /* Ajusta el tamaño según tus necesidades */
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const estadoAfpCheckbox = document.getElementById('estado_afp');
        const descuentoTable = document.getElementById('descuento-table');
        const codigoAfpInput = document.getElementById('codigo_afp');
        const nombreAfpInput = document.getElementById('nombre_afp');
        const fechaBajaAfpInput = document.getElementById('fecha_baja_afp');

        function toggleInputs() {
            const isEnabled = estadoAfpCheckbox.checked;
            const inputs = descuentoTable.querySelectorAll('input, select');

            // Toggle table inputs
            inputs.forEach(input => {
                input.disabled = !isEnabled;
            });

            // Toggle Código AFP and Nombre AFP
            codigoAfpInput.disabled = !isEnabled;
            nombreAfpInput.disabled = !isEnabled;
            
            // Always enable the date input
            fechaBajaAfpInput.disabled = false;
        }

        estadoAfpCheckbox.addEventListener('change', toggleInputs);
        toggleInputs(); // Initial call to set the correct state on page load
    });
</script>
@endsection