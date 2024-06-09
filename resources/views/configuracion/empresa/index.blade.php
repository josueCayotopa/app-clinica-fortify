@extends('home')
@section('home')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h4>Empresas</h4>

        <div class="search-container mb-3">
            <div class="input-group">
                <select class="form-select" id="filter-by">
                    <option value="name">Nombre</option>
                    <option value="username">Usuario</option>
                    <!-- Agrega más opciones de filtro según tus necesidades -->
                </select>
                <input type="search" id="search-input" class="form-control" placeholder="Buscar por nombre o usuario">
            </div>
            @can('user_create')
                <button class="btn btn-primary ms-3" id="new-button" >Nuevo <span><i class='bx bx-user-plus'></i></span></button>
            @endcan
        </div>

        <div class="table-responsive"> <!-- Agregado para hacer la tabla responsive -->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Razon Social</th>
                        <th>Nombre Comercial</th>
                        <th>Ruc Empresa</th>
                        <th>Nombre Representante</th>
                        <th>Opciones</th> <!-- Corregido el encabezado -->
                    </tr>
                </thead>
                <tbody id="empresas-table">
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->codigo_empresa }}</td>
                            <td>{{ $empresa->razon_social }}</td>
                            <td>{{ $empresa->nombre_comercial }}</td>
                            <td>{{ $empresa->ruc_empresa }}</td>
                            <td>{{ $empresa->nombre_representante_legal }}</td>
                            <td> <!-- Alineación corregida -->
                                <div class="action-buttons">
                                    
                                   
                                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning btn-sm">
                                            <i class='bx bx-edit-alt'></i>
                                        </a>
                                  
                                <!-- Cambiado a user_delete -->
                                        <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST"
                                            onsubmit="return confirm('seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">
                                                <i class='bx bxs-x-circle'></i>
                                            </button>
                                        </form>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center"> <!-- Mayor separación entre la tabla y el paginador -->
            {{ $empresas->links() }}
        </div>
    </div>

    <script>
        document.getElementById('new-button').addEventListener('click', function() {
            window.location.href = '{{ route('empresas.create') }}';
        });
    </script>

@endsection
