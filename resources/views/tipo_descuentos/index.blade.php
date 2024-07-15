@extends('layouts.home')
@section('main')


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<div class="card-body mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="el-row is-justify-space-between row-bg">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Tipo Descuentos</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            <button type="button" class="el-button el-button--primary ms-3 open-modal-btn-new" id="new-button"
                data-toggle="modal" data-target="#modalNuevaIns"> Nuevo

            </button>

        </div>
    </div>

    <div class="el-row is-justify-space-between row-bg">
        <div class="col-lg-4"><br>
            <div class="el-input el-input--prefix" style="width: 100%;">
                <div class="el-input__wrapper" tabindex="-1">
                    <span class="el-input__prefix">
                        <span class="el-input__prefix-inner">
                            <i class='bx bx-search-alt-2'></i>
                        </span>
                    </span>
                    <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Buscar"
                        id="search-input" spellcheck="false" data-ms-editor="true">
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-3">
            <br>
            <button class="el-button el-button--success" id="export-button">Generar Ecxel</button>

        </div>
        <div class="col-lg-4">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="user-table">
                @foreach ($descuentos as $descuento)
                    <tr>
                        <td>{{ $descuento->id }}</td>
                        <td>{{ $descuento->descripcion }}</td>
                        <td>{{ $descuento->created_at }}</td>
                        <td class="text-right">
                            <div class="action-buttons"
                                style="display: flex; justify-content: center; margin-top: 20px;">
                                <button class="el-button el-button--primary" data-toggle="modal"
                                    data-target="#editIns{{ $descuento->id }}" style="margin: 0 2px;">
                                    <span><i class='bx bx-edit-alt'></i></span>
                                </button>
                                <div>
                                    <form action="{{ route('tipos_descuento.destroy', $descuento->id) }}" method="post"
                                        onsubmit="return confirm('¿Seguro que quieres eliminar este elemento?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="el-button el-button--danger" type="submit"
                                            style="margin: 0 2px;">
                                            <span><i class='bx bxs-x-circle'></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @include('tipo_descuentos.edit')
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $descuentos->links() }}
    </div>
</div>



<!-- Modal -->

<div id="modalNuevaIns" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear</h5>

            </div>
            <div class="modal-body">
                <form id="modal-form" action="{{ route('tipos_descuento.storeall') }}" method="post"
                    autocomplete="off">

                    @csrf
                    <div class="form-group">

                        <label for="descripcion" class="col-form-label">Tipo de Descuento</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                            value="{{ old('descripcion') }}">

                        @if ($errors->has('descripcion'))
                            <span class="error text-danger"> {{ $errors->first('descripcion') }}</span>
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
<script>
    document.getElementById('search-input').addEventListener('input', function() {
        const search = this.value;
        fetch(`{{ route('tipos_descuento.index') }}?search=${search}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('user-table').innerHTML = new DOMParser().parseFromString(html,
                    'text/html').querySelector('#user-table').innerHTML;
            });
    });
  
</script>
@endsection