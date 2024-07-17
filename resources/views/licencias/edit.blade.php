@extends('layouts.home')
@section('main')
<div class="container mt-5">
    <h5>Editar Licencia</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('licencias.update', $licencia->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="{{ $licencia->descripcion }}">
        </div>
        <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{ $licencia->fecha_inicio }}">
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha de Fin</label>
            <input type="date" name="fecha_fin" class="form-control" value="{{ $licencia->fecha_fin }}">
        </div>
        <div class="form-group">
            <label for="tipo_suspencion_id">Suspensión<span class="campo-obligatorio">*</span></label>
            <select class="form-control" id="tipo_suspencion_id" name="tipo_suspencion_id">
                <option value="" disabled>Selecciona un Tipo</option>
                @foreach ($tipoSuspension as $id => $descripcion)
                    <option value="{{ $id }}" {{ old('tipo_suspencion_id', $licencia->tipo_suspencion_id) == $id ? 'selected' : '' }}>
                        {{ $descripcion }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('tipo_suspencion_id'))
                <span class="error text-danger">{{ $errors->first('tipo_suspencion_id') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('licencias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
