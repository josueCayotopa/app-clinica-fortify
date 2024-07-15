<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Datos de Periodo Laboral</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="periodicidad_id">Periodo de pago<span
                        class="campo-obligatorio">*</span></label>
                <select class="form-control" id="periodicidad_id" name="periodicidad_id">
                    @foreach ($periodicidad as $id => $periodicidad)
                    <option value="{{ $id }}" {{ old('periodicidad_id', 1) == $id ? 'selected' : '' }}>
                        {{ $periodicidad }}</option>
                    @endforeach
                </select>
                @if ($errors->has('periodicidad_id'))
                    <span class="error text-danger">
                        {{ $errors->first('periodicidad_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="categoria_periodos_id">Categoria<span
                        class="campo-obligatorio">*</span></label>
                <select class="form-control" id="categoria_periodos_id" name="categoria_periodos_id">
                    @foreach ($categoriaPeriodo as $id => $categoriaPeriodo)
                        <option value="{{ $id }}"
                            {{ old('categoria_periodos_id') == $id ? 'selected' : '' }}>
                            {{ $categoriaPeriodo }}</option>
                    @endforeach
                    <option value="" disabled>Selecciona un Tipo</option>
                </select>
                @if ($errors->has('categoria_periodos_id'))
                    <span class="error text-danger">
                        {{ $errors->first('categoria_periodos_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="trabajo_sujeto_jornda_maxima">El trabajador esta sujeto a:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="trabajo_sujeto_jornda_maxima" id="trabajo_sujeto_jornda_maxima" >
                    <label class="form-check-label" for="trabajo_sujeto_jornda_maxima">Jornada de trabajo Maxima</label>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="trabajo_sujeto_horario_noctur">El trabajador esta sujeto a:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="trabajo_sujeto_horario_noctur" id="trabajo_sujeto_horario_noctur" >
                    <label class="form-check-label" for="trabajo_sujeto_horario_noctur">Horario Nocturno</label>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio<span
                    class="campo-obligatorio">*</span></label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="00/00/00"
                    value="{{ old('fecha_inicio') }}">
                @if ($errors->has('fecha_inicio'))
                    <span class="error text-danger">{{ $errors->first('fecha_inicio') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="00/00/00"
                    value="{{ old('fecha_fin') }}">
                @if ($errors->has('fecha_fin'))
                    <span class="error text-danger">{{ $errors->first('fecha_fin') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="motivo_fin_id">Motivo fin del periodo laboral<span
                        class="campo-obligatorio">*</span></label>
                <select class="form-control" id="motivo_fin_id" name="motivo_fin_id">
                    @foreach ($motivoFinPeriodo as $id => $motivoFinPeriodo)
                        <option value="{{ $id }}"
                            {{ old('motivo_fin_id') == $id ? 'selected' : '' }}>
                            {{ $motivoFinPeriodo }}</option>
                    @endforeach
                    <option value="" disabled>Selecciona un Tipo</option>
                </select>
                @if ($errors->has('motivo_fin_id'))
                    <span class="error text-danger">
                        {{ $errors->first('motivo_fin_id') }}</span>
                @endif
            </div>
        </div>
    
    </div>
</div>
