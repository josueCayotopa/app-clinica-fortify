@extends('home')

@section('home')
<h6 class="mb-6">Crear Empresa</h6>
    <div class="container mt-5">
        
        <form id="registroForm" method="post" action="{{ route('empresas.store') }}" autocomplete="off">
            @csrf

            <div class="row">
                <p>Datos de la empresa </p>

                <div class="col-md-3 mb-3">

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="razon_social" type="text" class="form-control" name="razon_social"
                            placeholder="Razon Social" autofocus value="{{ old('razon_social') }}">


                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="usuario">Nombre Comercial</label>
                        <input type="text" class="form-control" placeholder="Nombre Comercial" name="nombre_comercial"
                            value="{{ old('nombre_comercial') }}">

                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="email">RUC</label>
                        <input type="text" class="form-control" placeholder="RUC" autocapitalize="none"
                            name="ruc_empresa" value="{{ old('ruc_empresa') }}">

                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="email">Decreto Supremo</label>
                        <input type="text" class="form-control" placeholder="decreto supremo" autocapitalize="none"
                            name="numero_decreto_supremo" value="{{ old('numero_decreto_supremo') }}">

                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="nombre">Correo Empresa</label>
                        <input id="razon_social" type="email" class="form-control" name="email" placeholder="email"
                            autofocus value="{{ old('email') }}">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="usuario">Telefono Empresa</label>
                        <input type="text" class="form-control" placeholder="Telefono Comercial" name="numero_telefono"
                            value="{{ old('nombre_comercial') }}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email">Direccion</label>
                        <input type="text" class="form-control" placeholder="direccion" autocapitalize="none"
                            name="direccion" value="{{ old('direccion') }}">
                    </div>
                </div>
               
            </div>
            <p>Ubigeo</p>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="email">Pais</label>
                        <input type="text" class="form-control" placeholder="Pais" autocapitalize="none" 
                            name="pais" value="Perú">
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="tipo_documento">Departamento</label>
                        <select class="form-control" id="departamentos" name="departamentos" placeholder="Departamento" >
                            <option value="" disabled selected>Seleciones un Departamento</option>
                            @foreach ($departamentos as $id=> $departamento)
                            <option value="{{ $id }}"> {{ $departamento }} </option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="tipo_documento">Provincia</label>
                        <select class="form-control" id="provincias" name="provincias">
                            <option value="" disabled selected>Seleciones Provincia </option>
                            @foreach ($provincias as $id=> $provincia)
                            <option value="{{ $id }}"> {{ $provincia }} </option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="tipo_documento">Distrito</label>
                        <select class="form-control" id="tipo_documento" name="tipo_documento">
                            <option value="" disabled selected>Seleciones Distrito </option>
                            @foreach ($distritos as $id=> $distrito)
                            <option value="{{ $id }}"> {{ $distrito}} </option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                

            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="tipo_documento">Zona</label>
                        <select class="form-control" id="tipo_documento" name="tipo_documento">
                            <option value="" disabled selected>Seleciones Zona </option>
                            @foreach ($zonas as $id=> $zona)
                            <option value="{{ $id }}"> {{ $zona }} </option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="tipo_documento">Tipo de Documento</label>
                        <select class="form-control" id="tipo_documento" name="tipo_documento">
                            <option value="" disabled selected>Seleciones Tipo de Documento </option>
                            @foreach ($tipo_documentos as $id=> $tipo_documento)
                            <option value="{{ $id }}"> {{ $tipo_documento }} </option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>

            </div>

    </div>

    <!-- Segunda fila con tres columnas y un botón -->
    <div class="row">
        <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
            <!-- Botón en la parte derecha con más separación -->
            @can('user_create')
                <button type="submit" class="btn btn-primary btn-lg btn-block mt-3 ">Crear</button>
            @endcan
        </div>
    </div>
    </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
