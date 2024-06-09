<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{ route('uits.store') }}" method="POST" class="el-form el-form--default el-form--label-top"
            id="modal-form">
            @csrf
            <div class="modal-header">
                <header class="el-dialog__header">
                    <span role="heading" aria-level="2" class="el-dialog__title">Crea UIT</span>
                    <button aria-label="el.dialog.close" class="el-dialog__headerbtn" type="button"
                        id="modal-close-button">
                        <i class="el-icon el-dialog__close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                <path fill="currentColor"
                                    d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z">
                                </path>
                            </svg>
                        </i>
                    </button>
                </header>
            </div>
            <div class="modal-body">
                <div id="el-id-134-0" class="el-dialog__body">
                    <div class="el-form-item is-required asterisk-left">
                        <label id="el-id-134-3" for="ano_proceso" class="el-form-item__label">Año Proceso:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <div class="el-input__wrapper" tabindex="-1">
                                    <input class="el-input__inner" type="number" autocomplete="off" tabindex="0"
                                        id="ano_proceso" name="ano_proceso" value="{{ old('ano_proceso') }}"
                                        spellcheck="false" data-ms-editor="true">
                                    @if ($errors->has('ano_proceso'))
                                        <span class="error text-danger">{{ $errors->first('ano_proceso') }}</span>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="el-form-item is-required asterisk-left">
                        <label id="el-id-134-3" for="num_uit_deducible" class="el-form-item__label">Número UIT
                            Deducible:</label>
                        <div class="el-form-item__content">
                            <div class="el-input">
                                <div class="el-input__wrapper" tabindex="-1">
                                    <input class="el-input__inner" type="number" autocomplete="off" tabindex="0"
                                        id="num_uit_deducible" name="num_uit_deducible"
                                        value="{{ old('num_uit_deducible') }}" spellcheck="false" data-ms-editor="true">
                                    @if ($errors->has('num_uit_deducible'))
                                        <span class="error text-danger">{{ $errors->first('num_uit_deducible') }}</span>
                                    @endif
                                </div>
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
                            @php $mesFormateado = sprintf('%02d', $i); @endphp
                            <tr>
                                <td>{{ $mesFormateado }}</td>
                                <td>
                                    <input type="number" name="meses[{{ $mesFormateado }}]" class="form-control"
                                        step="0.01" value="{{ old('meses.' . $mesFormateado) }}">
                                    @error('meses.' . $mesFormateado)
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <footer class="el-dialog__footer">
                    <span class="dialog-footer">
                        <button aria-disabled="false" type="button" class="el-button" id="modal-cancel-button">
                            <span class="">Cancelar</span>
                        </button>
                        <button aria-disabled="false" type="button" class="el-button el-button--primary"
                            onclick="validateAndSubmit()">
                            <span class="">Confirmar</span>
                        </button>
                    </span>
                </footer>
            </div>
        </form>
    </div>
</div>
