$(document).ready(function() {
    $('#departamento_id').change(function() {
        var departamentoId = $(this).val();
        if(departamentoId) {
            $.ajax({
                url: '/get-provincias/' + departamentoId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#sucursal_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona una Provincia</option>');
                    $.each(data, function(key, value) {
                        $('#sucursal_id').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    $('#distrito_id').empty().prop('disabled', true).append('<option value="" disabled selected>Selecciona un Distrito</option>');
                }
            });
        } else {
            $('#provincia_id').empty().prop('disabled', true);
            $('#distrito_id').empty().prop('disabled', true);
        }
    });

    $('#provincia_id').change(function() {
        var provinciaId = $(this).val();
        if(provinciaId) {
            $.ajax({
                url: '/get-distritos/' + provinciaId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#distrito_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona un Distrito</option>');
                    $.each(data, function(key, value) {
                        $('#distrito_id').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        } else {
            $('#distrito_id').empty().prop('disabled', true);
        }
    });

    // Cargar provincias y distritos si los valores antiguos existen después de la validación
    var oldDepartamentoId = "{{ old('departamento_id', $sucursal->departamento_id ?? '') }}";
    var oldProvinciaId = "{{ old('provincia_id', $sucursal->provincia_id ?? '') }}";
    var oldDistritoId = "{{ old('distrito_id', $sucursal->distrito_id ?? '') }}";

    if(oldDepartamentoId) {
        $('#departamento_id').val(oldDepartamentoId).trigger('change');
    }

    if(oldProvinciaId) {
        $.ajax({
            url: '/get-provincias/' + oldDepartamentoId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#provincia_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona una Provincia</option>');
                $.each(data, function(key, value) {
                    $('#provincia_id').append('<option value="'+ key +'" '+ (key == oldProvinciaId ? 'selected' : '') +'>'+ value +'</option>');
                });

                if(oldDistritoId) {
                    $.ajax({
                        url: '/get-distritos/' + oldProvinciaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#distrito_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona un Distrito</option>');
                            $.each(data, function(key, value) {
                                $('#distrito_id').append('<option value="'+ key +'" '+ (key == oldDistritoId ? 'selected' : '') +'>'+ value +'</option>');
                            });
                        }
                    });
                }
            }
        });
    }
});

/* 
$(document).ready(function() {
    $('#empresa_id').change(function() {
        var empresaId= $(this).val();
        if(empresaId) {
            $.ajax({
                url: '/get-sucursales/' + departamentoId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#sucursal_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona una Provincia</option>');
                    $.each(data, function(key, value) {
                        $('#sucursal_id').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    
                }
            });
        } else {
            // $('#provincia_id').empty().prop('disabled', true);
        }
    });
}); */