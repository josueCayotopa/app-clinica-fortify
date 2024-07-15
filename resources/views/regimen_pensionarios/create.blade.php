<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<div class="card-body mt-5 mb-1">
    <div class="tab-pane fade show active" id="datos-empresa">
        <form id="form-datos-empresa" method="POST" action="{{ route('descuentos_pensiones.store') }}" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="regimenes">Regimen Pensionario</label>
                        <select name="regimen_id" id="regimenes" class="form-control">
                            <option value="">Seleccionar Regimen</option>
                            @foreach ($regimenes as $regimen)
                                <option value="{{ $regimen->id }}">{{ $regimen->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('regimen_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="afp_id">Regimen AFP</label>
                        <select name="afp_id" id="afp_id" class="form-control">
                            <option value="">Seleccionar Regimen AFP</option>
                            <!-- Opciones que se llenarán dinámicamente -->
                        </select>
                        @error('afp_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="descuento_id">Descuento
                            <button type="button" class="btn btn-link ms-3 open-modal-btn-new" id="new-button"
                                data-toggle="modal" data-target="#modalNuevaIns"> Nuevo
                            </button>
                        </label>
                        <div class="input-group">
                            <select name="descuento_id" class="form-control">
                                <option value="">Seleccionar Descuento</option>
                                @foreach ($descuentos as $descuento)
                                    <option value="{{ $descuento->id }}">{{ $descuento->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('descuento_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="tipo_comision">Tipo Comisión</label>
                        <select name="tipo_comision" class="form-control" id="tipo_comision">
                            <option value="FLUJO">FLUJO</option>
                            <option value="MIXTA">MIXTA</option>
                        </select>
                        @error('tipo_comision')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="fecha">Mes</label>
                        <input type="month" class="form-control" id="fecha" name="fecha">
                        @error('fecha')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="porcentaje">Porcentaje</label>
                        <input type="number" step="0.01" class="form-control" id="porcentaje" name="porcentaje"
                            placeholder="Porcentaje">
                        @error('porcentaje')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="importe_tope">Importe Tope</label>
                        <input type="number" step="0.01" class="form-control" id="importe_tope" name="importe_tope"
                            placeholder="Importe Tope">
                        @error('importe_tope')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="el-button el-button--success">Guardar</button>
                </div>
            </div>
        </form>

    </div>
</div>

<div id="modalNuevaIns" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear</h5>

            </div>
            <div class="modal-body">
                <form id="modal-form" action="{{ route('tipos_descuento.store') }}" method="post" autocomplete="off">

                    @csrf
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Tipo descuento</label>
                        <input type="text" class="form-control" id="recipient-name" name="descripcion"
                            value="{{ old('name') }}">

                        @if ($errors->has('descripcion'))
                            <span class="error text-danger"> {{ $errors->first('descripcion') }}</span>
                        @endif
                    </div>

               


            </div>
            <div class="modal-footer">
                <button type="button" class="el-button el-button--secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="el-button el-button--primary" id="submitButton" value="Guardar">
            </div>
        </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('regimenes').addEventListener('change', function() {
        var regimenId = this.value;
        var afpSelect = document.getElementById('afp_id');

        if (regimenId) {
            fetch(`/afps-by-regimen?regimen_id=${regimenId}`)
                .then(response => response.json())
                .then(data => {
                    afpSelect.innerHTML = '<option value="">Seleccionar Regimen AFP</option>';
                    data.forEach(afp => {
                        afpSelect.innerHTML += `<option value="${afp.id}">${afp.nombre}</option>`;
                    });
                });
        } else {
            afpSelect.innerHTML = '<option value="">Seleccionar Regimen AFP</option>';
        }
    });
</script>
