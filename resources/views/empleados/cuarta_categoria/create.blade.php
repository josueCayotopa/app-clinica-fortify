<div class="container">

    <ul class="nav nav-tabs" id="personalTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Domicilio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Laboral</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">Periodo Laboral</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab5-tab" data-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false">Jornada Laboral</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab6-tab" data-toggle="tab" href="#tab6" role="tab" aria-controls="tab6" aria-selected="false">Comprobante</a>
        </li>
    </ul>

    <!-- Contenido de las pestañas -->
    <form id="personalForm" method="POST" action="#">
        <div class="tab-content">
            <!-- Tab 1 -->
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <!-- Contenido de la pestaña General -->
                <div class="border rounded p-3 mb-3">
                    <h6 class="border-bottom pb-2 mb-3">Datos de Personales </h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="tipo_documento_id">Tipo de Documento <span
                                    class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="tipo_documento_id" name="tipo_documento_id">
                                    <option value="" disabled {{ old('tipo_documento_id') ? '' : 'selected' }}>
                                        Selecciona Tipo de Documento
                                    </option>
                                    @foreach ($tipoDocumento as $id => $tipo_documento)
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
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="numero_documento">Número de Documento<span
                                        class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" id="numero_documento"
                                    name="numero_documento" placeholder="Número de Documento"
                                    value="{{ old('numero_documento') }}">
                                @if ($errors->has('numero_documento'))
                                    <span class="error text-danger">{{ $errors->first('numero_documento') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="apellido_paterno">Apellido Paterno<span
                                            class="campo-obligatorio">*</span></label>
                                    <input type="text" class="form-control" id="apellido_paterno"
                                        name="apellido_paterno" placeholder="Apellido Paterno"
                                        value="{{ old('apellido_paterno') }}">
                                    @if ($errors->has('apellido_paterno'))
                                        <span class="error text-danger">{{ $errors->first('apellido_paterno') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="apellido_materno">Apellido Materno<span
                                        class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" id="apellido_materno"
                                    name="apellido_materno" placeholder="Apellido Materno"
                                    value="{{ old('apellido_materno') }}">
                                @if ($errors->has('apellido_materno'))
                                    <span class="error text-danger">{{ $errors->first('apellido_materno') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nombres">Nombre<span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" id="nombres" name="nombres"
                                    placeholder="Nombre Completo" value="{{ old('nombres') }}">
                                @if ($errors->has('nombres'))
                                    <span class="error text-danger">{{ $errors->first('nombres') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento<span
                                    class="campo-obligatorio">*</span></label>
                            <input type="date" class="form-control" id="fecha_nacimiento"
                                name="fecha_nacimiento" placeholder=""
                                value="{{ old('fecha_nacimiento') }}">
                            @if ($errors->has('fecha_nacimiento'))
                                <span class="error text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
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
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="telefono">Telefono<span
                                    class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    placeholder="Telefono" value="{{ old('telefono') }}">
                                @if ($errors->has('telefono'))
                                    <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="correo_electronico"> Correo <span
                                    class="campo-obligatorio">*</span></label>
                                <input type="email" class="form-control" id="correo_electronico"
                                    name="correo_electronico" placeholder="Correo"
                                    value="{{ old('correo_electronico') }}">
                                @if ($errors->has('correo_electronico'))
                                    <span
                                        class="error text-danger">{{ $errors->first('correo_electronico') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="field2_tab1">Seguro <span
                                    class="campo-obligatorio">*</span></label>
                                <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="essalud_vida"
                                    name="essalud_vida">
                                <label class="form-check-label" for="essalud_vida">Tiene EsSalud + Vida</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-6">
                            <p>Ingrese su Foto</p>
                            <div class="image-upload-wrapper">
                            
                                <div class="image-upload-wrapper"
                                    onclick="document.getElementById('imageUpload').click();">
                                    <i class='bx bx-landscape'></i>
                                    <img id="uploadedImage" alt="Uploaded Image"
                                        style="width: 100%; height: auto; object-fit: cover;">
                                    <span class="remove-image" onclick="removeImage(event)">&times;</span>
                                    <input type="file" id="imageUpload" name="image" accept="image/*"
                                        onchange="showImage(this)">
                                    <input type="hidden" name="image_url" id="image_url">
                                </div>
                            </div>
                            @if ($errors->has('imagen'))
                                <span class="error text-danger">{{ $errors->first('imagen') }}</span>
                            @endif
                    
                        </div>
                    
                        <div class="col-md-6 mb-6">
                            <p>Ingrese el curriculum</p>
                            <div class="file-upload-wrapper">
                                
                                <div class="file-upload-wrapper"
                                    onclick="document.getElementById('fileUpload').click();">
                                    <i class='bx bxs-file-doc'></i>
                    
                                    <span class="remove-file" onclick="removeFile(event)">&times;</span>
                                    <input type="file" id="fileUpload" name="curriculum"
                                        accept="application/pdf" onchange="showFile(this)">
                                    <input type="hidden" name="curriculum_url" id="curriculum_url">
                                </div>
                            </div>
                            @if ($errors->has('imagen'))
                                <span class="error text-danger">{{ $errors->first('imagen') }}</span>
                            @endif
                    
                        </div>
                    
                    </div>


                </div>
            </div>

            <!-- Tab 2 -->
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <div class="border rounded p-3 mb-3">
                    <h6 class="border-bottom pb-2 mb-3">Datos de Domicilio</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" id="domiciliado" name="domiciliado">
                                <label class="form-check-label" for="domiciliado">Es Domiciliado<span
                                        class="campo-obligatorio">*</span></label>
                                @if ($errors->has('domiciliado'))
                                    <span class="error text-danger">{{ $errors->first('domiciliado') }}</span>
                                @endif
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nacionalidad_id">Nacionalidad <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="nacionalidad_id" name="nacionalidad_id">
                                    @foreach ($nacionalidad as $id => $nacionalidad)
                                        <option value="{{ $id }}" {{ old('nacionalidad_id', 193) == $id ? 'selected' : '' }}>
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
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="departamento_id">Departamento <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="departamento_id" name="departamento_id">
                                    <option value="" disabled {{ old('departamento_id') ? '' : 'selected' }}>
                                        Selecciona un Departamento</option>
                                    @foreach ($departamentos as $id => $descripcion)
                                        <option value="{{ $id }}" {{ old('departamento_id' ?? '') == $id ? 'selected' : '' }}>
                                            {{ $descripcion }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('departamento_id'))
                                    <span class="error text-danger">{{ $errors->first('departamento_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="provincia_id">Provincia</label>
                            <select class="form-control" id="provincia_id" name="provincia_id"
                                {{ old('provincia_id') ? '' : 'disabled' }}>
                                <option value="" disabled {{ old('provincia_id') ? '' : 'selected' }}>
                                    Selecciona
                                    una Provincia</option>
                                @if (old('provincia_id'))
                                    @foreach ($provincias as $id => $descripcion)
                                        <option value="{{ $id }}" {{ old('provincia_id') == $id ? 'selected' : '' }}>
                                            {{ $descripcion }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('provincia_id'))
                                <span class="error text-danger">{{ $errors->first('provincia_id') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="distrito_id">Distrito<span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="distrito_id" name="distrito_id"
                                    {{ old('distrito_id') ? '' : 'disabled' }}>
                                    <option value="" disabled {{ old('distrito_id') ? '' : 'selected' }}>
                                        Selecciona
                                        un Distrito</option>
                                    @if (old('distrito_id'))
                                        @foreach ($distritos as $id => $descripcion)
                                            <option value="{{ $id }}" {{ old('distrito_id') == $id ? 'selected' : '' }}>
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
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="via_id">Vía<span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="via_id" name="via_id">
                                    <option value="" disabled {{ old('via_id') ? '' : 'selected' }}>
                                        Selecciona
                                        una Vía</option>
                                    @foreach ($vias as $id => $via)
                                        <option value="{{ $id }}" {{ old('via_id') == $id ? 'selected' : '' }}>
                                            {{ $via }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('via_id'))
                                    <span class="error text-danger">{{ $errors->first('via_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="nombre_via">Nombre de Via<span class="campo-obligatorio">*</span></label>
                                <input type="text" class="form-control" placeholder="Nombre via" name="nombre_via"
                                    value="{{ old('nombre_via') }}">
                                @if ($errors->has('nombre_via'))
                                    <span class="error text-danger">{{ $errors->first('nombre_via') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="numero_via">Numero via</label>
                                <input type="text" class="form-control" placeholder="Numero via" name="numero_via"
                                    value="{{ old('numero_via') }}">
                                @if ($errors->has('numero_via'))
                                    <span class="error text-danger">{{ $errors->first('numero_via') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="interior">Interior</label>
                                <input type="text" class="form-control" placeholder="Interior" name="interior"
                                    value="{{ old('interior') }}">
                                @if ($errors->has('interior'))
                                    <span class="error text-danger">{{ $errors->first('interior') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="zona_id">Zonas<span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="zona_id" name="zona_id">
                                    <option value="" disabled {{ old('zona_id') ? '' : 'selected' }}>
                                        Selecciona
                                        una Zona</option>
                                    @foreach ($zonas as $id => $zona)
                                        <option value="{{ $id }}" {{ old('zona_id') == $id ? 'selected' : '' }}>
                                            {{ $zona }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('zona_id'))
                                    <span class="error text-danger"> {{ $errors->first('zona_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="zona_id">Numero Zona</label>
                                <input type="text" class="form-control" placeholder="Nombre de Zona" name="zona_id"
                                    value="{{ old('zona_id') }}">
                                @if ($errors->has('zona_id'))
                                    <span class="error text-danger">{{ $errors->first('zona_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input type="text" class="form-control" placeholder="Referencia" name="referencia"
                                    value="{{ old('referencia') }}">
                                @if ($errors->has('referencia'))
                                    <span class="error text-danger">{{ $errors->first('referencia') }}</span>
                                @endif
                            </div>
                        </div>
                        
                    </div>
            </div>
            </div>

            <!-- Tab 3 -->
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                <div class="border rounded p-3 mb-3">
                    <h6 class="border-bottom pb-2 mb-3">Datos laborales</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ruc">R.U.C<span class="campo-obligatorio">*</label>
                                <input type="text" class="form-control" placeholder="ruc" name="ruc"
                                    value="{{ old('ruc') }}">
                                @if ($errors->has('ruc'))
                                    <span class="error text-danger">{{ $errors->first('ruc') }}</span>
                                @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="convenio_id">Convenio <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="convenio_id" name="convenio_id">
                                    
                                    <option value="" disabled {{ old('convenio_id') ? '' : 'selected' }}>
                                        Selecciona un convenio</option>
                                </select>
                                @if ($errors->has('convenio_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('convenio_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pago_id">Tipo de pago <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="pago_id" name="pago_id">
                                    
                                    <option value="" disabled {{ old('pago_id') ? '' : 'selected' }}>
                                        Selecciona tipo de pago</option>
                                </select>
                                @if ($errors->has('pago_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('pago_id') }}</span>
                                @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="banco_id">Tipo de banco <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="banco_id" name="banco_id">
                                    
                                    <option value="" disabled {{ old('banco_id') ? '' : 'selected' }}>
                                        Selecciona tipo de banco </option>
                                </select>
                                @if ($errors->has('banco_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('banco_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="numero_bancaria">Numero de cuenta bancaria<span class="campo-obligatorio">*</label>
                                <input type="text" class="form-control" placeholder="Numero de cuenta bancaria" name="numero_bancaria"
                                    value="{{ old('numero_bancaria') }}">
                                @if ($errors->has('numero_bancaria'))
                                    <span class="error text-danger">{{ $errors->first('numero_bancaria') }}</span>
                                @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="monto_pago">Monto de pago<span class="campo-obligatorio">*</label>
                                    <input type="text" class="form-control" placeholder="Monto de pago S/." name="monto_pago"
                                        value="{{ old('monto_pago') }}">
                                    @if ($errors->has('monto_pago'))
                                        <span class="error text-danger">{{ $errors->first('monto_pago') }}</span>
                                    @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="empresa_id">Empresa<span class="campo-obligatorio">*</span></label>
                            <select class="form-control" id="empresa_id" name="empresa_id">
                                <option value="" disabled {{ old('empresa_id') ? '' : 'selected' }}>Selecciona una Empresa
                                </option>
                                @foreach ($empresas as $id => $empresa)
                                    <option value="{{ $id }}" {{ old('empresa_id') == $id ? 'selected' : '' }}>
                                        {{ $empresa }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('empresa_id'))
                                <span class="error text-danger">{{ $errors->first('empresa_id') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="sucursal_establecimiento_laboral_id">Sucursal<span
                                    class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="sucursal_establecimiento_laboral_id"
                                    name="sucursal_establecimiento_laboral_id">
                                    <option value="" disabled {{ old('sucursal_establecimiento_laboral_id') ? '' : 'selected' }}>
                                        Selecciona una Sucursal</option>
                                </select>
                                @if ($errors->has('sucursal_establecimiento_laboral_id'))
                                    <span class="error text-danger">{{ $errors->first('sucursal_establecimiento_laboral_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>

            <!-- Tab 4 -->
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                <!-- Contenido de la pestaña Planilla -->
                <div class="border rounded p-3 mb-3">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="periodicidad_id">Periodo de pago<span
                                class="campo-obligatorio">*</span></label>
                            <select class="form-control" id="periodicidad_id" name="periodicidad_id">
                                @foreach ($periodicidad as $id => $periodicidad)
                                <option value="{{ $id }}" {{ old('periodicidad_id', 1) == $id ? 'selected' : '' }}>
                                    {{ $periodicidad }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('periodicidad_id'))
                                <span class="error text-danger">
                                    {{ $errors->first('periodicidad_id') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="categoria_periodos_id">Categoria<span
                                    class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="categoria_periodos_id" name="categoria_periodos_id">
                                    @foreach ($categoriaPeriodo as $id => $categoriaPeriodo)
                                        <option value="{{ $id }}"
                                            {{ old('categoria_periodos_id') == $id ? 'selected' : '' }}>
                                            {{ $categoriaPeriodo }}</option>
                                    @endforeach
                                    <option value="" disabled>Selecciona un Tipo</option>
                                </select>
                                @if ($errors->has('categoria_periodos_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('categoria_periodos_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="trabajo_sujeto_jornda_maxima">El trabajador esta sujeto a:</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="trabajo_sujeto_jornda_maxima" id="trabajo_sujeto_jornda_maxima" >
                                <label class="form-check-label" for="trabajo_sujeto_jornda_maxima">Jornada de trabajo Maxima</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="trabajo_sujeto_horario_noctur">El trabajador esta sujeto a:</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="trabajo_sujeto_horario_noctur" id="trabajo_sujeto_horario_noctur" >
                                        <label class="form-check-label" for="trabajo_sujeto_horario_noctur">Horario Nocturno</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fecha_inicio">Fecha de Inicio<span
                                class="campo-obligatorio">*</span></label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="00/00/00"
                                value="{{ old('fecha_inicio') }}">
                            @if ($errors->has('fecha_inicio'))
                                <span class="error text-danger">{{ $errors->first('fecha_inicio') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de Fin</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="00/00/00"
                                    value="{{ old('fecha_fin') }}">
                                @if ($errors->has('fecha_fin'))
                                    <span class="error text-danger">{{ $errors->first('fecha_fin') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            
                            <label for="motivo_fin_id">Motivo fin del periodo laboral<span
                                class="campo-obligatorio">*</span></label>
                            <select class="form-control" id="motivo_fin_id" name="motivo_fin_id">
                                <option value="" disabled {{ old('motivo_fin_id') ? '' : 'selected' }}>
                                    Selecciona
                                    un tipo</option>
                                @foreach ($motivoFinPeriodo as $id => $motivoFinPeriodo)
                                    <option value="{{ $id }}"
                                        {{ old('motivo_fin_id') == $id ? 'selected' : '' }}>
                                        {{ $motivoFinPeriodo }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('motivo_fin_id'))
                                <span class="error text-danger">
                                    {{ $errors->first('motivo_fin_id') }}</span>
                            @endif
                        </div>
                        
                    </div>
                
            </div>
            </div>

            

            <!-- Tab 5 -->
            <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">
                <div class="border rounded p-3 mb-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="horas_trabajadas">Horas Trabajadas</label>
                        <input type="text" class="form-control" placeholder="Ingrese las horas trabajadas"
                            name="horas_trabajadas" value="{{ old('horas_trabajadas') }}">
                        @if ($errors->has('horas_trabajadas'))
                            <span class="error text-danger">{{ $errors->first('horas_trabajadas') }}</span>
                        @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="minutos_trabajados">Minutos Trabajados</label>
                                <input type="text" class="form-control" placeholder="Ingrese los minutos trabajados"
                                    name="minutos_trabajados" value="{{ old('minutos_trabajados') }}">
                                @if ($errors->has('minutos_trabajados'))
                                    <span class="error text-danger">{{ $errors->first('minutos_trabajados') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="horas_sobretiempo">Horas de Sobretiempo</label>
                        <input type="text" class="form-control" placeholder="Ingrese las horas de sobretiempo"
                            name="horas_sobretiempo" value="{{ old('horas_sobretiempo') }}">
                        @if ($errors->has('horas_sobretiempo'))
                            <span class="error text-danger">{{ $errors->first('horas_sobretiempo') }}</span>
                        @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="minutos_sobretiempo">Minutos de Sobretiempo</label>
                                <input type="text" class="form-control" placeholder="Ingrese los minutos de sobretiempo"
                                    name="minutos_sobretiempo" value="{{ old('minutos_sobretiempo') }}">
                                @if ($errors->has('minutos_sobretiempo'))
                                    <span class="error text-danger">{{ $errors->first('minutos_sobretiempo') }}</span>
                                @endif                               
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" placeholder="Ingrese una descripción" name="descripcion"
                                value="{{ old('descripcion') }}">
                            @if ($errors->has('descripcion'))
                                <span class="error text-danger">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="numero_dias_semana">Número de Días a la Semana</label>
                            <input type="text" class="form-control" placeholder="Ingrese el número de días a la semana"
                                name="numero_dias_semana" value="{{ old('numero_dias_semana') }}">
                            @if ($errors->has('numero_dias_semana'))
                                <span class="error text-danger">{{ $errors->first('numero_dias_semana') }}</span>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="hora_ingreso">Hora de Ingreso</label>
                            <input type="time" class="form-control" name="hora_ingreso" value="{{ old('hora_ingreso') }}">
                            @if ($errors->has('hora_ingreso'))
                                <span class="error text-danger">{{ $errors->first('hora_ingreso') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="hora_salida">Hora de Salida</label>
                                <input type="time" class="form-control" name="hora_salida" value="{{ old('hora_salida') }}">
                                @if ($errors->has('hora_salida'))
                                    <span class="error text-danger">{{ $errors->first('hora_salida') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- Tab 6 -->
            <div class="tab-pane fade" id="tab6" role="tabpanel" aria-labelledby="tab6-tab">
                <div class="border rounded p-3 mb-3">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tipo_comprobante">Tipo de Comprobante <span
                                class="campo-obligatorio">*</span></label>
                            <select class="form-control" id="tipo_comprobante" name="tipo_comprobante">
                                <option value="" disabled {{ old('tipo_comprobante') ? '' : 'selected' }}>
                                    Selecciona Tipo de Comprobante
                                </option>
                                
                            </select>
                            @if ($errors->has('tipo_comprobante'))
                                <span class="error text-danger">{{ $errors->first('tipo_comprobante') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="serie">Serie Comprobante</label>
                                <input type="text" class="form-control" placeholder="Ingrese una descripción" name="serie"
                                    value="{{ old('serie') }}">
                                @if ($errors->has('serie'))
                                    <span class="error text-danger">{{ $errors->first('serie') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                <div class="row">
                        <div class="col-md-6 mb-3"> 
                            <label for="fecha_emision">Fecha de Emición<span
                                class="campo-obligatorio">*</span></label>
                            <input type="date" class="form-control" id="fecha_emision" name="fecha_emision" placeholder="00/00/00"
                                value="{{ old('fecha_emision') }}">
                            @if ($errors->has('fecha_emision'))
                                <span class="error text-danger">{{ $errors->first('fecha_emision') }}</span>
                            @endif                       
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="fecha_pago">Fecha de Pago<span
                                    class="campo-obligatorio">*</span></label>
                                <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" placeholder="00/00/00"
                                    value="{{ old('fecha_pago') }}">
                                @if ($errors->has('fecha_pago'))
                                    <span class="error text-danger">{{ $errors->first('fecha_pago') }}</span>
                                @endif  
                            </div>
                        </div>
                </div>


                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="retencion">Retención Cuarta Categoria</label>
                            <input type="text" class="form-control" placeholder="Ingrese una descripción" name="retencion"
                                value="{{ old('retencion') }}">
                            @if ($errors->has('retencion'))
                                <span class="error text-danger">{{ $errors->first('retencion') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Botones de navegación -->
        <div class="navigation-buttons mt-3 d-flex justify-content-end">
            <button class="btn btn-primary" id="prevBtn" style="margin-left: 10px;">Atrás</button>
            <button class="btn btn-secondary" id="backRouteBtn" style="margin-left: 10px;">Cancelar</button>
            <button type="button" class="btn btn-primary" id="nextBtn" style="margin-left: 10px;">Continuar</button>
            <button class="btn btn-success" id="confirmBtn" style="display: none; margin-left: 10px;">Confirmar</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        let tabList = $('#personalTab a.nav-link');
        let currentIndex = 0;

        function updateButtons() {
            $('#prevBtn').toggle(currentIndex > 0);
            $('#nextBtn').toggle(currentIndex < tabList.length - 1);
            $('#confirmBtn').toggle(currentIndex === tabList.length - 1);
            $('#backRouteBtn').toggle(currentIndex === 0);
        }

        function switchTab(index) {
            tabList.removeClass('active');
            $(tabList[index]).addClass('active');
            $('.tab-pane').removeClass('show active');
            $($('.tab-pane')[index]).addClass('show active');
            currentIndex = index;
            updateButtons();
        }

        $('#prevBtn').click(function(e) {
            e.preventDefault();
            if (currentIndex > 0) {
                switchTab(currentIndex - 1);
            } else {
                window.location.href = '';
            }
        });

        $('#nextBtn').click(function() {
            if (currentIndex < tabList.length - 1) {
                switchTab(currentIndex + 1);
            }
        });

        $('#confirmBtn').click(function() {
            $('#personalForm').attr('action', 'hola');
            $('#personalForm').submit();
        });

        $('#backRouteBtn').click(function(e) {
            e.preventDefault();
            window.location.href = '{{ route('cuarta_categoria.index') }}';
        });

        updateButtons();
    });
</script>

<script src="{{ asset('/js/ubigeo/ubigeo.js') }}"></script>
<script src="{{ asset('/js/personals/imagen.js') }}"></script>
<script src="{{ asset('/js/personals/curriculum.js') }}"></script>
