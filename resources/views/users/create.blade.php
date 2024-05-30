@extends('home')

@section('home')
    <div class="container mt-5">
        <h5 class="mb-4">Crear Usuario</h5>
        <form id="registroForm" method="post" action="{{ route('users.store') }}" autocomplete="off">
            @csrf
            <div class="row">
               
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" type="text" class="form-control" name="name" placeholder="Nombre"
                            autofocus value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="error text-danger"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>


                        <input type="text" class="form-control" placeholder="Usuario" name="username"
                            value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <span class="error text-danger"> {{ $errors->first('username') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input type="email" class="form-control" placeholder="email" autocapitalize="none" name="email"
                            value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="error text-danger"> {{ $errors->first('email') }}</span>
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
                                        value="{{ $id }}"
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
                    @can('user_create')
                        
                    
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
