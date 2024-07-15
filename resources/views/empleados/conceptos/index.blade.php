@extends('layouts.home')
@section('main')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="el-row is-justify-space-between row-bg mb-3">
            <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
                <h5>Listado de Concepto</h5>
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
                            <col width="10%">
                            <col width="20%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="el-table__cell">Código</th>
                                <th class="el-table__cell">Descripción</th>
                                <th class="el-table__cell">Essalud Seguro Regular Trabajador</th>
                                <th class="el-table__cell">Essalud CBSSP Seg Trab Pesquero</th>
                                <th class="el-table__cell">Essalud Seguro Agrario Acuicultor</th>
                                <th class="el-table__cell">Essalud SCTR</th>
                                <th class="el-table__cell">Senati</th>
                                <th class="el-table__cell">Sistema Nacional de Pensiones 1999</th>
                                <th class="el-table__cell">Acciones</th>
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
                                        <col width="10%">
                                        <col width="20%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                        <col width="10%">
                                    </colgroup>
                                    <tbody>
                                        @foreach ($conceptos as $concepto)
                                            <tr class="el-table__row">
                                                <td class="el-table__cell">{{ $concepto->codigo }}</td>
                                                <td class="el-table__cell">{{ $concepto->descripcion }}</td>
                                                <td class="el-table__cell">
                                                    <button
                                                        class="btn {{ $concepto->essalud_seguro_regular_trabajador == '1' ? 'btn-success' : 'btn-danger' }} btn-sm">
                                                        {{ $concepto->essalud_seguro_regular_trabajador == '1' ? 'OK' : 'N/A' }}
                                                    </button>
                                                </td>
                                                <td class="el-table__cell">
                                                    <button
                                                        class="btn {{ $concepto->essalud_cbssp_seg_trab_pesquero == '1' ? 'btn-success' : 'btn-danger' }} btn-sm">
                                                        {{ $concepto->essalud_cbssp_seg_trab_pesquero == '1' ? 'OK' : 'N/A' }}
                                                    </button>
                                                </td>
                                                <td class="el-table__cell">
                                                    <button
                                                        class="btn {{ $concepto->essalud_seguro_agrario_acuicultor == '1' ? 'btn-success' : 'btn-danger' }} btn-sm">
                                                        {{ $concepto->essalud_seguro_agrario_acuicultor == '1' ? 'OK' : 'N/A' }}
                                                    </button>
                                                </td>
                                                <td class="el-table__cell">
                                                    <button
                                                        class="btn {{ $concepto->essalud_sctr == '1' ? 'btn-success' : 'btn-danger' }} btn-sm">
                                                        {{ $concepto->essalud_sctr == '1' ? 'OK' : 'N/A' }}
                                                    </button>
                                                </td>
                                                <td class="el-table__cell">
                                                    <button
                                                        class="btn {{ $concepto->senati == '1' ? 'btn-success' : 'btn-danger' }} btn-sm">
                                                        {{ $concepto->senati == '1' ? 'OK' : 'N/A' }}
                                                    </button>
                                                </td>
                                                <td class="el-table__cell">
                                                    <button
                                                        class="btn {{ $concepto->sistema_nacional_de_pensiones_1999 == '1' ? 'btn-success' : 'btn-danger' }} btn-sm">
                                                        {{ $concepto->sistema_nacional_de_pensiones_1999 == '1' ? 'OK' : 'N/A' }}
                                                    </button>
                                                </td>
                                                <td class="el-table__cell"
                                                    style="display: flex; justify-content: flex-end; gap: 5px;">
                                                    <!-- Botón de edición -->
                                                    <a href="{{ route('conceptos.edit', $concepto->id) }}"
                                                        class="el-button el-button--primary el-button--small">
                                                        <i class='bx bx-edit-alt'></i>
                                                    </a>

                                                    <!-- Botón de eliminación -->
                                                    <form action="{{ route('conceptos.destroy', $concepto->id) }}"
                                                        method="POST" onsubmit="return confirm('¿Seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="el-button el-button--primary el-button--small deleteButton"
                                                            data-id="{{ $concepto->id }}">
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
            {{ $conceptos->links() }}
        </div>
    </div>

    <script>
        document.getElementById('newButton').addEventListener('click', function() {
            window.location.href = '{{ route('conceptos.create') }}';
        });
       
    </script>
@endsection
