<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Domicilio</h6>
    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="domiciliado" name="domiciliado" value="1"
                    {{ old('domiciliado') ? 'checked' : '' }}>
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
                <select class="form-control domicilio-field" id="nacionalidad_id" name="nacionalidad_id" disabled>
                    @foreach ($nacionalidad as $id => $nacionalidad)
                        <option value="{{ $id }}" {{ old('nacionalidad_id', 193) == $id ? 'selected' : '' }}>
                            {{ $nacionalidad }}</option>
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
                <select class="form-control domicilio-field" id="departamento_id" name="departamento_id">
                    <option value="" disabled selected>Selecciona un Departamento</option>
                    @foreach ($departamentos as $id => $descripcion)
                        <option value="{{ $id }}"
                            {{ old('departamento_id') == $id ? 'selected' : '' }}>
                            {{ $descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('departamento_id')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="provincia_id">Provincia <span class="campo-obligatorio">*</span></label>
                <select class="form-control domicilio-field" id="provincia_id" name="provincia_id"
                    {{ old('provincia_id') ? '' : 'disabled' }}>
                    <option value="" disabled selected>Selecciona una Provincia</option>
                    @foreach ($provincias as $id => $descripcion)
                        <option value="{{ $id }}" {{ old('provincia_id') == $id ? 'selected' : '' }}>
                            {{ $descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('provincia_id')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="distrito_id">Distrito <span class="campo-obligatorio">*</span></label>
                <select class="form-control domicilio-field" id="distrito_id" name="distrito_id"
                    {{ old('distrito_id') ? '' : 'disabled' }}>
                    <option value="" disabled selected>Selecciona un Distrito</option>
                    @foreach ($distritos as $id => $descripcion)
                        <option value="{{ $id }}" {{ old('distrito_id') == $id ? 'selected' : '' }}>
                            {{ $descripcion }}
                        </option>
                    @endforeach
                </select>
                @error('distrito_id')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="via_id">Vía<span class="campo-obligatorio">*</span></label>
                <select class="form-control domicilio-field" id="via_id" name="via_id" disabled>
                    <option value="" disabled {{ old('via_id') ? '' : 'selected' }}>
                        Selecciona una Vía</option>
                    @foreach ($vias as $id => $via)
                        <option value="{{ $id }}" {{ old('via_id') == $id ? 'selected' : '' }}>
                            {{ $via }}</option>
                    @endforeach
                </select>
                @if ($errors->has('via_id'))
                    <span class="error text-danger">{{ $errors->first('via_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="nombre_via">Nombre de Via<span class="campo-obligatorio">*</span></label>
                <input type="text" class="form-control domicilio-field" placeholder="Nombre via" name="nombre_via"
                    value="{{ old('nombre_via') }}" disabled>
                @if ($errors->has('nombre_via'))
                    <span class="error text-danger">{{ $errors->first('nombre_via') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="numero_via">Numero via</label>
                <input type="text" class="form-control domicilio-field" placeholder="Numero via" name="numero_via"
                    value="{{ old('numero_via') }}" disabled>
                @if ($errors->has('numero_via'))
                    <span class="error text-danger">{{ $errors->first('numero_via') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="interior">Interior</label>
                <input type="text" class="form-control domicilio-field" placeholder="interior" name="interior"
                    value="{{ old('interior') }}" disabled>
                @if ($errors->has('interior'))
                    <span class="error text-danger">{{ $errors->first('interior') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="zona_id">Zonas<span class="campo-obligatorio">*</span></label>
                <select class="form-control domicilio-field" id="zona_id" name="zona_id" disabled>
                    <option value="" disabled {{ old('zona_id') ? '' : 'selected' }}>
                        Selecciona una Zona</option>
                    @foreach ($zonas as $id => $zona)
                        <option value="{{ $id }}" {{ old('zona_id') == $id ? 'selected' : '' }}>
                            {{ $zona }}</option>
                    @endforeach
                </select>
                @if ($errors->has('zona_id'))
                    <span class="error text-danger"> {{ $errors->first('zona_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="nombre_zona">Numero Zona</label>
                <input type="text" class="form-control domicilio-field" placeholder="Nombre de Zona"
                    name="nombre_zona" value="{{ old('nombre_zona') }}" disabled>
                @if ($errors->has('nombre_zona'))
                    <span class="error text-danger">{{ $errors->first('nombre_zona') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="referencia">Referencia</label>
                <input type="text" class="form-control domicilio-field" placeholder="Referencia"
                    name="referencia" value="{{ old('referencia') }}" disabled>
                @if ($errors->has('referencia'))
                    <span class="error text-danger">{{ $errors->first('referencia') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // Habilitar o deshabilitar campos según el estado del checkbox
        function toggleDomicilioFields() {
            if ($('#domiciliado').is(':checked')) {
                $('.domicilio-field').prop('disabled', false);
            } else {
                $('.domicilio-field').prop('disabled', true);
            }
        }

        // Ejecutar la función al cargar la página
        toggleDomicilioFields();

        // Escuchar el evento change en el checkbox
        $('#domiciliado').change(function() {
            toggleDomicilioFields();
        });
    });
</script>
