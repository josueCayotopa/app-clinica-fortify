@extends('home')

@section('home')
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
        <form id="personalForm" method="POST" action="{{ route('personals.store') }}">
            @csrf
            <div class="tab-content">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <!-- Contenido de la pestaña General -->
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido">
                    </div>
                </div>
                <div class="tab-pane fade" id="contacto" role="tabpanel" aria-labelledby="contacto-tab">
                    <!-- Contenido de la pestaña Laboral -->
                    <div class="form-group">
                        <label for="empresa">Empresa:</label>
                        <input type="text" class="form-control" id="empresa" name="empresa">
                    </div>
                    <div class="form-group">
                        <label for="puesto">Puesto:</label>
                        <input type="text" class="form-control" id="puesto" name="puesto">
                    </div>
                </div>
                <div class="tab-pane fade" id="laboral" role="tabpanel" aria-labelledby="laboral-tab">
                    <!-- Contenido de la pestaña Beneficios -->
                    <div class="form-group">
                        <label for="beneficio1">Beneficio 1:</label>
                        <input type="text" class="form-control" id="beneficio1" name="beneficio1">
                    </div>
                    <div class="form-group">
                        <label for="beneficio2">Beneficio 2:</label>
                        <input type="text" class="form-control" id="beneficio2" name="beneficio2">
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

    <!-- Scripts al final de la página -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Otros scripts -->
    <script src="{{ asset('js/ubigeo/ubigeo.js') }}"></script>
    <script src="{{ asset('js/personals/imagen.js') }}"></script>
    <script src="{{ asset('js/personals/curriculum.js') }}"></script>

    <!-- Tu script personalizado va aquí, si es necesario -->
@endsection
