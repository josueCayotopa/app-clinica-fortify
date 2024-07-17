@extends('layouts.home')
@section('main')
    <div class="container mt-5">
        <ul class="nav nav-tabs custom-tabs" id="personalTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                    aria-controls="general" aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="domicilio-tab" data-toggle="tab" href="#domicilio" role="tab"
                    aria-controls="domicilio" aria-selected="false">Domicilio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#laboral" role="tab"
                    aria-controls="laboral" aria-selected="false">Laboral</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="periodolaboral-tab" data-toggle="tab" href="#periodolaboral" role="tab"
                    aria-controls="periodolaboral" aria-selected="false">Periodo Laboral</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="jornadalaboral-tab" data-toggle="tab" href="#jornadalaboral" role="tab"
                    aria-controls="jornadalaboral" aria-selected="false">Jornada Laboral</a>
            </li>


        </ul>
        <form action="{{ route('modalidad_formativa.update', $modalidadFormativa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="tab-content">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                    <div class="border rounded p-3 mb-0">
                        <h6 class="border-bottom pb-2 mb-1">Datos Personales</h6>
                        <div class="row scrollable-row">

                            <div class="row scrollable-row">
                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <label for="tipo_documento_id">Tipo de Documento <span
                                                class="campo-obligatorio">*</span></label>
                                        <select class="form-control" id="tipo_documento_id" name="tipo_documento_id">
                                            <option value="" disabled
                                                {{ old('tipo_documento_id', $modalidadFormativa->tipo_documento_id) ? '' : 'selected' }}>
                                                Selecciona Tipo de Documento</option>
                                            @foreach ($tipoDocumento as $id => $tipo_documento)
                                                <option value="{{ $id }}"
                                                    {{ old('tipo_documento_id', $modalidadFormativa->tipo_documento_id) == $id ? 'selected' : '' }}>
                                                    {{ $tipo_documento }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('tipo_documento_id'))
                                            <span class="error text-danger">{{ $errors->first('tipo_documento_id') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <label for="numero_documento">Número de Documento<span
                                                class="campo-obligatorio">*</span></label>
                                        <input type="text" class="form-control" id="numero_documento"
                                            name="numero_documento" placeholder="Número de Documento"
                                            value="{{ old('numero_documento', $modalidadFormativa->numero_documento) }}">
                                        @if ($errors->has('numero_documento'))
                                            <span class="error text-danger">{{ $errors->first('numero_documento') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido Paterno<span
                                                class="campo-obligatorio">*</span></label>
                                        <input type="text" class="form-control" id="apellido_paterno"
                                            name="apellido_paterno" placeholder="Apellido Paterno"
                                            value="{{ old('apellido_paterno', $modalidadFormativa->apellido_paterno) }}">
                                        @if ($errors->has('apellido_paterno'))
                                            <span class="error text-danger">{{ $errors->first('apellido_paterno') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido Materno<span
                                                class="campo-obligatorio">*</span></label>
                                        <input type="text" class="form-control" id="apellido_materno"
                                            name="apellido_materno" placeholder="Apellido Materno"
                                            value="{{ old('apellido_materno', $modalidadFormativa->apellido_materno) }}">
                                        @if ($errors->has('apellido_materno'))
                                            <span class="error text-danger">{{ $errors->first('apellido_materno') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <label for="nombres">Nombre<span class="campo-obligatorio">*</span></label>
                                        <input type="text" class="form-control" id="nombres" name="nombres"
                                            placeholder="Nombre Completo"
                                            value="{{ old('nombres', $modalidadFormativa->nombres) }}">
                                        @if ($errors->has('nombres'))
                                            <span class="error text-danger">{{ $errors->first('nombres') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <label for="fecha_nacimiento">Fecha de Nacimiento<span
                                                class="campo-obligatorio">*</span></label>
                                        <input type="date" class="form-control" id="fecha_nacimiento"
                                            name="fecha_nacimiento" placeholder="Fecha de Nacimiento"
                                            value="{{ old('fecha_nacimiento', $modalidadFormativa->fecha_nacimiento) }}">
                                        @if ($errors->has('fecha_nacimiento'))
                                            <span
                                                class="error text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <label>Sexo<span class="campo-obligatorio">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sexo" id="masculino"
                                                value="masculino"
                                                {{ old('sexo', $modalidadFormativa->sexo) == 'masculino' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="masculino">Masculino</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sexo" id="femenino"
                                                value="femenino"
                                                {{ old('sexo', $modalidadFormativa->sexo) == 'femenino' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="femenino">Femenino</label>
                                        </div>
                                        @if ($errors->has('sexo'))
                                            <span class="error text-danger">{{ $errors->first('sexo') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono"
                                            placeholder="Telefono"
                                            value="{{ old('telefono', $modalidadFormativa->telefono) }}">
                                        @if ($errors->has('telefono'))
                                            <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <div class="form-group">
                                        <label for="correo_electronico">Correo</label>
                                        <input type="email" class="form-control" id="correo_electronico"
                                            name="correo_electronico" placeholder="Correo"
                                            value="{{ old('correo_electronico', $modalidadFormativa->correo_electronico) }}">
                                        @if ($errors->has('correo_electronico'))
                                            <span
                                                class="error text-danger">{{ $errors->first('correo_electronico') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="essalud_vida"
                                            name="essalud_vida"
                                            {{ old('essalud_vida', $modalidadFormativa->essalud_vida) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="essalud_vida">Tiene EsSalud + Vida<span
                                                class="campo-obligatorio">*</span></label>
                                        @if ($errors->has('essalud_vida'))
                                            <span class="error text-danger">{{ $errors->first('essalud_vida') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-6">
                                    <p>Ingrese su Foto</p>
                                    <div class="image-upload-wrapper">
                                        <div class="image-upload-wrapper"
                                            onclick="document.getElementById('imageUpload').click();">
                                            <i class='bx bx-landscape'></i>
                                            <img id="uploadedImage" alt="Uploaded Image"
                                                style="width: 100%; height: auto; object-fit: cover;"
                                                src="{{ old('image', $modalidadFormativa->image) }}">
                                            <span class="remove-image" onclick="removeImage(event)">&times;</span>
                                            <input type="file" id="imageUpload" name="image" accept="image/*"
                                                onchange="showImage(this)">
                                            <input type="hidden" name="image" id="image"
                                                value="{{ old('image', $modalidadFormativa->image) }}">
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
                                            <input type="hidden" name="curriculum" id="curriculum"
                                                value="{{ old('curriculum', $modalidadFormativa->curriculum) }}">
                                        </div>
                                    </div>
                                    @if ($errors->has('curriculum'))
                                        <span class="error text-danger">{{ $errors->first('curriculum') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="domicilio" role="tabpanel" aria-labelledby="domicilio-tab">
                        @include('modalidad_formativa.editdomicilio')
                    </div>
                    <div class="tab-pane fade" id="laboral" role="tabpanel" aria-labelledby="laboral-tab">
                        @include('modalidad_formativa.editlaboral')
                    </div>


                    <div class="tab-pane fade" id="periodolaboral" role="tabpanel" aria-labelledby="periodolaboral-tab">
                        @include('modalidad_formativa.editperiodolaboral')
                    </div>
                    <div class="tab-pane fade" id="jornadalaboral" role="tabpanel" aria-labelledby="jornadalaboral-tab">
                        @include('modalidad_formativa.editjornadalaboral')
                    </div>


                </div>


                <div class="row">
                    <div class="col-md-12 mb-2 gap-2 d-md-flex justify-content-md-end">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{ asset('/js/ubigeo/ubigeo.js') }}"></script>
    <script src="{{ asset('/js/personals/imagen.js') }}"></script>
    <script src="{{ asset('/js/personals/curriculum.js') }}"></script>
@endsection
