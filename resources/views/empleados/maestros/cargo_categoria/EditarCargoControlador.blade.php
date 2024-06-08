@extends('home')

@section('home')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card w-85">
        <div class="card-header">
            <h3 class="card-title text-center">Editar Relación entre Categoría y Cargo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('actualizar-relacion-categoria-cargo', $categoriaCargo->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campos de Categoría -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="codigo_categoria">Código Categoría:</label>
                        <input type="text" name="codigo_categoria" id="codigo_categoria" class="form-control" value="{{ $categoria->codigo }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="descripcion_categoria">Descripción Categoría:</label>
                        <input type="text" name="descripcion_categoria" id="descripcion_categoria" class="form-control" value="{{ $categoria->descripcion }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nivel_categoria">Nivel:</label>
                        <input type="text" name="nivel_categoria" id="nivel_categoria" class="form-control" value="{{ $categoria->nivel }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="factor_hora_extra">Factor Hora Extra:</label>
                        <input type="text" name="factor_hora_extra" id="factor_hora_extra" class="form-control" value="{{ $categoria->factor_hora_extra }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="factor_dia_viaje">Factor Día Viaje:</label>
                        <input type="text" name="factor_dia_viaje" id="factor_dia_viaje" class="form-control" value="{{ $categoria->factor_dia_viaje }}">
                    </div>
                </div>

                <!-- Tabla de Cargos -->
                <div class="form-group">
                    <br>
                    <label for="selected_cargo_id">Cargos:</label>
                </div>
                <div class="scroll-container" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Código Cargo</th>
                                <th>Descripción Cargo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cargos as $cargo)
                            <tr>
                                <td>
                                    <input type="radio" name="selected_cargo_id" value="{{ $cargo->id }}" {{ $cargo->id == $categoriaCargo->cargo_id ? 'checked' : '' }} required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="codigo_cargo[{{ $cargo->id }}]" value="{{ $cargo->codigo }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="descripcion_cargo[{{ $cargo->id }}]" value="{{ $cargo->descripcion }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Botones de acción -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('categoria-cargo.indexcargocategoria') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection