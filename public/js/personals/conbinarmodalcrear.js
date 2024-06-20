document.getElementById('submitButton').addEventListener('click', function () {
    // Crear un objeto FormData
    let formData = new FormData();
  
    // Añadir datos del formulario general
    let formGeneral = document.getElementById('formGeneral');
    for (let i = 0; i < formGeneral.elements.length; i++) {
      let element = formGeneral.elements[i];
      if (element.name) {
        formData.append(element.name, element.value);
      }
    }
  
    // Añadir datos del formulario de contacto
    let formContacto = document.getElementById('formContacto');
    for (let i = 0; i < formContacto.elements.length; i++) {
      let element = formContacto.elements[i];
      if (element.name) {
        formData.append(element.name, element.value);
      }
    }
  
    // Añadir datos del formulario laboral
    let formLaboral = document.getElementById('formLaboral');
    for (let i = 0; i < formLaboral.elements.length; i++) {
      let element = formLaboral.elements[i];
      if (element.name) {
        formData.append(element.name, element.value);
      }
    }
  
    // Enviar los datos al servidor mediante Fetch API
    fetch("{{ route('personals.store') }}", {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Cerrar el modal y mostrar mensaje de éxito
        $('#personalModal').modal('hide');
        alert('Personal agregado exitosamente');
        // Redirigir o actualizar la página según sea necesario
        window.location.href = "{{ route('personal.index') }}";
      } else {
        // Mostrar errores
        alert('Hubo un error al agregar el personal');
      }
    })
    .catch(error => console.error('Error:', error));
  });