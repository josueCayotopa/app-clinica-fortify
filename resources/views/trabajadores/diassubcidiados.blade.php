<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Dias Subcidiados</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="tipo_suspencion_id">Suspencion<span
                        class="campo-obligatorio">*</span></label>
                <select class="form-control" id="tipo_suspencion_id" name="tipo_suspencion_id">
                    <option value="" disabled {{ old('tipo_suspencion_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($tipoSuspension as $id => $tipoSuspension)
                        <option value="{{ $id }}"
                            {{ old('tipo_suspencion_id') == $id ? 'selected' : '' }}>
                            {{ $tipoSuspension }}</option>
                    @endforeach
                   
                </select>
                @if ($errors->has('tipo_suspencion_id'))
                    <span class="error text-danger">
                        {{ $errors->first('tipo_suspencion_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="fecha_inicio_sub">Fecha de Inicio de trabajador<span
                    class="campo-obligatorio">*</span></label>
                <input type="date" class="form-control" id="fecha_inicio_sub" name="fecha_inicio_sub" placeholder="00/00/00"
                    value="{{ old('fecha_inicio_sub') }}">
                @if ($errors->has('fecha_inicio_sub'))
                    <span class="error text-danger">{{ $errors->first('fecha_inicio_sub') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="fecha_fin_sub">Fecha de Fin de Pago</label>
                <input type="date" class="form-control" id="fecha_fin_sub" name="fecha_fin_sub" placeholder="00/00/00"
                    value="{{ old('fecha_fin_sub') }}">
                @if ($errors->has('fecha_fin_sub'))
                    <span class="error text-danger">{{ $errors->first('fecha_fin_sub') }}</span>
                @endif
            </div>
        </div>
    
    
    </div>
</div>
