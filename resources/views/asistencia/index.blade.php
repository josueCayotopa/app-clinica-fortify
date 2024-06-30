@extends('home')

@section('home')
    {{--<div class="container mt-5">
        <h1 class="mb-4">Lista de Asistencias</h1>

        <!-- Formulario de Búsqueda -->
        <form method="GET" action="#" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre" value="">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Tabla de Asistencias -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Fecha de Asistencia</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <!-- Datos Estáticos -->
            <tr>
                <td>1</td>
                <td>Juan Pérez</td>
                <td>2024-06-25</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Ver</a>
                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>María López</td>
                <td>2024-06-26</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Ver</a>
                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Carlos García</td>
                <td>2024-06-27</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Ver</a>
                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <!-- Más datos estáticos -->
            </tbody>
        </table>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>--}}



    <head>
        <style>
            .table td, .table th {
                vertical-align: middle;
            }
        </style>
    </head>

    <body>
    {{--<div class="container mt-5">
        <h1 class="mb-4">Registro de Asistencias</h1>

        <!-- Tabla de Asistencias -->
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora de Entrada</th>
                <th>Hora de Salida</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <!-- Datos Estáticos -->
            <tr>
                <td>1</td>
                <td>Juan Pérez</td>
                <td>2024-06-25</td>
                <td>
                    <form action="#" method="POST" class="d-flex">
                        <input type="time" name="hora_entrada" class="form-control" value="08:00">
                        <button type="submit" class="btn btn-primary ms-2 btn-register">Registrar</button>
                    </form>
                </td>
                <td>
                    <form action="#" method="POST" class="d-flex">
                        <input type="time" name="hora_salida" class="form-control" value="17:00">
                        <button type="submit" class="btn btn-primary ms-2 btn-register">Registrar</button>
                    </form>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Ver</a>
                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>María López</td>
                <td>2024-06-26</td>
                <td>
                    <form action="#" method="POST" class="d-flex">
                        <input type="time" name="hora_entrada" class="form-control" value="08:15">
                        <button type="submit" class="btn btn-primary ms-2 btn-register">Registrar</button>
                    </form>
                </td>
                <td>
                    <form action="#" method="POST" class="d-flex">
                        <input type="time" name="hora_salida" class="form-control" value="17:05">
                        <button type="submit" class="btn btn-primary ms-2 btn-register">Registrar</button>
                    </form>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Ver</a>
                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Carlos García</td>
                <td>2024-06-27</td>
                <td>
                    <form action="#" method="POST" class="d-flex">
                        <input type="time" name="hora_entrada" class="form-control" value="08:30">
                        <button type="submit" class="btn btn-primary ms-2 btn-register">Registrar</button>
                    </form>
                </td>
                <td>
                    <form action="#" method="POST" class="d-flex">
                        <input type="time" name="hora_salida" class="form-control" value="17:10">
                        <button type="submit" class="btn btn-primary ms-2 btn-register">Registrar</button>
                    </form>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">Ver</a>
                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>--}}

    <div class="container mt-5">
        <h1 class="mb-4">Registro de Asistencias</h1>

        <!-- Tabla de Asistencias -->
        <form action="{{ route('asistencia.import') }} " method="POST" enctype="multipart/form-data" class="container mt-5">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Subir archivo de asistencia</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cargar Asistencia</button>
        </form>
        <div class="container mt-5">
            <h2 class="mb-4">Registros de Asistencia</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Empleado</th>
                        <th>Fecha</th>
                        <th>Hora de Entrada</th>
                        <th>Hora de Salida</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asistencias as $asistencia)
                        <tr>
                            <td>{{ $asistencia->empleado_id }}</td>
                            <td>{{ $asistencia->fecha->format('d-m-Y') }}</td>
                            <td>{{ $asistencia->hora_entrada }}</td>
                            <td>{{ $asistencia->hora_salida }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </body>
@endsection
