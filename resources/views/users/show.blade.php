@extends('home')
@section('home')
<div class="container user-details" style="margin-top: 20px;
display: flex;
justify-content: center;
align-items: center;
min-height: 100vh;
background-color: #f8f9fa;">
    <div class="card" style="width: 400px;
    border-radius: 20px;">
        <div class="card-header">
            Detalles del Usuario
        </div>
        <div class="card-body">
            <img src="{{ asset('/images/avatar2.png') }}" alt="Imagen del usuario" class="card-img" style=" display: block;
            margin: 0 auto;
            width: 200px;">
            <h5 class="card-title">{{ $user->name }}</h5>
            <h6 class="card-title">{{ $user->username }}</h6>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text">Roles: </p>
            <div class="card-text">
                @forelse ($user->roles as $role)
                    <span class="badge badge-success" style="background-color: rgb(22, 156, 209)">
                        {{ $role->name }}

                    </span>
                @empty
                    <span class="badge badge-danger" style="background-color: rgb(240, 7, 19)">
                        No tiene roles

                    </span>
                @endforelse
            </div>
            <p class="card-text"><strong>Fecha de Creación:</strong> {{ $user->created_at }}</p>
            <!-- Añadir más campos según sea necesario -->
            <a href="{{ route('users.index') }}" class="btn btn-primary ">Volver</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary ">Editar</a>
        </div>
    </div>
</div>
@endsection