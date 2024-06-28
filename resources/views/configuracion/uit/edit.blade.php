
<div class="container">
    <div class="row">
        <div class="col-md-12 offset-md-0">
            <div class="card">
                <div class="card-header">
                    <h6>Crear UIT</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('uits.update', $uit->ano_proceso) }}" method="POST" class="el-form el-form--default el-form--label-top">
                        @csrf
                        @method('PUT')
                        <div class="el-form-item is-required asterisk-left">
                            <label id="el-id-134-3" for="ano_proceso" class="el-form-item__label">Año Proceso:</label>
                            <div class="el-form-item__content">
                                <div class="el-input">
                                    <div class="el-input__wrapper" tabindex="-1">
                                        <input class="el-input__inner" type="number" autocomplete="off" tabindex="0" id="ano_proceso" name="ano_proceso" value="{{  old('ano_proceso', $uit->ano_proceso) }}" spellcheck="false" data-ms-editor="true" readonly>
                                        @error('ano_proceso')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="el-form-item is-required asterisk-left">
                            <label id="el-id-134-3" for="num_uit_deducible" class="el-form-item__label">Número UIT Deducible:</label>
                            <div class="el-form-item__content">
                                <div class="el-input">
                                    <div class="el-input__wrapper" tabindex="-1">
                                        <input class="el-input__inner" type="number" autocomplete="off" tabindex="0" id="num_uit_deducible" name="num_uit_deducible" value="{{ old('num_uit_deducible', $uit->num_uit_deducible) }}" spellcheck="false" data-ms-editor="true">
                                        @error('num_uit_deducible')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        $valorMensual = $valoresMensuales->firstWhere('mes_proceso', $mesFormateado);
                                    @endphp
                                    <tr>
                                        <td>{{ $mesFormateado }}</td>
                                        <td>
                                            <input type="number" name="meses[{{ $mesFormateado }}]" class="form-control" step="0.01" value="{{ $valorMensual ? $valorMensual->imp_valor_uit : old('meses.' . $mesFormateado) }}">
                                            @error('meses.' . $mesFormateado)
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="el-form-item__footer">
                            <button type="submit" class="el-button el-button--primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
