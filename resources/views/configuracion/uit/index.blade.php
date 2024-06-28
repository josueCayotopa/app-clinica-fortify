
    <div class="container mt-5">
        @include('layouts.messege')
        <div class="el-row is-justify-space-between row-bg">
            <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
                <h5>Listado de UIT</h5>
            </div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">

                <button aria-disabled="false" type="button" class="el-button el-button--danger" id="new-button">
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
                                <i class="el-icon el-input__icon">

                                </i>
                            </span>
                        </span>
                        <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Buscar"
                            id="el-id-4745-11" spellcheck="false" data-ms-editor="true">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-3">
                <br>
                <button aria-disabled="false" type="button" class="el-button el-button--success"><!--v-if-->
                    <span class="">Generar Excel</span>
                </button>
            </div>
        </div>

        <div class="row my-3"></div>


        <div class="el-table--fit el-table--striped el-table--enable-row-hover el-table--enable-row-transition el-table el-table--layout-fixed is-scrolling-none"
            data-prefix="el" style="width: 100%;">
            <div class="el-table__inner-wrapper">
                <div class="hidden-columns">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div><button aria-disabled="false" type="button"
                            class="el-button el-button--primary el-button--small"><i class="el-icon"><svg
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                    <path fill="currentColor"
                                        d="m795.904 750.72 124.992 124.928a32 32 0 0 1-45.248 45.248L750.656 795.904a416 416 0 1 1 45.248-45.248zM480 832a352 352 0 1 0 0-704 352 352 0 0 0 0 704">
                                    </path>
                                </svg></i><span class=""></span></button></div>
                    <div></div>
                    <div></div>
                    <div><button aria-disabled="false" type="button"
                            class="el-button el-button--primary el-button--small"><!--v-if--><span
                                class="">Editar</span></button></div>

                </div>
                <div class="el-table__header-wrapper">
                    <table class="el-table__header" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                        <colgroup>
                            <col name="el-table_1_column_1" width="70">
                            <col name="el-table_1_column_2" width="80">

                            <col name="el-table_1_column_7" width="90">
                        </colgroup>
                        <thead class="">
                            <tr class="">
                                <th class="el-table_1_column_1 is-leaf el-table__cell" colspan="1" rowspan="1"
                                    style="background: rgb(250, 251, 254);">
                                    <div class="cell">Año Proceso<!----><!----></div>
                                </th>
                                <th class="el-table_1_column_2 is-leaf el-table__cell" colspan="1" rowspan="1"
                                    style="background: rgb(250, 251, 254);">
                                    <div class="cell">Número de UIT Deducible<!----><!----></div>
                                </th>


                                <th class="el-table_1_column_7 is-right is-leaf el-table__cell" colspan="1"
                                    rowspan="1" style="background: rgb(250, 251, 254);">
                                    <div class="cell">Opciones<!----><!----></div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="el-table__body-wrapper">
                    <div class="el-scrollbar">
                        <div class="el-scrollbar__wrap el-scrollbar__wrap--hidden-default">
                            <div class="el-scrollbar__view" style="display: inline-block; vertical-align: middle;">
                                <table class="el-table__body" cellspacing="0" cellpadding="0" border="0"
                                    style="table-layout: fixed; width: 100%;">
                                    <colgroup>
                                        <col name="el-table_1_column_1" width="40%">
                                        <col name="el-table_1_column_2" width="40%">

                                        <col name="el-table_1_column_7" width="20%">
                                    </colgroup><!--v-if-->
                                    <tbody tabindex="-1">
                                        @foreach ($uits as $uit)
                                            <tr class="el-table__row">
                                                <td class="el-table_1_column_1 el-table__cell" rowspan="1"
                                                    colspan="1">
                                                    <div class="cell">
                                                        {{ $uit->ano_proceso }}

                                                    </div>
                                                </td>
                                                <td class="el-table_1_column_2 el-table__cell" rowspan="1"
                                                    colspan="1">
                                                    <div class="cell">
                                                        {{ $uit->num_uit_deducible }}

                                                    </div>
                                                </td>
                                                <td class="el-table_1_column_7 is-right el-table__cell" rowspan="1" colspan="1">
                                                    <div class="cell" style="display: flex; justify-content: flex-end; gap: 5px;">
                                                        <!-- Botón de edición -->
                                                        <a href="{{ route('uits.edit', $uit->ano_proceso) }}" class="el-button el-button--primary el-button--small" type="button">
                                                            <span><i class='bx bx-edit-alt'></i></span>
                                                        </a>
                                                
                                                        <!-- Botón de eliminación -->
                                                        <form action="{{ route('uits.destroy', $uit->ano_proceso) }}" method="POST" onsubmit="return confirm('¿Seguro?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button aria-disabled="false" type="submit" class="el-button el-button--primary el-button--small">
                                                                <span><i class='bx bxs-x-circle'></i></span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach



                                    </tbody><!--v-if-->
                                </table><!--v-if--><!--v-if-->
                            </div>
                        </div>
                        <div class="el-scrollbar__bar is-horizontal" style="display: none;">
                            <div class="el-scrollbar__thumb" style="transform: translateX(0%);"></div>
                        </div>
                        <div class="el-scrollbar__bar is-vertical" style="display: none;">
                            <div class="el-scrollbar__thumb" style="transform: translateY(0%);"></div>
                        </div>
                    </div>
                </div><!--v-if--><!--v-if-->
            </div>
            <div class="el-table__column-resize-proxy" style="display: none;">

            </div>
        </div>


        <div class="el-pagination is-background el-pagination--small">

            {{ $uits->links() }}
        </div>

    </div>
    <!-- Modal Crear -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        @include('configuracion.uit.create')

    </div>
    <!-- Modal Editar -->
  



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Manejar la apertura del modal
            document.getElementById('new-button').addEventListener('click', function() {
                $('#exampleModal').modal('show');
            });

            // Manejar el cierre del modal desde el botón de cerrar en el header
            document.getElementById('modal-close-button').addEventListener('click', function() {
                $('#exampleModal').modal('hide');
            });

            document.getElementById('modal-cancel-button').addEventListener('click', function() {
                $('#exampleModal').modal('hide');
            });

            // Manejar el cierre del modal después de enviar el formulario
            document.getElementById('modal-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevenir el envío del formulario
                // Puedes añadir aquí la lógica de validación antes de enviar el formulario
                this.submit(); // Enviar el formulario después de la validación
                $('#exampleModal').modal('hide');
            });

        });
    </script>

    <script src="{{ asset('/js/validarmodal.js') }}"></script>
