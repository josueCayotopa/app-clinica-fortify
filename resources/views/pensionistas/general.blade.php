<div class="border rounded p-3 mb-0">
    <h6 class="border-bottom pb-2 mb-1">Datos Personales</h6>
    <div class="row scrollable-row">

        <div class="col-md-3 mb-1">
            <div class="form-group">
                <label for="tipo_documento_id">Tipo de Documento <span
                        class="campo-obligatorio">*</span></label>
                <select class="form-control" id="tipo_documento_id" name="tipo_documento_id">
                    <option value="" disabled {{ old('tipo_documento_id') ? '' : 'selected' }}>
                        Selecciona Tipo de Documento
                    </option>
                    @foreach ($tipoDocumento as $id => $tipo_documento)
                        <option value="{{ $tipo_documento->id }}"
                            {{ old('tipo_documento_id') == $id ? '' : '' }}>
                            {{ $tipo_documento->descripcion }}
                        </option>
                    @endforeach

                    
                </select>
                @if ($errors->has('tipo_documento_id'))
                    <span class="error text-danger">{{ $errors->first('tipo_documento_id') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-3 mb-1">
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
        <div class="col-md-3 mb-1">
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
        <div class="col-md-3 mb-1">
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
        <div class="col-md-3 mb-1">
            <div class="form-group">
                <label for="nombres">Nombre<span class="campo-obligatorio">*</span></label>
                <input type="text" class="form-control" id="nombres" name="nombres"
                    placeholder="Nombre Completo" value="{{ old('nombres') }}">
                @if ($errors->has('nombres'))
                    <span class="error text-danger">{{ $errors->first('nombres') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-3 mb-1">
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
        <div class="col-md-3 mb-1">
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
        <div class="col-md-3 mb-1">
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono"
                    placeholder="Telefono" value="{{ old('telefono') }}">
                @if ($errors->has('telefono'))
                    <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-3 mb-1">
            <div class="form-group">
                <label for="correo_electronico"> Correo </label>
                <input type="email" class="form-control" id="correo_electronico"
                    name="correo_electronico" placeholder="Correo"
                    value="{{ old('correo_electronico') }}">
                @if ($errors->has('correo_electronico'))
                    <span
                        class="error text-danger">{{ $errors->first('correo_electronico') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-3 mb-1">
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
        <div class="col-md-2 mb-3">
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
        <div class="col-md-2 mb-3">
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