<body>
    <div class="container mt-5">
        
        {{-- @if (session('success')) --}}
        <div class="el-row is-justify-space-between row-bg">
            <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
                <h5>Listado de Empresas Destacan</h5>
            </div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-2">
                <a href="{{ route('pensionistas.create') }}">
                    <button aria-disabled="false" type="button" class="el-button el-button--danger" id="new-button">
                        <span>Nuevo</span>
                    </button>
                </a>
                
            </div>
        </div>

        <div class="el-row is-justify-space-between row-bg">

            <div class="col-lg-4"><br>
                <div class="el-input el-input--prefix" style="width: 100%;">
    
                    <div class="el-input__wrapper" tabindex="-1">
    
                        <span class="el-input__prefix">
                            <span class="el-input__prefix-inner">
                                <i class="el-icon el-input__icon">
    
                                </i>
                            </span>
                        </span>
                        <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Buscar"
                            id="el-id-4745-11" spellcheck="false" data-ms-editor="true">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="el-col el-col-24 el-col-xs-6 el-col-sm-3">
                <br>
                <button aria-disabled="false" type="button" class="el-button el-button--success"><!--v-if-->
                    <span class="">Generar Excel</span>
                </button>
            </div>
        </div>

        <div class="el-table--fit el-table--striped el-table--enable-row-hover el-table--enable-row-transition el-table el-table--layout-fixed is-scrolling-none"
        data-prefix="el" style="width: 100%">
        <div class="el-table__inner-wrapper">
            <div class="hidden-columns">
                <div></div>
                <div></div>
                <div></div>
                <div><button aria-disabled="false" type="button"
                        class="el-button el-button--primary el-button--small"><i class="el-icon"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                <path fill="currentColor"
                                    d="m795.904 750.72 124.992 124.928a32 32 0 0 1-45.248 45.248L750.656 795.904a416 416 0 1 1 45.248-45.248zM480 832a352 352 0 1 0 0-704 352 352 0 0 0 0 704">
                                </path>
                            </svg></i><span class=""></span></button></div>
                <div></div>
                <div></div>
                <div><button aria-disabled="false" type="button"
                        class="el-button el-button--primary el-button--small"><!--v-if--><span
                            class="">Editar</span></button></div>
            </div>
        </div>
        <div class="el-table__header-wrapper">
            <table class="el-table__header" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <colgroup>
                    <col name="el-table_1_column1" width="20%">
                    <col name="el-table_1_column2" width="16%">
                    <col name="el-table_1_column3" width="16%">
                    <col name="el-table_1_column4" width="16%">
                    <col name="el-table_1_column5" width="16%">
                    <col name="el-table_1_column6" width="16%">
                </colgroup>
                <thead class="">
                    <tr class="">
                        <th class="el-table_1_column_1 is-leaf el-table__cell" colspan="1" rowspan="1"
                            style="background: rgb(250, 251, 254);">
                            <div class="cell">ID</div>
                        </th>

                        <th class="el-table_1_column_2 is-leaf el-table__cell" colspan="1" rowspan="1"
                            style="background: rgb(250, 251, 254);">
                            <div class="cell">Razon social</div>
                        </th>
                        <th class="el-table_1_column_3 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Direccion</div>
                        </th>
                        <th class="el-table_1_column_4 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Nombre Comercial</div>
                        </th>
                        <th class="el-table_1_column_5 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Ruc empresa</div>
                        </th>
                        <th class="el-table_1_column_6 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Tipo de Actividad</div>
                        </th>        
                        
                    </tr>
                </thead>

                {{-- prueba de tbody --}}
                <tbody>
                    @forelse ($empresadest as $empresaD)
                        <tr>
                            <td>{{ $empresaD->id }}</td>
                            <td>{{ $empresaD->razon_social }}</td>
                            <td>{{ $empresaD->direccion }}</td>                 
                            <td>{{ $empresaD->nombre_comercial}}</td>
                            <td>{{ $empresaD->ruc_empresa }}</td>                 
                            <td>{{ $empresaD->codigo_actividad_id-> descripcion}}</td>                 
                            
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('empresaDest.show', $empresaD->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('empresaDest.edit', $empresaD->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('empresaDest.destroy', $empresaD->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este pensionista?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No se encontraron pensionistas.</td>
                        </tr>
                    @endforelse
                </tbody>
                
            </table>
        </div>

    

        {{-- <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tipo Documento</th>
                        <th>Tipo Trabajador</th>
                        <th>Regimen Pencionario</th>
                        <th>Fecha Inscripción</th>
                        <th>CUSPP</th>
                        <th>Situación EPS</th>
                        <th>Tipo Pago</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pensionistas as $pensionista)
                        <tr>
                            <td>{{ $pensionista->id }}</td>
                            <td>{{ $pensionista->tipoDocumento->nombre ?? 'N/A' }}</td>
                            <td>{{ $pensionista->numero_documento }}</td>
                            <td>{{ $pensionista->tipoTrabajador->nombre ?? 'N/A' }}</td>
                            <td>{{ $pensionista->regimenPencionario->nombre ?? 'N/A' }}</td>
                            <td>{{ $pensionista->fecha_inscripcion }}</td>
                            <td>{{ $pensionista->cuspp }}</td>
                            <td>{{ $pensionista->situacionEPS->nombre ?? 'N/A' }}</td>
                            <td>{{ $pensionista->tipoPago->nombre ?? 'N/A' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('pensionistas.show', $pensionista->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('pensionistas.edit', $pensionista->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('pensionistas.destroy', $pensionista->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este pensionista?');" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No se encontraron pensionistas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
       {{--  <div class="d-flex justify-content-center mt-4">
            {{ $pensionistas->links() }}
        </div> --}}
    </div> 

    
</body>