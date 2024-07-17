@extends('layouts.home')
@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="datos-empresa-tab" data-toggle="tab" href="#datos-empresa">Datos de Licencia</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="datos-empresa">
                    <form id="form-datos-empresa" method="POST" action="{{ route('licencias.store') }}" autocomplete="off">
                        @csrf
                        <div class="row">
                            <!-- Buscador por número de documento y nombre -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="numero_documento">Buscar por Número de Documento</label>
                                    <input type="text" id="numero_documento" class="form-control" placeholder="Número de Documento">
                                    <label for="nombre">o Nombre</label>
                                    <input type="text" id="nombre" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <!-- Campos del formulario -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="trabajador_id">Trabajador ID</label>
                                    <input type="text" name="trabajador_id" id="trabajador_id" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 mb-1">
                                <div class="form-group">
                                    <label for="tipo_suspencion_id">Suspencion<span
                                            class="campo-obligatorio">*</span></label>
                                    <select class="form-control" id="tipo_suspencion_id" name="tipo_suspencion_id">
                                        @foreach ($tipoSuspension as $id => $tipoSuspension)
                                            <option value="{{ $id }}"
                                                {{ old('tipo_suspencion_id') == $id ? 'selected' : '' }}>
                                                {{ $tipoSuspension }}</option>
                                        @endforeach
                                        <option value="" disabled>Selecciona un Tipo</option>
                                    </select>
                                    @if ($errors->has('tipo_suspencion_id'))
                                        <span class="error text-danger">
                                            {{ $errors->first('tipo_suspencion_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_inicio">Fecha Inicio</label>
                                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_fin">Fecha Fin</label>
                                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Botón para guardar -->
                        <div class="row">
                            <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-success">Solicitar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#numero_documento, #nombre').on('input', function() {
        var numero_documento = $('#numero_documento').val();
        var nombre = $('#nombre').val();
        if (numero_documento.length > 0 || nombre.length > 0) {
            $.ajax({
                url: '/api/trabajadores',
                type: 'GET',
                data: {
                    numero_documento: numero_documento,
                    nombre: nombre
                },
                success: function(data) {
                    if (data.trabajador) {
                        $('#trabajador_id').val(data.trabajador.id);
                    } else {
                        $('#trabajador_id').val('');
                    }
                }
            });
        } else {
            $('#trabajador_id').val('');
        }
    });
});
</script>
@endsection
