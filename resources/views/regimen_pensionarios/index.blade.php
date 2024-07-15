<div class="card-body mt-5">
    <div id="messages">
        @include('layouts.messege')
    </div>
    <div class="el-row is-justify-space-between row-bg mb-3">
        <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
            <h5>Listado de Descuentos Pensionarios</h5>
        </div>
        <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
            <a href="{{ route('descuentos_pensiones.create') }}" class="el-button el-button--danger">Crear</a>
        </div>
    </div>
    <form id="filterForm" method="GET" action="{{ route('descuentos_pensiones.index') }}">
        <div class="el-row is-justify-space-between row-bg">
            <div class="col-lg-9">
                <div class="el-input el-input--prefix" style="width: 100%;">
                    <div class="el-input__wrapper" tabindex="-1">
                        <span class="el-input__prefix">
                            <span class="el-input__prefix-inner">
                                <i class="el-icon el-input__icon"></i>
                            </span>
                        </span>
                        <input class="el-input__inner" type="text" name="search" autocomplete="off" tabindex="0"
                            placeholder="Buscar" id="searchInput" spellcheck="false" data-ms-editor="true"
                            value="{{ request('search') }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <button aria-disabled="false" type="submit" class="el-button el-button--success">
                    <span class="">Buscar</span>
                </button>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>AFP</th>
                    <th>Descuento</th>
                    <th>Tipo de Comisión</th>
                    <th>Porcentaje</th>
                    <th>Importe Tope</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="descuentosTableBody">
                @foreach ($descuentos as $descuento)
                    <tr data-regimen-id="{{ $descuento->regimen_id }}">
                        <td>{{ $descuento->id }}</td>
                        <td>{{ $descuento->afp->nombre }}</td>
                        <td>{{ $descuento->descuento->descripcion }}</td>
                        <td>{{ $descuento->tipo_comision }}</td>
                        <td>{{ $descuento->porcentaje }}</td>
                        <td>{{ $descuento->importe_tope }}</td>
                        <td text-right>
                            <div class="action-buttons" style="display: flex; justify-content: flex-end; gap: 5px;">
                                <a href=" {{ route('descuentos_pensiones.edit', $descuento->id) }}"
                                    class="el-button el-button--primary el-button--small editButton">
                                    <span><i class='bx bx-edit-alt'></i></span>
                                </a>

                                <div>
                                    <form action="{{ route('descuentos_pensiones.destroy', $descuento->id) }}"
                                        method="POST" onsubmit="return confirm('seguro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="el-button el-button--danger el-button--small" type="submit"
                                            style="margin: 0 2px;">
                                            <span><span><i class='bx bxs-x-circle'></i></span>

                                        </button>
                                    </form>

                                </div>


                            </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.getElementById('filterForm');
        const searchInput = document.getElementById('searchInput');
        const descuentosTableBody = document.getElementById('descuentosTableBody');

        searchForm.addEventListener('submit', function(event) {
            event.preventDefault();

            fetch(`${window.location.pathname}?${new URLSearchParams(new FormData(searchForm))}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    descuentosTableBody.innerHTML = data.view;
                    window.history.pushState({}, '', data.url);
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
