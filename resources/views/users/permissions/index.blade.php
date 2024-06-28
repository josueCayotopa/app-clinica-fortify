
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="el-row is-justify-space-between row-bg mb-3">
            <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
                <h5>Listado de Permisos</h5>
            </div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
                @can('permission_create')
                <button class="btn btn-primary ms-3" id="new-button" data-toggle="modal" data-target="#createPermissionModal">
                    Nuevo<span><i class='bx bx-plus'></i></span>
                </button>
            @endcan
            </div>
        </div>
        <div class="el-row is-justify-space-between row-bg">
            <div class="col-lg-4 mt-2">
                <form method="GET" action="{{ route('users.index') }}" class="input-group">
                    <input type="text" class="form-control" name="search" id="search-input"
                        placeholder="Buscar por Nombre o ID" value="{{ request()->input('search') }}">
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
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Guard</th>
                    <th>Fecha</th>
                    <th class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody id="user-table">
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>{{ $permission->created_at }}</td>
                        <td class="text-right">
                            <div class="action-buttons" style="display: flex; justify-content: center; margin-top: 20px;">
                                @can('permission_show')
                                    <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-outline-primary"
                                        style="margin: 0 2px;">
                                        <span><i class='bx bx-show-alt'></i></span>
                                    </a>
                                @endcan
                                @can('permission_edit')
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning"
                                        style="margin: 0 2px;">
                                        <span><i class='bx bxs-edit'></i></span>
                                    </a>
                                @endcan
                                @can('permission_destroy')
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                        onsubmit="return confirm('¿Estás seguro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" style="margin: 0 2px;">
                                            <span><i class='bx bxs-x-circle'></i></i></span>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5"> <!-- Mayor separación entre la tabla y el paginador -->
            {{ $permissions->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createPermissionModal" tabindex="-1" role="dialog"
        aria-labelledby="createPermissionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPermissionModalLabel">Crear Nuevo Permiso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="guard">Guard</label>
                            <input type="text" class="form-control" id="guard" name="guard" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>


        <script>
            document.getElementById('new-button').addEventListener('click', function() {
                window.location.href = '{{ route('permissions.create') }}';
            });
        </script>
        <script>
            $(document).ready(function() {
                // Función de búsqueda en tiempo real
                $('#search-input').on('input', function() {
                    const searchValue = $(this).val().toLowerCase();
                    $('#user-table tr').filter(function() {
                        const idText = $(this).find('td').eq(0).text().toLowerCase();
                        const nameText = $(this).find('td').eq(1).text().toLowerCase();
                        $(this).toggle(idText.includes(searchValue) || nameText.includes(searchValue));
                    });
                });
            });
        </script>



    </div>

