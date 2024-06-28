<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5>Crear Tipo Trabajador IPSS</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tipo_trabajador_ipsses.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="COD_TRABAJ_IPSS">Código</label>
                    <input type="text" name="COD_TRABAJ_IPSS" class="form-control" required maxlength="2">
                </div>
                <div class="form-group">
                    <label for="DES_COD_TRABAJ_IPSS">Descripción</label>
                    <input type="text" name="DES_COD_TRABAJ_IPSS" class="form-control" maxlength="50">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('tipo_trabajador_ipsses.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
