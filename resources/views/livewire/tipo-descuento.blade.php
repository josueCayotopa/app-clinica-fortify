
<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
            <button wire:click="create()" class="el-button el-button--primary" data-toggle="modal" data-target="#modalNuevaIns">Crear Descuento</button>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($descuentos as $descuento)
                <tr>
                    <td>{{ $descuento->id }}</td>
                    <td>{{ $descuento->descripcion }}</td>
                    <td>
                        <button wire:click="edit({{ $descuento->id }})" class="el-button el-button--primary">Editar</button>
                        <button wire:click="delete({{ $descuento->id }})" class="el-button el-button--danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="modalNuevaIns" class="modal fade @if($isOpen) show @endif" tabindex="-1" role="dialog" style="display: @if($isOpen) block @else none @endif;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $descuento_id ? 'Editar' : 'Crear' }} Descuento</h5>
                    <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="descripcion" class="col-form-label">Tipo Descuento</label>
                            <input type="text" class="form-control" id="descripcion" wire:model="descripcion">
                            @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="store">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
