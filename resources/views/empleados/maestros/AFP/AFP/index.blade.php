@extends('home')

@section('home')
    <div class="container mt-5">
        <div id="messages">
            @include('layouts.messege')
        </div>
        <div class="el-row is-justify-space-between row-bg mb-3">
            <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
                <h5>Listado de Afp</h5>
            </div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
                <a href="{{ route('afp.descuentos.create') }}" class="el-button el-button--danger">Crear</a>
            </div>
        </div>
        <div class="el-row is-justify-space-between row-bg">
            <div class="col-lg-4"><br>
                <div class="el-input el-input--prefix" style="width: 100%;">
                    <div class="el-input__wrapper" tabindex="-1">
                        <span class="el-input__prefix">
                            <span class="el-input__prefix-inner">
                                <i class="el-icon el-input__icon"></i>
                            </span>
                        </span>
                        <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Buscar"
                            id="el-id-4745-11" spellcheck="false" data-ms-editor="true">
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-3">
                <br>
                <button aria-disabled="false" type="button" class="el-button el-button--success">
                    <span class="">Generar Excel</span>
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Fecha de Baja</th>
                        <th>Año de Proceso</th>
                        <th>Mes de Proceso</th>
                        <th>Descripción</th>
                        <th>Porcentaje de Descuento</th>
                        <th>Importe Tope</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($afpDescuentos as $afpDescuento)
                        <tr>
                            <td>{{ $afpDescuento->afp->codigo }}</td>
                            <td>{{ $afpDescuento->afp->nombre }}</td>
                            <td>{{ $afpDescuento->afp->estado ? 'Activo' : 'Inactivo' }}</td>
                            <td>{{ $afpDescuento->afp->fecha_baja }}</td>
                            <td>{{ $afpDescuento->tipoDescuento->anio_proceso }}</td>
                            <td>{{ $afpDescuento->tipoDescuento->mes_proceso }}</td>
                            <td>{{ $afpDescuento->tipoDescuento->descripcion }}</td>
                            <td>{{ $afpDescuento->tipoDescuento->porcentaje_descuento }}</td>
                            <td>{{ $afpDescuento->tipoDescuento->importe_tope }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <form action="#" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-custom" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-id="{{ $afpDescuento->id }}"
                                            style="margin: 0 2px;"><i class='bx bxs-user-x'></i></button>
                                    </form>
                                    <a href="{{ route('editar.afp.descuento', $afpDescuento->id) }}"
                                        class="btn btn-warning btn-custom" style="margin: 0 2px;"><i
                                            class='bx bx-edit-alt'></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar este descuento AFP?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var form = deleteModal.querySelector('#deleteForm');
                form.action = "/afpDescuentos/" + id;
            });
        });
    </script>
@endsection
