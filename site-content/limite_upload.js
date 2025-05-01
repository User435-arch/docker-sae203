const videoInput = document.getElementById('videoInput');
const uploadForm = document.getElementById('uploadForm');
const messageDiv = document.getElementById('message');

uploadForm.addEventListener('submit', function(event) {
    const file = videoInput.files[0];
    if (file) {
        const maxSize = 24 * 1024 * 1024;
        if (file.size > maxSize) {
            event.preventDefault(); // Empêche l'envoi du formulaire
            messageDiv.textContent = "Vidéo trop lourde (24mo MAX)";
        } else {
            messageDiv.textContent = ""; // OK
        }
    }
});