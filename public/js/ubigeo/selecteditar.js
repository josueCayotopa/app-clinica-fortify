$(document).ready(function() {
    // Cargar provincias al seleccionar un departamento
    $('#departamento_id').change(function() {
        var departamento_id = $(this).val();
        if (departamento_id) {
            $.ajax({
                url: "{{ route('getProvincias') }}",
                type: 'GET',
                data: {
                    departamento_id: departamento_id
                },
                success: function(response) {
                    $('#provincia_id').empty();
                    $('#distrito_id').empty();
                    $('#provincia_id').removeAttr('disabled');
                    $('#provincia_id').append('<option value="" disabled>Selecciona una Provincia</option>');
                    $.each(response, function(key, value) {
                        $('#provincia_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('#provincia_id').empty();
            $('#distrito_id').empty();
            $('#provincia_id').attr('disabled', 'disabled');
        }
    });

    // Cargar distritos al seleccionar una provincia
    $('#provincia_id').change(function() {
        var provincia_id = $(this).val();
        if (provincia_id) {
            $.ajax({
                url: "{{ route('getDistritos') }}",
                type: 'GET',
                data: {
                    provincia_id: provincia_id
                },
                success: function(response) {
                    $('#distrito_id').empty();
                    $('#distrito_id').removeAttr('disabled');
                    $('#distrito_id').append('<option value="" disabled>Selecciona un Distrito</option>');
                    $.each(response, function(key, value) {
                        $('#distrito_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        } else {
            $('#distrito_id').empty();
            $('#distrito_id').attr('disabled', 'disabled');
        }
    });

    // Mantener selección dinámica al cargar la página
    $('#departamento_id').change();
    $('#provincia_id').change();
});
