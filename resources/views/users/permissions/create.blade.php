@extends('home')

@section('home')
    <div class="container mt-5">
        <h5 class="mb-4">Crear Permiso</h5>
        <form id="registroForm" method="post" action="{{ route('permissions.store') }}" autocomplete="off">
            @csrf
            <div class="row">
                {{-- 
            @if ($errors->any())
            <div alert alert-danger>
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>

            </div>
            @endif
            --}}
                <div class="col-md-10">

                    <div class="form-group">
                        <label for="nombre">Nombre del Permiso</label>
                        <input id="nombre" type="text" class="form-control" name="name"
                            placeholder="Nombre del permiso" autofocus value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="error text-danger"> {{ $errors->first('name') }}</span>
                        @endif

                    </div>
                </div>


            </div>

            <!-- Segunda fila con tres columnas y un botón -->
            <div class="row">
                <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                    <!-- Botón en la parte derecha con más separación -->
                    @can('permission_create')

                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-3 ">Crear</button>
                    @endcan
                </div>
            </div>
        </form>
    </div>
    {{-- <div class="success-message" id="successMessage" 
style="display: none; /* Inicialmente oculto */
position: fixed;
top: 20px;
right: 20px;
background-color: #28a745;
color: white;
padding: 10px;
border-radius: 5px;
z-index: 1000; /* Asegurar que esté en frente */"
 >¡Guardado con éxito!</div>
 --}}
@endsection
