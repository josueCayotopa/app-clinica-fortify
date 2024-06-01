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
            <div class="input-group me-3">
                <select class="form-select" id="filter-by">
                    <option value="name">Nombre</option>
                    <option value="username">Usuario</option>
                    <!-- Agrega más opciones de filtro según tus necesidades -->
                </select>
            </div>
            <input type="search" id="search-input" class="form-control" placeholder="Buscar por nombre o usuario">
            @can('user_create')
                <button class="btn btn-primary ms-3" id="new-button" >Nuevo <span><i class='bx bx-user-plus'></i></span>

                </button>
            @endcan
        </div>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Razon Social</th>
                    <th>Nombre Comercial</th>
                    <th>Ruc Empresa</th>

                    <th>Nombre Representante</th>


                    <th text-right>Opciones</th>
                </tr>
            </thead>
            <tbody id="empresas-table">
                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->codigo_empresa }}</td>
                        <td>{{ $empresa->razon_social }}</td>
                        <td>{{ $empresa->nombre_comercial }}</td>
                        <td>{{ $empresa->ruc_empresa }} </td>
                        <td>{{ $empresa->nombre_representante_legal }}</td>

                        <td text-right>
                            <div class="action-buttons"
                                style=" display: flex;
                            justify-content: center;
                            margin-top: 20px;">
                                @can('user_show')
                                    <a href=" {{ route('empresas.show', $empresa->id) }}" class="btn btn-outline-primary"
                                        style="margin: 0 2px;">
                                        <span><i class='bx bx-show-alt'></i></span>
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a href=" {{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning"
                                        style="margin: 0 2px;">
                                        <span><i class='bx bx-edit-alt'></i></span>
                                    </a>
                                @endcan
                                @can('user_create')
                                    <div>
                                        <form action="{{ route('empresas.delete', $empresa->id) }}" method="POST"
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
            {{ $empresas->links() }}
        </div>
    </div>
    <!-- Modal Crear -->
    <div class="modal fade" id="crearEmpresaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New message</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Recipient:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Send message</button>
            </div>
          </div>
        </div>
      </div>

    <script>
        document.getElementById('new-button').addEventListener('click', function() {
            window.location.href = '{{ route('empresas.create') }}';
        });
    </script>

   {{--<script src="{{ asset('/js/modalempresa.js') }}"></script>--}}




    </div>
@endsection
