<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Datos Laborales</h6>
    <div class="row">

        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="tipo_pensionista_id">Tipo Pensionista<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="tipo_pensionista_id" name="tipo_trabajador_id">
                    <option value="" disabled {{ old('tipo_pensionista_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($tipoPensionistas as $id => $tipoPensionista)
                        <option value="{{ $tipoPensionista->id }}" {{ old('tipo_pensionista_id') == $id ? '' : '' }}>
                            {{ $tipoPensionista->descripcion }}</option>
                    @endforeach

                </select>
                @if ($errors->has('tipo_trabajador_id'))
                    <span class="error text-danger">
                        {{ $errors->first('tipo_trabajador_id') }}</span>
                @endif
            </div>
        </div>
        {{-- <div class="col-md-6 mb-1">
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
        </div> --}}
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="sucursal_id">Tipo Trabajador<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="sucursal_id" name="sucursal_id">
                    <option value="" disabled {{ old('sucursal_id') ? '' :'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($sucursalEstablecimientos as $id => $sucursal)
                        <option value="{{ $sucursal->id }}" {{ old('sucursal_id') == $id? '' : '' }}>
                            {{ $sucursl->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="nivel_edicativo_id">Nivel de educacion<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="nivel_edicativo_id" name="nivel_edicativo_id">
                    <option value="" disabled {{ old('nivel_edicativo_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    {{-- @foreach ($nivel_educativo as $id => $nivel_educativo)
                        <option value="{{ $nivel_educativo->id }}" {{ old('nivel_edicativo_id') == $id ? 'selected' : '' }}>
                            {{ $nivel_educativo->descripcion }}</option>
                    @endforeach --}}

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
                <label for="tipo_pago_id">Tipo de Pago</label>
                <select class="form-control" id="tipo_pago_id" name="tipo_pago_id" required>
                    <option value="" disabled {{ old('tipo_pago_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($tipoPagos as $tipoPago)
                        <option value="{{ $tipoPago->id }}">{{ $tipoPago->descripcion }}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="tipo_banco_id">Tipo de Banco</label>
                <select class="form-control" id="tipo_banco_id" name="tipo_banco_id">
                    <option value="" disabled {{ old('tipo_banco_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($tipoBancos as $tipoBanco)
                        <option value="{{ $tipoBanco->id }}">{{ $tipoBanco->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="numero_bancaria">Número de cuenta Bancaria</label>
                <input type="text" class="form-control" id="numero_bancaria" name="numero_bancaria"
                    maxlength="40">
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="monto_pago">Monto de Pago</label>

                <input type="number" class="form-control" id="monto_pago" name="monto_pago" min="0"
                    step="1">

            </div>
        </div> 
    </div>
</div>
