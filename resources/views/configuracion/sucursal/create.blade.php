@extends('home')

@section('home')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="datos-empresa-tab" data-toggle="tab" href="#datos-empresa">Datos de
                       Sucursal</a>
                </li>
                
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="datos-empresa"> 
                        <form id="form-datos-empresa"method="post" action="{{ route('sucursales.store') }}" autocomplete="off">
                            @csrf
                            <div class="row">
                               
                                <div class="col-md-4">
                
                                    <div class="form-group">
                                        <label for="nombre">Nombre de Sucursal</label>
                                        <input id="nombre_sucursal" type="text" class="form-control" name="nombre_sucursal" placeholder="Nombre de  sucursal"
                                            autofocus value="{{ old('nombre_sucursalname') }}">
                                        @if ($errors->has('nombre_sucursal'))
                                            <span class="error text-danger"> {{ $errors->first('nombre_sucursal') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                
                
                                        <input type="text" class="form-control" placeholder="Telefono" name="telefono"
                                            value="{{ old('telefono') }}">
                                        @if ($errors->has('telefono'))
                                            <span class="error text-danger"> {{ $errors->first('telefono') }}</span>
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


               
            </div>


          
        </div>
    </div>


    <script src="{{ asset('js/tabs.js') }}"></script>
    <script src="{{ asset('/js/ubigeo/select.js') }}"></script>
@endsection
