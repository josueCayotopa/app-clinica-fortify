/**
 * Función para validar y enviar el formulario usando AJAX.
 */
function validateAndSubmit() {
    const form = document.getElementById('personalForm');
    const formData = new FormData(form);
    const errors = {};

    // Limpiar mensajes de error previos
    document.querySelectorAll('.error.text-danger').forEach(el => el.remove());

    // Validación del lado del cliente basada en las reglas del lado del servidor
    const requiredFields = [
        'tipo_documento_id', 'numero_documento', 'apellido_paterno', 'apellido_materno',
        'nombres', 'fecha_nacimiento', 'sexo', 'nacionalidad_id', 'telefono',
        'correo_electronico', 'imagen', 'curriculum', 'essalud_vida', 'domiciliado',
        'via_id', 'nombre_via', 'numero_via', 'interior', 'zona_id', 'nombre_zona',
        'referencia', 'distrito_id', 'tipo_trabajador_id', 'regimen_laboral',
        'nivel_edicativo_id', 'ocupacion_id', 'discapacidad', 'regimen_pencionario_id',
        'fecha_inscripcion_regimen', 'CUSPP', 'SCTR_salud', 'SCTR_pension',
        'contrato_trabajo_id', 'trabajo_sujeto_alt_acum_atip_desc',
        'trabajo_sujeto_jornda_maxima', 'trabajo_sujeto_horario_noctur',
        'ingresos_quinta_categoria', 'sindicalizado', 'periodicidad_id',
        'afiliado_eps_servicios_propios', 'eps_id', 'situacion_id', 'renta_quinta_categoria',
        'situacion_especial_trabajador', 'tipo_pago_id', 'afilacion_asegura_pension',
        'categoria_ocupacional_trabajador', 'convenio_id'
    ];

    // Validación básica de campos requeridos
    requiredFields.forEach(field => {
        if (!formData.get(field)) {
            errors[field] = `El campo ${field.replace('_', ' ')} es obligatorio.`;
        }
    });

    // Validación de correo electrónico si está presente
    const email = formData.get('correo_electronico');
    if (email && !isValidEmail(email)) {
        errors.correo_electronico = 'El correo electrónico no es válido.';
    }

    // Validación de tipo de imagen si está presente
    const imagen = formData.get('imagen');
    if (imagen && !isValidImageType(imagen)) {
        errors.imagen = 'El archivo de imagen no es válido. Debe ser JPEG, PNG, JPG o GIF.';
    }

    // Validación de tipo de documento si está presente
    const curriculum = formData.get('curriculum');
    if (curriculum && !isValidDocumentType(curriculum)) {
        errors.curriculum = 'El archivo de curriculum no es válido. Debe ser PDF, DOC o DOCX.';
    }

    // Si hay errores, mostrarlos y detener el envío del formulario
    if (Object.keys(errors).length > 0) {
        for (const key in errors) {
            const errorSpan = document.createElement('span');
            errorSpan.classList.add('error', 'text-danger');
            errorSpan.textContent = errors[key];

            const fieldName = key.replace('_', '-'); // Convertir guión bajo a guión para nombre del elemento
            const fieldElement = document.querySelector(`[name="${fieldName}"]`);
            if (fieldElement) {
                fieldElement.closest('.el-form-item__content').appendChild(errorSpan);
            } else {
                // Manejar casos especiales como arrays de meses si es necesario
                console.error(`Elemento de campo no encontrado para ${fieldName}`);
            }
        }
        return;
    }

    // Enviar el formulario usando AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', form.action);
    xhr.setRequestHeader('X-CSRF-TOKEN', form.querySelector('input[name="_token"]').value);

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Manejar éxito (por ejemplo, cerrar modal y actualizar tabla o mostrar mensaje de éxito)
            $('#nuevoPersonalModal').modal('hide');
            location.reload(); // O cualquier otra lógica para actualizar la interfaz de usuario
        } else {
            // Manejar error (por ejemplo, mostrar mensajes de error)
            const response = JSON.parse(xhr.responseText);
            if (response.errors) {
                for (const key in response.errors) {
                    const errorSpan = document.createElement('span');
                    errorSpan.classList.add('error', 'text-danger');
                    errorSpan.textContent = response.errors[key];

                    const fieldName = key.replace('.', '_'); // Convertir notación de punto a guión bajo para nombre del elemento
                    const fieldElement = document.querySelector(`[name="${fieldName}"]`);
                    if (fieldElement) {
                        fieldElement.closest('.el-form-item__content').appendChild(errorSpan);
                    } else {
                        // Manejar casos especiales como arrays de meses si es necesario
                        console.error(`Elemento de campo no encontrado para ${fieldName}`);
                    }
                }
            }
        }
    };

    xhr.onerror = function() {
        console.error(xhr.responseText);
    };

    xhr.send(formData);
}

/**
 * Función para validar un correo electrónico.
 * @param {string} email - Correo electrónico a validar.
 * @returns {boolean} Verdadero si el correo electrónico es válido, falso de lo contrario.
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

/**
 * Función para validar el tipo de archivo de imagen.
 * @param {File} imageFile - Archivo de imagen a validar.
 * @returns {boolean} Verdadero si el tipo de archivo es válido, falso de lo contrario.
 */
function isValidImageType(imageFile) {
    const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    return allowedTypes.includes(imageFile.type);
}

/**
 * Función para validar el tipo de archivo de documento.
 * @param {File} documentFile - Archivo de documento a validar.
 * @returns {boolean} Verdadero si el tipo de archivo es válido, falso de lo contrario.
 */
function isValidDocumentType(documentFile) {
    const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    return allowedTypes.includes(documentFile.type);
}
