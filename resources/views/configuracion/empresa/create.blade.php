@extends('home')

@section('home')
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
                                    <label for="codigo_empresa">Codigo de Empresa</label>
                                    <input id="codigo_empresa" required type="text" class="form-control" name="codigo_empresa"
                                        placeholder="Codigo"  value="">
                                    
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label >Razon Social</label>
                                    <input id="razon_social" type="text" class="form-control" name="razon_social"
                                        placeholder="Razon Social" autofocus value="{{ old('razon_social') }}">
                                    @if ($errors->has('razon_social'))
                                        <span class="error text-danger"> {{ $errors->first('razon_social') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label >Nombre Comercial</label>
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
                            <div class="col-md-4 mb-3">
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
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="nombre">Correo Empresa</label>
                                    <input id="razon_social" type="email" class="form-control" name="email"
                                        placeholder="email" autofocus value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="error text-danger">
                                            {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="usuario">Telefono Empresa</label>
                                    <input type="text" class="form-control" placeholder="Telefono Comercial"
                                        name="numero_telefono" value="{{ old('numero_telefono') }}">
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
                                            <option value="{{ $id }}" {{ $id == 193 ? 'selected' : '' }}>
                                                {{ $pais }}</option>
                                        @endforeach
                                        <option value="" disabled>Selecciona un País</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="departamentos">Departamento</label>
                                    <select class="form-control" id="departamentos" name="departamentos"
                                        data-get-provincias="{{ route('getProvincias') }}">
                                        <option value="" disabled selected>Selecciona un Departamento</option>
                                        @foreach ($departamentos as $id => $departamento)
                                            <option value="{{ $id }}">{{ $departamento }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="provincias">Provincia</label>
                                    <select class="form-control" id="provincias" name="provincias"
                                        data-get-distritos="{{ route('getDistritos') }}">
                                        <option value="" disabled selected>Selecciona una Provincia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="distritos">Distrito</label>
                                    <select class="form-control" id="distritos" name="distritos">
                                        <option value="" disabled selected>Selecciona un Distrito</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="zonas">Zona</label>
                                    <select class="form-control" id="zonas" name="zona_id">
                                        <option value="" disabled selected>Selecciona Zona</option>
                                        @foreach ($zonas as $id => $zona)
                                            <option value="{{ $id }}">{{ $zona }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="via">Via</label>
                                    <select class="form-control" id="vias" name="via_id">
                                        <option value="" disabled selected>Selecciona Via</option>
                                        @foreach ($vias as $id => $via)
                                            <option value="{{ $id }}">{{ $via }}</option>
                                        @endforeach
                                    </select>
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
                    </div>


                    <div class="row">
                        <p>Datos del Representante</p>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="nombre_representante_legal">Nombre Representante</label>
                                <input id="nombre_representante_legal" type="text" class="form-control"
                                    name="nombre_representante_legal" placeholder="Nombre del Representante" autofocus
                                    value="{{ old('nombre_representante_legal') }}">
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
                                    <option value="" disabled selected>Selecciona Tipo de Documento</option>
                                    @foreach ($tipo_documentos as $id => $tipo_documento)
                                        <option value="{{ $id }}">{{ $tipo_documento }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="numero_documento">Numero de Documento</label>
                                <input type="text" class="form-control" placeholder="Numero de Documento"
                                    name="numero_documento" value="{{ old('numero_documento') }}">
                                    @if ($errors->has('numero_documento'))
                                    <span class="error text-danger">
                                        {{ $errors->first('numero_documento') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    {{-- <script src="{{ asset('js/tabs.js') }}"></script> ---- --}}

    <script src="{{ asset('/js/ubigeo/select.js') }}"></script>
@endsection
