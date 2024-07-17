@extends('layouts.home')
@section('main')
<div class="container mt-5">
    <div class="el-row is-justify-space-between row-bg">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Solicitud</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            @can('user_create')
                <button class="el-button el-button--danger" id="new-button">Nuevo <span><i
                            class='bx bx-user-plus'></i></span></button>
            @endcan

        </div>
    </div>
    <div class="el-row is-justify-space-between row-bg">
        <div class="col-lg-4"><br>
            <div class="el-input el-input--prefix" style="width: 100%;">
                <div class="el-input__wrapper" tabindex="-1">
                    <span class="el-input__prefix">
                        <span class="el-input__prefix-inner">
                            <i class='bx bx-search-alt-2'></i>
                        </span>
                    </span>
                    <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Buscar"
                        id="search-input" spellcheck="false" data-ms-editor="true">
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-3">
            <br>
            <button class="el-button el-button--success" id="export-button">Generar Ecxel</button>
           
        </div>
        <div class="col-lg-4">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo de Suspensión</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($licencias as $licencia)
                <tr>
                    <td>{{ $licencia->id }}</td>
                    <td>{{ optional($licencia->trabajador)->nombres }}</td>
                    <td>{{ optional($licencia->trabajador)->apellido_paterno }}</td>
                    <td>{{ optional($licencia->tipoSuspension)->descripcion }}</td>
                    <td>{{ $licencia->fecha_inicio }}</td>
                    <td>{{ $licencia->fecha_fin }}</td>
                    <td>{{ $licencia->descripcion }}</td>
                    <td text-right>
                        <div class="action-buttons" style="display: flex; justify-content: flex-end; gap: 5px;">


                            @can('user_edit')
                                <a href=" {{ route('licencias.edit', $licencia->id) }}"
                                    class="el-button el-button--primary el-button--small editButton">
                                    <span><i class='bx bx-edit-alt'></i></span>
                                </a>
                            @endcan
                            @can('user_create')
                                <div>
                                    <form action="{{ route('licencias.destroy', $licencia->id) }}" method="POST"
                                        onsubmit="return confirm('seguro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="el-button el-button--primary el-button--small" type="submit" style="margin: 0 2px;">
                                            <span><span><i class='bx bxs-x-circle'></i></span>

                                        </button>
                                    </form>

                                </div>
                            @endcan

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    document.getElementById('new-button').addEventListener('click', function() {
        window.location.href = '{{ route('licencias.create') }}';
    });
   
   
    document.getElementById('search-input').addEventListener('input', function() {
        const search = this.value;
        fetch(`{{ route('licencias.index') }}?search=${search}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('empresas-table').innerHTML = new DOMParser().parseFromString(html,
                    'text/html').querySelector('#empresas-table').innerHTML;
            });
    });
</script>
@endsection
