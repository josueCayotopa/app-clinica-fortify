<div class="card-body mt-5 mb-1">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="afp_id">Regimen AFP</label>
                    <select wire:model="afp_id" class="form-control">
                        <option value="">Seleccionar Regimen AFP</option>
                        @foreach ($regimenesAfp as $regimen)
                            <option value="{{ $regimen->id }}">{{ $regimen->nombre }}</option>
                        @endforeach
                    </select>
                    @error('afp_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="descuento_id">Descuento <button type="button" class="btn btn-link primary"
                            id="openAddDescuentoModal">
                            Crear
                        </button></label>
                    <div class="input-group">
                        <select wire:model="descuento_id" class="form-control">
                            <option value="">Seleccionar Descuento</option>
                            @foreach ($descuentos as $descuento)
                                <option value="{{ $descuento->id }}">{{ $descuento->descripcion }}</option>
                            @endforeach

                        </select>

                    </div>
                    @error('descuento_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="tipo_comision">Tipo Comisión</label>
                    <input type="text" class="form-control" id="tipo_comision" placeholder="Tipo Comisión"
                        wire:model="tipo_comision">
                    @error('tipo_comision')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" wire:model="fecha">
                    @error('fecha')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="porcentaje">Porcentaje</label>
                    <input type="number" step="0.01" class="form-control" id="porcentaje" placeholder="Porcentaje"
                        wire:model="porcentaje">
                    @error('porcentaje')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="importe_tope">Importe Tope</label>
                    <input type="number" step="0.01" class="form-control" id="importe_tope"
                        placeholder="Importe Tope" wire:model="importe_tope">
                    @error('importe_tope')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="el-button el-button--success">Guardar</button>
            </div>
        </div>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Regimen AFP</th>
                <th>Descuento</th>
                <th>Tipo Comisión</th>
                <th>Fecha</th>
                <th>Porcentaje</th>
                <th>Importe Tope</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($descuentosPensiones as $descuento)
                <tr>
                    <td>{{ $descuento->id }}</td>
                    <td>{{ $descuento->afp->nombre }}</td>
                    <td>{{ $descuento->descuento->descripcion }}</td>
                    <td>{{ $descuento->tipo_comision }}</td>
                    <td>{{ $descuento->fecha }}</td>
                    <td>{{ $descuento->porcentaje }}</td>
                    <td>{{ $descuento->importe_tope }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="addDescuentoModal" tabindex="-1" aria-labelledby="addDescuentoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDescuentoModalLabel">Crear Nuevo Descuento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="descuento_descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descuento_descripcion"
                        wire:model="descuento_descripcion">
                    @error('descuento_descripcion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalButton">Cerrar</button>
                <button type="button" wire:click.prevent="addDescuento" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function() {
        @this.on('closeModal', function() {
            document.getElementById('closeModalButton').click();
        });

        // Auto-focus input field when modal is shown
        const myModal = document.getElementById('addDescuentoModal');
        document.getElementById('openAddDescuentoModal').addEventListener('click', () => {
            myModal.style.display = 'block';
            document.body.classList.add('modal-open');
            myModal.classList.add('show');
            myModal.style.display = 'block';
            myModal.removeAttribute('aria-hidden');
            myModal.setAttribute('aria-modal', 'true');
            myModal.setAttribute('role', 'dialog');
            document.getElementById('descuento_descripcion').focus();
        });

        document.getElementById('closeModalButton').addEventListener('click', () => {
            myModal.style.display = 'none';
            document.body.classList.remove('modal-open');
            myModal.classList.remove('show');
            myModal.setAttribute('aria-hidden', 'true');
            myModal.removeAttribute('aria-modal');
            myModal.removeAttribute('role');
        });

        myModal.querySelector('.close').addEventListener('click', () => {
            myModal.style.display = 'none';
            document.body.classList.remove('modal-open');
            myModal.classList.remove('show');
            myModal.setAttribute('aria-hidden', 'true');
            myModal.removeAttribute('aria-modal');
            myModal.removeAttribute('role');
        });
    });
</script>
