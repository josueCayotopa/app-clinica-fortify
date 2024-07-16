<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Datos de Periodo Laboral</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="periodicidad_id">Periodo de pago<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="periodicidad_id" name="periodicidad_id">
                    @foreach ($periodicidad as $id => $periodo)
                        <option value="{{ $id }}" {{ old('periodicidad_id', $modalidadFormativa->periodicidad_id) == $id ? 'selected' : '' }}>
                            {{ $periodo }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('periodicidad_id'))
                    <span class="error text-danger">{{ $errors->first('periodicidad_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="categoria_periodos_id">Categoria<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="categoria_periodos_id" name="categoria_periodos_id">
                    @foreach ($categoriaPeriodo as $id => $categoria)
                        <option value="{{ $id }}" {{ old('categoria_periodos_id', $modalidadFormativa->categoria_periodos_id) == $id ? 'selected' : '' }}>
                            {{ $categoria }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('categoria_periodos_id'))
                    <span class="error text-danger">{{ $errors->first('categoria_periodos_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="horario_nocturno">El trabajador está sujeto a:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="horario_nocturno" id="horario_nocturno" {{ old('horario_nocturno', $modalidadFormativa->horario_nocturno) ? 'checked' : '' }}>
                    <label class="form-check-label" for="horario_nocturno">Horario Nocturno</label>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio<span class="campo-obligatorio">*</span></label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="00/00/00" value="{{ old('fecha_inicio', $modalidadFormativa->fecha_inicio) }}">
                @if ($errors->has('fecha_inicio'))
                    <span class="error text-danger">{{ $errors->first('fecha_inicio') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="00/00/00" value="{{ old('fecha_fin', $modalidadFormativa->fecha_fin) }}">
                @if ($errors->has('fecha_fin'))
                    <span class="error text-danger">{{ $errors->first('fecha_fin') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="motivo_fin_id">Motivo fin del periodo laboral<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="motivo_fin_id" name="motivo_fin_id">
                    <option value="" disabled {{ old('motivo_fin_id') ? '' : 'selected' }}>Selecciona un Motivo</option>
                    @foreach ($motivoFinPeriodo as $id => $motivo)
                        <option value="{{ $id }}" {{ old('motivo_fin_id', $modalidadFormativa->motivo_fin_id) == $id ? 'selected' : '' }}>
                            {{ $motivo }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('motivo_fin_id'))
                    <span class="error text-danger">{{ $errors->first('motivo_fin_id') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
