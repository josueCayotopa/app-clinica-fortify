
    <div class="container user-details"
        style="margin-top: 20px;
display: flex;
justify-content: center;
align-items: center;
min-height: 100vh;
background-color: #f8f9fa;">
        <div class="card" style="width: 400px;
    border-radius: 20px;">
            <div class="card-header">
                Detalles del Permiso
            </div>
            <div class="card-body">
                <img src="{{ asset('/images/avatar2.png') }}" alt="Imagen del usuario" class="card-img"
                    style=" display: block;
            margin: 0 auto;
            width: 200px;">
                <h5 class="card-title">{{ $role->name }}</h5>
                <h6 class="card-title">{{ $role->guard_name }}</h6>
                <p class="card-text"><strong>Fecha de Creación:</strong> {{ $role->created_at }}</p>

                <div class="card-text">
                    @forelse ($role->permissions as $permission)
                        <span class="badge badge-success" style="background-color: rgb(22, 156, 209)">
                            {{ $permission->name }}

                        </span>
                    @empty
                        <span class="badge badge-danger" style="background-color: rgb(240, 7, 19)">
                            No tiene permisos

                        </span>
                    @endforelse
                </div>
                <!-- Añadir más campos según sea necesario -->
                @can ('role_index ')
                <a href="{{ route('roles.index') }}" class="btn btn-primary ">Volver</a>
                @endcan
                @can('role_edit')
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-secondary ">Editar</a>
                @endcan
            </div>
        </div>
    </div>

