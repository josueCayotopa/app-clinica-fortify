$(document).ready(function() {
    var oldDepartamentoId = "{{ old('departamento_id') }}";
    var oldProvinciaId = "{{ old('provincia_id') }}";
    var oldDistritoId = "{{ old('distrito_id') }}";

    if (oldDepartamentoId) {
        loadProvincias(oldDepartamentoId, oldProvinciaId);
    }

    if (oldProvinciaId) {
        loadDistritos(oldProvinciaId, oldDistritoId);
    }

    $('#departamento_id').on('change', function() {
        var departamentoId = $(this).val();
        loadProvincias(departamentoId);
    });

    $('#provincia_id').on('change', function() {
        var provinciaId = $(this).val();
        loadDistritos(provinciaId);
    });

    function loadProvincias(departamentoId, selectedProvinciaId = null) {
        if (departamentoId) {
            $.ajax({
                url: "{{ url('getProvincias') }}/" + departamentoId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#provincia_id').empty().prop('disabled', false).append(
                        '<option value="" disabled selected>Selecciona una Provincia</option>'
                    );
                    $('#distrito_id').empty().prop('disabled', true).append(
                        '<option value="" disabled selected>Selecciona un Distrito</option>'
                    );
                    $.each(data, function(key, value) {
                        $('#provincia_id').append('<option value="' + key + '"' + (
                                selectedProvinciaId == key ? ' selected' : '') +
                            '>' + value + '</option>');
                    });
                }
            });
        } else {
            $('#provincia_id').empty().prop('disabled', true).append(
                '<option value="" disabled selected>Selecciona una Provincia</option>');
            $('#distrito_id').empty().prop('disabled', true).append(
                '<option value="" disabled selected>Selecciona un Distrito</option>');
        }
    }

    function loadDistritos(provinciaId, selectedDistritoId = null) {
        if (provinciaId) {
            $.ajax({
                url: "{{ url('getDistritos') }}/" + provinciaId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#distrito_id').empty().prop('disabled', false).append(
                        '<option value="" disabled selected>Selecciona un Distrito</option>'
                    );
                    $.each(data, function(key, value) {
                        $('#distrito_id').append('<option value="' + key + '"' + (
                                selectedDistritoId == key ? ' selected' : '') +
                            '>' + value + '</option>');
                    });
                }
            });
        } else {
            $('#distrito_id').empty().prop('disabled', true).append(
                '<option value="" disabled selected>Selecciona un Distrito</option>');
        }
    }
});