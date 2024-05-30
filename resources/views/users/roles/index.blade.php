@extends('home')
@section('home')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h4>Roles</h4>

    <div class="search-container mb-3">
        <div class="input-group flex-grow-1">
            <input type="text" class="form-control" id="search-input" placeholder="Buscar por Nombre o ID">
        </div>
        @can('role_create')
            
     
        <button class="btn btn-primary ms-3" id="new-button" data-toggle="modal" data-target="#createPermissionModal">
            Nuevo<span><i class='bx bx-plus'></i></span>
        </button>
        @endcan
    </div>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Permisos</th>

                <th>Fecha</th>
                <th class="text-right">Opciones</th>
            </tr>
        </thead>
        <tbody id="user-table">
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @forelse ($role->permissions as $permission)
                            <span class="badge badge-success" style="background-color: rgb(22, 156, 209)">
                                {{ $permission->name }}

                            </span>
                        @empty
                        <span class="badge badge-danger" style="background-color: rgb(240, 7, 19)">
                            No tiene permisos

                        </span>
                        @endforelse
                    </td>
                    
                    <td>{{ $role->created_at->toFormattedDateString() }}</td>
                    <td class="text-right">
                        <div class="action-buttons" style="display: flex; justify-content: center; margin-top: 20px;">
                           
                           @can('role_show')
                               
                           
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-primary" style="margin: 0 2px;">
                                <span><i class='bx bx-show-alt'></i></span>
                            </a>
                            @endcan
                            @can('role_edit')
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning" style="margin: 0 2px;">
                                <span><i class='bx bxs-edit'></i></span>
                            </a>
                            @endcan
                            @can('role_destroy')
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?')">
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
        {{ $roles->links() }}
    </div>
</div>



    <script>
        document.getElementById('new-button').addEventListener('click', function() {
            window.location.href = '{{ route('roles.create') }}';
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
@endsection