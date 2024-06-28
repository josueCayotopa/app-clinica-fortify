<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            <div class="tab-content">
                <form id="registroForm" action="{{ route('empresas.store') }}" method="POST">
                    @csrf
                    <div class="tab-pane fade show active" id="datos-empresa">
                        <div class="row">
                            <p>Datos de la empresa</p>
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="codigo_empresa">Código Empresa</label>
                                    <input type="text" name="codigo_empresa" class="form-control"
                                        value="{{ old('codigo_empresa') }}">
                                    @error('codigo_empresa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label>Razon Social</label>
                                    <input id="razon_social" type="text" class="form-control" name="razon_social"
                                        placeholder="Razon Social" autofocus value="{{ old('razon_social') }}">
                                    @if ($errors->has('razon_social'))
                                        <span class="error text-danger"> {{ $errors->first('razon_social') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label>Nombre Comercial</label>
                                    <input type="text" class="form-control" placeholder="Nombre Comercial"
                                        name="nombre_comercial" value="{{ old('nombre_comercial') }}">
                                    @if ($errors->has('nombre_comercial'))
                                        <span class="error text-danger"> {{ $errors->first('nombre_comercial') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="email">RUC</label>
                                    <input type="text" class="form-control" placeholder="RUC" autocapitalize="none"
                                        name="ruc_empresa" value="{{ old('ruc_empresa') }}">
                                    @if ($errors->has('ruc_empresa'))
                                        <span class="error text-danger"> {{ $errors->first('ruc_empresa') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="email">Decreto Supremo</label>
                                    <input type="text" class="form-control" placeholder="decreto supremo"
                                        autocapitalize="none" name="numero_decreto_supremo"
                                        value="{{ old('numero_decreto_supremo') }}">
                                    @if ($errors->has('numero_decreto_supremo'))
                                        <span class="error text-danger">
                                            {{ $errors->first('numero_decreto_supremo') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="email">Correo Empresa</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        placeholder="Correo electrónico" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="usuario">Telefono Empresa</label>
                                    <input type="text" class="form-control" placeholder="Telefono Comercial"
                                        name="numero_telefono" value="{{ old('numero_telefono') }}">
                                    @if ($errors->has('numero_telefono'))
                                        <span class="error text-danger">
                                            {{ $errors->first('numero_telefono') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="tipo_monedas">Tipo de Moneda</label>
                                    @foreach ($tipo_monedas as $id => $descripcion)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_moneda"
                                                value="{{ $id }}" id="tipo_moneda_{{ $id }}"
                                                {{ old('tipo_moneda') == $id ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tipo_moneda_{{ $id }}">
                                                {{ $descripcion }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @if ($errors->has('tipo_moneda'))
                                        <span class="error text-danger">
                                            {{ $errors->first('tipo_moneda') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p>Ubigeo</p>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="pais_id">País</label>
                                    <select class="form-control" id="pais_id" name="pais_id">
                                        @foreach ($paises as $id => $pais)
                                            <option value="{{ $id }}"
                                                {{ old('pais_id', 193) == $id ? 'selected' : '' }}>
                                                {{ $pais }}</option>
                                        @endforeach
                                        <option value="" disabled>Selecciona un País</option>
                                    </select>
                                    @if ($errors->has('pais_id'))
                                        <span class="error text-danger"> {{ $errors->first('pais_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
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
                            <div class="col-md-3 mb-3">
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
                            <div class="col-md-3 mb-3">
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




                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
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

                            <div class="col-md-3 mb-3">
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
                                    <label for="direccion">Direccion</label>
                                    <input type="text" class="form-control" placeholder="direccion"
                                        autocapitalize="none" name="direccion" value="{{ old('direccion') }}">
                                    @if ($errors->has('direccion'))
                                        <span class="error text-danger">
                                            {{ $errors->first('direccion') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <p>Datos del Representante</p>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="nombre_representante_legal">Nombre Representante</label>
                                    <input id="nombre_representante_legal" type="text" class="form-control"
                                        name="nombre_representante_legal" placeholder="Nombre del Representante"
                                        autofocus value="{{ old('nombre_representante_legal') }}">
                                    @if ($errors->has('nombre_representante_legal'))
                                        <span class="error text-danger">
                                            {{ $errors->first('nombre_representante_legal') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="tipo_documento_id">Tipo de Documento</label>
                                    <select class="form-control" id="tipo_documento_id" name="tipo_documento_id">
                                        <option value="" disabled
                                            {{ old('tipo_documento_id') ? '' : 'selected' }}>
                                            Selecciona Tipo de Documento</option>
                                        @foreach ($tipo_documentos as $id => $tipo_documento)
                                            <option value="{{ $id }}"
                                                {{ old('tipo_documento_id') == $id ? 'selected' : '' }}>
                                                {{ $tipo_documento }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tipo_documento_id'))
                                        <span
                                            class="error text-danger">{{ $errors->first('tipo_documento_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="numero_documento">Número de Documento</label>
                                    <input type="text" class="form-control" id="numero_documento"
                                        name="numero_documento" placeholder="Número de Documento"
                                        value="{{ old('numero_documento') }}">
                                    @if ($errors->has('numero_documento'))
                                        <span
                                            class="error text-danger">{{ $errors->first('numero_documento') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right d-md-flex justify-content-md-end">
                                <a href="{{ route('empresas.index') }}"
                                    class="el-button el-button--danger">Cancelar</a>
                                <button type="submit" class="el-button el-button--primary">Guardar</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>




{{-- <script src="{{ asset('js/tabs.js') }}"></script> ---- --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('/js/ubigeo/ubigeo.js') }}"></script>
