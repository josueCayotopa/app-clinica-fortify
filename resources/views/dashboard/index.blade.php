@extends('home')
@section('home')
    <div class="container mt-5 cajaDash">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 bg-custom">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            10
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Personas</h4>
                        </div>
                        <div class="card-body">
                            <h4> {{ $usuarios }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Trabajando</h4>
                        </div>
                        <div class="card-body">
                            <h4> {{ $onlineUsers }} </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total de adelantos</h4>
                        </div>
                        <div class="card-body">
                            47
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title"> Tasa de contratación </h4>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="tasaContratacion"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title"> Distribución por edad </h4>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="disEdad"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title"> Distribucion por géneros </h4>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="disgen"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title"> Número de ausencias de los empleados </h4>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="numAusen"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title"> Tasa de retención de empleados </h4>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="retEmp"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title"> Numero de ####3 </h4>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="myChart6"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- partial -->

    <script src="{{ asset('./script.js') }}"></script>

    <!-- Graficos CHARTS -->
    <script src="{{ asset('./graficos.js') }}"></script>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets_copy/modules/jquery.min.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/popper.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/tooltip.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/bootstrap/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/nicescroll/jquery.nicescroll.min.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/moment.min.js') }} "></script>
    <script src="{{ asset('assets_copy/js/stisla.js') }} "></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets_copy/modules/simple-weather/jquery.simpleWeather.min.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/chart.min.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/jqvmap/dist/jquery.vmap.min.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/jqvmap/dist/maps/jquery.vmap.world.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/summernote/summernote-bs4.js') }} "></script>
    <script src="{{ asset('assets_copy/modules/chocolat/dist/js/jquery.chocolat.min.js') }} "></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets_copy/js/page/index-0.js') }} "></script>

    {{-- datos geoespaciales --}}
    <script src="https://d3js.org/d3.v6.min.js"></script>
    <script src="https://unpkg.com/topojson@3"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets_copy/js/scripts.js') }} "></script>
    <script src="{{ asset('assets_copy/js/custom.js') }} "></script>
@endsection
