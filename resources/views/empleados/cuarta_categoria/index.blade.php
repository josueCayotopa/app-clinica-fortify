<div class="card-body mt-5"> 
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="el-row is-justify-space-between row-bg">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Personal de Cuarta Categoria</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
           
            <button type="button" class="el-button el-button--danger" id="create-cuarta-categoria">
                <span>  Nuevo<i class='bx bx'"></i></span>
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
                                    
                                        <tr class="el-table__row">
                                            <td class="el-table__cell">75655963</td>
                                            <td class="el-table__cell">03/06/2003 </td>
                                            <td class="el-table__cell">Elías Culqui Sanchez </td>
                                            <td class="el-table__cell">953129960 </td>
                                            <td class="el-table__cell">Hola </td>
                                            <td class="el-table__cell">Hol01 </td>
                                            <td class="el-table__cell"
                                                style="display: flex; justify-content: flex-end; gap: 5px;">
                                                <!-- Botón de edición -->

                                                
                                                    <a href=""
                                                        class="el-button el-button--primary el-button--small editButton">
                                                        <span><i class='bx bx-edit-alt'></i></span>
                                                    </a>
                                                
                                                <!-- Botón de eliminación -->
                                                <form action=""
                                                    method="POST" onsubmit="return confirm('¿Seguro?')">
                                                    
                                                    <button type="submit"
                                                        class="el-button el-button--primary el-button--small deleteButton"
                                                        data-id="">
                                                        <span><i class='bx bxs-x-circle'></i></span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    
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
        
    </div>
</div>

<script>
    document.getElementById('create-cuarta-categoria').addEventListener('click', function() {
        window.location.href = "{{ route('cuarta_categoria.create') }}";
    });
</script>





