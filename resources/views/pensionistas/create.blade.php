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
<style>

</style>

<header>
   
        <ul class="nav nav-tabs" id="personalTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                    aria-controls="general" aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="beneficios-tab" data-toggle="tab" href="#domicilio" role="tab"
                    aria-controls="beneficios" aria-selected="false">Domicilio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contacto-tab" data-toggle="tab" href="#laboral" role="tab"
                    aria-controls="contacto" aria-selected="false">Laboral</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#regimen" role="tab"
                    aria-controls="laboral" aria-selected="false">Regimen Pensionario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#pLaboral" role="tab"
                    aria-controls="laboral" aria-selected="false">Periodo Laboral</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#remuneracion" role="tab"
                    aria-controls="laboral" aria-selected="false">Remuneracion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#sucural" role="tab"
                    aria-controls="laboral" aria-selected="false">Sucursal</a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#contacto" role="tab"
                    aria-controls="laboral" aria-selected="false">Beneficios</a>
            </li> --}}


            
        </ul>
    
</header>

<div class="container mt-5">
    {{-- <ul class="nav nav-tabs" id="personalTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                aria-controls="general" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="beneficios-tab" data-toggle="tab" href="#domicilio" role="tab"
                aria-controls="beneficios" aria-selected="false">Domicilio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contacto-tab" data-toggle="tab" href="#laboral" role="tab"
                aria-controls="contacto" aria-selected="false">Laboral</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#contacto" role="tab"
                aria-controls="laboral" aria-selected="false">Beneficios</a>
        </li>
        
    </ul> --}}



    <form action="{{ route('pensionistas.store') }}" id="pensionistaForm" method="POST">
        @csrf
        <div class="tab-content">
            {{-- DATOS GENERALES --}}
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                {{-- <div class="border rounded p-3 mb-3">
                    <h6 class="border-bottom pb-2 mb-3">Datos personales</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="tipo_documento_id">Tipo de Documento <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="tipo_documento_id" name="tipo_documento_id">
                                    <option value="" disabled {{ old('tipo_documento_id') ? '' : 'selected' }}>
                                        Selecciona Tipo de Documento
                                    </option>
                                    
                                    @foreach ($tipoDocumento as $tipo_documento)
                                    
                                    <option value="{{ $tipo_documento->id }}" {{ old('tipo_documento_id') == $tipo_documento->id?'selected' : '' }}>
                                        {{ $tipo_documento->descripcion }}
                                    </option>
                                    
                                    @endforeach

                                </select>
                                @if ($errors->has('tipo_documento_id'))
                                    <span class="error text-danger">{{ $errors->first('tipo_documento_id') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="numero_documento">Número de Documento<span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" id="numero_documento" name="numero_documento" placeholder="Número de Documento" value="{{ old('numero_documento') }}">
                                @if ($errors->has('numero_documento'))
                                    <span class="error text-danger">{{ $errors->first('numero_documento') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="apellido_paterno">Apellido Paterno<span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Apellido Paterno" value="{{ old('apellido_paterno') }}">
                                @if ($errors->has('apellido_paterno'))
                                    <span class="error text-danger">{{ $errors->first('apellido_paterno') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="apellido_materno">Apellido Materno<span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Apellido Materno" value="{{ old('apellido_materno') }}">
                                @if ($errors->has('apellido_materno'))
                                    <span class="error text-danger">{{ $errors->first('apellido_materno') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="nombres">Nombre<span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre Completo" value="{{ old('nombres') }}">
                                @if ($errors->has('nombres'))
                                    <span class="error text-danger">{{ $errors->first('nombres') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento<span class="campo-obligatorio">*</span></label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Nombre Completo" value="{{ old('fecha_nacimiento') }}">
                                @if ($errors->has('fecha_nacimiento'))
                                    <span class="error text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label>Sexo<span class="campo-obligatorio">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" id="masculino" value="masculino">
                                    <label class="form-check-label" for="masculino">Masculino</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sexo" id="femenino" value="femenino">
                                    <label class="form-check-label" for="femenino">Femenino</label>
                                </div>
                                @if ($errors->has('sexo'))
                                    <span class="error text-danger">{{ $errors->first('sexo') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <div class="image-upload-wrapper">
                                    <div id="imagenPreviewWrapper" style="display: none;">
                                        <img id="imagenPreview" src="#" alt="Vista previa de la imagen" style="width: 100%; height: auto; object-fit: cover;">
                                        <span id="cancelarImagenBtn">&times;</span>
                                    </div>
                                    <label for="imagen" class="btn btn-primary btn-sm">
                                        <input type="file" name="imagen" class="form-control-file d-none" id="imagen" accept="image/*">
                                        Seleccionar Archivo
                                    </label>
                                </div>
                                @if ($errors->has('imagen'))
                                    <span class="error text-danger">{{ $errors->first('imagen') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
                                @if ($errors->has('telefono'))
                                    <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="correo_electronico">Correo</label>
                                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" placeholder="Correo" value="{{ old('correo_electronico') }}">
                                @if ($errors->has('correo_electronico'))
                                    <span class="error text-danger">{{ $errors->first('correo_electronico') }}</span>
                                @endif
                            </div>
                        </div>
            
                        <div class="col-md-4 mb-3">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="essalud_vida" name="essalud_vida">
                                <label class="form-check-label" for="essalud_vida">Tiene EsSalud + Vida<span class="campo-obligatorio">*</span></label>
                                @if ($errors->has('essalud_vida'))
                                    <span class="error text-danger">{{ $errors->first('essalud_vida') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div> --}}
                @include ('pensionistas.general')
            </div>
            {{-- DOMICILIO --}}
            <div class="tab-pane fade" id="domicilio" role="tabpanel" aria-labelledby="laboral-tab">
                {{-- <div class="border rounded p-3 mb-3">
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="domiciliado" name="domiciliado">
                            <label class="form-check-label" for="domiciliado">Es Domiciliado<span class="campo-obligatorio">*</span></label>
                            @if ($errors->has('domiciliado'))
                                <span class="error text-danger">{{ $errors->first('domiciliado') }}</span>
                            @endif
                        </div>
                    </div>
            
                    <!-- Bloque Nacionalidad -->
                    <div class="row">
                        <h6>Nacionalidad</h6>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="nacionalidad_id">Nacionalidad <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="nacionalidad_id" name="nacionalidad_id">
                                    <option value="" disabled>Selecciona un País</option>
                                </select>
                                @if ($errors->has('nacionalidad_id'))
                                    <span class="error text-danger">{{ $errors->first('nacionalidad_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
            
                    <!-- Bloque Departamento, Provincia, Distrito -->
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="departamento_id">Departamento <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="departamento_id" name="departamento_id">
                                    <option value="" disabled {{ old('departamento_id') ? '' : 'selected' }}>Selecciona un Departamento</option>
                                </select>
                                @if ($errors->has('departamento_id'))
                                    <span class="error text-danger">{{ $errors->first('departamento_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="provincia_id">Provincia</label>
                                <select class="form-control" id="provincia_id" name="provincia_id" {{ old('provincia_id') ? '' : 'disabled' }}>
                                    <option value="" disabled {{ old('provincia_id') ? '' : 'selected' }}>Selecciona una Provincia</option>
                                </select>
                                @if ($errors->has('provincia_id'))
                                    <span class="error text-danger">{{ $errors->first('provincia_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="distrito_id">Distrito<span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="distrito_id" name="distrito_id" {{ old('distrito_id') ? '' : 'disabled' }}>
                                    <option value="" disabled {{ old('distrito_id') ? '' : 'selected' }}>Selecciona un Distrito</option>
                                </select>
                                @if ($errors->has('distrito_id'))
                                    <span class="error text-danger">{{ $errors->first('distrito_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
            
                    <!-- Bloque Vía, Nombre de Vía, Número de Vía, Interior -->
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="via_id">Vía<span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="via_id" name="via_id">
                                    <option value="" disabled {{ old('via_id') ? '' : 'selected' }}>Selecciona una Vía</option>
                                </select>
                                @if ($errors->has('via_id'))
                                    <span class="error text-danger">{{ $errors->first('via_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="nombre_via">Nombre de Vía<span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" placeholder="Nombre vía" name="nombre_via" value="{{ old('nombre_via') }}">
                                @if ($errors->has('nombre_via'))
                                    <span class="error text-danger">{{ $errors->first('nombre_via') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="numero_via">Número vía</label>
                                <input type="text" class="form-control" placeholder="Número vía" name="numero_via" value="{{ old('numero_via') }}">
                                @if ($errors->has('numero_via'))
                                    <span class="error text-danger">{{ $errors->first('numero_via') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="interior">Interior</label>
                                <input type="text" class="form-control" placeholder="Interior" name="interior" value="{{ old('interior') }}">
                                @if ($errors->has('interior'))
                                    <span class="error text-danger">{{ $errors->first('interior') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
            
                    <!-- Bloque Restante -->
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="zona_id">Zonas<span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="zona_id" name="zona_id">
                                    <option value="" disabled {{ old('zona_id') ? '' : 'selected' }}>Selecciona una Zona</option>
                                </select>
                                @if ($errors->has('zona_id'))
                                    <span class="error text-danger">{{ $errors->first('zona_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="zona_id">Número Zona</label>
                                <input type="text" class="form-control" placeholder="Número de Zona" name="zona_id" value="{{ old('zona_id') }}">
                                @if ($errors->has('zona_id'))
                                    <span class="error text-danger">{{ $errors->first('zona_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input type="text" class="form-control" placeholder="Referencia" name="referencia" value="{{ old('referencia') }}">
                                @if ($errors->has('referencia'))
                                    <span class="error text-danger">{{ $errors->first('referencia') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- @include ('pensionistas.domicilio'); --}}
            </div>
            {{-- LABORAL --}}
            <div class="tab-pane fade" id="laboral" role="tabpanel" aria-labelledby="contacto-tab">
                @include ('pensionistas.laboral');
            </div> 
                
            <div class="tab-pane fade" id="regimen" role="tabpanel" aria-labelledby="laboral-tab">
                @include ('pensionistas.regimenpensionario');
            </div>

            <div class="tab-pane fade" id="pLaboral" role="tabpanel" aria-labelledby="contacto-tab">
                @include ('pensionistas.pLaboral');
            </div>
            <div class="tab-pane fade" id="remuneracion" role="tabpanel" aria-labelledby="contacto-tab">
                @include ('pensionistas.remuneracion');
            </div>
            <div class="tab-pane fade" id="pension" role="tabpanel" aria-labelledby="contacto-tab">
                @include ('pensionistas.sucursal');
            </div>
            {{-- CONTACTO Y OTROS --}}
            <div class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="laboral-tab">

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="periodicidad_id">Periodicidad de la remuneracion</label>
                            <select class="form-control" id="periodicidad_id" name="periodicidad_id">
                                {{-- @foreach ($periodicidades as $id => $periodicidad)
                                    <option value="{{ $id }}"
                                        {{ old('periodicidad_id') == $id ? 'selected' : '' }}>
                                        {{ $periodicidad }}</option>
                                @endforeach --}}
                                <option value="" disabled>Selecciona un Tipo</option>
                            </select>
                            @if ($errors->has('periodicidad_id'))
                                <span class="error text-danger">
                                    {{ $errors->first('periodicidad_id') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="sindicalizado"></label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="sindicalizado"
                                    id="sindicalizado">
                                <label class="form-check-label" for="sindicalizado">¿Es afiliado a
                                    EPS/Servicios
                                    Propios?</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="eps_id">Tipo EPS</label>
                            <select class="form-control" id="eps_id" name="eps_id">
                                {{-- @foreach ($eps as $id => $eps_des)
                                    <option value="{{ $id }}"
                                        {{ old('eps_id') == $id ? 'selected' : '' }}>
                                        {{ $eps_des }}</option>
                                @endforeach --}}
                                <option value="" disabled>Selecciona un Tipo</option>
                            </select>
                            @if ($errors->has('eps_id'))
                                <span class="error text-danger"> {{ $errors->first('eps_id') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="situacion_id">Situiacion EPS</label>
                            <select class="form-control" id="situacion_id" name="situacion_id">
                                {{-- @foreach ($situacionesEPS as $id => $situacionEPS)
                                    <option value="{{ $id }}"
                                        {{ old('situacion_id') == $id ? 'selected' : '' }}>
                                        {{ $situacionEPS }}</option>
                                @endforeach --}}
                                <option value="" disabled>Selecciona un Tipo</option>
                            </select>
                            @if ($errors->has('situacion_id'))
                                <span class="error text-danger"> {{ $errors->first('situacion_id') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="renta_quinta_categoria"></label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="renta_quinta_categoria"
                                    id="renta_quinta_categoria">
                                <label class="form-check-label" for="renta_quinta_categoria">Rentas de quinta
                                    categoría exoneradas</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="situacion_especial_trabajador">Situación especial del
                                trabajador</label>
                            <select class="form-control" id="situacion_especial_trabajador"
                                name="situacion_especial_trabajador">
                                <option value="" disabled>Selecciona un Tipo</option>
                                <option value="0"> Ninguna </option>
                                <option value="1"> Trabajador de confianza </option>
                                <option value="2"> Trabajador de dirección </option>
                            </select>
                            @if ($errors->has('situacion_especial_trabajador'))
                                <span class="error text-danger">
                                    {{ $errors->first('situacion_especial_trabajador') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="tipo_pago_id">Tipo de Pago </label>
                            <select class="form-control" id="tipo_pago_id" name="tipo_pago_id">
                                {{-- @foreach ($tiposPago as $id => $tipoPago)
                                    <option value="{{ $id }}"
                                        {{ old('tipo_pago_id') == $id ? 'selected' : '' }}>
                                        {{ $tipoPago }}</option>
                                @endforeach --}}
                                <option value="" disabled>Selecciona un Tipo</option>
                            </select>
                            @if ($errors->has('tipo_pago_id'))
                                <span class="error text-danger"> {{ $errors->first('tipo_pago_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="renta_quinta_categoria">Afiliación Asegura tu Pensión</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="renta_quinta_categoria"
                                    id="renta_quinta_categoria">
                                <label class="form-check-label" for="renta_quinta_categoria">Tiene
                                    Afiliación</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="categoria_ocupacional_trabajador">Categoria Ocupacional trabajador
                            </label>
                            <select class="form-control" id="categoria_ocupacional_trabajador"
                                name="categoria_ocupacional_trabajador">
                                {{-- @foreach ($categoriaocupacionales as $id => $categoriaocupacionale)
                                    <option value="{{ $id }}"
                                        {{ old('categoria_ocupacional_trabajador') == $id ? 'selected' : '' }}>
                                        {{ $categoriaocupacionale }}</option>
                                @endforeach --}}
                                <option value="" disabled>Selecciona un Tipo</option>
                            </select>
                            @if ($errors->has('categoria_ocupacional_trabajador'))
                                <span class="error text-danger">
                                    {{ $errors->first('categoria_ocupacional_trabajador') }}</span>
                            @endif
                        </div>
                    </div>



                </div>
                <div class="row">
                    <p>Convenios Internacionales</p>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="convenio_id"> Convenios Internacionales</label>
                            <select class="form-control" id="convenio_id" name="convenio_id">
                                {{-- @foreach ($convenios as $id => $convenio)
                                    <option value="{{ $id }}"
                                        {{ old('convenio_id') == $id ? 'selected' : '' }}>
                                        {{ $convenio }}</option>
                                @endforeach --}}
                                <option value="" disabled>Selecciona un Tipo</option>
                            </select>
                            @if ($errors->has('convenio_id'))
                                <span class="error text-danger"> {{ $errors->first('convenio_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            
            
        </div>
        <div class="row">
            <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">

                <button aria-disabled="false" type="button" class="el-button" id="cancel-button">
                    <span class="">Cancelar</span>
                </button>
                @can('user_create')
                    <button type="submit" class="el-button el-button--primary">Crear</button>
                @endcan
            </div>

        </div>
</div>

</form>
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
                    @foreach ($regimenPencionario as $regimen)
                        <option value="{{ $regimen->id }}">{{ $regimen->descripcion }}</option>
                    @endforeach
                </select>
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
                <select class="form-control" id="remuneracion_pencionista_id" name="remuneracion_pencionista_id">
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
                        <option value="{{ $sucursal->id }}">{{ $sucursal->nombre_sucursal }}</option>
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


<script>
    function changeValue(delta) {
        var input = document.getElementById('monto_pago');
        var value = parseInt(input.value) || 0;
        input.value = Math.max(0, value + delta);
    }
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('/js/ubigeo/ubigeo.js') }}"></script>

<script src="{{ asset('/js/personals/imagen.js') }}"></script>
<script src="{{ asset('/js/personals/curriculum.js') }}"></script>
