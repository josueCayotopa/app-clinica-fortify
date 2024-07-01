{{-- <body>
    <div class="container mt-5">
        <h2>Crear Pencionista</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="/pencionistas" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipo_pensionista_id">Tipo Pensionista</label>
                <input type="number" class="form-control" id="tipo_pensionista_id" name="tipo_pensionista_id" required>
            </div>
            <div class="form-group">
                <label for="regimen_pencionario_id">Régimen Pensionario</label>
                <input type="number" class="form-control" id="regimen_pencionario_id" name="regimen_pencionario_id" required>
            </div>
            <div class="form-group">
                <label for="fecha_inscripcion">Fecha Inscripción</label>
                <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" required>
            </div>
            <div class="form-group">
                <label for="cuspp">CUSPP</label>
                <input type="text" class="form-control" id="cuspp" name="cuspp" maxlength="12" required>
            </div>
            <div class="form-group">
                <label for="situacion_e_p_s_id">Situación EPS</label>
                <input type="number" class="form-control" id="situacion_e_p_s_id" name="situacion_e_p_s_id" required>
            </div>
            <div class="form-group">
                <label for="tipo_pago_id">Tipo de Pago</label>
                <input type="number" class="form-control" id="tipo_pago_id" name="tipo_pago_id" required>
            </div>
            <div class="form-group">
                <label for="tipo_banco_id">Tipo de Banco</label>
                <input type="number" class="form-control" id="tipo_banco_id" name="tipo_banco_id">
            </div>
            <div class="form-group">
                <label for="numero_bancaria">Número Bancaria</label>
                <input type="text" class="form-control" id="numero_bancaria" name="numero_bancaria" maxlength="40">
            </div>
            <div class="form-group">
                <label for="monto_pago">Monto de Pago</label>
                <input type="text" class="form-control" id="monto_pago" name="monto_pago" maxlength="40">
            </div>
            <div class="form-group">
                <label for="periodo_laboral_id">Periodo Laboral</label>
                <input type="number" class="form-control" id="periodo_laboral_id" name="periodo_laboral_id">
            </div>
            <div class="form-group">
                <label for="derechohabientes">Derechohabientes</label>
                <input type="text" class="form-control" id="derechohabientes" name="derechohabientes" maxlength="1">
            </div>
            <div class="form-group">
                <label for="remuneracion_pencionista_id">Remuneración Pensionista</label>
                <input type="number" class="form-control" id="remuneracion_pencionista_id" name="remuneracion_pencionista_id">
            </div>
            <div class="form-group">
                <label for="sucursal_establecimiento_laboral_id">Sucursal Establecimiento Laboral</label>
                <input type="number" class="form-control" id="sucursal_establecimiento_laboral_id" name="sucursal_establecimiento_laboral_id">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body> --}}


<body>
    <div class="container mt-5">
        <h2>Crear Pensionista</h2>
        <form action="{{ route('pensionistas.store') }}" method="POST" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo_pensionista_id">Tipo Pensionista</label>
                        <select class="form-control" id="tipo_pensionista_id" name="tipo_pensionista_id" required>
                            <option value="">Seleccione Tipo Pensionista</option>
                            @foreach ($tipoPensionistas as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="regimen_pencionario_id">Régimen Pensionario</label>
                        <select class="form-control" id="regimen_pencionario_id" name="regimen_pencionario_id" required>
                            <option value="">Seleccione Régimen Pensionario</option>
                            @foreach ($regimenPencionarios as $regimen)
                                <option value="{{ $regimen->id }}">{{ $regimen->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inscripcion">Fecha Inscripción</label>
                        <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="cuspp">CUSPP</label>
                        <input type="text" class="form-control" id="cuspp" name="cuspp" maxlength="12"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="situacion_e_p_s_id">Situación EPS</label>
                        <select class="form-control" id="situacion_e_p_s_id" name="situacion_e_p_s_id" required>
                            <option value="">Seleccione Situación EPS</option>
                            @foreach ($situacionEPS as $situacion)
                                <option value="{{ $situacion->id }}">{{ $situacion->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipo_pago_id">Tipo de Pago</label>
                        <select class="form-control" id="tipo_pago_id" name="tipo_pago_id" required>
                            <option value="">Seleccione Tipo de Pago</option>
                            @foreach ($tipoPagos as $tipoPago)
                                <option value="{{ $tipoPago->id }}">{{ $tipoPago->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipo_banco_id">Tipo de Banco</label>
                        <select class="form-control" id="tipo_banco_id" name="tipo_banco_id">
                            <option value="">Seleccione Tipo de Banco</option>
                            @foreach ($tipoBancos as $tipoBanco)
                                <option value="{{ $tipoBanco->id }}">{{ $tipoBanco->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="numero_bancaria">Número de cuenta Bancaria</label>
                        <input type="text" class="form-control" id="numero_bancaria" name="numero_bancaria"
                            maxlength="40">
                    </div>

                    {{-- <div class="form-group">
                        <label for="monto_pago">Monto de Pago</label>
                        <input type="text" class="form-control" id="monto_pago" name="monto_pago" maxlength="40">
                    </div> --}}
                    <div class="form-group">
                        <label for="monto_pago">Monto de Pago</label>

                        <input type="number" class="form-control" id="monto_pago" name="monto_pago" min="0"
                            step="1">

                    </div>

                    <div class="form-group">
                        <label for="periodo_laboral_id">Periodo Laboral</label>
                        <select class="form-control" id="periodo_laboral_id" name="periodo_laboral_id">
                            <option value="">Seleccione Periodo Laboral</option>
                            @foreach ($periodoLaborales as $periodo)
                                <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="derechohabientes">Derechohabientes</label>
                        <input type="text" class="form-control" id="derechohabientes" name="derechohabientes"
                            maxlength="1">
                    </div>
                    <div class="form-group">
                        <label for="remuneracion_pencionista_id">Remuneración Pensionista</label>
                        <select class="form-control" id="remuneracion_pencionista_id"
                            name="remuneracion_pencionista_id">
                            <option value="">Seleccione Remuneración Pensionista</option>
                            @foreach ($remuneracionPensionistas as $remuneracion)
                                <option value="{{ $remuneracion->id }}">{{ $remuneracion->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sucursal_establecimiento_laboral_id">Sucursal Establecimiento Laboral</label>
                        <select class="form-control" id="sucursal_establecimiento_laboral_id"
                            name="sucursal_establecimiento_laboral_id">
                            <option value="">Seleccione Sucursal Establecimiento Laboral</option>
                            @foreach ($sucursalEstablecimientos as $sucursal)
                                <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('pensionistas.index') }}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </a>
            
        </form>
    </div>
</body>

<script>
    function changeValue(delta) {
        var input = document.getElementById('monto_pago');
        var value = parseInt(input.value) || 0;
        input.value = Math.max(0, value + delta);
    }
</script>
