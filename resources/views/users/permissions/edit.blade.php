@extends('home')
@section('home')
    <div class="container mt-5">
        <h5 class="mb-4">Crear Permiso</h5>
        <form id="registroForm" method="post" action="{{ route('permissions.update',$permission->id) }}" autocomplete="off">
            @csrf
        
            @method('put')
            <div class="row">
                
                <div class="col-md-10">

                    <div class="form-group">
                        <label for="nombre">Nombre del Permiso</label>
                        <input id="nombre" type="text" class="form-control" name="name"
                            placeholder="Nombre del permiso" autofocus value="{{ old('name',$permission->name) }}">
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
                  
                    @can('permission_index')
                    
                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary btn-lg btn-block mt-3">Cancelar</a>
                    @endcan
                    @can('permission_edit')

                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-3 ">Guardar</button>
                    
                    @endcan

                </div>
            </div>
        </form>
    </div>

@endsection
