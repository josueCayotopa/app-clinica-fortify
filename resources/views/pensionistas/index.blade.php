{{-- <body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Pensionistas</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo Documento</th>
                    <th>Numero Documento</th>
                    <th>Tipo Trabajador</th>
                    <th>Regimen Pencionario</th>
                    <th>Fecha Inscripción</th>
                    <th>CUSPP</th>
                    <th>Situación EPS</th>
                    <th>Tipo Pago</th>
                    <th>Acciones</th>
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
                        <td>{{ $pensionista->fecha_inscirpcion }}</td>
                        <td>{{ $pensionista->cuspp }}</td>
                        <td>{{ $pensionista->situacionEPS->nombre ?? 'N/A' }}</td>
                        <td>{{ $pensionista->tipoPago->nombre ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('pensionistas.show', $pensionista->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('pensionistas.edit', $pensionista->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('pensionistas.destroy', $pensionista->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar este pensionista?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">No se encontraron pensionistas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('pensionistas.create') }}" class="btn btn-primary">Agregar Pensionista</a>
    </div>

</body>
 --}}


{{--  <body>
    <div class="container mt-5">
       
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-8 col-sm-10">
                <h5>Listado de Pensionistas</h5>
            </div>
            <div class="col-4 col-sm-2 text-end">
                <a href="{{ route('pensionistas.create') }}" class="btn btn-danger btn-custom" id="new-button">Nuevo</a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-lg-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div class="col-12 col-lg-4"></div>
            <div class="col-12 col-lg-4 text-end">
                <button class="btn btn-success btn-custom" type="button">Generar Excel</button>
            </div>
        </div>

        <div class="table-responsive-sm">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Tipo Documento</th>
                        <th>Numero Documento</th>
                        <th>Tipo Trabajador</th>
                        <th>Regimen Pencionario</th>
                        <th>Fecha Inscripción</th>
                        <th>CUSPP</th>
                        <th>Situación EPS</th>
                        <th>Tipo Pago</th>
                        <th>Acciones</th>
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
                                <div class="d-flex justify-content-between gap-1">
                                    <a href="{{ route('pensionistas.show', $pensionista->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('pensionistas.edit', $pensionista->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('pensionistas.destroy', $pensionista->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea eliminar este pensionista?');">
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
        
    </div>

   
</body> --}}

<body>
    <div class="container mt-5">
        
        {{-- @if (session('success')) --}}
        <div class="el-row is-justify-space-between row-bg">
            <div class="el-col el-col-24 el-col-xs-8 el-col-sm-10">
                <h5>Listado de Pensionistas</h5>
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
                    <col name="el-table_1_column7" width="16%">
                    <col name="el-table_1_column8" width="16%">
                    <col name="el-table_1_column9" width="16%">
                </colgroup>
                <thead class="">
                    <tr class="">
                        <th class="el-table_1_column_1 is-leaf el-table__cell" colspan="1" rowspan="1"
                            style="background: rgb(250, 251, 254);">
                            <div class="cell">ID</div>
                        </th>

                        <th class="el-table_1_column_2 is-leaf el-table__cell" colspan="1" rowspan="1"
                            style="background: rgb(250, 251, 254);">
                            <div class="cell">Tipo Documento</div>
                        </th>
                        <th class="el-table_1_column_3 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Tipo Trabajador</div>
                        </th>
                        <th class="el-table_1_column_4 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Regimen Pencionario</div>
                        </th>
                        <th class="el-table_1_column_5 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Fecha Inscripción</div>
                        </th>
                        <th class="el-table_1_column_6 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">CUSPP</div>
                        </th>
                        <th class="el-table_1_column_7 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Situación EPS</div>
                        </th>
                        <th class="el-table_1_column_8 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Tipo Pago</div>
                        </th>
                        <th class="el-table_1_column_9 is-leaf el-table__cell" colspan="1" rowspan="1"
                        style="background: rgb(250, 251, 254);">
                        <div class="cell">Acciones</div>
                        </th>
                        

                    </tr>
                </thead>

                {{-- prueba de tbody --}}
                <tbody>
                    @forelse ($datosPersonales as $pensionista)
                        <tr>
                            <td>{{ $pensionista->id }}</td>
                            <td>{{ $pensionista->tipoDocumento->descripcion ?? 'N/A' }}</td>
                            <td>{{ $pensionista->numero_documento }}</td>
                            <td>{{ $pensionista->tipoTrabajador->descripcion ?? 'N/A' }}</td>
                            <td>{{ $pensionista->regimenPencionario->descripcion ?? 'N/A' }}</td>
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