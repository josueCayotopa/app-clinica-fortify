@extends('home')

@section('home')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card w-75">
            <div class="card-header">
                <h3 class="card-title text-center">Crear Categoría y Cargo</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('guardar-relacion-categoria-cargo') }}" method="POST">
                    @csrf

                    <!-- Fila para Código Categoría y Descripción Categoría -->
                    <div class="row">
                        <label for="categoria_id">Categoria:</label>
                        
                        <div class="form-group col-md-6">
                            <label for="codigo_categoria">Código Categoría:</label>
                            <input type="text" name="codigo_categoria" id="codigo_categoria" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descripcion_categoria">Descripción Categoría:</label>
                            <input type="text" name="descripcion_categoria" id="descripcion_categoria" class="form-control" required>
                        </div>
                    </div>

                    <!-- Fila para Nivel, Factor Hora Extra y Factor Día Viaje -->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="nivel_categoria">Nivel:</label>
                            <input type="text" name="nivel_categoria" id="nivel_categoria" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="factor_hora_extra">Factor Hora Extra:</label>
                            <input type="text" name="factor_hora_extra" id="factor_hora_extra" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="factor_dia_viaje">Factor Día Viaje:</label>
                            <input type="text" name="factor_dia_viaje" id="factor_dia_viaje" class="form-control" required>
                        </div>
                    </div>

                    <!-- Selección de Cargo -->
             <div class="row">
              <div class="col-md-8">
                    <div class="form-group">
                        <br>
                        <label for="cargo_id">Cargo:</label>
                        <div class="scroll-container" style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Código</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cargos as $cargo)
                                        <tr>
                                            <td>
                                                <input type="radio" name="cargo_id" value="{{ $cargo->id }}" required>
                                            </td>
                                            <td>{{ $cargo->codigo }}</td>
                                            <td>{{ $cargo->descripcion }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex flex-column justify-content-start">
                        <br> <br> 
                        <button type="button" class="btn btn-secondary btn-sm mb-2 px-000" style="width: fit-content;" onclick="location.href='{{ route('cargos.create') }}'">
                            <i class="fas fa-plus-circle fa-lg text-warning" style="color: #FFD700;"></i>
                        </button>
                        
                    </div>
                </div>
            </div>   


                    <!-- Botones de acción -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Crear</button>
                        <a href="{{ route('categoria-cargo.indexcargocategoria') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Estilo para hacer la barra de desplazamiento más angosta */
        .scroll-container::-webkit-scrollbar {
            width: 6px;  /* Cambiar el ancho aquí */
        }

        .scroll-container::-webkit-scrollbar-thumb {
            background-color: #888; 
            border-radius: 10px;
        }

        .scroll-container::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        .scroll-container::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
    </style>
@endsection