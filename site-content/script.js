document.addEventListener("DOMContentLoaded", () => {
    const videoLinks = document.querySelectorAll(".video-link");

    videoLinks.forEach(link => {
        link.addEventListener("click", event => {
            event.preventDefault(); // Empêche la redirection par défaut
            const videoName = link.getAttribute("data-video"); // Récupère le nom de la vidéo
            window.location.href = `video.html?video=${encodeURIComponent(videoName)}`; // Redirige avec le nom de la vidéo en paramètre
        });
    });
});