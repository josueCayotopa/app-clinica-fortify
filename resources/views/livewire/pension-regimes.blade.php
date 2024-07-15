<div class="card-body mt-5 mb-1">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="codigo_sunat">Código SUNAT</label>
                    <input type="text" class="form-control" id="codigo_sunat" placeholder="Código SUNAT"
                        wire:model="codigo_sunat">
                    @error('codigo_sunat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" placeholder="Descripción"
                        wire:model="descripcion">
                    @error('descripcion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" placeholder="Estado" wire:model="estado">
                    @error('estado')
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


    <div class="row">
        <div class="col-md-6 gap-2 d-md-flex justify-content-md-end">
        <input type="text" class="form-control" placeholder="Buscar..." wire:model.debounce.300ms="search">
    </div>
</div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código SUNAT</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regimenes as $regimen)
                <tr>
                    <td>{{ $regimen->id }}</td>
                    <td>{{ $regimen->codigo_sunat }}</td>
                    <td>{{ $regimen->descripcion }}</td>
                    <td>{{ $regimen->estado }}</td>
                    <td>
                        <button wire:click="edit({{ $regimen->id }})"
                            class="el-button el-button--primary">Editar</button>
                        <button wire:click="delete({{ $regimen->id }})"
                            class="el-button el-button--danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
