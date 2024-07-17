<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Datos Laborales</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="empresa_id">Empresa<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="empresa_id" name="empresa_id">
                    <option value="" disabled {{ old('empresa_id') ? '' : 'selected' }}>Selecciona una Empresa
                    </option>
                    @foreach ($empresas as $id => $empresa)
                        <option value="{{ $id }}" {{ old('empresa_id') == $id ? 'selected' : '' }}>
                            {{ $empresa }}</option>
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
                    <option value="" disabled {{ old('sucursal_establecimiento_laboral_id') ? '' : 'selected' }}>
                        Selecciona una Sucursal</option>
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
                    <option value="" disabled {{ old('tipo_trabajador_id') ? '' : 'selected' }}>Selecciona un Tipo
                    </option>
                    @foreach ($tipo_trabajadores as $id => $tipo_trabajador)
                        <option value="{{ $id }}" {{ old('tipo_trabajador_id') == $id ? 'selected' : '' }}>
                            {{ $tipo_trabajador }}</option>
                    @endforeach
                </select>
                @if ($errors->has('tipo_trabajador_id'))
                    <span class="error text-danger">{{ $errors->first('tipo_trabajador_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="ocupacion_id">Asignar Ocupación <span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="ocupacion_id" name="ocupacion_id">
                    <option value="" disabled {{ old('ocupacion_id') ? '' : 'selected' }}>Selecciona una
                        Ocupación</option>
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
                    <option value="" disabled>Selecciona un Tipo</option>
                    <option value="0" selected>Privado</option>
                    <option value="1">Público</option>
                </select>
                @if ($errors->has('regimen_laboral'))
                    <span class="error text-danger">{{ $errors->first('regimen_laboral') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="institucion_id">Institucion <span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="institucion_id" name="institucion_id">
                    <option value="" disabled {{ old('institucion_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($instituciones as $id => $instituciones)
                        <option value="{{ $id }}" {{ old('institucion_id') == $id ? 'selected' : '' }}>
                            {{ $instituciones }}</option>
                    @endforeach

                </select>
                @if ($errors->has('institucion_id'))
                    <span class="error text-danger">
                        {{ $errors->first('institucion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
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
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="prefesion_id">Profesion<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="prefesion_id" name="prefesion_id">
                    <option value="" disabled {{ old('prefesion_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($profeciones as $id => $profeciones)
                        <option value="{{ $id }}" {{ old('prefesion_id') == $id ? 'selected' : '' }}>
                            {{ $profeciones }}</option>
                    @endforeach

                </select>
                @if ($errors->has('prefesion_id'))
                    <span class="error text-danger">
                        {{ $errors->first('prefesion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="seguro_medico_id">Seguro de Salud<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="seguro_medico_id" name="seguro_medico_id">
                    <option value="" disabled {{ old('seguro_medico_id') ? '' : 'selected' }}>Selecciona un
                        Seguro
                    </option>
                    @foreach ($seguro_medico as $id => $seguro_salud)
                        <option value="{{ $id }}" {{ old('seguro_medico_id') == $id ? 'selected' : '' }}>
                            {{ $seguro_salud }}</option>
                    @endforeach
                </select>
                @if ($errors->has('seguro_medico_id'))
                    <span class="error text-danger">{{ $errors->first('seguro_medico_id') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="madre_responsabilidad">Madre con responsabilidad</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="madre_responsabilidad"
                        id="madre_responsabilidad" value="1" {{ old('madre_responsabilidad') ? 'checked' : '' }}>
                    <label class="form-check-label" for="madre_responsabilidad">Aplica</label>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="discapacidad">Discapacidad</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="discapacidad"
                        id="discapacidad" value="1" {{ old('discapacidad') ? 'checked' : '' }}>
                    <label class="form-check-label" for="discapacidad">Aplica</label>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="monto_pagado">Monto Pagado</label>
                <input type="text" class="form-control" placeholder="monto_pagado" name="monto_pagado"
                    value="{{ old('monto_pagado') }}">
                @if ($errors->has('monto_pagado'))
                    <span class="error text-danger">{{ $errors->first('monto_pagado') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="tipo_pago_id">Tipo de pago </label>
                <select class="form-control" id="tipo_pago_id" name="tipo_pago_id">
                    <option value="" disabled {{ old('tipo_pago_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($tipoPago as $id => $tipoPago)
                        <option value="{{ $id }}" {{ old('tipo_pago_id') == $id ? 'selected' : '' }}>
                            {{ $tipoPago }}</option>
                    @endforeach
                </select>
                @if ($errors->has('tipo_pago_id'))
                    <span class="error text-danger">
                        {{ $errors->first('tipo_pago_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="tipo_banco_id">Tipo de banco</label>
                <select class="form-control" id="tipo_banco_id" name="tipo_banco_id">
                    <option value="" disabled {{ old('tipo_banco_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($tipoBanco as $id => $tipoBanco)
                        <option value="{{ $id }}" {{ old('tipo_banco_id') == $id ? 'selected' : '' }}>
                            {{ $tipoBanco }}</option>
                    @endforeach
                </select>
                @if ($errors->has('tipo_banco_id'))
                    <span class="error text-danger">
                        {{ $errors->first('tipo_banco_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="numero_bancaria">Cuenta Bancaria</label>
                <input type="text" class="form-control" placeholder="numero_bancaria" name="numero_bancaria"
                    max="24" value="{{ old('numero_bancaria') }}">
                @if ($errors->has('numero_bancaria'))
                    <span class="error text-danger">{{ $errors->first('numero_bancaria') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="monto_pago">Monto Bruto </label>
                <input type="text" class="form-control" placeholder="monto_pago" name="monto_pago"
                    max="24" value="{{ old('monto_pago') }}">
                @if ($errors->has('monto_pago'))
                    <span class="error text-danger">{{ $errors->first('monto_pago') }}</span>
                @endif
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#empresa_id').on('change', function() {
            var empresa_id = this.value;
            $("#sucursal_establecimiento_laboral_id").html('');
            if (empresa_id) {
                $.ajax({
                    url: `/get-sucursales/${empresa_id}`,
                    type: "GET",
                    dataType: 'json',
                    success: function(res) {
                        $('#sucursal_establecimiento_laboral_id').html(
                            '<option value="" disabled selected>Selecciona una Sucursal</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#sucursal_establecimiento_laboral_id').append(
                                '<option value="' + value.id + '">' + value
                                .nombre_sucursal + '</option>'
                            );
                        });
                    }
                });
            }
        });

        $('#tipo_trabajador_id').on('change', function() {
            var tipo_trabajador_id = this.value;
            $("#ocupacion_id").html('');
            if (tipo_trabajador_id) {
                $.ajax({
                    url: `/get-ocupaciones/${tipo_trabajador_id}`,
                    type: "GET",
                    dataType: 'json',
                    success: function(res) {
                        $('#ocupacion_id').html(
                            '<option value="" disabled selected>Selecciona una Ocupación</option>'
                        );
                        $.each(res, function(key, value) {
                            $('#ocupacion_id').append('<option value="' + value.id +
                                '">' + value.descripcion + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
