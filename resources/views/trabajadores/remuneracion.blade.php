<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Remuneracion del trabajador </h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="concepto_sunat_id">Concepto de Ingreso </label>
                <select class="form-control" id="concepto_sunat_id" name="concepto_sunat_id">
                    <option value="" disabled {{ old('concepto_sunat_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($conceptoSunat as $id => $conceptoSunat)
                        <option value="{{ $id }}"
                            {{ old('concepto_sunat_id') == $id ? 'selected' : '' }}>
                            {{ $conceptoSunat }}</option>
                    @endforeach
                </select>
                @if ($errors->has('concepto_sunat_id'))
                    <span class="error text-danger">
                        {{ $errors->first('concepto_sunat_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="monto_devengado">Monto devengado</label>
                <input type="text" class="form-control" placeholder="monto_devengado" name="monto_devengado"
                    value="{{ old('monto_devengado') }}">
                @if ($errors->has('monto_devengado'))
                    <span class="error text-danger">{{ $errors->first('monto_devengado') }}</span>
                @endif
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
                        <option value="{{ $id }}"
                            {{ old('tipo_pago_id') == $id ? 'selected' : '' }}>
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
                        <option value="{{ $id }}"
                            {{ old('tipo_banco_id') == $id ? 'selected' : '' }}>
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
                <input type="text" class="form-control" placeholder="numero_bancaria" name="numero_bancaria" max="24"
                    value="{{ old('numero_bancaria') }}">
                @if ($errors->has('numero_bancaria'))
                    <span class="error text-danger">{{ $errors->first('numero_bancaria') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="monto_pago">Monto Bruto </label>
                <input type="text" class="form-control" placeholder="monto_pago" name="monto_pago" max="24"
                    value="{{ old('monto_pago') }}">
                @if ($errors->has('monto_pago'))
                    <span class="error text-danger">{{ $errors->first('monto_pago') }}</span>
                @endif
            </div>
        </div>



    </div>
</div>
