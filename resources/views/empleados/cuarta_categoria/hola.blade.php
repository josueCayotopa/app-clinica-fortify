<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field1_tab1">Tipo de Documento</label>
            <select class="form-control" id="tipo_documento">
                <option>Opción 1</option>
                <option>Opción 2</option>
                <option>Opción 3</option>
                <option>Opción 4</option>
                <option>Opción 5</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field2_tab1">Numero de Documento</label>
            <input type="text" class="form-control" id="numero_documento" name="field1_tab1" maxlength="20">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field1_tab1">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido_paterno" name="field1_tab1" maxlength="20">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field2_tab1">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido_materno" name="field1_tab1" maxlength="20">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field1_tab1">Nombre</label>
            <input type="text" class="form-control" id="nombre_personal" name="field1_tab1" maxlength="20">
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field2_tab1">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="field1_tab1" maxlength="20">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field1_tab1">Sexo</label>
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
           
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field2_tab1">Tefelono</label>
            <input type="text" class="form-control" id="nombre_personal" name="number-phone" maxlength="20" placeholder="Ingrese numero de telefono"> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field1_tab1">Correo</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="20" placeholder="Ingrese correo electronico" >
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label for="field2_tab1">Seguro</label>
            <div class="form-check">
            <input type="checkbox" class="form-check-input" id="essalud_vida"
                name="essalud_vida">
            <label class="form-check-label" for="essalud_vida">Tiene EsSalud + Vida<span
                    class="campo-obligatorio">*</span></label>
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