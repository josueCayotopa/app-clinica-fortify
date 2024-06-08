@extends('home')

@section('home')
<div class="container mt-5">
    <h6>Vista General de Categorías y Cargos</h6>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-5 mb-3">
        <div class="d-flex justify-content-start">
            <a href="{{ route('crear-relacion-categoria-cargo') }}" class="btn btn-success me-3">Crear</a>
            <a href="#" class="btn btn-secondary me-3">Salir</a>
        </div>
    </div>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Código Categoría</th>
                <th>Descripción Categoría</th>
                <th>Código Cargo</th>
                <th>Descripción Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categoriasCargos as $categoriaCargo)
                <tr>
                    <td>{{ $categoriaCargo->categoria->codigo }}</td>
                    <td>{{ $categoriaCargo->categoria->descripcion }}</td>
                    <td>{{ $categoriaCargo->cargo->codigo }}</td>
                    <td>{{ $categoriaCargo->cargo->descripcion }}</td>
                    <td>
                        <a href="{{ route('editar-relacion-categoria-cargo', $categoriaCargo->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $categoriaCargo->id }}, '{{ $categoriaCargo->categoria->descripcion }}', '{{ $categoriaCargo->cargo->descripcion }}')">Eliminar</button>
                        <form id="delete-form-{{ $categoriaCargo->id }}" action="{{ route('categoria-cargos.destroy', $categoriaCargo->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="confirmMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancelDelete()">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton" onclick="deleteItem()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id, categoriaDescripcion, cargoDescripcion) {
            var message = `¿Estás seguro de que deseas eliminar la relación entre la categoría "${categoriaDescripcion}" y el cargo "${cargoDescripcion}"?`;
            document.getElementById('confirmMessage').innerText = message;
            document.getElementById('confirmDeleteButton').setAttribute('data-id', id);
            $('#confirmModal').modal('show');
        }

        function deleteItem() {
            var id = $('#confirmDeleteButton').data('id');
            document.getElementById('delete-form-' + id).submit();
        }

        function cancelDelete() {
            $('#confirmModal').modal('hide');
        }
    </script>
</div>
@endsection