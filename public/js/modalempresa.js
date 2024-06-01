$(document).ready(function() {
  // Controla la apertura del modal
  $('#crearEmpresaModal').on('shown.bs.modal', function() {
    $('#codigo_empresa').focus(); // Establece el foco en el primer campo del formulario
  });

  // Controla el envío del formulario
  $('#guardarEmpresaBtn').click(function() {
    var formData = $('#crearEmpresaForm').serialize(); // Obtiene los datos del formulario

    // Envía los datos del formulario al servidor utilizando AJAX
    $.ajax({
      url: 'empresas.crate', // Ruta en tu controlador de Laravel para procesar la creación de la empresa
      type: 'POST',
      data: formData,
      success: function(response) {
        // Maneja la respuesta del servidor
        console.log(response);
        $('#crearEmpresaModal').modal('hide'); // Cierra el modal después de guardar los datos
      },
      error: function(error) {
        // Maneja los errores en caso de que ocurra alguno
        console.log(error);
      }
    });
  });
});