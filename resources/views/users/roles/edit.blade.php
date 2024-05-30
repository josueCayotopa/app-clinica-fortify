@extends('home')
@section('home')
    <div class="container mt-5">
        <h5 class="mb-4">Editar Rol</h5>
        <form id="registroForm" method="post" action="{{ route('roles.update',$role->id) }}" autocomplete="off">
            @csrf
        
            @method('put')
            <div class="row">
                
                <div class="col-md-10">

                    <div class="form-group">
                        <label for="nombre">Nombre del Permiso</label>
                        <input id="nombre" type="text" class="form-control" name="name"
                            placeholder="Nombre del permiso" autofocus value="{{ old('name',$role->name) }}">
                        @if ($errors->has('name'))
                            <span class="error text-danger"> {{ $errors->first('name') }}</span>
                        @endif

                    </div>
                </div>


            </div>
            <!-- Lista de permisos -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <h5>Permisos</h5>
                    <div class="form-group">
                        @foreach($permissions as $id=>$permission)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"  name="permissions[]" value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked':''  }}>
                                <label class="form-check-label" for="perm_{{ $id }}" >
                                    {{ $permission }} 
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <!-- Segunda fila con tres columnas y un botón -->
            <div class="row">
                <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                    <!-- Botón en la parte derecha con más separación -->
                    @can('role_index')

                    <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-lg btn-block mt-3">Cancelar</a>
                    @endcan
                    @can('role_edit')

                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-3 ">Guardar</button>
                    @endcan
                </div>
            </div>
        </form>
    </div>

@endsection
