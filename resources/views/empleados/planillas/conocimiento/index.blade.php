<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<div class="card-body mt-5 mb-1">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="el-row is-justify-space-between row-bg">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Conocimientos</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">

            <button type="button" class="el-button el-button--danger open-modal-btn-new" id="new-button"
                data-toggle="modal" data-target="#modalnuevo"> Nuevo
                <span><i class='bx bx-user-plus'></i></span>
            </button>
        </div>
    </div>


    <div class="el-table el-table--fit el-table--striped el-table--enable-row-hover el-table--enable-row-transition el-table--layout-fixed"
        style="width: 100%;">
        <div class="el-table__inner-wrapper">
            <div class="el-table__header-wrapper">
                <table class="el-table__header" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <colgroup>
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                        <col width="20%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="el-table__cell">Numero</th>
                            <th class="el-table__cell">Conocimineto</th>
                            <th class="el-table__cell">Nivel</th>

                            <th class="el-table__cell">Fecha</th>
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
                                    <col width="20%">
                                    <col width="20%">
                                    <col width="20%">
                                    <col width="20%">
                                    <col width="20%">
                                </colgroup>
                                <tbody>
                                    @foreach ($conocimientos as $con)
                                        <tr class="el-table__row">
                                            <td class="el-table__cell">{{ $con->id }}</td>
                                            <td class="el-table__cell">{{ $con->nombre }}</td>
                                            <td class="el-table__cell">{{ $con->nivel }}</td>
                                            <td class="el-table__cell">{{ $con->created_at }}</td>
                                            <td class="el-table__cell"
                                                style="display: flex; justify-content: flex-end; gap: 5px;">


                                                <button
                                                    class="el-button el-button--primary el-button--small editButton "
                                                    data-toggle="modal"
                                                    data-target="#editConocimiento{{ $con->id }}"
                                                    style="margin: 0 2px;">
                                                    <span><i class='bx bx-edit-alt'></i></span>
                                                </button>


                                                <div>

                                                    <form action="{{ route('conocimiento.delete', $con->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('¿Seguro que quieres eliminar este elemento? ')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="el-button el-button--primary el-button--small deleteButton"
                                                            type="submit" style="margin: 0 2px;">
                                                            <span><i class='bx bxs-x-circle'></i></span>
                                                        </button>

                                                    </form>

                                                </div>





                                            </td>
                                        </tr>


                                        @include('empleados.planillas.conocimiento.modalEditar')
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


</div>

</div>



<!-- Modal Nuevo conocimiento-->

<div id="modalnuevo" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear</h5>

            </div>
            <div class="modal-body">
                <form id="modal-form" action="{{ route('conocimiento.store') }}" method="post" autocomplete="off">

                    @csrf
                    <div class="form-group">

                        <label for="recipient-name" class="col-form-label">Conocimiento</label>
                        <input type="text" class="form-control" id="recipient-name" name="nombre"
                            value="{{ old('name') }}">

                        @if ($errors->has('nombre'))
                            <span class="error text-danger"> {{ $errors->first('nombre') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Nivel</label>
                        <select class="form-select" id="filter-by" name="nivel">
                            <option value="" disabled selected>Seleccionar nivel</option>
                            <option value="Básico" {{ old('nivel') == 'Básico' ? 'selected' : '' }}>Básico</option>
                            <option value="Intermedio" {{ old('nivel') == 'Intermedio' ? 'selected' : '' }}>Intermedio
                            </option>
                            <option value="Avanzado" {{ old('nivel') == 'Avanzado' ? 'selected' : '' }}>Avanzado
                            </option>

                        </select>

                        @if ($errors->has('nivel'))
                            <span class="error text-danger">{{ $errors->first('nivel') }}</span>
                        @endif
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="el-button el-button--secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="el-button el-button--primary" id="submitButton" value="Guardar">
            </div>
        </div>
        </form>
    </div>
</div>
