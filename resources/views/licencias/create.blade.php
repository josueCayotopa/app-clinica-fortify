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
                aria-controls="contacto" aria-selected="false">Contacto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="laboral-tab" data-toggle="tab" href="#laboral" role="tab"
                aria-controls="laboral" aria-selected="false">Laboral</a>
        </li>
    </ul>
    <!-- Contenido de las pestañas -->
    <form id="personalForm" method="POST" action="{{ route('personals.store') }}">
        @csrf
        <div class="tab-content" id="personalTabContent">
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

            </div>
            <div class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">

            </div>
            <div class="tab-pane fade" id="laboral" role="tabpanel" aria-labelledby="laboral-tab">

            </div>
        </div>

        <div class="modal-footer">

            <footer class="el-dialog__footer">
                <span class="dialog-footer">

                    <button type="button" class="el-button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="el-button el-button--primary">Guardar</button>
                </span>
            </footer>
        </div>
    </form>
