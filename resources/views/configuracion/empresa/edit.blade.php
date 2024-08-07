<div class="container mt-5">
    <ul class="nav nav-tabs custom-tabs" id="personalTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                aria-controls="general" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="representante-tab" data-toggle="tab" href="#representante" role="tab"
                aria-controls="representante" aria-selected="false">Representante</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="domicilio-tab" data-toggle="tab" href="#domicilio" role="tab"
                aria-controls="domicilio" aria-selected="false">Domicilio</a>
        </li>
    </ul>
    <form action="{{ route('empresas.update', $empresa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="tab-content">
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                <div class="border rounded p-3 mb-0">
                    <h6 class="border-bottom pb-2 mb-1">Datos Empresa</h6>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="codigo_empresa">Código Empresa<span
                                        class="campo-obligatorio">*</span></label>
                                <input type="text" name="codigo_empresa" class="form-control" maxlength="4"
                                    value="{{ old('codigo_empresa', $empresa->codigo_empresa) }}">
                                @error('codigo_empresa')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Razon Social <span class="campo-obligatorio">*</span></label>
                                <input id="razon_social" type="text" class="form-control" name="razon_social"
                                    placeholder="Razon Social" autofocus
                                    value="{{ old('razon_social', $empresa->razon_social) }}">
                                @if ($errors->has('razon_social'))
                                    <span class="error text-danger"> {{ $errors->first('razon_social') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Nombre Comercial <span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" placeholder="Nombre Comercial"
                                    name="nombre_comercial"
                                    value="{{ old('nombre_comercial', $empresa->nombre_comercial) }}">
                                @if ($errors->has('nombre_comercial'))
                                    <span class="error text-danger"> {{ $errors->first('nombre_comercial') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">RUC <span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" placeholder="RUC"
                                    autocapitalize="none"maxlength="11" name="ruc_empresa"
                                    value="{{ old('ruc_empresa', $empresa->ruc_empresa) }}">
                                @if ($errors->has('ruc_empresa'))
                                    <span class="error text-danger"> {{ $errors->first('ruc_empresa') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Decreto Supremo<span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" placeholder="decreto supremo"
                                    autocapitalize="none" name="numero_decreto_supremo"
                                    value="{{ old('numero_decreto_supremo', $empresa->numero_decreto_supremo) }}">
                                @if ($errors->has('numero_decreto_supremo'))
                                    <span class="error text-danger">
                                        {{ $errors->first('numero_decreto_supremo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email">Correo Empresa</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    placeholder="Correo electrónico" value="{{ old('email', $empresa->email) }}">
                                @if ($errors->has('email'))
                                    <span class="error text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="usuario">Telefono Empresa</label>
                                <input type="text" class="form-control" placeholder="Telefono Comercial"
                                    maxlength="9" name="numero_telefono"
                                    value="{{ old('numero_telefono', $empresa->numero_telefono) }}">
                                @if ($errors->has('numero_telefono'))
                                    <span class="error text-danger">
                                        {{ $errors->first('numero_telefono') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="tipo_moneda_id">Tipo de Moneda<span
                                        class="campo-obligatorio">*</span></label>
                                @foreach ($tipo_monedas as $id => $descripcion)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            id="tipo_moneda_id{{ $id }}" name="tipo_moneda_id"
                                            value="{{ $id }}"
                                            {{ old('tipo_moneda_id', $empresa->tipo_moneda_id ?? '') == $id ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tipo_moneda_id{{ $id }}">
                                            {{ $descripcion }}
                                        </label>
                                    </div>
                                @endforeach
                                @if ($errors->has('tipo_moneda_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('tipo_moneda_id') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="representante" role="tabpanel" aria-labelledby="representante-tab">
                <div class="border rounded p-3 mb-0">
                    <h6 class="border-bottom pb-2 mb-1">Representante de la empresa</h6>
                    <div class="row">
                        <p>Datos del Representante</p>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nombre_representante_legal">Nombre Representante</label>
                                <input id="nombre_representante_legal" type="text" class="form-control"
                                    name="nombre_representante_legal" placeholder="Nombre del Representante" autofocus
                                    value="{{ old('nombre_representante_legal', $empresa->nombre_representante_legal ?? '') }}">
                                @if ($errors->has('nombre_representante_legal'))
                                    <span class="error text-danger">
                                        {{ $errors->first('nombre_representante_legal') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="tipo_documento_id">Tipo de Documento</label>
                                <select class="form-control" id="tipo_documento_id" name="tipo_documento_id">
                                    <option value="" disabled {{ old('tipo_documento_id') ? '' : 'selected' }}>
                                        Selecciona Tipo de Documento</option>
                                    @foreach ($tipo_documentos as $id => $tipo_documento)
                                        <option value="{{ $id }}"
                                            {{ $empresa->tipo_documento_id == $id ? 'selected' : '' }}>
                                            {{ $tipo_documento }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tipo_documento_id'))
                                    <span class="error text-danger">{{ $errors->first('tipo_documento_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="numero_documento">Número de Documento</label>
                                <input type="text" class="form-control" id="numero_documento"
                                    name="numero_documento" placeholder="Número de Documento"
                                    value="{{ old('numero_documento', $empresa->numero_documento) }}">
                                @if ($errors->has('numero_documento'))
                                    <span class="error text-danger">{{ $errors->first('numero_documento') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="domicilio" role="tabpanel" aria-labelledby="domicilio-tab">
                <div class="border rounded p-3 mb-0">
                    <h6 class="border-bottom pb-2 mb-1">Direccion</h6>
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="pais_id">País</label>
                                <select class="form-control" id="pais_id" name="pais_id">
                                    @foreach ($paises as $id => $pais)
                                        <option value="{{ $id }}"
                                            {{ old('pais_id', 193) == $id ? 'selected' : '' }}>
                                            {{ $pais }}
                                        </option>
                                    @endforeach
                                    <option value="" disabled>Selecciona un País</option>
                                </select>
                                @if ($errors->has('pais_id'))
                                    <span class="error text-danger"> {{ $errors->first('pais_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="departamento_id">Departamento</label>
                                <select class="form-control" id="departamento_id" name="departamento_id">
                                    <option value="" disabled {{ old('departamento_id') ? '' : 'selected' }}>
                                        Selecciona un Departamento</option>
                                    @foreach ($departamentos as $id => $departamento)
                                        <option value="{{ $id }}"
                                            {{ $empresa->departamento_id == $id ? 'selected' : '' }}>
                                            {{ $departamento }}
                                        </option>
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
                                <select class="form-control" id="provincia_id" name="provincia_id">
                                    <option value="" disabled>Selecciona una Provincia</option>
                                    @foreach ($provincias as $id => $descripcion)
                                        <option value="{{ $id }}"
                                            {{ $empresa->provincia_id == $id ? 'selected' : '' }}>
                                            {{ $descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('provincia_id'))
                                    <span class="error text-danger">{{ $errors->first('provincia_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="distrito_id">Distrito</label>
                                <select class="form-control" id="distrito_id" name="distrito_id">
                                    <option value="" disabled>Selecciona un Distrito</option>
                                    @foreach ($distritos as $id => $descripcion)
                                        <option value="{{ $id }}"
                                            {{ $empresa->distrito_id == $id ? 'selected' : '' }}>
                                            {{ $descripcion }}
                                        </option>
                                    @endforeach
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
                                    <option value="" disabled
                                        {{ old('zona_id', $empresa->zona_id ?? '') ? '' : 'selected' }}>
                                        Selecciona una
                                        Zona</option>
                                    @foreach ($zonas as $id => $zona)
                                        <option value="{{ $id }}"
                                            {{ old('zona_id', $empresa->zona_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $zona }}
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
                                    <option value="" disabled
                                        {{ old('via_id', $empresa->via_id ?? '') ? '' : 'selected' }}>
                                        Selecciona una
                                        Vía</option>
                                    @foreach ($vias as $id => $via)
                                        <option value="{{ $id }}"
                                            {{ old('via_id', $empresa->via_id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $via }}
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
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" placeholder="Dirección"
                                    autocapitalize="none" name="direccion"
                                    value="{{ old('direccion', $empresa->direccion ?? '') }}">
                                @if ($errors->has('direccion'))
                                    <span class="error text-danger">{{ $errors->first('direccion') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right d-md-flex justify-content-md-end">
                <a href="{{ route('empresas.index') }}" class="el-button el-button--danger">Cancelar</a>
                <button type="submit" class="el-button el-button--primary">Guardar</button>
            </div>
        </div>


    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('/js/ubigeo/selecteditar.js') }}"></script>

{{-- <script src="{{ asset('js/tabs.js') }}"></script> ---- --}}
