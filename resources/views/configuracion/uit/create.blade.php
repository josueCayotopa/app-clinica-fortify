<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Crear UITs</h6>
                </div>
                <div class="card-body">
                    <form id="uit-form" action="{{ route('uits.store') }}" method="POST" class="el-form el-form--default el-form--label-top">
                        @csrf

                        <div class="form-group row">
                            <label for="ano_proceso" class="col-md-2 col-form-label">Año Proceso:</label>
                            <div class="col-md-12">
                                <input type="number" id="ano_proceso" name="ano_proceso" class="form-control @error('ano_proceso') is-invalid @enderror" autocomplete="off"
                                    value="{{ old('ano_proceso') }}" spellcheck="false">
                                @error('ano_proceso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_uit_deducible" class="col-md-2 col-form-label">Número UIT Deducible:</label>
                            <div class="col-md-12">
                                <input type="number" id="num_uit_deducible" name="num_uit_deducible" class="form-control @error('num_uit_deducible') is-invalid @enderror" autocomplete="off"
                                    value="{{ old('num_uit_deducible') }}" spellcheck="false">
                                @error('num_uit_deducible')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Mes</th>
                                            <th>Importe Valor UIT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i <= 12; $i++)
                                            @php
                                                $mesFormateado = sprintf('%02d', $i);
                                                $valorMensual = isset($valoresMensuales) ? $valoresMensuales->firstWhere('mes_proceso', $mesFormateado) : null;
                                            @endphp
                                            <tr>
                                                <td>{{ $mesFormateado }}</td>
                                                <td>
                                                    <input type="number" name="meses[{{ $mesFormateado }}]" class="form-control" step="0.01"
                                                        value="{{ $valorMensual ? $valorMensual->imp_valor_uit : old('meses.' . $mesFormateado) }}">
                                                    @error('meses.' . $mesFormateado)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
