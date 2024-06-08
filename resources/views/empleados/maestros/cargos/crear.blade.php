@extends('home')

@section('home')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Crear Cargo</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> Por favor, corrige los errores siguientes:<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cargos.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="codigo"><strong>Codigo:</strong></label>
                    <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}">
                </div>
                <div class="form-group">
                    <label for="descripcion"><strong>Descripcion:</strong></label>
                    <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                </div>
                <div class="form-group text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-secondary p-1 mr-2">
                        <i class="fas fa-plus-circle fa-sm m-0 mr-1 text-warning" style="color: #FFD700;"></i> Crear
                    </button>
                    <a href="{{ route('crear-relacion-categoria-cargo') }}" class="btn btn-danger p-1 mr-2" >
                        <i class="fas fa-sign-out-alt fa-sm m-0 mr-1" style="color: #FF6347;"></i> Salir
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    /* Estilo personalizado para separar los botones */
    .btn {
        margin-right: 6rem; /* Ajusta el valor según sea necesario */
    }
</style>
@endsection