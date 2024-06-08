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
                    <form id="form-datos-empresa" method="POST" action="{{ route('sucursales.store') }}"
                        autocomplete="0off">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="empresa_id">Empresa</label>
                                    <select class="form-control" id="empresa_id" name="empresa_id" required>
                                        @foreach ($empresas as $id => $nombre_comercial)
                                            <option value="{{ $id }}"
                                                {{ old('empresa_id', $sucursal->empresa_id ?? '') == $id ? 'selected' : '' }}>
                                                {{ $nombre_comercial }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('empresa_id'))
                                        <span class="text-danger">{{ $errors->first('empresa_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nombre_sucursal">Nombre de Sucursal</label>
                                    <input id="nombre_sucursal" type="text" class="form-control" name="nombre_sucursal"
                                        placeholder="Nombre de sucursal" value="{{ old('nombre_sucursal') }}" required>
                                    @if ($errors->has('nombre_sucursal'))
                                        <span class="error text-danger">{{ $errors->first('nombre_sucursal') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="text" class="form-control" placeholder="Telefono" name="telefono"
                                        value="{{ old('telefono') }}" required>
                                    @if ($errors->has('telefono'))
                                        <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="email" class="form-control" placeholder="Correo Electrónico"
                                        name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="error text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" class="form-control" placeholder="Fax" name="fax"
                                        value="{{ old('fax') }}" required>
                                    @if ($errors->has('fax'))
                                        <span class="error text-danger">{{ $errors->first('fax') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha de Inicio</label>
                                    <input type="text" class="form-control datepicker" id="fecha_inicio"
                                        placeholder="yyyy-mm-dd" name="fecha_inicio"
                                        value="{{ old('fecha_inicio', $sucursal->fecha_inicio ?? '') }}" required
                                        autocomplete="off">
                                    @if ($errors->has('fecha_inicio'))
                                        <span class="text-danger">{{ $errors->first('fecha_inicio') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="departamento_id">Departamento</label>
                                    <select class="form-control" id="departamento_id" name="departamento_id" required>
                                        <option value="" disabled {{ old('departamento_id') ? '' : 'selected' }}>
                                            Selecciona un Departamento</option>
                                        @foreach ($departamentos as $id => $descripcion)
                                            <option value="{{ $id }}"
                                                {{ old('departamento_id', $sucursal->departamento_id ?? '') == $id ? 'selected' : '' }}>
                                                {{ $descripcion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('departamento_id'))
                                        <span class="error text-danger">{{ $errors->first('departamento_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="provincia_id">Provincia</label>
                                    <select class="form-control" id="provincia_id" name="provincia_id"
                                        {{ old('provincia_id') ? '' : 'disabled' }} required>
                                        <option value="" disabled {{ old('provincia_id') ? '' : 'selected' }}>
                                            Selecciona una Provincia</option>
                                    </select>
                                    @if ($errors->has('provincia_id'))
                                        <span class="error text-danger">{{ $errors->first('provincia_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="distrito_id">Distrito</label>
                                    <select class="form-control" id="distrito_id" name="distrito_id"
                                        {{ old('distrito_id') ? '' : 'disabled' }} required>
                                        <option value="" disabled {{ old('distrito_id') ? '' : 'selected' }}>
                                            Selecciona un Distrito</option>
                                    </select>
                                    @if ($errors->has('distrito_id'))
                                        <span class="error text-danger">{{ $errors->first('distrito_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="zona_id">Zona</label>
                                    <select class="form-control" id="zona_id" name="zona_id" required>
                                        <option value="" disabled {{ old('zona_id') ? '' : 'selected' }}>Selecciona
                                            una Zona</option>
                                        @foreach ($zonas as $id => $zona)
                                            <option value="{{ $id }}"
                                                {{ old('zona_id') == $id ? 'selected' : '' }}>{{ $zona }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('zona_id'))
                                        <span class="error text-danger">{{ $errors->first('zona_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="via_id">Vía</label>
                                    <select class="form-control" id="via_id" name="via_id" required>
                                        <option value="" disabled {{ old('via_id') ? '' : 'selected' }}>Selecciona
                                            una Vía</option>
                                        @foreach ($vias as $id => $via)
                                            <option value="{{ $id }}"
                                                {{ old('via_id') == $id ? 'selected' : '' }}>{{ $via }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('via_id'))
                                        <span class="error text-danger">{{ $errors->first('via_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label for="des_direccion">Direccion</label>
                                    <input type="text" class="form-control" placeholder="Direccion"
                                        name="des_direccion" value="{{ old('des_direccion') }}" required>
                                    @if ($errors->has('des_direccion'))
                                        <span class="error text-danger">{{ $errors->first('des_direccion') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <div class="btn-group btn-group-toggle btn-sm" data-toggle="buttons">
                                        <label
                                            class="btn btn-outline-success btn-sm {{ old('estado', $sucursal->estado ?? 1) == 1 ? 'active' : '' }}">
                                            <input type="radio" name="estado" value="1" autocomplete="off"
                                                {{ old('estado', $sucursal->estado ?? 1) == 1 ? 'checked' : '' }}> Activo
                                        </label>
                                        <label
                                            class="btn btn-outline-danger btn-sm {{ old('estado', $sucursal->estado ?? 1) == 0 ? 'active' : '' }}">
                                            <input type="radio" name="estado" value="0" autocomplete="off"
                                                {{ old('estado', $sucursal->estado ?? 1) == 0 ? 'checked' : '' }}> Inactivo
                                        </label>
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
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            var oldDepartamentoId = '{{ old('departamento_id') }}';
            var oldProvinciaId = '{{ old('provincia_id') }}';
            var oldDistritoId = '{{ old('distrito_id') }}';

            if (oldDepartamentoId) {
                loadProvincias(oldDepartamentoId, oldProvinciaId);
            }

            if (oldProvinciaId) {
                loadDistritos(oldProvinciaId, oldDistritoId);
            }

            $('#departamento_id').on('change', function() {
                var departamentoId = $(this).val();
                loadProvincias(departamentoId);
            });

            $('#provincia_id').on('change', function() {
                var provinciaId = $(this).val();
                loadDistritos(provinciaId);
            });

            function loadProvincias(departamentoId, selectedProvinciaId = null) {
                if (departamentoId) {
                    $.ajax({
                        url: '{{ url('getProvincias') }}/' + departamentoId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#provincia_id').empty().prop('disabled', false).append(
                                '<option value="" disabled selected>Selecciona una Provincia</option>'
                            );
                            $('#distrito_id').empty().prop('disabled', true).append(
                                '<option value="" disabled selected>Selecciona un Distrito</option>'
                            );
                            $.each(data, function(key, value) {
                                $('#provincia_id').append('<option value="' + key + '"' + (
                                        selectedProvinciaId == key ? ' selected' : '') +
                                    '>' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#provincia_id').empty().prop('disabled', true).append(
                        '<option value="" disabled selected>Selecciona una Provincia</option>');
                    $('#distrito_id').empty().prop('disabled', true).append(
                        '<option value="" disabled selected>Selecciona un Distrito</option>');
                }
            }

            function loadDistritos(provinciaId, selectedDistritoId = null) {
                if (provinciaId) {
                    $.ajax({
                        url: '{{ url('getDistritos') }}/' + provinciaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#distrito_id').empty().prop('disabled', false).append(
                                '<option value="" disabled selected>Selecciona un Distrito</option>'
                            );
                            $.each(data, function(key, value) {
                                $('#distrito_id').append('<option value="' + key + '"' + (
                                        selectedDistritoId == key ? ' selected' : '') +
                                    '>' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#distrito_id').empty().prop('disabled', true).append(
                        '<option value="" disabled selected>Selecciona un Distrito</option>');
                }
            }
        });
    </script>
@endsection
