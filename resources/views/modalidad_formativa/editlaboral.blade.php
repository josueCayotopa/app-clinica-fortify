<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Datos Laborales</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="empresa_id">Empresa<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="empresa_id" name="empresa_id">
                    <option value="" disabled
                        {{ old('empresa_id', $modalidadFormativa->empresa_id) ? '' : 'selected' }}>Selecciona una
                        Empresa</option>
                    @foreach ($empresas as $id => $empresa)
                        <option value="{{ $id }}"
                            {{ old('empresa_id', $modalidadFormativa->empresa_id) == $id ? 'selected' : '' }}>
                            {{ $empresa }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('empresa_id'))
                    <span class="error text-danger">{{ $errors->first('empresa_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="sucursal_establecimiento_laboral_id">Sucursal<span
                        class="campo-obligatorio">*</span></label>
                <select class="form-control" id="sucursal_establecimiento_laboral_id"
                    name="sucursal_establecimiento_laboral_id">
                    <option value="" disabled
                        {{ old('sucursal_establecimiento_laboral_id', $modalidadFormativa->sucursal_establecimiento_laboral_id) ? '' : 'selected' }}>
                        Selecciona una Sucursal</option>
                    {{-- Aquí deberías cargar las sucursales relacionadas con la empresa seleccionada --}}
                </select>
                @if ($errors->has('sucursal_establecimiento_laboral_id'))
                    <span class="error text-danger">{{ $errors->first('sucursal_establecimiento_laboral_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="tipo_trabajador_id">Tipo Trabajador<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="tipo_trabajador_id" name="tipo_trabajador_id">
                    <option value="" disabled
                        {{ old('tipo_trabajador_id', $modalidadFormativa->tipo_trabajador_id) ? '' : 'selected' }}>
                        Selecciona un Tipo</option>
                    @foreach ($tipo_trabajadores as $id => $tipo_trabajador)
                        <option value="{{ $id }}"
                            {{ old('tipo_trabajador_id', $modalidadFormativa->tipo_trabajador_id) == $id ? 'selected' : '' }}>
                            {{ $tipo_trabajador }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('tipo_trabajador_id'))
                    <span class="error text-danger">{{ $errors->first('tipo_trabajador_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="ocupacion_id">Asignar Ocupación<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="ocupacion_id" name="ocupacion_id">
                    <option value="" disabled
                        {{ old('ocupacion_id', $modalidadFormativa->ocupacion_id) ? '' : 'selected' }}>Selecciona una
                        Ocupación</option>
                    {{-- Aquí deberías cargar las ocupaciones relacionadas con el tipo de trabajador seleccionado --}}
                </select>
                @if ($errors->has('ocupacion_id'))
                    <span class="error text-danger">{{ $errors->first('ocupacion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="regimen_laboral">Régimen Laboral<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="regimen_laboral" name="regimen_laboral">
                    <option value="" disabled>Selecciona un Régimen</option>
                    <option value="0"
                        {{ old('regimen_laboral', $modalidadFormativa->regimen_laboral) == 0 ? 'selected' : '' }}>
                        Privado</option>
                    <option value="1"
                        {{ old('regimen_laboral', $modalidadFormativa->regimen_laboral) == 1 ? 'selected' : '' }}>
                        Público</option>
                </select>
                @if ($errors->has('regimen_laboral'))
                    <span class="error text-danger">{{ $errors->first('regimen_laboral') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="institucion_id">Institución<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="institucion_id" name="institucion_id">
                    <option value="" disabled
                        {{ old('institucion_id', $modalidadFormativa->institucion_id) ? '' : 'selected' }}>Selecciona
                        una Institución</option>
                    {{-- Aquí deberías cargar las instituciones disponibles --}}
                    @foreach ($instituciones as $id => $institucion)
                        <option value="{{ $id }}"
                            {{ old('institucion_id', $modalidadFormativa->institucion_id) == $id ? 'selected' : '' }}>
                            {{ $institucion }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('institucion_id'))
                    <span class="error text-danger">{{ $errors->first('institucion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="nivel_educativo_id">Nivel de Educación<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="nivel_educativo_id" name="nivel_educativo_id">
                    <option value="" disabled
                        {{ old('nivel_educativo_id', $modalidadFormativa->nivel_educativo_id) ? '' : 'selected' }}>
                        Selecciona un Nivel de Educación</option>
                    {{-- Aquí deberías cargar los niveles educativos disponibles --}}
                    @foreach ($niveles_educativos as $id => $nivel_educativo)
                        <option value="{{ $id }}"
                            {{ old('nivel_educativo_id', $modalidadFormativa->nivel_educativo_id) == $id ? 'selected' : '' }}>
                            {{ $nivel_educativo }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('nivel_educativo_id'))
                    <span class="error text-danger">{{ $errors->first('nivel_educativo_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="profesion_id">Profesión<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="profesion_id" name="profesion_id">
                    <option value="" disabled
                        {{ old('profesion_id', $modalidadFormativa->profesion_id) ? '' : 'selected' }}>Selecciona una
                        Profesión</option>
                    {{-- Aquí deberías cargar las profesiones disponibles --}}
                    @foreach ($profesiones as $id => $profesion)
                        <option value="{{ $id }}"
                            {{ old('profesion_id', $modalidadFormativa->profesion_id) == $id ? 'selected' : '' }}>
                            {{ $profesion }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('profesion_id'))
                    <span class="error text-danger">{{ $errors->first('profesion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="seguro_medico_id">Seguro de Salud<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="seguro_medico_id" name="seguro_medico_id">
                    <option value="" disabled
                        {{ old('seguro_medico_id', $modalidadFormativa->seguro_medico_id) ? '' : 'selected' }}>
                        Selecciona un Seguro de Salud</option>
                    {{-- Aquí deberías cargar los seguros médicos disponibles --}}
                    @foreach ($seguros_medicos as $id => $seguro_medico)
                        <option value="{{ $id }}"
                            {{ old('seguro_medico_id', $modalidadFormativa->seguro_medico_id) == $id ? 'selected' : '' }}>
                            {{ $seguro_medico }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('seguro_medico_id'))
                    <span class="error text-danger">{{ $errors->first('seguro_medico_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="actividad_id">Actividad<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="actividad_id" name="actividad_id">
                    <option value="" disabled
                        {{ old('actividad_id', $modalidadFormativa->actividad_id) ? '' : 'selected' }}>Selecciona una
                        Actividad</option>
                    {{-- Aquí deberías cargar las actividades relacionadas --}}
                </select>
                @if ($errors->has('actividad_id'))
                    <span class="error text-danger">{{ $errors->first('actividad_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="area_id">Area<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="area_id" name="area_id">
                    <option value="" disabled
                        {{ old('area_id', $modalidadFormativa->area_id) ? '' : 'selected' }}>Selecciona un Área
                    </option>
                    {{-- Aquí deberías cargar las áreas relacionadas --}}
                </select>
                @if ($errors->has('area_id'))
                    <span class="error text-danger">{{ $errors->first('area_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="ocupacion_id">Asignar Ocupación<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="ocupacion_id" name="ocupacion_id">
                    <option value="" disabled
                        {{ old('ocupacion_id', $modalidadFormativa->ocupacion_id) ? '' : 'selected' }}>Selecciona una
                        Ocupación</option>
                    {{-- Aquí deberías cargar las ocupaciones relacionadas con el tipo de trabajador seleccionado --}}
                </select>
                @if ($errors->has('ocupacion_id'))
                    <span class="error text-danger">{{ $errors->first('ocupacion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="tipo_contrato_id">Tipo Contrato<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="tipo_contrato_id" name="tipo_contrato_id">
                    <option value="" disabled
                        {{ old('tipo_contrato_id', $modalidadFormativa->tipo_contrato_id) ? '' : 'selected' }}>
                        Selecciona un Tipo de Contrato</option>
                    {{-- Aquí deberías cargar los tipos de contrato disponibles --}}
                    @foreach ($tipos_contrato as $id => $tipo_contrato)
                        <option value="{{ $id }}"
                            {{ old('tipo_contrato_id', $modalidadFormativa->tipo_contrato_id) == $id ? 'selected' : '' }}>
                            {{ $tipo_contrato }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('tipo_contrato_id'))
                    <span class="error text-danger">{{ $errors->first('tipo_contrato_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="situacion_laboral_id">Situación Laboral<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="situacion_laboral_id" name="situacion_laboral_id">
                    <option value="" disabled
                        {{ old('situacion_laboral_id', $modalidadFormativa->situacion_laboral_id) ? '' : 'selected' }}>
                        Selecciona una Situación Laboral</option>
                    {{-- Aquí deberías cargar las situaciones laborales disponibles --}}
                    @foreach ($situaciones_laborales as $id => $situacion_laboral)
                        <option value="{{ $id }}"
                            {{ old('situacion_laboral_id', $modalidadFormativa->situacion_laboral_id) == $id ? 'selected' : '' }}>
                            {{ $situacion_laboral }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('situacion_laboral_id'))
                    <span class="error text-danger">{{ $errors->first('situacion_laboral_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="codigo_responsable_id">Código Responsable<span class="campo-obligatorio">*</span></label>
                <input type="text" class="form-control" id="codigo_responsable_id" name="codigo_responsable_id"
                    placeholder="Ingresa el código del responsable"
                    value="{{ old('codigo_responsable_id', $modalidadFormativa->codigo_responsable_id) }}">
                @if ($errors->has('codigo_responsable_id'))
                    <span class="error text-danger">{{ $errors->first('codigo_responsable_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="trabajador_id">Asignar Trabajador<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="trabajador_id" name="trabajador_id">
                    <option value="" disabled
                        {{ old('trabajador_id', $modalidadFormativa->trabajador_id) ? '' : 'selected' }}>Selecciona un
                        Trabajador</option>
                    {{-- Aquí deberías cargar los trabajadores disponibles --}}
                    @foreach ($trabajadores as $id => $trabajador)
                        <option value="{{ $id }}"
                            {{ old('trabajador_id', $modalidadFormativa->trabajador_id) == $id ? 'selected' : '' }}>
                            {{ $trabajador }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('trabajador_id'))
                    <span class="error text-danger">{{ $errors->first('trabajador_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="organizacion">Organización<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="organizacion" name="organizacion">
                    <option value="" disabled
                        {{ old('organizacion', $modalidadFormativa->organizacion) ? '' : 'selected' }}>Selecciona una
                        Organización</option>
                    {{-- Aquí deberías cargar las organizaciones disponibles --}}
                    @foreach ($organizaciones as $id => $organizacion)
                        <option value="{{ $id }}"
                            {{ old('organizacion', $modalidadFormativa->organizacion) == $id ? 'selected' : '' }}>
                            {{ $organizacion }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('organizacion'))
                    <span class="error text-danger">{{ $errors->first('organizacion') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="estado_formacion">Estado Formación<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="estado_formacion" name="estado_formacion">
                    <option value="" disabled
                        {{ old('estado_formacion', $modalidadFormativa->estado_formacion) ? '' : 'selected' }}>
                        Selecciona un Estado de Formación</option>
                    {{-- Aquí deberías cargar los estados de formación disponibles --}}
                    @foreach ($estados_formacion as $id => $estado_formacion)
                        <option value="{{ $id }}"
                            {{ old('estado_formacion', $modalidadFormativa->estado_formacion) == $id ? 'selected' : '' }}>
                            {{ $estado_formacion }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('estado_formacion'))
                    <span class="error text-danger">{{ $errors->first('estado_formacion') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
