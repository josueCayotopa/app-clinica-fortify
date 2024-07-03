<div class="container">
    

    

    <ul class="nav nav-tabs" id="personalTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="datos-tab" data-toggle="tab" href="#datos" role="tab"
                aria-controls="datos" aria-selected="false">Datos de personal</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                aria-controls="general" aria-selected="true">Cuarta Categoria</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="planillas-tab" data-toggle="tab" href="#planillas" role="tab"
                aria-controls="planillas" aria-selected="false">Planillas</a>
        </li>

    </ul>
    



    <!-- Contenido de las pestañas -->
    <form id="personalForm" method="POST" action="#">
        
        <div class="tab-content">




            <!-- General Tab -->
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                <div class="border rounded p-3 mb-3">
                    <h6 class="border-bottom pb-2 mb-3">Datos Generales</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="ruc">RUC</label>
                                <input type="text" class="form-control" id="ruc" name="ruc" maxlength="20">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="convenio_id">Convenio</label>
                                <select class="form-control" id="convenio_id" name="convenio_id">
                                    <!-- Opciones para convenio -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="tipo_pago_id">Tipo de Pago</label>
                                <select class="form-control" id="tipo_pago_id" name="tipo_pago_id">
                                    <!-- Opciones para tipo de pago -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="tipo_banco_id">Tipo de Banco</label>
                                <select class="form-control" id="tipo_banco_id" name="tipo_banco_id">
                                    <!-- Opciones para tipo de banco -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="numero_bancaria">Número Bancaria</label>
                                <input type="text" class="form-control" id="numero_bancaria" name="numero_bancaria" maxlength="40">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="monto_pago">Monto de Pago</label>
                                <input type="text" class="form-control" id="monto_pago" name="monto_pago" maxlength="40">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Planillas Tab -->
            <div class="tab-pane fade" id="planillas" role="tabpanel" aria-labelledby="planillas-tab">
                <div class="border rounded p-3 mb-3">
                    <h6 class="border-bottom pb-2 mb-3">Datos de Planillas</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="periodo_laboral_id">Periodo Laboral</label>
                                <select class="form-control" id="periodo_laboral_id" name="periodo_laboral_id">
                                    <!-- Opciones para periodo laboral -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="jornada_laboral_id">Jornada Laboral</label>
                                <select class="form-control" id="jornada_laboral_id" name="jornada_laboral_id">
                                    <!-- Opciones para jornada laboral -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="dias_subcidiado_id">Días Subsidiados</label>
                                <select class="form-control" id="dias_subcidiado_id" name="dias_subcidiado_id">
                                    <!-- Opciones para días subsidiados -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="dias_no_subcidiado_id">Días No Subsidiados</label>
                                <select class="form-control" id="dias_no_subcidiado_id" name="dias_no_subcidiado_id">
                                    <!-- Opciones para días no subsidiados -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="sucursal_establecimiento_laboral_id">Sucursal Establecimiento Laboral</label>
                                <select class="form-control" id="sucursal_establecimiento_laboral_id" name="sucursal_establecimiento_laboral_id">
                                    <!-- Opciones para sucursal -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="comprobante_cuarta_id">Comprobante Cuarta</label>
                                <select class="form-control" id="comprobante_cuarta_id" name="comprobante_cuarta_id">
                                    <!-- Opciones para comprobante cuarta -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botones de navegación -->
        <div class="navigation-buttons mt-3 d-flex justify-content-end">
            <button class="btn btn-primary" id="prevBtn" style="margin-left: 10px;">Atrás</button>
            <button class="btn btn-success" id="confirmBtn" style="display: none; margin-left: 10px;">Confirmar</button>
            <button type="button" class="btn btn-primary" id="nextBtn" style="margin-left: 10px;">Continuar</button>
        </div>
    </form>
</div>


<script>
    $(document).ready(function() {
        let tabList = $('#personalTab a.nav-link');
        let currentIndex = 0;

        function updateButtons() {
            $('#prevBtn').toggle(currentIndex > 0);
            $('#nextBtn').toggle(currentIndex < tabList.length - 1);
            $('#confirmBtn').toggle(currentIndex === tabList.length - 1);
        }

        function switchTab(index) {
            tabList.removeClass('active');
            $(tabList[index]).addClass('active');
            $('.tab-pane').removeClass('show active');
            $($('.tab-pane')[index]).addClass('show active');
            currentIndex = index;
            updateButtons();
        }

        $('#prevBtn').click(function(e) {
            e.preventDefault(); // Evita el comportamiento predeterminado del botón (enviar formulario)
            if (currentIndex > 0) {
                switchTab(currentIndex - 1);
            }
        });

        $('#nextBtn').click(function() {
            if (currentIndex < tabList.length - 1) {
                switchTab(currentIndex + 1);
            }
        });

        $('#confirmBtn').click(function() {
            // Aquí puedes realizar alguna acción especial antes de enviar el formulario
            $('#personalForm').attr('action', '#'); // Establece el enlace deseado para el botón Confirmar
            $('#personalForm').submit(); // Envía el formulario
        });

        updateButtons();
    });
</script>