<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Sucursal</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="">Distrito<span class="campo-obligatorio">*</span></label>
                
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
</form>

@if(isset($sucursal) && $sucursal instanceof \App\Models\Sucursal)
<script>
    $(document).ready(function() {
        var oldEmpresa = "{{ old('empresa_id', $sucursal->empresa_id ?? '') }}";
        var oldSucursal = "{{ old('sucursal_id', $sucursal->id ?? '') }}";

        $('#empresa_id').change(function() {
            var empresaId = $(this).val();
            if (empresaId) {
                $.ajax({
                    url: '/get-sucursales/' + empresaId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#sucursal_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona una Sucursal</option>');
                        $.each(data, function(key, value) {
                            $('#sucursal_id').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            } else {
                $('#sucursal_id').empty().prop('disabled', true);
            }
        });

        if (oldEmpresa) {
            $('#empresa_id').val(oldEmpresa).trigger('change');
        }

        if (oldSucursal) {
            $.ajax({
                url: '/get-sucursales/' + oldEmpresa,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#sucursal_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona una Sucursal</option>');
                    $.each(data, function(key, value) {
                        $('#sucursal_id').append('<option value="'+ key +'" '+ (key == oldSucursal ? 'selected' : '') +'>'+ value +'</option>');
                    });
                }
            });
        }
    });
</script>
@endif