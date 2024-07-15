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
            <a class="nav-link" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">Planilla</a>
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
            <div class="tab-pane " id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
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
                                    
                                    <option value="" disabled {{ old('nacionalidad_id') ? '' : 'selected' }}>
                                        Selecciona un Pais</option>
                                        @foreach ($nacionalidad as $id => $nacionalidad)
                                        <option value="{{ $id }}"
                                        {{ old('nacionalidad_id', 193) == $id ? 'selected' : '' }}>
                                            {{ $nacionalidad }}
                                        </option>
                                        @endforeach
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
                                        Selecciona departamento</option>

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
                <!-- Contenido de la pestaña Cuarta Categoria -->
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


                </div>
            </div>

            <!-- Tab 4 -->
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                <!-- Contenido de la pestaña Planilla -->
                <div class="border rounded p-3 mb-3">
                    <h6 class="border-bottom pb-2 mb-3">Datos de Planilla</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="periodo_id">Periodo laboral <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="periodo_id" name="periodo_id">
                                    
                                    <option value="" disabled {{ old('periodo_id') ? '' : 'selected' }}>
                                        Selecciona periodo laboral </option>
                                </select>
                                @if ($errors->has('periodo_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('periodo_id') }}</span>
                                @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="jornada_id">Jornada laboral <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="jornada_id" name="jornada_id">
                                    
                                    <option value="" disabled {{ old('jornada_id') ? '' : 'selected' }}>
                                        Selecciona jornada laboral</option>
                                </select>
                                @if ($errors->has('jornada_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('jornada_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dias_si">Dias subcidiados <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="dias_si" name="dias_si">
                                    
                                    <option value="" disabled {{ old('dias_si') ? '' : 'selected' }}>
                                        Seleccione dias subcidiados </option>
                                </select>
                                @if ($errors->has('dias_si'))
                                    <span class="error text-danger">
                                        {{ $errors->first('dias_si') }}</span>
                                @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="dias_no">Dias no subciadados <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="dias_no" name="dias_no">
                                    
                                    <option value="" disabled {{ old('dias_no') ? '' : 'selected' }}>
                                        Selecciona  dias no subcidiados </option>
                                </select>
                                @if ($errors->has('dias_no'))
                                    <span class="error text-danger">
                                        {{ $errors->first('dias_no') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sucursal_id">Sucursal laboral<span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="sucursal_id" name="sucursal_id">
                                    
                                    <option value="" disabled {{ old('sucursal_id') ? '' : 'selected' }}>
                                        Selecciona sucursal </option>
                                </select>
                                @if ($errors->has('sucursal_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('sucursal_id') }}</span>
                                @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="comprobante_id">Comprobante <span class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="comprobante_id" name="comprobante_id">
                                    
                                    <option value="" disabled {{ old('comprobante_id') ? '' : 'selected' }}>
                                        Selecciona tipo de comprobante </option>
                                </select>
                                @if ($errors->has('comprobante_id'))
                                    <span class="error text-danger">
                                        {{ $errors->first('comprobante_id') }}</span>
                                @endif
                            </div>
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
