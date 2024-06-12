$(document).ready(function() {
    $('#guardar').click(function() {
        // Obtener los valores de los campos de formulario
        var data = {
            numero_documento: $('#numero_documento').val(),
            fecha_nacimiento: $('#fecha_nacimiento').val(),
            nombres: $('#nombres').val(),
            apellidos: $('#apellidos').val(),
            telefono: $('#telefono').val(),
            email: $('#email').val(),
            direccion: $('#direccion').val(),
            cargo: $('#cargo').val(),
            fecha_ingreso: $('#fecha_ingreso').val(),
            salario: $('#salario').val()
        };

        // Enviar los datos al servidor con AJAX
        $.ajax({
            url: '/empleados',  // Ajusta la URL según tu configuración de rutas
            type: 'POST',
            data: data,
            success: function(response) {
                // Manejar la respuesta del servidor
                console.log(response);
                // Puedes cerrar el modal y actualizar la tabla de empleados aquí
                $('#nuevoPersonalModal').modal('hide');
                // Actualiza la tabla de empleados, por ejemplo, recargando la página
                location.reload();
            },
            error: function(error) {
                // Manejar errores
                console.error(error);
            }
        });
    });
});
