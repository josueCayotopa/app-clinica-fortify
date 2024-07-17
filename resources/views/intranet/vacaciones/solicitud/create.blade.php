<body>
    <div class="container mt-5">
        <h1 class="mb-4">Asignar Vacaciones</h1>
        <form id="vacationForm" method="POST" action="{{ route('vacaciones.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" value="{{ $trabajador->nombres }} {{ $trabajador->apellido_paterno }} {{ $trabajador->apellido_materno }}" disabled>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
            </div>
            <div class="form-group">
                <label for="dias_vacaciones">Días de Vacaciones</label>
                <input type="text" class="form-control" id="dias_vacaciones" disabled>
            </div>
            <button type="submit" class="btn btn-primary">Asignar Vacaciones</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            function calculateVacationDays() {
                var startDate = $('#fecha_inicio').val();
                var endDate = $('#fecha_fin').val();

                if (startDate && endDate) {
                    var start = moment(startDate);
                    var end = moment(endDate);
                    var vacationDays = end.diff(start, 'days') + 1;

                    $('#dias_vacaciones').val(vacationDays);
                }
            }

            $('#fecha_inicio, #fecha_fin').on('change', calculateVacationDays);
        });
    </script>
</body>