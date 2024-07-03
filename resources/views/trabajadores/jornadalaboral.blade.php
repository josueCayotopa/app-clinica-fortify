<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Datos de la jornada laboral por trabajador</h6>
    <div class="row">
      
       
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="horas_trabajadas">Horas Trabajadas</label>
                <input type="text" class="form-control" placeholder="horas_trabajadas" name="horas_trabajadas"
                    value="{{ old('horas_trabajadas') }}">
                @if ($errors->has('horas_trabajadas'))
                    <span class="error text-danger">{{ $errors->first('horas_trabajadas') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="minutos_trabajados">Minutos  Trabajadas</label>
                <input type="text" class="form-control" placeholder="minutos_trabajados" name="minutos_trabajados"
                    value="{{ old('minutos_trabajados') }}">
                @if ($errors->has('minutos_trabajados'))
                    <span class="error text-danger">{{ $errors->first('minutos_trabajados') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="horas_sobretiempo">Horas de sobre tiempo </label>
                <input type="text" class="form-control" placeholder="Ingrese las horas" name="horas_sobretiempo"
                    value="{{ old('horas_sobretiempo') }}">
                @if ($errors->has('horas_sobretiempo'))
                    <span class="error text-danger">{{ $errors->first('horas_sobretiempo') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="minutos_sobretiempo">Minutos de sobre tiempo </label>
                <input type="text" class="form-control" placeholder="Ingrese las horas" name="minutos_sobretiempo"
                    value="{{ old('minutos_sobretiempo') }}">
                @if ($errors->has('minutos_sobretiempo'))
                    <span class="error text-danger">{{ $errors->first('minutos_sobretiempo') }}</span>
                @endif
            </div>
        </div>
      
    </div>
</div>
