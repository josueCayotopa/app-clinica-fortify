


<div class="container mt_5">
    <h2>Crear Empresa me Destacan</h2>
    <form action="{{ route('empresasD.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="razon_social">Razon social</label>
                    <input type="text" class="form-control" id="razon_social" name="razon_social" maxlength="12" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" maxlength="12" required>
                </div>
                <div class="form-group">
                    <label for="nombre_comercial">Nombre Comercial</label>
                    <input type="text" class="form-control" id="nombre_comercial" name="nombre_comercial" maxlength="12" required>
                </div>
                <div class="form-group">
                    <label for="ruc_empresa">RUC </label>
                    <input type="text" class="form-control" id="ruc_empresa" name="ruc_empresa" maxlength="12" required>
                </div>
                

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="codigo_actividad_id">Tipo de Actividad</label>
                        <select class="form-control" id="codigo_actividad_id" name="codigo_actividad_id" required>
                            <option value="" disabled {{ old('codigo_actividad_id') ? '' : 'selected' }}>Seleccione tipo de actividad </option>
                            @foreach ($tipo_actividad as $id =>$actividad)
                                <option value="{{ $id }}"
                                {{old('codigo_actividad_id') == $id ?  'selected' : ''}}>
                                {{ $actividad }}</option>

                            @endforeach
                        </select>
                        @if ($errors->has('codigo_actividad_id'))
                        <span class="error text-danger">{{ $errors->first('codigo_actividad_id') }}</span>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('empresasD.index') }}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </a>

    </form>
</div>
    