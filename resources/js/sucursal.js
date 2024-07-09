/* $(document).ready(function() {
    $('#empresa_id').change(function() {
        var empresaID = $(this).val();
        if(empresaID) {
            $.ajax({
                url: '/get-sucursales/' + empresaID,
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
            $('#sucursal_id').empty().prop('disabled', true);
            $('#distrito_id').empty().prop('disabled', true);
        }
    });

    $('#sucursal_id').change(function() {
        var sucursalID = $(this).val();
        if(sucursalID) {
            $.ajax({
                url: '/get-distritos/' + sucursalID,
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
    var oldEmpresaID = "{{ old('empresa_id', $sucursal->empresa_id ?? '') }}";
    var oldSucursalID = "{{ old('sucursal_id', $sucursal->sucursal_id ?? '') }}";
    var oldDistritoId = "{{ old('distrito_id', $sucursal->distrito_id ?? '') }}";

    if(oldEmpresaID) {
        $('#empresa_id').val(oldEmpresaID).trigger('change');
    }

    if(oldSucursalID) {
        $.ajax({
            url: '/get-provincias/' + oldEmpresaID,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#sucursal_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona una Provincia</option>');
                $.each(data, function(key, value) {
                    $('#sucursal_id').append('<option value="'+ key +'" '+ (key == oldSucursalID ? 'selected' : '') +'>'+ value +'</option>');
                });

                if(oldDistritoId) {
                    $.ajax({
                        url: '/get-distritos/' + oldSucursalID,
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
 */

$(document).ready(function() {
    $('#empresa_id').change(function() {
        var empresaID = $(this).val();
        if (empresaID) {
            $.ajax({
                url: '/get-sucursales/' + empresaID,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#sucursal_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona una sucursal</option>');
                    $.each(data, function(key, value) {
                        $('#sucursal_id').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        } else {
            $('#sucursal_id').empty().prop('disabled', true);
        }
    });

    // Cargar sucursales si los valores antiguos existen después de la validación
    var oldEmpresaID = "{{ old('empresa_id', $sucursal->empresa_id ?? '') }}";
    var oldSucursalID = "{{ old('sucursal_id', $sucursal->sucursal_id ?? '') }}";

    if (oldEmpresaID) {
        $('#empresa_id').val(oldEmpresaID).trigger('change');
    }

    if (oldSucursalID) {
        $.ajax({
            url: '/get-sucursales/' + oldEmpresaID,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#sucursal_id').empty().prop('disabled', false).append('<option value="" disabled selected>Selecciona una sucursal</option>');
                $.each(data, function(key, value) {
                    $('#sucursal_id').append('<option value="'+ key +'" '+ (key == oldSucursalID ? 'selected' : '') +'>'+ value +'</option>');
                });
            }
        });
    }
});
