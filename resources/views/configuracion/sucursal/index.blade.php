<div class="container mt-5">
    @include('layouts.messege')
    <div id="messages">
        @include('layouts.messege')
    </div>
    <div class="el-row is-justify-space-between row-bg mb-3">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Afp</h5>
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
                @foreach ($sucursales as $sucursal)
                    <tr>
                        <td>{{ $sucursal->nombre_sucursal }}</td>
                        <td>{{ $sucursal->telefono }}</td>
                        <td>{{ $sucursal->fax }}</td>
                        <td>{{ $sucursal->des_direccion }} </td>
                        <td>{{ $sucursal->email }}</td>

                        <td text-right>
                            <div class="action-buttons" style="display: flex; justify-content: flex-end; gap: 5px;">


                                @can('user_edit')
                                    <a href=" {{ route('sucursales.edit', $sucursal->id) }}"
                                        class="el-button el-button--primary el-button--small editButton">
                                        <span><i class='bx bx-edit-alt'></i></span>
                                    </a>
                                @endcan
                                @can('user_create')
                                    <div>
                                        <form action="{{ route('sucursales.destroy', $sucursal->id) }}" method="POST"
                                            onsubmit="return confirm('seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" style="margin: 0 2px;">
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
        {{ $sucursales->links() }}
    </div>
</div>

<script>
    document.getElementById('new-button').addEventListener('click', function() {
        window.location.href = '{{ route('sucursales.create') }}';
    });
</script>

{{-- <script src="{{ asset('/js/modalempresa.js') }}"></script> --}}




</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
