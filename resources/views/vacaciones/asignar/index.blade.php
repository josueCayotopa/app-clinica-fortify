
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


<div class="container mt-5">

    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif

    <div class="el-row is-justify-space-between row-bg mb-3">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Solicitudes</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            <button type="button" class="el-button el-button--danger" id="nuevoPersonalBtn" data-toggle="modal"
                data-target="#nuevoPersonalModal"> 
                Asignar
                <span class="bx bx-task"> </span>
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
    </div>


    <div class="el-table el-table--fit el-table--striped el-table--enable-row-hover el-table--enable-row-transition el-table--layout-fixed"
            style="width: 100%;">
            <div class="el-table__inner-wrapper">
                <div class="el-table__header-wrapper">
                    <table class="el-table__header" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                        <colgroup>
                            <col width="10%">
                            <col width="30%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="el-table__cell">Nº</th>
                                <th class="el-table__cell">Nombre</th>
                                <th class="el-table__cell">DNI</th>
                                <th class="el-table__cell">Salario</th>
                                <th class="el-table__cell">Dias Disp.</th>

                                <th class="el-table__cell">Opciòn</th>
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
                                        <col width="30%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="20%">
                                        <col width="10%">
                                    </colgroup>
                                    
                                    <tbody>
                                            <tr class="el-table__row">
                                                <td class="el-table__cell">1</td>
                                                <td class="el-table__cell">Luis Sanchez Trigoso</td>
                                                <td class="el-table__cell">75655963</td>
                                                <td class="el-table__cell">2500</td>
                                                <td class="el-table__cell">14</td>
                                                <td class="el-table__cell"
                                                    style="display: flex; justify-content: flex-end; gap: 5px; ">
                                                    <button class="el-button el-button--primary el-button--small editButton " data-toggle="modal"
                                                        data-target="#modal-vacaciones"
                                                        style="margin: 0 2px;">
                                                        <span><i class='bx bx-plus'></i></span>
                                                    </button>
                                                    
                                                </td>
                                            </tr> 
                                            @include('vacaciones.asignar.modal')       
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>


            </div>
        </div>


</div>


    
