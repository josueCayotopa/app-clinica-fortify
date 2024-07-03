function showImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('uploadedImage').src = e.target.result;
            document.getElementById('uploadedImage').style.display = 'block';
            document.querySelector('.bx-landscape').style.display = 'none';
            document.querySelector('.remove-image').style.display = 'block';
            document.getElementById('image_url').value = e.target
                .result; // Actualizar el input hidden con la URL de la imagen
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage(event) {
    event.stopPropagation(); // Prevent the wrapper click event
    document.getElementById('uploadedImage').src = '';
    document.getElementById('uploadedImage').style.display = 'none';
    document.querySelector('.bx-landscape').style.display = 'block';
    document.querySelector('.remove-image').style.display = 'none';
    document.getElementById('imageUpload').value = ''; // Clear the input value
    document.getElementById('image_url').value = ''; // Clear the hidden input value
}
