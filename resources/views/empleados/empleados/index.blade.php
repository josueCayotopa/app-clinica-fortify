@extends('home')

@section('home')
    <div class="container mt-5">
        @include('layouts.messege')

        <div class="el-row is-justify-space-between row-bg mb-3">
            <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
                <h5>Listado de Personal</h5>
            </div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
                <button type="button" class="el-button el-button--danger" id="nuevoPersonalBtn">
                    <span>Nuevo</span>
                </button>
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

        <div class="el-table el-table--fit el-table--striped el-table--enable-row-hover el-table--enable-row-transition el-table--layout-fixed"
            style="width: 100%;">
            <div class="el-table__inner-wrapper">
                <div class="el-table__header-wrapper">
                    <table class="el-table__header" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                        <colgroup>
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="el-table__cell">Código</th>
                                <th class="el-table__cell">Nombre Empresa</th>
                                <th class="el-table__cell">Nombre Corto</th>
                                <th class="el-table__cell">Tipo Concepto</th>
                                <th class="el-table__cell">Cuenta</th>
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
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="10%">
                                    </colgroup>
                                    <tbody>
                                        @foreach ($personals as $personal)
                                            <tr class="el-table__row">
                                                <td class="el-table__cell">{{ $personal->numero_documento }}</td>
                                                <td class="el-table__cell">{{ $personal->fecha_nacimiento }} </td>
                                                <td class="el-table__cell">{{ $personal->nombres }} </td>
                                                <td class="el-table__cell">{{ $personal->telefono }} </td>
                                                <td class="el-table__cell">{{ $personal->referencia }} </td>
                                                <td class="el-table__cell">{{ $personal->fecha_inscripcion_regimen }} </td>
                                                <td class="el-table__cell"
                                                    style="display: flex; justify-content: flex-end; gap: 5px;">
                                                    <!-- Botón de edición -->

                                                    @can('user_edit')
                                                        <a href=" {{ route('personals.edit', $sucursal->id) }}"
                                                            class="el-button el-button--primary el-button--small editButton">
                                                            <span><i class='bx bx-edit-alt'></i></span>
                                                        </a>
                                                    @endcan

                                                    <!-- Botón de eliminación -->
                                                    <form action="{{ route('presonals.destroy', $personal->id) }}"
                                                        method="POST" onsubmit="return confirm('¿Seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="el-button el-button--primary el-button--small deleteButton"
                                                            data-id="{{ $personal->id }}">
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
            {{ $personals->links() }}
        </div>
    </div>

    <!-- Modal de creación de nuevo personal -->
    <script src="{{ asset('/js/ubigeo/ubigeo.js') }}"></script>

    <script src="{{ asset('/js/personals/imagen.js') }}"></script>
    <script src="{{ asset('/js/personals/curriculum.js') }}"></script>


    <script>
        document.getElementById('nuevoPersonalBtn').addEventListener('click', function() {
            window.location.href = '{{ route('personals.create') }}';
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
