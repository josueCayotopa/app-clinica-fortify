<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Datos de la jornada laboral por trabajador</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="horas_trabajadas">Horas Trabajadas</label>
                <input type="text" class="form-control" placeholder="Ingrese las horas trabajadas"
                    name="horas_trabajadas" value="{{ old('horas_trabajadas') }}">
                @if ($errors->has('horas_trabajadas'))
                    <span class="error text-danger">{{ $errors->first('horas_trabajadas') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="minutos_trabajados">Minutos Trabajados</label>
                <input type="text" class="form-control" placeholder="Ingrese los minutos trabajados"
                    name="minutos_trabajados" value="{{ old('minutos_trabajados') }}">
                @if ($errors->has('minutos_trabajados'))
                    <span class="error text-danger">{{ $errors->first('minutos_trabajados') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="horas_sobretiempo">Horas de Sobretiempo</label>
                <input type="text" class="form-control" placeholder="Ingrese las horas de sobretiempo"
                    name="horas_sobretiempo" value="{{ old('horas_sobretiempo') }}">
                @if ($errors->has('horas_sobretiempo'))
                    <span class="error text-danger">{{ $errors->first('horas_sobretiempo') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="minutos_sobretiempo">Minutos de Sobretiempo</label>
                <input type="text" class="form-control" placeholder="Ingrese los minutos de sobretiempo"
                    name="minutos_sobretiempo" value="{{ old('minutos_sobretiempo') }}">
                @if ($errors->has('minutos_sobretiempo'))
                    <span class="error text-danger">{{ $errors->first('minutos_sobretiempo') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" placeholder="Ingrese una descripción" name="descripcion"
                    value="{{ old('descripcion') }}">
                @if ($errors->has('descripcion'))
                    <span class="error text-danger">{{ $errors->first('descripcion') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="numero_dias_semana">Número de Días a la Semana</label>
                <input type="text" class="form-control" placeholder="Ingrese el número de días a la semana"
                    name="numero_dias_semana" value="{{ old('numero_dias_semana') }}">
                @if ($errors->has('numero_dias_semana'))
                    <span class="error text-danger">{{ $errors->first('numero_dias_semana') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="hora_ingreso">Hora de Ingreso</label>
                <input type="time" class="form-control" name="hora_ingreso" value="{{ old('hora_ingreso') }}">
                @if ($errors->has('hora_ingreso'))
                    <span class="error text-danger">{{ $errors->first('hora_ingreso') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="hora_salida">Hora de Salida</label>
                <input type="time" class="form-control" name="hora_salida" value="{{ old('hora_salida') }}">
                @if ($errors->has('hora_salida'))
                    <span class="error text-danger">{{ $errors->first('hora_salida') }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
