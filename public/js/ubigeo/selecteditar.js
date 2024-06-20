$(document).ready(function() {
    var oldDepartamentoId = "{{ old('departamento_id', $empresa->departamento_id ?? '') }}";
    var oldProvinciaId = "{{ old('provincia_id', $empresa->provincia_id ?? '') }}";
    var oldDistritoId = "{{ old('distrito_id', $empresa->distrito_id ?? '') }}";

    // Cargar departamentos
    cargarDepartamentos(oldDepartamentoId, function() {
        // Una vez cargados los departamentos, cargar provincias si hay un departamento seleccionado previamente
        if (oldDepartamentoId) {
            cargarProvincias(oldDepartamentoId, oldProvinciaId, function() {
                // Una vez cargadas las provincias, cargar distritos si hay una provincia seleccionada previamente
                if (oldProvinciaId) {
                    cargarDistritos(oldProvinciaId, oldDistritoId);
                }
            });
        }
    });

    // Manejar el cambio en el departamento
    $('#departamento_id').on('change', function() {
        var departamentoId = $(this).val();
        cargarProvincias(departamentoId, null);
        $('#distrito_id').empty().append('<option value="" disabled selected>Selecciona un Distrito</option>');
    });

    // Manejar el cambio en la provincia
    $('#provincia_id').on('change', function() {
        var provinciaId = $(this).val();
        cargarDistritos(provinciaId, null);
    });

    // Función para cargar departamentos
    function cargarDepartamentos(selectedDepartamentoId, callback) {
        var departamentoSelect = $('#departamento_id');
        departamentoSelect.empty().append('<option value="" disabled selected>Selecciona un Departamento</option>');
        departamentoSelect.append($('#departamentos-options').html()); // Agregar opciones de departamento desde la vista
        if (selectedDepartamentoId) {
            departamentoSelect.val(selectedDepartamentoId);
        }
        if (callback) callback();
    }

    // Función para cargar provincias
    function cargarProvincias(departamentoId, selectedProvinciaId, callback) {
        var url = $('#departamento_id').data('get-provincias');
        if (departamentoId) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    departamento_id: departamentoId
                },
                success: function(data) {
                    var provinciaSelect = $('#provincia_id');
                    provinciaSelect.empty().append('<option value="" disabled selected>Selecciona una Provincia</option>');
                    $.each(data, function(key, value) {
                        provinciaSelect.append('<option value="' + key + '">' + value + '</option>');
                    });
                    if (selectedProvinciaId) {
                        provinciaSelect.val(selectedProvinciaId).trigger('change');
                    }
                    if (callback) callback();
                }
            });
        } else {
            $('#provincia_id').empty().append('<option value="" disabled selected>Selecciona una Provincia</option>');
            $('#distrito_id').empty().append('<option value="" disabled selected>Selecciona un Distrito</option>');
        }
    }

    // Función para cargar distritos
    function cargarDistritos(provinciaId, selectedDistritoId) {
        var url = $('#provincia_id').data('get-distritos');
        if (provinciaId) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    provincia_id: provinciaId
                },
                success: function(data) {
                    var distritoSelect = $('#distrito_id');
                    distritoSelect.empty().append('<option value="" disabled selected>Selecciona un Distrito</option>');
                    $.each(data, function(key, value) {
                        distritoSelect.append('<option value="' + key + '">' + value + '</option>');
                    });
                    if (selectedDistritoId) {
                        distritoSelect.val(selectedDistritoId);
                    }
                }
            });
        } else {
            $('#distrito_id').empty().append('<option value="" disabled selected>Selecciona un Distrito</option>');
        }
    }
});
