<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Sucursal</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="empresa_id">Empresa<span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="empresa_id" name="empresa_id">
                    <option value="" disabled {{ old('empresa_id') ? '' : 'selected' }}>Selecciona una Empresa
                    </option>
                    @foreach ($empresa as $id => $empresa)
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
    </div>
    <div class="col-md-6 mb-1">

        <div class="form-group">
            <label for="empresaD_id">Empresa me Destacan<span class="campo-obligatorio">*</span></label>
            <select class="form-control" id="empresaD_id" name="empresaD_id">
                <option value="" disabled {{ old('empresaD_id') ? '' : 'selected' }}>
                    Selecciona
                    un tipo</option>
                @foreach ($empresaDestacan as $id => $descripcion)
                    <option value="{{ $id }}" {{ old('empresaD_id') == $id ? '' : '' }}>
                        {{ $descripcion }}</option>
                @endforeach
            </select>
            @if ($errors->has('empresaD_id'))
                <span class="error text-danger">
                    {{ $errors->first('empresaD_id') }}</span>
            @endif

        </div>



    </div>
</div>


{{-- No borrar --}}
{{-- <div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Domicilio</h6>
    <div class="row">

        <div class="col-md-3 mb-1">
            <div class="form-group">
                <label for="empresa_id">Departamento <span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="empresa_id" name="empresa_id">
                    <option value="" disabled {{ old('empresa_id') ? '' : 'selected' }}>
                        Selecciona un Departamento</option>
                    @foreach ($empresa as $id => $descripcion)
                        <option value="{{ $id }}" {{ old('empresa_id' ?? '') == $id ? 'selected' : '' }}>
                            {{ $descripcion}}</option>
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
                    {{ old('sucursal_id') ? '' : 'disabled' }}>
                    <option value="" disabled {{ old('sucursal_id') ? '' : 'selected' }}>
                        Selecciona
                        una sucursal</option>
                    @if (old('sucursal_id'))
                        @foreach ($sucursal as $id => $descripcion)
                            <option value="{{ $id }}" {{ old('sucursal_id') == $id ? 'selected' : '' }}>
                                {{ $descripcion }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('sucursal_id'))
                    <span class="error text-danger">{{ $errors->first('sucursal_id') }}</span>
                @endif
            </div>
        </div>

        



    </div>
</div> --}}

{{-- <div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Domicilio</h6>
    <div class="row">
        <div class="col-md-3 mb-1">
            <div class="form-group">
                <label for="empresa_id">Departamento <span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="empresa_id" name="empresa_id">
                    <option value="" disabled {{ old('empresa_id') ? '' : 'selected' }}>
                        Selecciona un Departamento
                    </option>
                    @foreach ($empresa as $id => $descripcion)
                        <option value="{{ $id }}" {{ old('empresa_id' ?? '') == $id ? 'selected' : '' }}>
                            {{ $descripcion }}
                        </option>
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
                <select class="form-control" id="sucursal_id" name="sucursal_id" {{ old('sucursal_id') ? '' : 'enabled' }}>
                    <option value="" disabled {{ old('sucursal_id') ? '' : 'selected' }}>
                        Selecciona una sucursal
                    </option>
                    @if (old('sucursal_id'))
                        @foreach ($sucursal as $id => $descripcion)
                            <option value="{{ $id }}" {{ old('sucursal_id') == $id ? 'selected' : '' }}>
                                {{ $descripcion }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('sucursal_id'))
                    <span class="error text-danger">{{ $errors->first('sucursal_id') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
--}}

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
                                .nombre_sucursal + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>
