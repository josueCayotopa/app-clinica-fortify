<div id="modal-vacaciones" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form> <!-- Inicia el formulario aquí -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mt-3">
                                    <label for="nombre_apellido1">Nombres y apellidos</label>
                                    <input type="text" class="form-control" id="nombre_apellido" value="Luis Sanchez Trigoso" disabled>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="cargo1">DNI</label>
                                    <input type="text" class="form-control" id="dni" value="45235652" disabled>
                                </div>
                                <div class="form-group mt-3">
                                    <label id="dias">Días Disponibles: 14 </label>
                                </div>
                                
                            </div>

                            <div class="col-md-4">
                                
                                <div class="form-group mt-3">
                                    <label for="fecha_ingreso2">Fecha Inicio</label>
                                    <input type="date" class="form-control" id="fecha_inicio" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="salario2">Motivo</label>
                                    <select class="form-control" id="motivo" required>
                                        <option value="" disabled selected>---Seleccionar--</option>
                                        <option value="1">Vacaciones anuales</option>
                                        <option value="2">Descanso por enfermedad</option>
                                        <option value="3">Licencia familiar</option>
                                        <option value="4">Otro motivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                
                                <div class="form-group mt-3">
                                    <label for="fecha_ingreso3">Fecha Final</label>
                                    <input type="date" class="form-control" id="fecha_final" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="salario3">Descripciòn</label>
                                    <textarea class="form-control" id="descripcion" rows="2.5" required></textarea>
                                </div>
                            </div>
                        </div>
                    </form> <!-- Cierra el formulario aquí -->
                </div>
            </div>
            <div class="modal-footer">
                <footer class="el-dialog__footer">
                    <span class="dialog-footer">
                        <button type="button" class="el-button" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="el-button el-button--primary">Guardar</button>
                    </span>
                </footer>
            </div>
        </div>
    </div>
</div>
