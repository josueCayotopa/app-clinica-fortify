@extends('home')
@section('home')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="el-row is-justify-space-between row-bg mb-3">
            <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
                <h5>Listado de Personal</h5>
            </div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
                @can('user_create')
                    <button class="btn btn-primary ms-3" id="new-button">Nuevo <span><i class='bx bx-user-plus'></i></span>

                    </button>
                @endcan
            </div>
        </div>
        <div class="el-row is-justify-space-between row-bg">
            <div class="col-lg-4 mt-2">
                <form method="GET" action="{{ route('users.index') }}" class="input-group">
                    <input type="text" class="form-control" name="search" id="search-input" placeholder="Buscar por Nombre o ID" value="{{ request()->input('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4"></div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-3">
                <br>
                <button aria-disabled="false" type="button" class="el-button el-button--success">
                    <span class="">Generar Excel</span>
                </button>
            </div>
        </div>



        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Rol</th>

                    <th>Email</th>
                    <th>Fecha</th>

                    <th text-right>Opciones</th>
                </tr>
            </thead>
            <tbody id="user-table">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @forelse ($user->roles as $role)
                                <span class="badge badge-success" style="background-color: rgb(22, 156, 209)">
                                    {{ $role->name }}

                                </span>
                            @empty
                                <span class="badge badge-danger" style="background-color: rgb(240, 7, 19)">
                                    No tiene roles

                                </span>
                            @endforelse
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td text-right>
                            <div class="action-buttons"
                                style=" display: flex;
                            justify-content: center;
                            margin-top: 20px;">
                                @can('user_show')
                                    <a href=" {{ route('users.show', $user->id) }}" class="btn btn-outline-primary"
                                        style="margin: 0 2px;">
                                        <span><i class='bx bx-show-alt'></i></span>
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a href=" {{ route('users.edit', $user->id) }}" class="btn btn-warning"
                                        style="margin: 0 2px;">
                                        <span><i class='bx bx-edit-alt'></i></span>
                                    </a>
                                @endcan
                                @can('user_create')
                                    <div>
                                        <form action="{{ route('users.delete', $user->id) }}" method="POST"
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
            {{ $users->links() }}
        </div>
    </div>
    <!-- Modal -->

    <script>
        document.getElementById('new-button').addEventListener('click', function() {
            window.location.href = '{{ route('users.create') }}';
        });
        
    </script>
    <script>
        < script >
            $(document).ready(function() {
                // Función de búsqueda en tiempo real
                $('#search-input').on('input', function() {
                    const searchValue = $(this).val().toLowerCase();
                    $('#user-table tbody tr').filter(
                function() { // Asegúrate de apuntar a las filas del cuerpo de la tabla
                        const nameText = $(this).find('td').eq(2).text()
                    .toLowerCase(); // Índice 2 para el campo 'username'
                        $(this).toggle(nameText.includes(searchValue));
                    });
                });
            });
    </script>




    </div>
@endsection
