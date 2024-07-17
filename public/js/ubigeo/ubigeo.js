$(document).ready(function () {
    // Función para cargar provincias basadas en el departamento seleccionado
    function cargarProvincias(departamentoId, provinciaSeleccionada = null) {
        $.ajax({
            url: '/get-provincias/' + departamentoId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#provincia_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona una Provincia</option>');
                $.each(data, function (key, value) {
                    $('#provincia_id').append('<option value="' + key + '" ' + (key == provinciaSeleccionada ? 'selected' : '') + '>' + value + '</option>');
                });

                // Si hay una provincia seleccionada, cargar también los distritos correspondientes
                if (provinciaSeleccionada) {
                    cargarDistritos(provinciaSeleccionada);
                } else {
                    $('#distrito_id').empty().prop('disabled', true);
                }
            }
        });
    }

    // Función para cargar distritos basados en la provincia seleccionada
    function cargarDistritos(provinciaId, distritoSeleccionado = null) {
        $.ajax({
            url: '/get-distritos/' + provinciaId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#distrito_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona un Distrito</option>');
                $.each(data, function (key, value) {
                    $('#distrito_id').append('<option value="' + key + '" ' + (key == distritoSeleccionado ? 'selected' : '') + '>' + value + '</option>');
                });
            }
        });
    }

    // Manejar cambio en el selector de departamento
    $('#departamento_id').change(function () {
        var departamentoId = $(this).val();
        if (departamentoId) {
            cargarProvincias(departamentoId);
        } else {
            $('#provincia_id').empty().prop('disabled', true);
            $('#distrito_id').empty().prop('disabled', true);
        }
    });

    // Manejar cambio en el selector de provincia
    $('#provincia_id').change(function () {
        var provinciaId = $(this).val();
        if (provinciaId) {
            cargarDistritos(provinciaId);
        } else {
            $('#distrito_id').empty().prop('disabled', true);
        }
    });

    // Cargar provincias y distritos si los valores antiguos existen después de la validación
    var oldDepartamentoId = "{{ old('departamento_id') }}";
    var oldProvinciaId = "{{ old('provincia_id') }}";
    var oldDistritoId = "{{ old('distrito_id') }}";

    if (oldDepartamentoId) {
        cargarProvincias(oldDepartamentoId, oldProvinciaId);
    }

    if (oldProvinciaId && oldDistritoId) {
        cargarDistritos(oldProvinciaId, oldDistritoId);
    }
});
