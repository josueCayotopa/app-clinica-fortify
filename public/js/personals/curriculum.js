function showFile(input) {
    if (input.files && input.files[0]) {
        document.querySelector('.bxs-file-doc').style.display = 'none';
        document.querySelector('.remove-file').style.display = 'block';
        document.getElementById('curriculum_url').value = input.files[0]
        .name; // Actualizar el input hidden con el nombre del archivo
    }
}

function removeFile(event) {
    event.stopPropagation(); // Prevent the wrapper click event
    document.querySelector('.bxs-file-doc').style.display = 'block';
    document.querySelector('.remove-file').style.display = 'none';
    document.getElementById('fileUpload').value = ''; // Clear the input value
    document.getElementById('curriculum_url').value = ''; // Clear the hidden input value
}