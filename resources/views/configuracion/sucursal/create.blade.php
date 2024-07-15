<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="datos-empresa-tab" data-toggle="tab" href="#datos-empresa">Datos de
                        Sucursal</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="datos-empresa">
                    <form id="form-datos-empresa" method="POST" action="{{ route('sucursales.store') }}"
                        autocomplete="0off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="empresa_id">Empresa</label>
                                    <select class="form-control" id="empresa_id" name="empresa_id">
                                        <option value="" disabled {{ old('empresa_id') ? '' : 'selected' }}>
                                            Selecciona Tipo de Documento
                                        </option>
                                        @foreach ($empresas as $id => $nombre_comercial)
                                            <option value="{{ $id }}"
                                                {{ old('empresa_id', $sucursal->empresa_id ?? '') == $id ? 'selected' : '' }}>
                                                {{ $nombre_comercial }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('empresa_id'))
                                        <span class="text-danger">{{ $errors->first('empresa_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipo_establecimiento_id">Tipo de establecimiento</label>
                                    <select class="form-control" id="tipo_establecimiento_id" name="tipo_establecimiento_id">
                                        <option value="" disabled {{ old('tipo_establecimiento_id', $sucursal->tipo_establecimiento_id ?? '3') == '' ? 'selected' : '' }}>
                                            Selecciona Tipo de Documento
                                        </option>
                                        @foreach ($tipo_establecimientos as $id => $tipo_establecimiento)
                                            <option value="{{ $id }}"
                                                {{ old('tipo_establecimiento_id', $sucursal->tipo_establecimiento_id ?? '3') == $id ? 'selected' : '' }}>
                                                {{ $tipo_establecimiento }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tipo_establecimiento_id'))
                                        <span class="text-danger">{{ $errors->first('tipo_establecimiento_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="centro_riesgo">El establecimiento es un centro de riesgo</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="centro_riesgo_no"
                                            name="centro_riesgo" value="0"
                                            {{ old('centro_riesgo') == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="centro_riesgo_no">
                                            No es centro de riesgo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="centro_riesgo_si"
                                            name="centro_riesgo" value="1"
                                            {{ old('centro_riesgo') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="centro_riesgo_si">
                                            Es un centro de riesgo
                                        </label>
                                    </div>
                                    @if ($errors->has('centro_riesgo'))
                                        <span class="text-danger">{{ $errors->first('centro_riesgo') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_sucursal">Nombre de Sucursal</label>
                                    <input id="nombre_sucursal" type="text" class="form-control"
                                        name="nombre_sucursal" placeholder="Nombre de sucursal"
                                        value="{{ old('nombre_sucursal') }}">
                                    @if ($errors->has('nombre_sucursal'))
                                        <span class="error text-danger">{{ $errors->first('nombre_sucursal') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" maxlength="9" class="form-control" placeholder="Telefono"
                                        name="telefono" value="{{ old('telefono') }}">
                                    @if ($errors->has('telefono'))
                                        <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="email" class="form-control" placeholder="Correo Electrónico"
                                        name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" class="form-control" placeholder="Fax" name="fax"
                                        value="{{ old('fax') }}">
                                    @if ($errors->has('fax'))
                                        <span class="error text-danger">{{ $errors->first('fax') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tasa_sctr_essalud">Tasa de Essalud Para este establecimiento (%)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Ingresa el %"
                                            name="tasa_sctr_essalud" value="{{ old('tasa_sctr_essalud') }}"
                                            min="0" max="100" step="0.01">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    @if ($errors->has('tasa_sctr_essalud'))
                                        <span
                                            class="error text-danger">{{ $errors->first('tasa_sctr_essalud') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha de Inicio</label>
                                    <input type="date" class="form-control datepicker" id="fecha_inicio"
                                        placeholder="yyyy-mm-dd" name="fecha_inicio"
                                        value="{{ old('fecha_inicio', $sucursal->fecha_inicio ?? '') }}"
                                        autocomplete="off">
                                    @if ($errors->has('fecha_inicio'))
                                        <span class="text-danger">{{ $errors->first('fecha_inicio') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="departamento_id">Departamento</label>
                                    <select class="form-control" id="departamento_id" name="departamento_id">
                                        <option value="" disabled
                                            {{ old('departamento_id') ? '' : 'selected' }}>
                                            Selecciona un Departamento</option>
                                        @foreach ($departamentos as $id => $descripcion)
                                            <option value="{{ $id }}"
                                                {{ old('departamento_id', $sucursal->departamento_id ?? '') == $id ? 'selected' : '' }}>
                                                {{ $descripcion }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('departamento_id'))
                                        <span class="error text-danger">{{ $errors->first('departamento_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="provincia_id">Provincia</label>
                                    <select class="form-control" id="provincia_id" name="provincia_id"
                                        {{ old('provincia_id') ? '' : 'disabled' }}>
                                        <option value="" disabled {{ old('provincia_id') ? '' : 'selected' }}>
                                            Selecciona
                                            una Provincia</option>
                                        @if (old('provincia_id'))
                                            @foreach ($provincias as $id => $descripcion)
                                                <option value="{{ $id }}"
                                                    {{ old('provincia_id') == $id ? 'selected' : '' }}>
                                                    {{ $descripcion }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('provincia_id'))
                                        <span class="error text-danger">{{ $errors->first('provincia_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="distrito_id">Distrito</label>
                                    <select class="form-control" id="distrito_id" name="distrito_id"
                                        {{ old('distrito_id') ? '' : 'disabled' }}>
                                        <option value="" disabled {{ old('distrito_id') ? '' : 'selected' }}>
                                            Selecciona
                                            un Distrito</option>
                                        @if (old('distrito_id'))
                                            @foreach ($distritos as $id => $descripcion)
                                                <option value="{{ $id }}"
                                                    {{ old('distrito_id') == $id ? 'selected' : '' }}>
                                                    {{ $descripcion }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('distrito_id'))
                                        <span class="error text-danger">{{ $errors->first('distrito_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="zona_id">Zona</label>
                                    <select class="form-control" id="zona_id" name="zona_id">
                                        <option value="" disabled {{ old('zona_id') ? '' : 'selected' }}>
                                            Selecciona
                                            una Zona</option>
                                        @foreach ($zonas as $id => $zona)
                                            <option value="{{ $id }}"
                                                {{ old('zona_id') == $id ? 'selected' : '' }}>{{ $zona }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('zona_id'))
                                        <span class="error text-danger">{{ $errors->first('zona_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="via_id">Vía</label>
                                    <select class="form-control" id="via_id" name="via_id">
                                        <option value="" disabled {{ old('via_id') ? '' : 'selected' }}>
                                            Selecciona
                                            una Vía</option>
                                        @foreach ($vias as $id => $via)
                                            <option value="{{ $id }}"
                                                {{ old('via_id') == $id ? 'selected' : '' }}>{{ $via }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('via_id'))
                                        <span class="error text-danger">{{ $errors->first('via_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="des_direccion">Direccion</label>
                                    <input type="text" class="form-control" placeholder="Direccion"
                                        name="des_direccion" value="{{ old('des_direccion') }}">
                                    @if ($errors->has('des_direccion'))
                                        <span class="error text-danger">{{ $errors->first('des_direccion') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <div class="btn-group btn-group-toggle btn-sm" data-toggle="buttons">
                                        <label
                                            class="btn btn-outline-success btn-sm {{ old('estado', $sucursal->estado ?? 1) == 1 ? 'active' : '' }}">
                                            <input type="radio" name="estado" value="1" autocomplete="off"
                                                {{ old('estado', $sucursal->estado ?? 1) == 1 ? 'checked' : '' }}>
                                            Activo
                                        </label>
                                        <label
                                            class="btn btn-outline-danger btn-sm {{ old('estado', $sucursal->estado ?? 1) == 0 ? 'active' : '' }}">
                                            <input type="radio" name="estado" value="0" autocomplete="off"
                                                {{ old('estado', $sucursal->estado ?? 1) == 0 ? 'checked' : '' }}>
                                            Inactivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Segunda fila con tres columnas y un botón -->
                        <div class="row">
                            <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                                <!-- Botón en la parte derecha con más separación -->
                                @can('user_create')
                                    <button type="submit" class="el-button el-button--primary">Crear</button>
                                @endcan
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/tabs.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('/js/ubigeo/ubigeo.js') }}"></script>
