<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Domicilio</h6>
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="domiciliado" name="domiciliado"
                    {{ old('domiciliado', $modalidadFormativa->domiciliado) ? 'checked' : '' }}>
                <label class="form-check-label" for="domiciliado">Es Domiciliado<span
                        class="campo-obligatorio">*</span></label>
                @if ($errors->has('domiciliado'))
                    <span class="error text-danger">{{ $errors->first('domiciliado') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="nacionalidad_id">Nacionalidad <span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="nacionalidad_id" name="nacionalidad_id">
                    @foreach ($nacionalidad as $id => $nacionalidad)
                        <option value="{{ $id }}"
                            {{ old('nacionalidad_id', $modalidadFormativa->nacionalidad_id) == $id ? 'selected' : '' }}>
                            {{ $nacionalidad }}
                        </option>
                    @endforeach
                    <option value="" disabled>Selecciona un País</option>
                </select>
                @if ($errors->has('nacionalidad_id'))
                    <span class="error text-danger">{{ $errors->first('nacionalidad_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="departamento_id">Departamento <span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="departamento_id" name="departamento_id">
                    <option value="" disabled
                        {{ old('departamento_id', $modalidadFormativa->departamento_id) ? '' : 'selected' }}>Selecciona
                        un Departamento</option>
                    @foreach ($departamentos as $id => $descripcion)
                        <option value="{{ $id }}"
                            {{ old('departamento_id', $modalidadFormativa->departamento_id) == $id ? 'selected' : '' }}>
                            {{ $descripcion }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('departamento_id'))
                    <span class="error text-danger">{{ $errors->first('departamento_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="provincia_id">Provincia</label>
                <select class="form-control" id="provincia_id" name="provincia_id"
                    {{ old('provincia_id', $modalidadFormativa->provincia_id) ? '' : 'disabled' }}>
                    <option value="" disabled
                        {{ old('provincia_id', $modalidadFormativa->provincia_id) ? '' : 'selected' }}>Selecciona una
                        Provincia</option>
                    @if (old('provincia_id', $modalidadFormativa->provincia_id))
                        @foreach ($provincias as $id => $descripcion)
                            <option value="{{ $id }}"
                                {{ old('provincia_id', $modalidadFormativa->provincia_id) == $id ? 'selected' : '' }}>
                                {{ $descripcion }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('provincia_id'))
                    <span class="error text-danger">{{ $errors->first('provincia_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="distrito_id">Distrito<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="distrito_id" name="distrito_id"
                    {{ old('distrito_id', $modalidadFormativa->distrito_id) ? '' : 'disabled' }}>
                    <option value="" disabled
                        {{ old('distrito_id', $modalidadFormativa->distrito_id) ? '' : 'selected' }}>Selecciona un
                        Distrito</option>
                    @if (old('distrito_id', $modalidadFormativa->distrito_id))
                        @foreach ($distritos as $id => $descripcion)
                            <option value="{{ $id }}"
                                {{ old('distrito_id', $modalidadFormativa->distrito_id) == $id ? 'selected' : '' }}>
                                {{ $descripcion }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('distrito_id'))
                    <span class="error text-danger">{{ $errors->first('distrito_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="via_id">Vía<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="via_id" name="via_id">
                    <option value="" disabled {{ old('via_id', $modalidadFormativa->via_id) ? '' : 'selected' }}>
                        Selecciona una Vía</option>
                    @foreach ($vias as $id => $via)
                        <option value="{{ $id }}"
                            {{ old('via_id', $modalidadFormativa->via_id) == $id ? 'selected' : '' }}>
                            {{ $via }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('via_id'))
                    <span class="error text-danger">{{ $errors->first('via_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="nombre_via">Nombre de Vía<span class="campo-obligatorio">*</span></label>
                <input type="text" class="form-control" placeholder="Nombre de Vía" name="nombre_via"
                    value="{{ old('nombre_via', $modalidadFormativa->nombre_via) }}">
                @if ($errors->has('nombre_via'))
                    <span class="error text-danger">{{ $errors->first('nombre_via') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="numero_via">Número de Vía</label>
                <input type="text" class="form-control" placeholder="Número de Vía" name="numero_via"
                    value="{{ old('numero_via', $modalidadFormativa->numero_via) }}">
                @if ($errors->has('numero_via'))
                    <span class="error text-danger">{{ $errors->first('numero_via') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="interior">Interior</label>
                <input type="text" class="form-control" placeholder="Interior" name="interior"
                    value="{{ old('interior', $modalidadFormativa->interior) }}">
                @if ($errors->has('interior'))
                    <span class="error text-danger">{{ $errors->first('interior') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="zona_id">Zona<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="zona_id" name="zona_id">
                    <option value="" disabled
                        {{ old('zona_id', $modalidadFormativa->zona_id) ? '' : 'selected' }}>Selecciona una Zona
                    </option>
                    @foreach ($zonas as $id => $zona)
                        <option value="{{ $id }}"
                            {{ old('zona_id', $modalidadFormativa->zona_id) == $id ? 'selected' : '' }}>
                            {{ $zona }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('zona_id'))
                    <span class="error text-danger">{{ $errors->first('zona_id') }}</span>
                @endif
            </div>
        </div>


        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="zona_id">Numero Zona</label>
                <input type="text" class="form-control" placeholder="Nombre de Zona" name="zona_id"
                    value="{{ old('zona_id',$modalidadFormativa->zona_id) }}">
                @if ($errors->has('zona_id'))
                    <span class="error text-danger">{{ $errors->first('zona_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="referencia">Referencia</label>
                <input type="text" class="form-control" placeholder="Referencia" name="referencia"
                    value="{{ old('referencia', $modalidadFormativa->referencia) }}">
                @if ($errors->has('referencia'))
                    <span class="error text-danger">{{ $errors->first('referencia') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
