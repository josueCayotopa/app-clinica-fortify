@extends('layouts.home')
@section('main')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('asistencias.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="fecha" class="form-control" value="{{ $fecha }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
                <div class="col-md-6 text-right">
                    <form method="POST" action="{{ route('asistencias.marcarTodos') }}">
                        @csrf
                        <input type="hidden" name="fecha" value="{{ $fecha }}">
                        <button type="submit" class="btn btn-success">Marcar Todos como Asistidos</button>
                    </form>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asistencias as $asistencia)
                    <tr>
                        <td>{{ $asistencia->trabajador->nombre }}</td>
                        <td>{{ $asistencia->fecha }}</td>
                        <td>{{ $asistencia->hora_entrada }}</td>
                        <td>{{ $asistencia->hora_salida }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
