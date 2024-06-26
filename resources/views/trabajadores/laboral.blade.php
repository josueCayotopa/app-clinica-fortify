<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Datos Laborales</h6>
    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="tipo_trabajador_id">Tipo Trabajador<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="tipo_trabajador_id" name="tipo_trabajador_id">
                    <option value="" disabled {{ old('tipo_trabajador_id') ? '' : 'selected' }}>
                        Selecciona
                        un Tipo</option>
                    @foreach ($tipo_trabajadores as $id => $tipo_trabajador)
                        <option value="{{ $id }}" {{ old('tipo_trabajador_id') == $id ? 'selected' : '' }}>
                            {{ $tipo_trabajador }}</option>
                    @endforeach

                </select>
                @if ($errors->has('tipo_trabajador_id'))
                    <span class="error text-danger">
                        {{ $errors->first('tipo_trabajador_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="regimen_laboral">Regimen Laboral<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="regimen_laboral" name="regimen_laboral">
                    <option value="" disabled>Selecciona un Tipo</option>
                    <option value="0" selected> Privado </option>
                    <option value="1"> publico </option>
                </select>
                @if ($errors->has('regimen_laboral'))
                    <span class="error text-danger">
                        {{ $errors->first('regimen_laboral') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="nivel_edicativo_id">Nivel de educacion<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="nivel_edicativo_id" name="nivel_edicativo_id">
                    <option value="" disabled {{ old('nivel_edicativo_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($nivel_educativo as $id => $nivel_educativo)
                        <option value="{{ $id }}" {{ old('nivel_edicativo_id') == $id ? 'selected' : '' }}>
                            {{ $nivel_educativo }}</option>
                    @endforeach

                </select>
                @if ($errors->has('nivel_edicativo_id'))
                    <span class="error text-danger">
                        {{ $errors->first('nivel_edicativo_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="ocupacion_id">Asignar Ocupacion <span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="ocupacion_id" name="ocupacion_id">
                    @foreach ($ocupacion as $id => $ocupacion)
                        <option value="{{ $id }}" {{ old('ocupacion_id') == $id ? 'selected' : '' }}>
                            {{ $ocupacion }}</option>
                    @endforeach
                    <option value="" disabled>Selecciona un Tipo</option>
                </select>
                @if ($errors->has('ocupacion_id'))
                    <span class="error text-danger"> {{ $errors->first('ocupacion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="discapacidad">Discapacidad</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="discapacidad" id="discapacidad">
                    <label class="form-check-label" for="discapacidad">¿Tiene alguna
                        discapacidad?</label>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="ocupacion_id">Tipo Contrato <span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="contrato_trabajo_id" name="contrato_trabajo_id">
                    @foreach ($ocupacion as $id => $ocupacion)
                        <option value="{{ $id }}" {{ old('contrato_trabajo_id') == $id ? 'selected' : '' }}>
                            {{ $ocupacion }}</option>
                    @endforeach
                    <option value="" disabled>Selecciona un Tipo</option>
                </select>
                @if ($errors->has('contrato_trabajo_id'))
                    <span class="error text-danger"> {{ $errors->first('contrato_trabajo_id') }}</span>
                @endif
            </div>
        </div>

    </div>
</div>
