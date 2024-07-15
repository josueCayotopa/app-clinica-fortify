<div class="card-body mt-5 mb-1">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" wire:model="nombre">
                    @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-group">
                    <label for="regimen_id">Tipo de Régimen</label>
                    <select class="form-control" wire:model="regimen_id" id="regimen_id">
                        <option value="">Seleccionar...</option>
                        @foreach ($regimenes as $regimen)
                            <option value="{{ $regimen->id }}">{{ $regimen->descripcion }}</option>
                        @endforeach
                    </select>
                    @error('regimen_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                @if ($updateMode)
                    <button wire:click.prevent="update" class="el-button el-button--primary">Actualizar</button>
                    <button wire:click.prevent="cancel" class="el-button el-button--secondary">Cancelar</button>
                @else
                    <button wire:click.prevent="store" class="el-button el-button--success">Guardar</button>
                @endif
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <div class="col-md-6 gap-2 d-md-flex justify-content-md-end">
            <input type="text" class="form-control" placeholder="Buscar por nombre..." wire:model.debounce.300ms="search">
        </div>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Tipo</th>
                <th>Nombre del Regimen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($afps as $afp)
                <tr>
                    <td>{{ $afp->id }}</td>
                    <td>{{ $afp->nombre }}</td>
                    <td>{{ $afp->regimen->descripcion }}</td>
                    <td>
                        <button wire:click="edit({{ $afp->id }})"
                            class="el-button el-button--primary">Editar</button>
                        <button wire:click="delete({{ $afp->id }})"
                            class="el-button el-button--danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
