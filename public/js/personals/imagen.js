document.getElementById('imagen').addEventListener('change', function() {
    const fileInput = this;
    const file = fileInput.files[0];
    const previewWrapper = document.getElementById('imagenPreviewWrapper');
    const preview = document.getElementById('imagenPreview');
    const fileLabel = document.getElementById('fileLabel');
    const cancelarBtn = document.getElementById('cancelarImagenBtn');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewWrapper.style.display = 'block';
            fileLabel.style.display = 'none';
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        previewWrapper.style.display = 'none';
        fileLabel.style.display = 'inline';
    }
});

document.getElementById('cancelarImagenBtn').addEventListener('click', function() {
    const fileInput = document.getElementById('imagen');
    const previewWrapper = document.getElementById('imagenPreviewWrapper');
    const fileLabel = document.getElementById('fileLabel');

    fileInput.value = null; // Reset input value to clear selection
    previewWrapper.style.display = 'none';
    fileLabel.style.display = 'inline';
});