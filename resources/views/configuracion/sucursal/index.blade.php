@extends('home')
@section('home')
    <div class="container mt-5">
        @include('layouts.messege')
        <h4> Sucursales </h4>

        <div class="search-container mb-3">
            <div class="input-group me-3">
                <select class="form-select" id="filter-by">
                    <option value="name">Nombre</option>
                    <option value="username">Usuario</option>
                    <!-- Agrega más opciones de filtro según tus necesidades -->
                </select>
            </div>
            <input type="search" id="search-input" class="form-control" placeholder="Buscar por nombre o usuario">
            @can('user_create')
                <button class="btn btn-primary ms-3" id="new-button"> Nuevo <span><i class='bx bx-user-plus'></i></span>

                </button>
            @endcan
        </div>

        <table class="table table-borderless">
            <thead>
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
@endsection
