@extends('home')

@section('home')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h5>Editar Tipo Trabajador IPSS</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('tipo_trabajador_ipsses.update', $tipoTrabajadorIpss->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="COD_TRABAJ_IPSS">Código</label>
                    <input type="text" name="COD_TRABAJ_IPSS" class="form-control" value="{{ $tipoTrabajadorIpss->COD_TRABAJ_IPSS }}" required maxlength="2">
                </div>
                <div class="form-group">
                    <label for="DES_COD_TRABAJ_IPSS">Descripción</label>
                    <input type="text" name="DES_COD_TRABAJ_IPSS" class="form-control" value="{{ $tipoTrabajadorIpss->DES_COD_TRABAJ_IPSS }}" maxlength="50">
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('tipo_trabajador_ipsses.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection
