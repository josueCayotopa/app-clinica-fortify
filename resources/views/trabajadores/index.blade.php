<div class="card-body mt-5">
    @include('layouts.messege')
    <div class="el-row is-justify-space-between row-bg">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Trabajadores</h5>
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
                        <col name="el-table_1_column_1" width="20%">
                        <col name="el-table_1_column_2" width="16%">
                        <col name="el-table_1_column_3" width="16%">
                        <col name="el-table_1_column_4" width="16%">
                        <col name="el-table_1_column_5" width="16%">
                    </colgroup>
                    <thead class="">
                        <tr class="">
                            <th class="el-table_1_column_1 is-leaf el-table__cell" colspan="1" rowspan="1"
                                style="background: rgb(250, 251, 254);">
                                <div class="cell">Nombre<!----><!----></div>
                            </th>
                            <th class="el-table_1_column_2 is-leaf el-table__cell" colspan="1" rowspan="1"
                                style="background: rgb(250, 251, 254);">
                                <div class="cell">TipoTrabajador<!----><!----></div>
                            </th>


                            <th class="el-table_1_column_3 is-right is-leaf el-table__cell" colspan="1"
                                rowspan="1" style="background: rgb(250, 251, 254);">
                                <div class="cell">Regimen<!----><!----></div>
                            </th>
                            <th class="el-table_1_column_4 is-right is-leaf el-table__cell" colspan="1"
                                rowspan="1" style="background: rgb(250, 251, 254);">
                                <div class="cell">Contrato<!----></div>
                            </th>
                            <th class="el-table_1_column_5 is-right is-leaf el-table__cell" colspan="1"
                                rowspan="1" style="background: rgb(250, 251, 254);">
                                <div class="cell">Ocupacion<!----><!----></div>
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
                                    <col name="el-table_1_column_1" width="20%">
                                    <col name="el-table_1_column_2" width="16%">
                                    <col name="el-table_1_column_3" width="16%">
                                    <col name="el-table_1_column_4" width="16%">
                                    <col name="el-table_1_column_5" width="16%">
                                    

                                    <col name="el-table_1_column_7" width="16%">
                                </colgroup><!--v-if-->
                                <tbody tabindex="-1">
                                    @foreach ($datosPersonales as $trabajador )
                                        <tr class="el-table__row">
                                            <td class="el-table_1_column_1 el-table__cell" rowspan="1"
                                                colspan="1">
                                                <div class="cell">
                                                    {{  $trabajador->numero_documento }}

                                                </div>
                                            </td>
                                            <td class="el-table_1_column_2 el-table__cell" rowspan="1"
                                                colspan="1">
                                                <div class="cell">
                                                    {{  $trabajador->numero_documento }}

                                                </div>
                                            </td>
                                            <td class="el-table_1_column_3 el-table__cell" rowspan="1"
                                                colspan="1">
                                                <div class="cell">
                                                    {{  $trabajador->numero_documento }}

                                                </div>
                                            </td>
                                            <td class="el-table_1_column_4 el-table__cell" rowspan="1"
                                                colspan="1">
                                                <div class="cell">
                                                    {{  $trabajador->numero_documento }}

                                                </div>
                                            </td>
                                            <td class="el-table_1_column_5 el-table__cell" rowspan="1"
                                                colspan="1">
                                                <div class="cell">
                                                    {{  $trabajador->numero_documento }}

                                                </div>
                                            </td>

                                            <td class="el-table_1_column_7 is-right el-table__cell" rowspan="1" colspan="1">
                                                <div class="cell" style="display: flex; justify-content: flex-end; gap: 5px;">
                                                    <!-- Botón de edición -->
                                                    <a href="{{ route('uits.edit', $trabajador->id) }}" class="el-button el-button--primary el-button--small" type="button">
                                                        <span><i class='bx bx-edit-alt'></i></span>
                                                    </a>
                                            
                                                    <!-- Botón de eliminación -->
                                                    <form action="{{ route('uits.destroy', $trabajador->id) }}" method="POST" onsubmit="return confirm('¿Seguro?')">
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
                    
                </div>
            </div><!--v-if--><!--v-if-->
        </div>
        <div class="el-table__column-resize-proxy" style="display: none;">
        </div>
    </div>


    <div class="el-pagination is-background el-pagination--small">

        {{ $datosPersonales->links() }}
    </div>

</div>
<script>
    document.getElementById('new-button').addEventListener('click', function() {
        window.location.href = '{{ route('trabajadores.create') }}';
    });
    
    export_button
</script>






