<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">

                <img src=" {{ asset('/images/grupoempresarial2.png') }}" height="50">

            </span>

        </a>


        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block">
            <i class="ri-arrow-left-s-line "></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{ route('home.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>



        <li class="menu-item">
            <a href="#" class="menu-link menu-toggle">
                <i class='menu-icon bx bx-group'></i>
                <div data-i18n="Ventas">Empleados</div>
            </a>
            <ul class="menu-sub">
                
                <li class="menu-item">
                    <a href="{{ route('personals.index') }}" class="menu-link">
                       
                        <div data-i18n="Empleado">Empleado</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Ventas">Generar Contrato</div>
                    </a>
                </li>



                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle">
                        <div data-i18n="Ventas">Tabla para Planilla</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('conocimiento.index') }}" class="menu-link">
                                <div data-i18n="Ventas">Conocimientos</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('profesion.index') }}" class="menu-link">
                                <div data-i18n="Ventas">Profesiones</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('zona.index') }}" class="menu-link">
                                <div data-i18n="Ventas">Zonas</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('institucion.index') }}" class="menu-link">
                                <div data-i18n="Ventas">Instituciones</div>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle">
                        <div data-i18n="New Sale">Maestros</div>

                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('categoria-cargo.indexcargocategoria') }}" class="menu-link">
                                <div data-i18n="Ventas">Categorias y Cargo</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="afp.descuentos.index" class="menu-link">
                                <div data-i18n="Ventas">AFP y DESC.</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Ventas">Relacion AFP al Concepto</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Ventas">Definicion de Planilla Oficial</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Ventas">Comprobante Contable</div>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle">
                        <div data-i18n="Ventas">Formulas</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('formulas.index') }}" class="menu-link">
                                <div data-i18n="Ventas">Formulas</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('conceptos.index') }}" class="menu-link">
                                <div data-i18n="Ventas">Conceptos</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Ventas">Acumuacion de conceptos</div>
                            </a>
                        </li>
                       

                    </ul>

                </li>
            </ul>
        </li>
        <li class="menu-item ">
            @can('vacaciones')
            <a href="#" class="menu-link menu-toggle">
                <i class='menu-icon bx bx-map-alt'> </i>
                <div data-i18n="Ventas">Vacaciones</div>
            </a>
             @endcan
            
            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="New Sale">Solicitar Vacaciones</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('vacaciones.asignar.index') }}" class="menu-link">
                        <div data-i18n="New Sale">Asignar Vacaciones</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('vacaciones.calendario.index') }}" class="menu-link">
                        <div data-i18n="Ventas">Calendario de vacaciones</div>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="{{ route('solicitud_licencias.index')}}" class="menu-link">
                        <div data-i18n="Ventas">Solicitar Licencias</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item  ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon bx bx-id-card'></i>
                <div data-i18n="Account Settings">Beneficios Sociales</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item ">
                    <a href="#" class="menu-link menu-toggle">
                        <div data-i18n="Productos">Seguro Medico Fam</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item  ">
                            <a href="#" class="menu-link">
                                <div data-i18n="Categories">Plan</div>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="menu-item  ">
                    <a href="#" class="menu-link">
                        <div data-i18n="Categories">Boletas</div>
                    </a>
                </li>


                <li class="menu-item ">
                    <a href="#" class="menu-link">
                        <div data-i18n="Brands">Marcas</div>
                    </a>
                </li>

            </ul>
        </li>


        <li class="menu-item ">
            <a href="#" class="menu-link menu-toggle">
                <i class='menu-icon bx bx-folder-open'></i>
                <div data-i18n="Purchases">Formatos Digitales</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="New Requirement">Nuevo</div>
                    </a>
                </li>


                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Requirements">Lista</div>
                    </a>
                </li>

            </ul>
        </li>



       
        @can('user_index')           
        
        <li class="menu-item ">
            <a href="#" class="menu-link menu-toggle">
                <i class='menu-icon bx bx-map-alt'> </i>
                <div data-i18n="Ventas">Usuarios</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="{{ route('users.create') }}" class="menu-link">
                        <div data-i18n="New Sale">Nuevo Usuario</div>
                    </a>
                </li>


                <li class="menu-item">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="Ventas">Usuarios</div>
                    </a>
                </li>
                @can('role_index')
                    
                
                <li class="menu-item">
                    <a href="{{ route('roles.index') }}" class="menu-link">
                        <div data-i18n="Ventas">Roles</div>
                    </a>
                </li>
                @endcan
                @can('permission_index')
                    
               
                <li class="menu-item">
                    <a href="{{ route('permissions.index') }}" class="menu-link">
                        <div data-i18n="Ventas">Permisos</div>
                    </a>
                </li>
                
                @endcan

            </ul>

        </li>
        @endcan
            
      
        <li class="menu-item ">
            <a href="#" class="menu-link menu-toggle">
                <i class='menu-icon bx bx-map-alt'> </i>
                <div data-i18n="configuracion">Configuracion</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="{{ route('empresas.index') }}" class="menu-link">
                        <div data-i18n="empresa">Empresa</div>
                    </a>
                </li>


                <li class="menu-item">
                    <a href="{{ route('sucursales.index') }}" class="menu-link">
                        <div data-i18n="sucursal"> Sucursales</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('uits.index') }}" class="menu-link">
                        <div data-i18n="uit"> UIT</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('sucursales.index') }}" class="menu-link">
                        <div data-i18n="empresa"> Descuentos AFP</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('sucursales.index') }}" class="menu-link">
                        <div data-i18n="empresa"> Semanas</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('tipo_trabajador_ipsses.index') }}" class="menu-link">
                        <div data-i18n="empresa"> Tipo Trabajador ESSALUD</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('sucursales.index') }}" class="menu-link">
                        <div data-i18n="empresa"> Tipos de Planillas</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('sucursales.index') }}" class="menu-link">
                        <div data-i18n="empresa"> Prestamos c/ Conceptos</div>
                    </a>
                </li>

            </ul>
        </li>

    </ul>
</aside>
