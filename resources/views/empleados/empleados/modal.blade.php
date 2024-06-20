<div class="modal-content">
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
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general"
                    role="tab" aria-controls="general" aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contacto-tab" data-toggle="tab" href="#contacto" role="tab"
                    aria-controls="contacto" aria-selected="false">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#laboral" role="tab"
                    aria-controls="laboral" aria-selected="false">Laboral</a>
            </li>
        </ul>
        <!-- Contenido de las pestañas -->
        <div class="tab-content" id="personalTabContent">
            <div class="tab-pane fade show active" id="general" role="tabpanel"
                aria-labelledby="general-tab">
                <form>
                    <div class="row">
                   
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="numero_documento">Número de Documento</label>
                                <input type="text" class="form-control" id="numero_documento"
                                    name="numero_documento" placeholder="Número de Documento"
                                    value="{{ old('numero_documento') }}">
                                @if ($errors->has('numero_documento'))
                                    <span class="error text-danger">{{ $errors->first('numero_documento') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="numero_documento">Número de Documento</label>
                                <input type="text" class="form-control" id="numero_documento"
                                    name="numero_documento" placeholder="Número de Documento"
                                    value="{{ old('numero_documento') }}">
                                @if ($errors->has('numero_documento'))
                                    <span class="error text-danger">{{ $errors->first('numero_documento') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" required>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">
                <form>
                    <div class="form-group mt-3">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" required>
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