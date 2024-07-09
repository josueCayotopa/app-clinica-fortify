<div class="card-body mt-5">
    @include('layouts.messege')
    <div id="messages">
        @include('layouts.messege')
    </div>
    <div class="el-row is-justify-space-between row-bg mb-3">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Establecimientos Propios</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            @can('user_create')
                <button class="el-button el-button--primary" id="new-button"> Nuevo <span><i
                            class='bx bx-user-plus'></i></span>

                </button>
            @endcan
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
        <div class="col-lg-4"></div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-3">
            <br>
            <button aria-disabled="false" type="button" class="el-button el-button--success">
                <span class="">Generar Excel</span>
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre Sucursal</th>
                    <th>Telefono</th>
                    <th>Fax</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th text-right>Opciones</th>
                </tr>
            </thead>
            <tbody id="empresas-table">
                @foreach ($familia_trabajadores as $familia_trabajador)
                    <tr>
                        <td>{{ $familia_trabajador->nombre_completo }}</td>
                        <td>{{ $familia_trabajador->numero_documento }}</td>
                        <td>{{ $familia_trabajador->fecha_nacimiento }}</td>
                        <td>{{ $familia_trabajador->des_direccion }} </td>
                        <td>{{ $familia_trabajador->fecha_baja }}</td>

                        <td text-right>
                            <div class="action-buttons" style="display: flex; justify-content: flex-end; gap: 5px;">


                                @can('user_edit')
                                    <a href=" {{ route('familia.edit', $familia_trabajador->id) }}"
                                        class="el-button el-button--primary el-button--small editButton">
                                        <span><i class='bx bx-edit-alt'></i></span>
                                    </a>
                                @endcan
                                @can('user_create')
                                    <div>
                                        <form action="{{ route('familia.destroy', $familia_trabajador->id) }}" method="POST"
                                            onsubmit="return confirm('seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="el-button el-button--primary el-button--small" type="submit" style="margin: 0 2px;">
                                                <span><span><i class='bx bxs-x-circle'></i></span>

                                            </button>
                                        </form>

                                    </div>
                                @endcan

                            </div>




                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-5"> <!-- Mayor separación entre la tabla y el paginador -->
        {{ $familia_trabajadores->links() }}
    </div>
</div>

<script>
    document.getElementById('new-button').addEventListener('click', function() {
        window.location.href = '{{ route('familia.create') }}';
    });
</script>

{{-- <script src="{{ asset('/js/modalempresa.js') }}"></script> --}}

</div>

