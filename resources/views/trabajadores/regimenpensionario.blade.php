<div class="border rounded p-3 mb-3">
    <h6 class="border-bottom pb-2 mb-3">Regimen Pensionario</h6>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="regimen_pencionario_id">Regimen pencionario</label>
                <select class="form-control" id="regimen_pencionario_id" name="regimen_pencionario_id">
                    <option value="" disabled {{ old('regimen_pencionario_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($regimenPencionario as $id => $regimen_pencionario)
                        <option value="{{ $id }}"
                            {{ old('regimen_pencionario_id') == $id ? 'selected' : '' }}>
                            {{ $regimen_pencionario }}</option>
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
                <label for="afpregimen">Tipo Afp</label>
                <select class="form-control" id="afpregimen" name="afpregimen">
                    <option value="" disabled {{ old('afpregimen') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($afpregimen as $id => $afpregimen)
                        <option value="{{ $id }}" {{ old('afpregimen') == $id ? 'selected' : '' }}>
                            {{ $afpregimen }}</option>
                    @endforeach
                </select>

                @if ($errors->has('afpregimen'))
                    <span class="error text-danger">
                        {{ $errors->first('afpregimen') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="tipo_descuentos">Tipo Descuento</label>
                <select class="form-control" id="tipo_descuentos" name="tipo_descuentos">
                    <option value="" disabled {{ old('tipo_descuentos') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($tipo_descuentos as $id => $tipo_descuentos)
                        <option value="{{ $id }}" {{ old('tipo_descuentos') == $id ? 'selected' : '' }}>
                            {{ $tipo_descuentos }}</option>
                    @endforeach

                </select>
                @if ($errors->has('tipo_descuentos'))
                    <span class="error text-danger">
                        {{ $errors->first('tipo_descuentos') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="afpdescuento">Descuento AFP</label>
                <select class="form-control" id="afpdescuento" name="afpdescuento">
                    <option value="" disabled {{ old('afpdescuento') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($afpdescuento as $id => $afpdescuento)
                        <option value="{{ $id }}" {{ old('afpdescuento') == $id ? 'selected' : '' }}>
                            {{ $afpdescuento }}</option>
                    @endforeach

                </select>
                @if ($errors->has('afpdescuento'))
                    <span class="error text-danger">
                        {{ $errors->first('afpdescuento') }}</span>
                @endif
            </div>
        </div>


        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="fecha_inscripcion_regimen">Fecha de Inscripcion</label>
                <input type="date" class="form-control" id="fecha_inscripcion_regimen"
                    name="fecha_inscripcion_regimen" placeholder="00/00/00"
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
                <label for="sctr_pensions_id">SCTR Pensión </label>
                <select class="form-control" id="sctr_pensions_id" name="sctr_pensions_id">
                    <option value="" disabled {{ old('sctr_pensions_id') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($sctrpension as $id => $sctr_pension)
                        <option value="{{ $id }}" {{ old('sctr_pensions_id') == $id ? 'selected' : '' }}>
                            {{ $sctr_pension }}</option>
                    @endforeach

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
                    <option value="" disabled {{ old('SCTR_salud') ? '' : 'selected' }}>
                        Selecciona
                        un tipo</option>
                    @foreach ($sctrsalud as $id => $sctr_salud)
                        <option value="{{ $id }}" {{ old('SCTR_salud') == $id ? 'selected' : '' }}>
                            {{ $sctr_salud }}</option>
                    @endforeach

                </select>
                @if ($errors->has('SCTR_salud'))
                    <span class="error text-danger"> {{ $errors->first('SCTR_salud') }}</span>
                @endif

            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="afiliado_eps_servicios_propios">Afiliado a EPS</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="afiliado_eps_servicios_propios"
                        id="afiliado_eps_servicios_propios">
                    <label class="form-check-label" for="afiliado_eps_servicios_propios">¿El Trabajador es Afiliado a
                        EPS?</label>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="eps_id">Seleccione EPS</label>
                <select class="form-control" id="eps_id" name="eps_id" disabled>
                    <option value="" disabled {{ old('eps_id') ? '' : 'selected' }}>Selecciona un tipo</option>
                    @foreach ($eps as $id => $nombre_eps)
                        <option value="{{ $id }}" {{ old('eps_id') == $id ? 'selected' : '' }}>
                            {{ $nombre_eps }}</option>
                    @endforeach
                </select>
                @if ($errors->has('eps_id'))
                    <span class="error text-danger">{{ $errors->first('eps_id') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 mb-1">
            <div class="form-group">
                <label for="situacion_id">Situación EPS</label>
                <select class="form-control" id="situacion_id" name="situacion_id" disabled>
                    <option value="" disabled {{ old('situacion_id') ? '' : 'selected' }}>Selecciona un tipo
                    </option>
                    @foreach ($situacioneps as $id => $situacioneps)
                        <option value="{{ $id }}" {{ old('situacion_id') == $id ? 'selected' : '' }}>
                            {{ $situacioneps }}</option>
                    @endforeach
                </select>
                @if ($errors->has('situacion_id'))
                    <span class="error text-danger">{{ $errors->first('situacion_id') }}</span>
                @endif
            </div>
        </div>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkbox = document.getElementById('afiliado_eps_servicios_propios');
        var epsSelect = document.getElementById('eps_id');
        var situacionSelect = document.getElementById('situacion_id');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                epsSelect.disabled = false;
                situacionSelect.disabled = false;
            } else {
                epsSelect.disabled = true;
                situacionSelect.disabled = true;
            }
        });

        // Verifica el estado del checkbox al cargar la página
        if (checkbox.checked) {
            epsSelect.disabled = false;
            situacionSelect.disabled = false;
        }
    });
</script>
