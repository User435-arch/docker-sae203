document.addEventListener("DOMContentLoaded", () => {
    const settingsIcon = document.getElementById("settings-icon");
    const dropdownMenu = document.getElementById("dropdown-menu");
    const trendingButton = document.getElementById("trending-button"); // Nouveau bouton

    // Ajoute un événement de clic sur l'engrenage
    settingsIcon.addEventListener("click", () => {
        // Bascule l'affichage du menu déroulant
        if (dropdownMenu.style.display === "block") {
            dropdownMenu.style.display = "none";
        } else {
            dropdownMenu.style.display = "block";
        }
    });

    // Ferme le menu déroulant si on clique en dehors
    document.addEventListener("click", (event) => {
        if (!settingsIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = "none";
        }
    });

    // Redirige vers la vidéo "rick_roll" lorsqu'on clique sur le bouton "Tendance"
    trendingButton.addEventListener("click", () => {
        window.location.href = "video.html?video=rick_roll";
    });
});