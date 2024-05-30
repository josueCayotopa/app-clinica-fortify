@extends('home')
@section('home')
    <div class="container mt-5">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
      

        <h4>Usuarios</h4>

        <div class="search-container mb-3">
            <div class="input-group me-3">
                <select class="form-select" id="filter-by">
                    <option value="name">Nombre</option>
                    <option value="username">Usuario</option>
                    <!-- Agrega más opciones de filtro según tus necesidades -->
                </select>
            </div>
            <input type="text" id="search-input" class="form-control" placeholder="Buscar por nombre o usuario">
            @can('user_create')
                
           
            <button class="btn btn-primary ms-3" id="new-button">Nuevo <span><i class='bx bx-user-plus'></i></span>

            </button>
            @endcan
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
        $('search-input').on('input', function() {
        var query = $(this).val();
        $.ajax({
            url: '/users/search', // Ruta de la búsqueda en el controlador
            method: 'GET',
            data: { query: query },
            success: function(response) {
                // Manipular la respuesta y mostrar las sugerencias al usuario
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud AJAX
            }
        });
    });

      
    </script>
   



    </div>
@endsection
