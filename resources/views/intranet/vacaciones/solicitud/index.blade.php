<div class="container mt-5">
    <div class="row mt-3">       
        <div class="col">
            <h5>Solicitar vacaciones</h5>
        </div>
    </div>
    <div class="el-row is-justify-space-between row-bg" style="margin-bottom: 20px">
        <div class="col-lg-4">
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
    </div>


    <div class="el-table el-table--fit el-table--striped el-table--enable-row-hover el-table--enable-row-transition el-table--layout-fixed"
            style="width: 100%;">
            <div class="el-table__inner-wrapper">
                <div class="el-table__header-wrapper">
                    <table class="el-table__header" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                        <colgroup>
                            <col width="10%">
                            <col width="20%">
                            <col width="30%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="el-table__cell">Nº</th>
                                <th class="el-table__cell">Nº documento </th>
                                <th class="el-table__cell">Trabajador</th>
                                <th class="el-table__cell">Inicio Contrato</th>
                                <th class="el-table__cell">Fin Contrato</th>
                                <th class="el-table__cell">Dias vacacionales</th>
                               
                                <th class="el-table__cell">Opción</th>
                            </tr>
                        </thead>
                    </table>
                </div>


                <div class="el-table__body-wrapper">
                    <div class="el-scrollbar">
                        <div class="el-scrollbar__wrap el-scrollbar__wrap--hidden-default">
                            <div class="el-scrollbar__view" style="display: inline-block; vertical-align: middle;">
                                <form action="{{ route('vacaciones.mostrar') }}" method="POST">
                                    @csrf
                                <table class="el-table__body" cellspacing="0" cellpadding="0" border="0"
                                    style="width: 100%;">
                                    <colgroup>
                                        <col width="10%">
                                        <col width="20%">
                                        <col width="30%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="20%">
                                    </colgroup>
                                    
                                    <tbody>
                                        @foreach($trabajadores as $datos)
                                        @if($datos->trabajador && $datos->trabajador->periodoLaboral)
                                            <tr>
                                                <td>{{ $datos->trabajador->id }}</td>
                                                <td>{{ $datos->numero_documento }}</td>
                                                <td>{{ $datos->nombres }} {{ $datos->apellido_paterno }} {{ $datos->apellido_materno }}</td>
                                                <td>{{ $datos->trabajador->periodoLaboral->fecha_inicio }}</td>
                                                <td>{{ $datos->trabajador->periodoLaboral->fecha_fin }}</td>
                                                <td>{{ $datos->trabajador->periodoLaboral->dias_vacaciones }}</td>
                                                <td class="el-table__cell" style="display: flex; justify-content: flex-end; gap: 5px;">
                                                    <input type="hidden" name="trabajadores[]" value="{{ json_encode($datos) }}">
                                                    <button type="submit" class="el-button el-button--primary el-button--small editButton" style="margin: 0 2px;">
                                                        <span><i class='bx bxs-plus-circle'></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        
                                    </tbody>

                                </table>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
</div>
