@extends('layouts.app')
@section('content')
    <!-- Layout wrapper -->
    <div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">MENSAJE</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <h5 id="txtmensaje" class="toast-body" style="color: white"></h5>
        <!-- <div class="toast-body">Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.</div> -->
    </div>
    <div class="layout-wrapper layout-content-navbar "style="height: 100%; width:100%; ">
        <div class="layout-container" >
            <!-- Menu -->
            @include('layouts.aside')

            <div class="layout-page">
                @include('layouts.nav')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper d-flex flex-column flex-grow-0 overflow-auto" style="height: 100%; width:100%; ">
                    <div class="container-xxl flex-grow-0 container-p-y d-flex flex-column overflow-hidden" style="height: 100%; width:100%; ">
                        <div class="row flex-grow-1 overflow-hidden" style="height: 100%; width:100%; ">
                            <div class="col-lg-12 mb-0 order-0 d-flex flex-column h-100" style="width:100%; height: 100%;  ">
                                <div class="card flex-grow-0 d-flex flex-column h-100" style="width:100%; height: 100%; " >
                                    <div class="d-flex align-items-end row flex-grow-0 h-100">
                                        <div class="col-md-12 h-100 d-flex flex-column" style="width:100%; height: 100%; " >
                                            <div class="card flex-grow-0 d-flex flex-column ml-1 mr-1  overflow-auto"  style="width:100%; height:100%;" >
                                                <main class="main-content flex-grow-0 " style="height:100%;">
                                                    @yield('main')
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
@endsection
