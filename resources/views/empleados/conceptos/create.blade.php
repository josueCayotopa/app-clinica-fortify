@extends('layouts.home')

@section('main')
    <div class="container mt-5">
        <div class="border rounded p-3 mb-3">
            <h6 class="border-bottom pb-2 mb-3">Crear Nuevo Concepto</h6>
            <form action="{{ route('conceptos.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label for="codigo">Código sunat<span class="campo-obligatorio">*</span></label>
                            <input type="text" class="form-control" id="codigo" name="codigo"
                                value="{{ old('codigo') }}" required>
                            @if ($errors->has('codigo'))
                                <span class="error text-danger">{{ $errors->first('codigo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label for="descripcion">Descripción<span class="campo-obligatorio">*</span></label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                value="{{ old('descripcion') }}">
                            @if ($errors->has('descripcion'))
                                <span class="error text-danger">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Checkboxes for different incomes -->
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Essalud Seguro Regular Trabajador</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="essalud_seguro_regular_trabajador"
                                    name="essalud_seguro_regular_trabajador" value="1"
                                    {{ old('essalud_seguro_regular_trabajador') ? 'checked' : '' }}>
                                <label class="form-check-label" for="essalud_seguro_regular_trabajador">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Essalud CBSSP Seg Trab Pesquero</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="essalud_cbssp_seg_trab_pesquero"
                                    name="essalud_cbssp_seg_trab_pesquero" value="1"
                                    {{ old('essalud_cbssp_seg_trab_pesquero') ? 'checked' : '' }}>
                                <label class="form-check-label" for="essalud_cbssp_seg_trab_pesquero">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Essalud Seguro Agrario Acuicultor</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="essalud_seguro_agrario_acuicultor"
                                    name="essalud_seguro_agrario_acuicultor" value="1"
                                    {{ old('essalud_seguro_agrario_acuicultor') ? 'checked' : '' }}>
                                <label class="form-check-label" for="essalud_seguro_agrario_acuicultor">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Essalud SCTR</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="essalud_sctr" name="essalud_sctr"
                                    value="1" {{ old('essalud_sctr') ? 'checked' : '' }}>
                                <label class="form-check-label" for="essalud_sctr">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Impuesto extraordinario de solidaridad</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="impuesto_extraord_de_solidaridad"
                                    name="impuesto_extraord_de_solidaridad" value="1"
                                    {{ old('impuesto_extraord_de_solidaridad') ? 'checked' : '' }}>
                                <label class="form-check-label" for="impuesto_extraord_de_solidaridad">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Fondo de derechos Sociales </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="fondo_derechos_sociales_del_artista"
                                    name="fondo_derechos_sociales_del_artista" value="1"
                                    {{ old('fondo_derechos_sociales_del_artista') ? 'checked' : '' }}>
                                <label class="form-check-label" for="fondo_derechos_sociales_del_artista">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Senati</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="senati" name="senati" value="1"
                                    {{ old('senati') ? 'checked' : '' }}>
                                <label class="form-check-label" for="senati">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Sistema Nacional de Pensiones </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sistema_nacional_de_pensiones_1999"
                                    name="sistema_nacional_de_pensiones_1999" value="1"
                                    {{ old('sistema_nacional_de_pensiones_1999') ? 'checked' : '' }}>
                                <label class="form-check-label" for="sistema_nacional_de_pensiones_1999">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Sistema Privado de Pensiones </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sistema_privado_de_pensiones"
                                    name="sistema_privado_de_pensiones" value="1"
                                    {{ old('sistema_privado_de_pensiones') ? 'checked' : '' }}>
                                <label class="form-check-label" for="sistema_privado_de_pensiones">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Rentas de quinta categoria </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="renta_5ta_categoría_retenciones"
                                    name="renta_5ta_categoría_retenciones" value="1"
                                    {{ old('renta_5ta_categoría_retenciones') ? 'checked' : '' }}>
                                <label class="form-check-label" for="renta_5ta_categoría_retenciones">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>Rentas de quinta categoria </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="essalud_seguro_regular_pensionista"
                                    name="essalud_seguro_regular_pensionista" value="1"
                                    {{ old('essalud_seguro_regular_pensionista') ? 'checked' : '' }}>
                                <label class="form-check-label" for="essalud_seguro_regular_pensionista">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-1">
                        <div class="form-group">
                            <label>contrib_solidaria_asistencia_previs </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="contrib_solidaria_asistencia_sprevis"
                                    name="contrib_solidaria_asistencia_sprevis" value="1"
                                    {{ old('contrib_solidaria_asistencia_sprevis') ? 'checked' : '' }}>
                                <label class="form-check-label" for="contrib_solidaria_asistencia_sprevis">
                                    Aplica
                                </label>
                            </div>
                        </div>
                    </div>



                    <!-- Repeat similar blocks for other fields -->
                    <!-- ... -->

                    <div class="row">
                        <div class="col-md-12 gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
