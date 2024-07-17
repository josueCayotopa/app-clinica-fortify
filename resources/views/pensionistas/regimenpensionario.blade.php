<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Regimen Pensionario</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="regimen_pencionario_id">Regimen pencionario<span
                        class="campo-obligatorio">*</span><span class="campo-obligatorio">*</span></label>
                <select class="form-control" id="regimen_pencionario_id" name="regimen_pencionario_id">
                    <option value="" disabled {{ old('regimen_pencionario_id') ? '' : 'selected' }}>
                        Selecciona Regimen Pensionario
                    </option>
                    @foreach ($regimenPencionario as $id => $regimen)
                    
                        <option value="{{ $regimen->id }}"
                            {{ old('regimen_pencionario_id') == $id ? '' : '' }}>
                            {{ $regimen->descripcion }}</option>
                    @endforeach
                    
                </select>
                @if ($errors->has('regimen_pencionario_id'))
                    <span class="error text-danger">
                        {{ $errors->first('regimen_pencionario_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="fecha_inscripcion_regimen">Fecha de Inscripcion</label>
                <input type="date" class="form-control" id="fecha_inscripcion_regimen" name="fecha_inscripcion_regimen" placeholder="00/00/00"
                    value="{{ old('fecha_inscripcion_regimen') }}">
                @if ($errors->has('fecha_inscripcion_regimen'))
                    <span class="error text-danger">{{ $errors->first('fecha_inscripcion_regimen') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="CUSPP">CUSPP</label>
                <input type="text" class="form-control" placeholder="CUSPP" name="CUSPP"
                    value="{{ old('CUSPP') }}">
                @if ($errors->has('CUSPP'))
                    <span class="error text-danger">{{ $errors->first('CUSPP') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="situacion_e_p_s_id">Situación EPS</label>
                <select class="form-control" id="situacion_e_p_s_id" name="situacion_e_p_s_id" required>
                    <option value="" disabled {{ old('situacion_e_p_s_id') ? '' : 'selected' }}>
                        Seleccione Situación EPS
                    </option>
                    
                    @foreach ($situacionEPS as $situacion)
                        <option value="{{ $situacion->id }}">{{ $situacion->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        

        {{-- <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="sctr_pensions_id">SCTR Pensión </label>
                <select class="form-control" id="sctr_pensions_id" name="sctr_pensions_id">
                    @foreach ($sctrpension as $id => $sctr_pension)
                        <option value="{{ $id }}" {{ old('sctr_pensions_id') == $id ? 'selected' : '' }}>
                            {{ $sctr_pension }}</option>
                    @endforeach
                    <option value="" disabled>Selecciona un Tipo</option>
                </select>
                @if ($errors->has('sctr_pensions_id'))
                    <span class="error text-danger">
                        {{ $errors->first('rsctr_pensions_id') }}</span>
                @endif

            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="SCTR_salud">SCTR Salud </label>
                <select class="form-control" id="SCTR_salud" name="SCTR_salud">
                    @foreach ($sctrsalud as $id => $sctr_salud)
                        <option value="{{ $id }}" {{ old('SCTR_salud') == $id ? 'selected' : '' }}>
                            {{ $sctr_salud }}</option>
                    @endforeach
                    <option value="" disabled>Selecciona un Tipo</option>
                </select>
                @if ($errors->has('SCTR_salud'))
                    <span class="error text-danger"> {{ $errors->first('SCTR_salud') }}</span>
                @endif

            </div>
        </div> --}}
    </div>
</div>
