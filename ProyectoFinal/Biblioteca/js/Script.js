// JavaScript
document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('main section');

    sections.forEach((section) => {
        section.classList.add('fade-in');
    });
});

const form = document.getElementById('contact-form');
const successMessage = document.getElementById('success-message');
const submitButton = document.getElementById('submit-button'); // Agrega un ID al botón de envío

form.addEventListener('submit', function (event) {
    event.preventDefault();
    
    const formData = new FormData(form);

    // Aquí puedes hacer la petición AJAX para enviar los datos del formulario a PHP y almacenarlos en la base de datos
    // Por simplicidad, aquí solo mostramos el mensaje de éxito
    form.style.display = 'none';
    successMessage.style.display = 'block';
});

// Agrega un evento click al botón de envío para mostrar el mensaje de éxito
submitButton.addEventListener('click', function () {
    successMessage.style.display = 'none';
});
