
    <div class="container">

        <ul class="nav nav-tabs" id="personalTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                    aria-controls="general" aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contacto-tab" data-toggle="tab" href="#contacto" role="tab"
                    aria-controls="contacto" aria-selected="false">Laboral</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#laboral" role="tab"
                    aria-controls="laboral" aria-selected="false">Beneficios</a>
            </li>
        </ul>
        <!-- Contenido de las pestañas -->
        <form id="personalForm" method="POST" action="{{ route('personals.store') }} ">
            @csrf
            <div class="tab-content">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                    <div class="border rounded p-3 mb-3">
                        <h6 class="border-bottom pb-2 mb-3">Datos Personales</h6>
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="tipo_documento_id">Tipo de Documento <span
                                            class="campo-obligatorio">*</span></label>
                                    <select class="form-control" id="tipo_documento_id" name="tipo_documento_id">
                                        <option value="" disabled {{ old('tipo_documento_id') ? '' : 'selected' }}>
                                            Selecciona Tipo de Documento
                                        </option>
                                        @foreach ($tipoDocumentos as $id => $tipo_documento)
                                            <option value="{{ $id }}"
                                                {{ old('tipo_documento_id') == $id ? 'selected' : '' }}>
                                                {{ $tipo_documento }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tipo_documento_id'))
                                        <span class="error text-danger">{{ $errors->first('tipo_documento_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="numero_documento">Número de Documento<span
                                            class="campo-obligatorio">*</span></label>
                                    <input type="text" class="form-control" id="numero_documento" name="numero_documento"
                                        placeholder="Número de Documento" value="{{ old('numero_documento') }}">
                                    @if ($errors->has('numero_documento'))
                                        <span class="error text-danger">{{ $errors->first('numero_documento') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="apellido_paterno">Apellido Paterno<span
                                            class="campo-obligatorio">*</span></label>
                                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"
                                        placeholder="Apellido Paterno" value="{{ old('apellido_paterno') }}">
                                    @if ($errors->has('apellido_paterno'))
                                        <span class="error text-danger">{{ $errors->first('apellido_paterno') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="apellido_materno">Apellido Materno<span
                                            class="campo-obligatorio">*</span></label>
                                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"
                                        placeholder="Apellido Materno" value="{{ old('apellido_materno') }}">
                                    @if ($errors->has('apellido_materno'))
                                        <span class="error text-danger">{{ $errors->first('apellido_materno') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="nombres">Nombre<span class="campo-obligatorio">*</span></label>
                                    <input type="text" class="form-control" id="nombres" name="nombres"
                                        placeholder="Nombre Completo" value="{{ old('nombres') }}">
                                    @if ($errors->has('nombres'))
                                        <span class="error text-danger">{{ $errors->first('nombres') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento<span
                                            class="campo-obligatorio">*</span></label>
                                    <input type="date" class="form-control" id="fecha_nacimiento"
                                        name="fecha_nacimiento" placeholder="Nombre Completo"
                                        value="{{ old('fecha_nacimiento') }}">
                                    @if ($errors->has('fecha_nacimiento'))
                                        <span class="error text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label>Sexo<span class="campo-obligatorio">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo" id="masculino"
                                            value="masculino">
                                        <label class="form-check-label" for="masculino">Masculino</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo" id="femenino"
                                            value="femenino">
                                        <label class="form-check-label" for="femenino">Femenino</label>
                                    </div>
                                    @if ($errors->has('sexo'))
                                        <span class="error text-danger">{{ $errors->first('sexo') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="imagen">Imagen</label>
                                    <div class="image-upload-wrapper">
                                        <div id="imagenPreviewWrapper" style="display: none;">
                                            <img id="imagenPreview" src="#" alt="Vista previa de la imagen"
                                                style="width: 100%; height: auto; object-fit: cover;">
                                            <span id="cancelarImagenBtn">&times;</span>
                                        </div>
                                        <label for="imagen" class="btn btn-primary btn-sm">
                                            <input type="file" name="imagen" class="form-control-file d-none"
                                                id="imagen" accept="image/*">
                                            Seleccionar Archivo
                                        </label>

                                    </div>
                                    @if ($errors->has('imagen'))
                                        <span class="error text-danger">{{ $errors->first('imagen') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        placeholder="Telefono" value="{{ old('telefono') }}">
                                    @if ($errors->has('telefono'))
                                        <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="correo_electronico"> Correo </label>
                                    <input type="email" class="form-control" id="correo_electronico"
                                        name="correo_electronico" placeholder="Correo"
                                        value="{{ old('correo_electronico') }}">
                                    @if ($errors->has('correo_electronico'))
                                        <span class="error text-danger">{{ $errors->first('correo_electronico') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="essalud_vida"
                                        name="essalud_vida">
                                    <label class="form-check-label" for="essalud_vida">Tiene EsSalud + Vida<span
                                            class="campo-obligatorio">*</span></label>
                                    @if ($errors->has('essalud_vida'))
                                        <span class="error text-danger">{{ $errors->first('essalud_vida') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="border rounded p-3 mb-3">
                        <div class="col-md-12 mb-2">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="domiciliado" name="domiciliado">
                                <label class="form-check-label" for="domiciliado">Es Domiciliado<span
                                        class="campo-obligatorio">*</span></label>
                                @if ($errors->has('domiciliado'))
                                    <span class="error text-danger">{{ $errors->first('domiciliado') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                          
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="nacionalidad_id">Nacionalidad <span
                                            class="campo-obligatorio">*</span></label>
                                    <select class="form-control" id="nacionalidad_id" name="nacionalidad_id">
                                        @foreach ($nacionalidades as $id => $nacionalidad)
                                            <option value="{{ $id }}"
                                                {{ old('nacionalidad_id', 193) == $id ? 'selected' : '' }}>
                                                {{ $nacionalidad }}</option>
                                        @endforeach
                                        <option value="" disabled>Selecciona un País</option>
                                    </select>
                                    @if ($errors->has('nacionalidad_id'))
                                        <span class="error text-danger">
                                            {{ $errors->first('nacionalidad_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="departamento_id">Departamento <span
                                            class="campo-obligatorio">*</span></label>
                                    <select class="form-control" id="departamento_id" name="departamento_id">
                                        <option value="" disabled {{ old('departamento_id') ? '' : 'selected' }}>
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
                            <div class="col-md-2 mb-3">
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
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="distrito_id">Distrito<span class="campo-obligatorio">*</span></label>
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





                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="via_id">Vía<span class="campo-obligatorio">*</span></label>
                                    <select class="form-control" id="via_id" name="via_id">
                                        <option value="" disabled {{ old('via_id') ? '' : 'selected' }}>
                                            Selecciona
                                            una Vía</option>
                                        @foreach ($vias as $id => $via)
                                            <option value="{{ $id }}"
                                                {{ old('via_id') == $id ? 'selected' : '' }}>
                                                {{ $via }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('via_id'))
                                        <span class="error text-danger">{{ $errors->first('via_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="nombre_via">Nombre de Via<span class="campo-obligatorio">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nombre via"
                                        name="nombre_via" value="{{ old('nombre_via') }}">
                                    @if ($errors->has('nombre_via'))
                                        <span class="error text-danger">{{ $errors->first('nombre_via') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="numero_via">Numero via</label>
                                    <input type="text" class="form-control" placeholder="Numero via"
                                        name="numero_via" value="{{ old('numero_via') }}">
                                    @if ($errors->has('numero_via'))
                                        <span class="error text-danger">{{ $errors->first('numero_via') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="interior">Interior</label>
                                    <input type="text" class="form-control" placeholder="Interior" name="interior"
                                        value="{{ old('interior') }}">
                                    @if ($errors->has('interior'))
                                        <span class="error text-danger">{{ $errors->first('interior') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="zona_id">Zonas<span class="campo-obligatorio">*</span></label>
                                    <select class="form-control" id="zona_id" name="zona_id">
                                        <option value="" disabled {{ old('zona_id') ? '' : 'selected' }}>
                                            Selecciona
                                            una Zona</option>
                                        @foreach ($zonas as $id => $zona)
                                            <option value="{{ $id }}"
                                                {{ old('zona_id') == $id ? 'selected' : '' }}>
                                                {{ $zona }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('zona_id'))
                                        <span class="error text-danger"> {{ $errors->first('zona_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="zona_id">Numero Zona</label>
                                    <input type="text" class="form-control" placeholder="Nombre de Zona"
                                        name="zona_id" value="{{ old('zona_id') }}">
                                    @if ($errors->has('zona_id'))
                                        <span class="error text-danger">{{ $errors->first('zona_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="referencia">Referencia</label>
                                    <input type="text" class="form-control" placeholder="Referencia"
                                        name="referencia" value="{{ old('referencia') }}">
                                    @if ($errors->has('referencia'))
                                        <span class="error text-danger">{{ $errors->first('referencia') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">
                    <div class="border rounded p-3 mb-3">
                        <h6 class="border-bottom pb-2 mb-3">Datos Laborales</h6>
                    <div class="row">
                       
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="tipo_trabajador_id">Tipo Trabajador<span
                                        class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="tipo_trabajador_id" name="tipo_trabajador_id">
                                    <option value="" disabled {{ old('tipo_trabajador_id') ? '' : 'selected' }}>
                                        Selecciona
                                        un Tipo</option>
                                    @foreach ($tipoTrabajadores as $id => $tipo_trabajador)
                                        <option value="{{ $id }}"
                                            {{ old('tipo_trabajador_id') == $id ? 'selected' : '' }}>
                                            {{ $tipo_trabajador }}</option>
                                    @endforeach
                                   
                                </select>
                                @if ($errors->has('tipo_trabajador_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('tipo_trabajador_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="regimen_laboral">Regimen Laboral<span
                                        class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="regimen_laboral" name="regimen_laboral">
                                    <option value="" disabled>Selecciona un Tipo</option>
                                    <option value="0" selected> Privado </option>
                                    <option value="1"> publico </option>
                                </select>
                                @if ($errors->has('regimen_laboral'))
                                    <span class="error text-danger">
                                        {{ $errors->first('regimen_laboral') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="nivel_edicativo_id">Nivel de educacion<span
                                        class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="nivel_edicativo_id" name="nivel_edicativo_id">
                                    <option value="" disabled {{ old('nivel_edicativo_id') ? '' : 'selected' }}>
                                        Selecciona
                                        un tipo</option>
                                    @foreach ($nivelesEducativos as $id => $nivel_educativo)
                                        <option value="{{ $id }}"
                                            {{ old('nivel_edicativo_id') == $id ? 'selected' : '' }}>
                                            {{ $nivel_educativo }}</option>
                                    @endforeach
                                   
                                </select>
                                @if ($errors->has('nivel_edicativo_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('nivel_edicativo_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="ocupacion_id">Asignar Ocupacion <span
                                        class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="ocupacion_id" name="ocupacion_id">
                                    @foreach ($ocupaciones as $id => $ocupacion)
                                        <option value="{{ $id }}"
                                            {{ old('ocupacion_id') == $id ? 'selected' : '' }}>
                                            {{ $ocupacion }}</option>
                                    @endforeach
                                    <option value="" disabled>Selecciona un Tipo</option>
                                </select>
                                @if ($errors->has('ocupacion_id'))
                                    <span class="error text-danger"> {{ $errors->first('ocupacion_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="discapacidad">Discapacidad</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="discapacidad"
                                        id="discapacidad">
                                    <label class="form-check-label" for="discapacidad">¿Tiene alguna
                                        discapacidad?</label>
                                </div>
                            </div>
                        </div>

                    
                  
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="curriculum">Curriculum (PDF/Word)<span
                                        class="campo-obligatorio">*</span></label>
                                <div class="file-upload-wrapper">
                                    <label for="curriculum" class="btn btn-primary btn-sm">
                                        <input type="file" name="curriculum" class="form-control-file d-none"
                                            id="curriculum" accept=".pdf,.docx">
                                        Seleccionar Archivo
                                    </label>

                                </div>
                                @if ($errors->has('curriculum'))
                                    <span class="error text-danger">{{ $errors->first('curriculum') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p> Datos del regimen pencionario</p>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="regimen_pencionario_id">Regimen pencionario del trabajador<span
                                        class="campo-obligatorio">*</span><span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="regimen_pencionario_id" name="regimen_pencionario_id">
                                    @foreach ($regimenesPensionarios as $id => $regimen_pencionario)
                                        <option value="{{ $id }}"
                                            {{ old('regimen_pencionario_id') == $id ? 'selected' : '' }}>
                                            {{ $regimen_pencionario }}</option>
                                    @endforeach
                                    <option value="" disabled>Selecciona un Tipo</option>
                                </select>
                                @if ($errors->has('regimen_pencionario_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('regimen_pencionario_id') }}</span>
                                @endif

                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="CUSPP">Fecha de Inscripcion al Regimen</label>
                                <input type="date" class="form-control" id="CUSPP" name="CUSPP"
                                    placeholder="00/00/00" value="{{ old('CUSPP') }}">
                                @if ($errors->has('CUSPP'))
                                    <span class="error text-danger">{{ $errors->first('CUSPP') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="CUSPP">CUSPP</label>
                                <input type="text" class="form-control" placeholder="CUSPP" name="CUSPP"
                                    value="{{ old('CUSPP') }}">
                                @if ($errors->has('CUSPP'))
                                    <span class="error text-danger">{{ $errors->first('CUSPP') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="sctr_pensions_id">SCTR Pensión </label>
                                <select class="form-control" id="sctr_pensions_id" name="sctr_pensions_id">
                                    @foreach ($sctr_pensions as $id => $sctr_pension)
                                        <option value="{{ $id }}"
                                            {{ old('sctr_pensions_id') == $id ? 'selected' : '' }}>
                                            {{ $sctr_pension }}</option>
                                    @endforeach
                                    <option value="" disabled>Selecciona un Tipo</option>
                                </select>
                                @if ($errors->has('sctr_pensions_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('rsctr_pensions_id') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="SCTR_salud">SCTR Salud </label>
                                <select class="form-control" id="SCTR_salud" name="SCTR_salud">
                                    @foreach ($sctr_saluds as $id => $sctr_salud)
                                        <option value="{{ $id }}"
                                            {{ old('SCTR_salud') == $id ? 'selected' : '' }}>
                                            {{ $sctr_salud }}</option>
                                    @endforeach
                                    <option value="" disabled>Selecciona un Tipo</option>
                                </select>
                                @if ($errors->has('SCTR_salud'))
                                    <span class="error text-danger"> {{ $errors->first('SCTR_salud') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="contrato_trabajo_id">Contrato de Trabajo </label>
                                <select class="form-control" id="contrato_trabajo_id" name="contrato_trabajo_id">
                                    @foreach ($tiposContratoTrabajo as $id => $tipoContratoTrabajo)
                                        <option value="{{ $id }}"
                                            {{ old('contrato_trabajo_id') == $id ? 'selected' : '' }}>
                                            {{ $tipoContratoTrabajo }}</option>
                                    @endforeach
                                    <option value="" disabled>Selecciona un Tipo</option>
                                </select>
                                @if ($errors->has('contrato_trabajo_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('contrato_trabajo_id') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="trabajo_sujeto_alt_acum_atip_desc"></label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        name="trabajo_sujeto_alt_acum_atip_desc" id="trabajo_sujeto_alt_acum_atip_desc">
                                    <label class="form-check-label" for="trabajo_sujeto_alt_acum_atip_desc">¿Trabajador
                                        sujeto a régimen alternativo, acumulativo o atípico de jornada de trabajo y
                                        descanso?</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="trabajo_sujeto_jornda_maxima"></label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="trabajo_sujeto_jornda_maxima"
                                        id="trabajo_sujeto_jornda_maxima">
                                    <label class="form-check-label" for="trabajo_sujeto_jornda_maxima">¿Trabajador
                                        sujeto
                                        a jornada de trabajo máxima?</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="trabajo_sujeto_horario_noctur"></label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="trabajo_sujeto_horario_noctur"
                                        id="trabajo_sujeto_horario_noctur">
                                    <label class="form-check-label" for="trabajo_sujeto_horario_noctur">¿Trabajador sujeto
                                        a horario nocturno?</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="ingresos_quinta_categoria"></label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="ingresos_quinta_categoria"
                                        id="ingresos_quinta_categoria">
                                    <label class="form-check-label" for="ingresos_quinta_categoria">¿Tiene otros
                                        ingresos
                                        de Quinta Categoría?</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="sindicalizado"></label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="sindicalizado"
                                        id="sindicalizado">
                                    <label class="form-check-label" for="sindicalizado">¿Es sindicalizado?</label>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>

                </div>
                <div class="tab-pane fade" id="laboral" role="tabpanel" aria-labelledby="laboral-tab">

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="periodicidad_id">Periodicidad de la remuneracion</label>
                                <select class="form-control" id="periodicidad_id" name="periodicidad_id">
                                    @foreach ($periodicidades as $id => $periodicidad)
                                        <option value="{{ $id }}"
                                            {{ old('periodicidad_id') == $id ? 'selected' : '' }}>
                                            {{ $periodicidad }}</option>
                                    @endforeach
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
                                    @foreach ($eps as $id => $eps_des)
                                        <option value="{{ $id }}"
                                            {{ old('eps_id') == $id ? 'selected' : '' }}>
                                            {{ $eps_des }}</option>
                                    @endforeach
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
                                    @foreach ($situacionesEPS as $id => $situacionEPS)
                                        <option value="{{ $id }}"
                                            {{ old('situacion_id') == $id ? 'selected' : '' }}>
                                            {{ $situacionEPS }}</option>
                                    @endforeach
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
                                    @foreach ($tiposPago as $id => $tipoPago)
                                        <option value="{{ $id }}"
                                            {{ old('tipo_pago_id') == $id ? 'selected' : '' }}>
                                            {{ $tipoPago }}</option>
                                    @endforeach
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
                                    @foreach ($categoriaocupacionales as $id => $categoriaocupacionale)
                                        <option value="{{ $id }}"
                                            {{ old('categoria_ocupacional_trabajador') == $id ? 'selected' : '' }}>
                                            {{ $categoriaocupacionale }}</option>
                                    @endforeach
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
                                    @foreach ($convenios as $id => $convenio)
                                        <option value="{{ $id }}"
                                            {{ old('convenio_id') == $id ? 'selected' : '' }}>
                                            {{ $convenio }}</option>
                                    @endforeach
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
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('/js/ubigeo/ubigeo.js') }}"></script>

    <script src="{{ asset('/js/personals/imagen.js') }}"></script>
    <script src="{{ asset('/js/personals/curriculum.js') }}"></script>

