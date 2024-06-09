@extends('home')

@section('home')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="el-row is-justify-space-between row-bg mb-3">
            <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
                <h5>Listado de Tipo Trabajador IPSS</h5>
            </div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
                <button type="button" class="el-button el-button--danger" id="newButton">
                    <span>Nuevo</span>
                </button>
            </div>
        </div>

        <div class="el-table el-table--fit el-table--striped el-table--enable-row-hover el-table--enable-row-transition el-table--layout-fixed"
            style="width: 100%;">
            <div class="el-table__inner-wrapper">
                <div class="el-table__header-wrapper">
                    <table class="el-table__header" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                        <colgroup>
                            <col width="30%">
                            <col width="60%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="el-table__cell">Código</th>
                                <th class="el-table__cell">Descripción</th>
                                <th class="el-table__cell">Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="el-table__body-wrapper">
                    <div class="el-scrollbar">
                        <div class="el-scrollbar__wrap el-scrollbar__wrap--hidden-default">
                            <div class="el-scrollbar__view" style="display: inline-block; vertical-align: middle;">
                                <table class="el-table__body" cellspacing="0" cellpadding="0" border="0"
                                    style="width: 100%;">
                                    <colgroup>
                                        <col width="30%">
                                        <col width="60%">
                                        <col width="10%">
                                    </colgroup>
                                    <tbody>
                                        @foreach ($tipoTrabajadorIpsses as $tipoTrabajadorIpss)
                                            <tr class="el-table__row">
                                                <td class="el-table__cell">{{ $tipoTrabajadorIpss->COD_TRABAJ_IPSS }}</td>
                                                <td class="el-table__cell">{{ $tipoTrabajadorIpss->DES_COD_TRABAJ_IPSS }}
                                                </td>
                                                <td class="el-table__cell"
                                                    style="display: flex; justify-content: flex-end; gap: 5px;">
                                                    <!-- Botón de edición -->
                                                    <button class="el-button el-button--primary el-button--small editButton"
                                                        data-id="{{ $tipoTrabajadorIpss->COD_TRABAJ_IPSS }}">
                                                        <span><i class='bx bx-edit-alt'></i></span>
                                                    </button>

                                                    <!-- Botón de eliminación -->
                                                    <form
                                                        action="{{ route('tipo_trabajador_ipsses.destroy', $tipoTrabajadorIpss->COD_TRABAJ_IPSS) }}"
                                                        method="POST" onsubmit="return confirm('¿Seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="el-button el-button--primary el-button--small deleteButton"
                                                            data-id="{{ $tipoTrabajadorIpss->COD_TRABAJ_IPSS }}">
                                                            <span><i class='bx bxs-x-circle'></i></span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="el-scrollbar__bar is-horizontal" style="display: none;">
                            <div class="el-scrollbar__thumb" style="transform: translateX(0%);"></div>
                        </div>
                        <div class="el-scrollbar__bar is-vertical" style="display: none;">
                            <div class="el-scrollbar__thumb" style="transform: translateY(0%);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="el-pagination is-background el-pagination--small">
            {{ $tipoTrabajadorIpsses->links() }}
        </div>
    </div>

    <!-- Modal Crear -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="createForm" action="{{ route('tipo_trabajador_ipsses.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <header class="el-dialog__header">
                            <span role="heading" aria-level="2" class="el-dialog__title">Tipo Tabajador ESSALUD</span>
                            <button aria-label="el.dialog.close" class="el-dialog__headerbtn" type="button"
                                id="modal-close-button">
                                <i class="el-icon el-dialog__close">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                        <path fill="currentColor"
                                            d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z">
                                        </path>
                                    </svg>
                                </i>
                            </button>
                        </header>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="create_COD_TRABAJ_IPSS">Código</label>
                            <input type="text" name="COD_TRABAJ_IPSS" class="form-control" id="create_COD_TRABAJ_IPSS"
                                required maxlength="2">
                        </div>
                        <div class="form-group">
                            <label for="create_DES_COD_TRABAJ_IPSS">Descripción</label>
                            <input type="text" name="DES_COD_TRABAJ_IPSS" class="form-control"
                                id="create_DES_COD_TRABAJ_IPSS" maxlength="50">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button aria-disabled="false" type="button" class="el-button" id="modal-cancel-button">
                            <span class="">Cancelar</span>
                        </button>
                        <button type="submit" class="el-button el-button--primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Tipo Trabajador IPSS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_COD_TRABAJ_IPSS">Código</label>
                            <input type="text" name="COD_TRABAJ_IPSS" class="form-control" id="edit_COD_TRABAJ_IPSS"
                                required maxlength="2">
                        </div>
                        <div class="form-group">
                            <label for="edit_DES_COD_TRABAJ_IPSS">Descripción</label>
                            <input type="text" name="DES_COD_TRABAJ_IPSS" class="form-control"
                                id="edit_DES_COD_TRABAJ_IPSS" maxlength="50">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar el modal de edición
            $('#editModal').modal();

            // Inicializar el modal de creación
            $('#createModal').modal();

            // Escuchar el evento de clic en el botón para abrir el modal de edición
            document.getElementById('openEditModalButton').addEventListener('click', function() {
                $('#editModal').modal('show');
            });

            // Escuchar el evento de clic en el botón para abrir el modal de creación
            document.getElementById('openCreateModalButton').addEventListener('click', function() {
                $('#createModal').modal('show');
            });
        });
    </script>
@endsection
