<div class="card-body mt-5">
    @include('layouts.messege')
    <div class="el-row is-justify-space-between row-bg">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Empresas</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            @can('user_create')
                <button class="el-button el-button--danger" id="new-button">Nuevo <span><i
                            class='bx bx-user-plus'></i></span></button>
            @endcan

        </div>
    </div>
    <div class="el-row is-justify-space-between row-bg">
        <div class="col-lg-4"><br>
            <div class="el-input el-input--prefix" style="width: 100%;">
                <div class="el-input__wrapper" tabindex="-1">
                    <span class="el-input__prefix">
                        <span class="el-input__prefix-inner">
                            <i class='bx bx-search-alt-2'></i>
                        </span>
                    </span>
                    <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Buscar"
                        id="search-input" spellcheck="false" data-ms-editor="true">
                </div>
            </div>
        </div>
        <div class="col-lg-4">
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-3">
            <br>
            <button class="el-button el-button--success" id="export-button">Generar Ecxel</button>
           
        </div>
        <div class="col-lg-4">
        </div>
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


                                <a href="{{ route('empresas.edit', $empresa->id) }}"
                                    class="el-button el-button--primary el-button--small">
                                    <i class='bx bx-edit-alt'></i>
                                </a>

                                <!-- Cambiado a user_delete -->
                                <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST"
                                    onsubmit="return confirm('seguro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="el-button el-button--danger el-button--small" type="submit">
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
    document.getElementById('export-button').addEventListener('click', function() {
        window.location.href = '{{ route('exportar.empresa') }}';
    });
   
    document.getElementById('search-input').addEventListener('input', function() {
        const search = this.value;
        fetch(`{{ route('empresas.index') }}?search=${search}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('empresas-table').innerHTML = new DOMParser().parseFromString(html,
                    'text/html').querySelector('#empresas-table').innerHTML;
            });
    });
</script>
