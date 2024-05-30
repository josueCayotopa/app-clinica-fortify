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
            Detalles del Permiso
        </div>
        <div class="card-body">
            <img src="{{ asset('/images/avatar2.png') }}" alt="Imagen del usuario" class="card-img" style=" display: block;
            margin: 0 auto;
            width: 200px;">
            <h5 class="card-title">{{ $permission->name }}</h5>
            <h6 class="card-title">{{ $permission->guard_name}}</h6>
            <p class="card-text"><strong>Fecha de Creación:</strong> {{ $permission->created_at }}</p>
            <!-- Añadir más campos según sea necesario -->
            
            <a href="{{ route('permissions.index') }}" class="btn btn-primary ">Volver</a>
            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-secondary ">Editar</a>
        </div>
    </div>
</div>
@endsection