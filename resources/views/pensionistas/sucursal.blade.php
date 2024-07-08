{{-- 
    <div class="border rounded p-3 mb-3">
        <h6 class="border-bottom pb-2 mb-3">Sucursal</h6>
        <div class="row">
            <div class="col-md-6 mb-1">
                <div class="form-group">
                    <label for="empresa_id">Empresa<span class="campo-obligatorio">*</span></label>
                    <select class="form-control" id="empresa_id" name="empresa_id">
                        <option value="" disabled {{ old('empresa_id') ? '' : 'selected' }}>
                            Selecciona
                            un tipo</option>
                        @foreach ($empresa as $id => $empresaN)
                            <option value="{{ $empresaN->id }}" {{ old('empresa_id') == $id ? '' : '' }}>
                                {{ $empresaN->nombre_comercial }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('empresa_id'))
                        <span class="error text-danger">
                            {{ $errors->first('empresa_id') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6 mb-1">
                <div class="form-group">
                    <label for="sucursal_id">Sucursal<span class="campo-obligatorio">*</span></label>
                    <select class="form-control" id="sucursal_id" name="sucursal_id"
                        {{ old('sucursal_id') ? '' : 'disabled' }}>
                        <option value="" disabled {{ old('sucursal_id') ? '' : 'selected' }}>
                            Selecciona
                            una sucursal</option>
                        @if (old('sucursal_id'))
                            @foreach ($sucursal as $id => $sucursalN)
                                <option value="{{ $sucursalN->id }}" {{ old('sucursal_id') == $id ? 'selected' : '' }}>
                                    {{ $sucursalN->nombre_sucursal }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @if ($errors->has('sucursal_id'))
                    <span class="error text-danger">
                        {{ $errors->first('sucursal_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
 --}}

 <div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Sucursal</h6>
    <div class="row">
        
        
        <div class="col-md-3 mb-1">
            <div class="form-group">
                <label for="empresa_id">Empresa <span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="empresa_id" name="departamento_id">
                    <option value="" disabled {{ old('empresa_id') ? '' : 'selected' }}>
                        Selecciona una empresa</option>
                    @foreach ($empresa as $id => $descripcion)
                        <option value="{{ $descripcion->id }}" {{ old('empresa_id' ?? '') == $id ? 'selected' : '' }}>
                            {{ $descripcion->nombre_comercial }}</option>
                    @endforeach
                </select>
                @if ($errors->has('empresa_id'))
                    <span class="error text-danger">{{ $errors->first('empresa_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-3 mb-1">
            <div class="form-group">
                <label for="sucursal_id">Sucursal</label>
                <select class="form-control" id="sucursal_id" name="sucursal_id"
                    {{ old('sucursal_id') ? '' : 'enabled' }}>
                    <option value="" disabled {{ old('sucursal_id') ? '' : 'selected' }}>
                        Selecciona
                        una Provincia</option>
                    
                        @foreach ($sucursal as $id => $descripcion)
                            <option value="{{ $descripcion->id }}" {{ old('sucursal_id') == $id ? 'selected' : '' }}>
                                {{ $descripcion->nombre_sucursal }}</option>
                            </option>
                        @endforeach
                    
                </select>
                @if ($errors->has('sucursal_id'))
                    <span class="error text-danger">{{ $errors->first('sucursal_id') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
