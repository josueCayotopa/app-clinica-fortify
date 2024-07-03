<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Remuneracion</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="concepto_sunat_id">Concepto Sunat<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="concepto_sunat_id" name="concepto_sunat_id">
                    <option value="" disabled {{ old('concepto_sunat_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($conceptoSunat as $id => $conceptoSunat)
                        <option value="{{ $conceptoSunat->id }}" 
                            {{ old('concepto_sunat_id') == $id ? '' : '' }}>
                            {{ $conceptoSunat->descripcion }}</option>
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
                <label for="monto_devengado">Monto Devengado</label>
                <input type="text" class="form-control" id="monto_devengado" name="monto_devengado"
                    maxlength="40">
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="monto_pagado">Monto Pagado</label>
                <input type="text" class="form-control" id="monto_pagado" name="monto_pagado"
                    maxlength="40">
            </div>
        </div>
    </div>
</div>
