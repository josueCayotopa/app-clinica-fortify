<div class="container mt-5">
    <ul class="nav nav-tabs custom-tabs" id="personalTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                aria-controls="general" aria-selected="true">General</a>
        </li>
    </ul>
    <form id="personalForm" method="POST" action="{{ route('personals.store') }} ">
        @csrf
        <div class="tab-content">
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                <div class="border rounded p-3 mb-0">
                    <h6 class="border-bottom pb-2 mb-1">Datos Personales</h6>
                    <div class="row scrollable-row">

                        <div class="col-md-6 mb-1">
                            <div class="form-group">
                                <label for="tipo_documento_id">Tipo de Documento <span
                                        class="campo-obligatorio">*</span></label>
                                <select class="form-control" id="tipo_documento_id" name="tipo_documento_id">
                                    <option value="" disabled {{ old('tipo_documento_id') ? '' : 'selected' }}>
                                        Selecciona Tipo de Documento
                                    </option>
                                    @foreach ($tipoDocumento as $id => $tipo_documento)
                                        <option value="{{ $id }}"
                                            {{ old('tipo_documento_id') == $id ? 'selected' : '' }}>
                                            {{ $tipo_documento }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tipo_documento_id'))
                                    <span class="error text-danger">{{ $errors->first('tipo_documento_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
