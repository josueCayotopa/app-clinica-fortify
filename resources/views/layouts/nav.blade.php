<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
                
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                <div class="navbar-nav align-items-center" style="margin-right:10px">
                    

                    <span class="fw-semibold d-block   d-md-none"> Av. Arequipa 1148, Lima</span>
                </div>

                <div class="navbar-nav align-items-center d-none d-md-flex">
                    <div class="nav-item d-flex align-items-center">
                        <span class="fw-semibold d-block"> Av. Arequipa 1148, Lima</span>
                    </div>
                </div>





                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                    <span class="separator"></span>
                    <li class="d-none d-md-flex">
                        <div class="icons">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                title="Comprobantes enviados/por enviar">
                                <i class="bx bx-bell bx-sm"></i>
                                <span class="badge bg-danger rounded-pill badge-notifications"> 
                                    1 <!--  Numero de notificaciones  que le llegan-->
                                </span>
                            </a>
                        </div>
                    </li>

                    
                    <li class="d-none d-md-flex">
                        {{ Auth::user()->name }}
                    </li>

                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">

                                 <!-- Imagen del perfil -->
                                <img src="#"
                                    alt class="w-px-40 h-auto rounded-circle" width="200" />
                            </div>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="#"
                                                    width="200" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-semibold d-block">
                                                {{ Auth::user()->name }}
                                            </span>
                                            <small class="text-muted">
                                                {{ Auth::user()->name }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                
                                <a class="dropdown-item"
                                    href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Mi Perfil</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">{{ __('Logout') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>