@extends('home')

@section('home')
<div class="container mt-5">
    <h5 class="mb-4">Editar Usuario</h5>
    <form id="registroForm" method="post" action="{{ route('users.update', $user->id) }}" autocomplete="off">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text"
                    value="{{ old('name',$user->name) }}"
                                        class="form-control"  name="name"
                                         required  autofocus>
                                         @if ($errors->has('name'))
                    <span class="error text-danger"  > {{ $errors->first('name') }}</span>
                        
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text"  required class="form-control"
                        value="{{ old('username', $user->username) }}"
                        name="username">
                        @if ($errors->has('username'))
                        <span class="error text-danger"  > {{ $errors->first('username') }}</span>
                            
                        @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input type="email"  class="form-control"  value="{{ old('email',$user->email) }}" autocapitalize="none" name="email">
                    @if ($errors->has('email'))
                    <span class="error text-danger"  > {{ $errors->first('email') }}</span>
                        
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                
                    <div class="form-group">
                        <label for="nombres">Contraseña</label>
                        <input type="password" id="password" class="form-control" autocomplete="new-password"
                            autocapitalize="none" placeholder="Contraseña" name="password">
                        @if ($errors->has('password'))
                            <span class="error text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                  


            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombres">Confirmar Contraseña</label>
                        <input type="password" id="confirmPassword" class="form-control" autocomplete="new-password"
                            autocapitalize="none" placeholder="Confirmar Contraseña" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="error text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif


                   
                </div>
            </div>
            <div class="col-md-4">
                <!-- Lista de permisos -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h5>Roles</h5>
                        <div class="form-group">
                            @foreach ($roles as $id => $role)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]"
                                    value="{{ $id }}" {{ $user->roles->contains($id)? 'checked':'' }}
                                >
                                    <label class="form-check-label" >
                                        {{ $role }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
           
        </div>
        <!-- Segunda fila con tres columnas y un botón -->
        <div class="row">  
            <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                <!-- Botón en la parte derecha con más separación -->
                
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg btn-block mt-3">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-lg btn-block mt-3 ">Guardar Cambios</button>
            </div>
           
        </div>
    </form>
</div>

 
@endsection