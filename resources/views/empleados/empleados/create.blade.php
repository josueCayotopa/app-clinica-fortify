<div class="modal-header">
    <header class="el-dialog__header">
        <span role="heading" aria-level="2" class="el-dialog__title">Crea Empleado</span>
        <button type="button" class="el-dialog__headerbtn" data-dismiss="modal" aria-label="Close">
            <i class="el-icon el-dialog__close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                    <path fill="currentColor"
                        d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z">
                    </path>
                </svg>
            </i>
        </button>
    </header>
</div>
<div class="modal-body">
    <!-- Pestañas de navegación -->
    <ul class="nav nav-tabs" id="personalTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                aria-controls="general" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contacto-tab" data-toggle="tab" href="#contacto" role="tab"
                aria-controls="contacto" aria-selected="false">Laboral </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#laboral" role="tab"
                aria-controls="laboral" aria-selected="false">Beneficios</a>
        </li>
    </ul>
    <!-- Contenido de las pestañas -->
    <div class="tab-content" id="personalTabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            <form>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="tipo_documento_id">Tipo de Documento</label>
                            <select class="form-control" id="tipo_documento_id" name="tipo_documento_id">
                                <option value="" disabled {{ old('tipo_documento_id') ? '' : 'selected' }}>
                                    Selecciona Tipo de Documento</option>
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
                            <label for="numero_documento">Número de Documento</label>
                            <input type="text" class="form-control" id="numero_documento" name="numero_documento"
                                placeholder="Número de Documento" value="{{ old('numero_documento') }}">
                            @if ($errors->has('numero_documento'))
                                <span class="error text-danger">{{ $errors->first('numero_documento') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="apellido_paterno">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"
                                placeholder="Apellido Paterno" value="{{ old('apellido_paterno') }}">
                            @if ($errors->has('apellido_paterno'))
                                <span class="error text-danger">{{ $errors->first('apellido_paterno') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="apellido_materno">Apellido Materno</label>
                            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"
                                placeholder="Apellido Materno" value="{{ old('apellido_materno') }}">
                            @if ($errors->has('apellido_materno'))
                                <span class="error text-danger">{{ $errors->first('apellido_materno') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="nombres">Nombre</label>
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
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                placeholder="Nombre Completo" value="{{ old('fecha_nacimiento') }}">
                            @if ($errors->has('fecha_nacimiento'))
                                <span class="error text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label>Sexo</label>
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
                    <div class="col-md-3 mb-3">
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
                            <input type="checkbox" class="form-check-input" id="essalud_vida" name="essalud_vida">
                            <label class="form-check-label" for="essalud_vida">Tiene EsSalud + Vida</label>
                            @if ($errors->has('essalud_vida'))
                                <span class="error text-danger">{{ $errors->first('essalud_vida') }}</span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                    <p>Domicilio</p>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="nacionalidad_id">Nacionalidad</label>
                            <select class="form-control" id="nacionalidad_id" name="nacionalidad_id">
                                @foreach ($nacionalidades as $id => $nacionalidad)
                                    <option value="{{ $id }}"
                                        {{ old('nacionalidad_id', 193) == $id ? 'selected' : '' }}>
                                        {{ $nacionalidad }}</option>
                                @endforeach
                                <option value="" disabled>Selecciona un País</option>
                            </select>
                            @if ($errors->has('nacionalidad_id'))
                                <span class="error text-danger"> {{ $errors->first('nacionalidad_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="departamento_id">Departamento</label>
                            <select class="form-control" id="departamento_id" name="departamento_id" required>
                                <option value="" disabled {{ old('departamento_id') ? '' : 'selected' }}>
                                    Selecciona un Departamento</option>
                                @foreach ($departamentos as $id => $descripcion)
                                    <option value="{{ $id }}"
                                        {{ old('departamento_id', $sucursal->departamento_id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $descripcion }}
                                    </option>
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
                                {{ old('provincia_id') ? '' : 'disabled' }} required>
                                <option value="" disabled {{ old('provincia_id') ? '' : 'selected' }}>
                                    Selecciona una Provincia</option>
                            </select>
                            @if ($errors->has('provincia_id'))
                                <span class="error text-danger">{{ $errors->first('provincia_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="distrito_id">Distrito</label>
                            <select class="form-control" id="distrito_id" name="distrito_id"
                                {{ old('distrito_id') ? '' : 'disabled' }} required>
                                <option value="" disabled {{ old('distrito_id') ? '' : 'selected' }}>
                                    Selecciona un Distrito</option>
                            </select>
                            @if ($errors->has('distrito_id'))
                                <span class="error text-danger">{{ $errors->first('distrito_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="via_id">Vía</label>
                            <select class="form-control" id="via_id" name="via_id">
                                <option value="" disabled {{ old('via_id') ? '' : 'selected' }}>Selecciona
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
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="nombre_via">Nombre de Via</label>
                            <input type="text" class="form-control" placeholder="Nombre via" name="nombre_via"
                                value="{{ old('nombre_via') }}" required>
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
                            <input type="text" class="form-control" placeholder="Numero via" name="numero_via"
                                value="{{ old('numero_via') }}" required>
                            @if ($errors->has('numero_via'))
                                <span class="error text-danger">{{ $errors->first('numero_via') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="interior">Interior</label>
                            <input type="text" class="form-control" placeholder="Interior" name="interior"
                                value="{{ old('interior') }}" required>
                            @if ($errors->has('interior'))
                                <span class="error text-danger">{{ $errors->first('interior') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="zona_id">Zonas</label>
                            <select class="form-control" id="zona_id" name="zona_id">
                                @foreach ($zonas as $id => $zona)
                                    <option value="{{ $id }}"
                                        {{ old('zona_id') == $id ? 'selected' : '' }}>
                                        {{ $zona }}</option>
                                @endforeach
                                <option value="" disabled>Selecciona un País</option>
                            </select>
                            @if ($errors->has('zona_id'))
                                <span class="error text-danger"> {{ $errors->first('zona_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <label for="zona_id">Numero Zona</label>
                            <input type="text" class="form-control" placeholder="Nombre de Zona" name="zona_id"
                                value="{{ old('zona_id') }}" required>
                            @if ($errors->has('zona_id'))
                                <span class="error text-danger">{{ $errors->first('zona_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="referencia">Referencia</label>
                            <input type="text" class="form-control" placeholder="Referencia" name="referencia"
                                value="{{ old('referencia') }}" required>
                            @if ($errors->has('referencia'))
                                <span class="error text-danger">{{ $errors->first('referencia') }}</span>
                            @endif
                        </div>
                    </div>

                </div>

            </form>
        </div>
        <div class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">
            <form>
                <div class="row">
                    <p>Datos de Trabajador</p>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="tipo_trabajador_id">Tipo Trabajador</label>
                            <select class="form-control" id="tipo_trabajador_id" name="tipo_trabajador_id">
                                @foreach ($tipoTrabajadores as $id => $tipo_trabajador)
                                    <option value="{{ $id }}"
                                        {{ old('tipo_trabajador_id') == $id ? 'selected' : '' }}>
                                        {{ $tipo_trabajador }}</option>
                                @endforeach
                                <option value="" disabled>Selecciona un Tipo</option>
                            </select>
                            @if ($errors->has('tipo_trabajador_id'))
                                <span class="error text-danger"> {{ $errors->first('tipo_trabajador_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="tipo_trabajador_id">Regimen Laboral</label>
                            <select class="form-control" id="tipo_trabajador_id" name="tipo_trabajador_id">
                                @foreach ($tipoTrabajadores as $id => $tipo_trabajador)
                                    <option value="{{ $id }}"
                                        {{ old('tipo_trabajador_id') == $id ? 'selected' : '' }}>
                                        {{ $tipo_trabajador }}</option>
                                @endforeach
                                <option value="" disabled>Selecciona un Tipo</option>
                            </select>
                            @if ($errors->has('tipo_trabajador_id'))
                                <span class="error text-danger"> {{ $errors->first('tipo_trabajador_id') }}</span>
                            @endif
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="laboral" role="tabpanel" aria-labelledby="laboral-tab">
            <form>
                <div class="form-group mt-3">
                    <label for="cargo">Cargo</label>
                    <input type="text" class="form-control" id="cargo" required>
                </div>
                <div class="form-group">
                    <label for="fecha_ingreso">Fecha de Ingreso</label>
                    <input type="date" class="form-control" id="fecha_ingreso" required>
                </div>
                <div class="form-group">
                    <label for="salario">Salario</label>
                    <input type="number" class="form-control" id="salario" required>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="modal-footer">
        <footer class="el-dialog__footer">
            <span class="dialog-footer">

                <button type="button" class="el-button" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="el-button el-button--primary">Guardar</button>
            </span>
        </footer>
    </div>

</div>
