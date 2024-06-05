$(document).ready(function() {
    $('#departamentos').on('change', function() {
        var departamentoId = $(this).val();
        var url = $(this).data('get-provincias');
        if (departamentoId) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    departamento_id: departamentoId
                },
                success: function(data) {
                    $('#provincias').empty().append(
                        '<option value="" disabled selected>Selecciona una Provincia</option>'
                        );
                    $.each(data, function(key, value) {
                        $('#provincias').append('<option value="' + key + '">' +
                            value + '</option>');
                    });
                }
            });
        } else {
            $('#provincias').empty().append(
                '<option value="" disabled selected>Selecciona una Provincia</option>');
            $('#distritos').empty().append(
                '<option value="" disabled selected>Selecciona un Distrito</option>');
        }
    });

    $('#provincias').on('change', function() {
        var provinciaId = $(this).val();
        var url = $(this).data('get-distritos');
        if (provinciaId) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    provincia_id: provinciaId
                },
                success: function(data) {
                    $('#distritos').empty().append(
                        '<option value="" disabled selected>Selecciona un Distrito</option>'
                        );
                    $.each(data, function(key, value) {
                        $('#distritos').append('<option value="' + key + '">' +
                            value + '</option>');
                    });
                }
            });
        } else {
            $('#distritos').empty().append(
                '<option value="" disabled selected>Selecciona un Distrito</option>');
        }
    });
});