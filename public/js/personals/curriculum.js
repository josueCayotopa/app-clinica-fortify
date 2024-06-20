document.getElementById('curriculum').addEventListener('change', function() {
    const fileInput = this;
    const file = fileInput.files[0];
    const fileLabel = document.getElementById('curriculumLabel');

    if (file) {
        fileLabel.textContent = file.name;
    } else {
        fileLabel.textContent = 'Ningún archivo seleccionado';
    }
});