
function validateAndSubmit() {
    const form = document.getElementById('personalForm');
    const formData = new FormData(form);
    const errors = {};

    // Clear previous error messages
    document.querySelectorAll('.error.text-danger').forEach(el => el.remove());

    // Client-side validation
    const anoProceso = formData.get('ano_proceso');
    const numUitDeducible = formData.get('num_uit_deducible');
    const meses = formData.getAll('meses[]');

    if (!anoProceso || anoProceso.length !== 4 || isNaN(anoProceso)) {
        errors.ano_proceso = 'El campo Año Proceso es obligatorio y debe tener 4 dígitos.';
    }

    if (!numUitDeducible || isNaN(numUitDeducible)) {
        errors.num_uit_deducible = 'El campo Número UIT Deducible es obligatorio y debe ser un número.';
    }

    for (let i = 0; i < meses.length; i++) {
        if (!meses[i] || isNaN(meses[i])) {
            errors[`meses[${i + 1}]`] = 'El importe para cada mes es obligatorio y debe ser un número.';
        }
    }

    // If there are errors, display them and stop the form submission
    if (Object.keys(errors).length > 0) {
        for (const key in errors) {
            const errorSpan = document.createElement('span');
            errorSpan.classList.add('error', 'text-danger');
            errorSpan.textContent = errors[key];

            if (key.startsWith('meses[')) {
                const monthIndex = key.match(/\d+/)[0];
                document.querySelector(`input[name="meses[${monthIndex}]"]`).closest('td').appendChild(errorSpan);
            } else {
                document.querySelector(`[name="${key}"]`).closest('.el-form-item__content').appendChild(errorSpan);
            }
        }
        return;
    }

    // Submit the form using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', form.action);
    xhr.setRequestHeader('X-CSRF-TOKEN', form.querySelector('input[name="_token"]').value);

    xhr.onload = function() {
        if (xhr.status === 200) {
            // Handle success (e.g., close modal and refresh table or show success message)
            $('#exampleModal').modal('hide');
            location.reload(); // Or any other logic to update the UI
        } else {
            // Handle error (e.g., show error messages)
            const response = JSON.parse(xhr.responseText);
            if (response.errors) {
                for (const key in response.errors) {
                    const errorSpan = document.createElement('span');
                    errorSpan.classList.add('error', 'text-danger');
                    errorSpan.textContent = response.errors[key];

                    if (key.startsWith('meses.')) {
                        const monthIndex = key.match(/\d+/)[0];
                        document.querySelector(`input[name="meses[${monthIndex}]"]`).closest('td').appendChild(errorSpan);
                    } else {
                        document.querySelector(`[name="${key}"]`).closest('.el-form-item__content').appendChild(errorSpan);
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

