
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


<div class="container mt-5" style="padding-top: 20px">

    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif

    <div class="el-row is-justify-space-between row-bg mb-3">
        <div class="row">
            <h5>Listado de vacaciones</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            <button aria-disabled="false" type="button" class="el-button el-button--danger" id="new-button">
                <span>Nuevo</span>
            </button>
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
                            <col width="30%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="el-table__cell">Nº</th>
                                <th class="el-table__cell">Trabajador</th>
                                <th class="el-table__cell">Fecha de inicio</th>
                                <th class="el-table__cell">Fecha fin</th>
                                <th class="el-table__cell">Dias Disponibles</th>
                                <th class="el-table__cell">Estado</th>
                                <th class="el-table__cell">Opción</th>
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
                                        <col width="20%">
                                        <col width="20%">
                                    </colgroup>
                                    
                                    <tbody>
                                            <tr class="el-table__row">
                                                <td class="el-table__cell">1</td>
                                                <td class="el-table__cell">Luis Sanchez Trigoso</td>
                                                <td class="el-table__cell">03/06/2022</td>
                                                <td class="el-table__cell">03/06/2025</td>
                                                <td class="el-table__cell">42</td>
                                                <td class="el-table__cell">Inactivo</td>
                                                <td class="el-table__cell"
                                                    style="display: flex; justify-content: flex-end; gap: 5px; ">
                                                    <button class="el-button el-button--primary el-button--small editButton " data-toggle="modal"
                                                        data-target="#modal-vacaciones"
                                                        style="margin: 0 2px;">
                                                        <span><i class='bx bx-check'></i></span>
                                                    </button>
                                                    
                                                </td>
                                            </tr> 
                                        
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>


            </div>
        </div>


</div>

<script>
    document.getElementById("new-button").addEventListener("click", function() {
        window.location.href = "{{ route('solicitud_vacaciones.index') }}";
    });
</script>
    
