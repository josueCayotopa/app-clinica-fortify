<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Recursos Humanos</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('/images/icon-grupo.png') }}" />

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />


    <!-- Icons. Uncomment required icon fonts -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Core CSS
    
    -->

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app-cll-crud.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/apex-charts.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/perfect-scrollbar.css') }}">


    <!-- dashboard -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />


    <link rel="stylesheet" href="{{ asset('./style.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- CSS Libraries -->

    <!-- Template CSS -->



    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="{{ asset('/js/helpers.js') }}"></script>
    <script src="{{ asset('/js/config.js') }}"></script>
    <script src="{{ asset('/js/ui-toasts.js') }}"></script>
    @livewireStyles

    <!-- Scripts -->

</head>

<body cz-shortcut-listen="true">

    <!-- Layout wrapper -->
    <div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true"
        data-delay="2000">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">MENSAJE</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <h5 id="txtmensaje" class="toast-body" style="color: white"></h5>
        <!-- <div class="toast-body">Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.</div> -->
    </div>
    <div class="layout-wrapper layout-content-navbar "style="height: 100%; width:100%; ">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.aside')

            <div class="layout-page">
                @include('layouts.nav')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper d-flex flex-column flex-grow-0 overflow-auto"
                    style="height: 100%; width:100%; ">
                    <div class="container-xxl flex-grow-0 container-p-y d-flex flex-column overflow-hidden"
                        style="height: 100%; width:100%; ">
                        <div class="row flex-grow-1 overflow-hidden" style="height: 100%; width:100%; ">
                            <div class="col-lg-12 mb-0 order-0 d-flex flex-column h-100"
                                style="width:100%; height: 100%;  ">
                                <div class="card flex-grow-0 d-flex flex-column h-100"
                                    style="width:100%; height: 100%; ">
                                    <div class="d-flex align-items-end row flex-grow-0 h-100">
                                        <div class="col-md-12 h-100 d-flex flex-column"
                                            style="width:100%; height: 100%; ">
                                            <div class="card flex-grow-0 d-flex flex-column ml-1 mr-1  overflow-auto"
                                                style="width:100%; height:100%;">
                                                <main class="main-content flex-grow-0 " style="height:100%;">
                                                    @yield('content')
                                                    @livewireScripts
                                                </main>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        @include('layouts.footer')
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>


    <script src="{{ asset('/js/perfect-scrollbar.js') }}"></script>


    <script src="{{ asset('/js/menu.js') }}"></script>


    <!-- endbuild -->

    <!-- Vendors JS -->



    <!-- Main JS -->
    <script src="{{ asset('/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('/js/dashboards-analytics.js') }}"></script>



    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    </script>


</body>

</html>
