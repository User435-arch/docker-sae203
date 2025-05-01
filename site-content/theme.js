document.addEventListener("DOMContentLoaded", () => {
    const themeToggleButton = document.getElementById("theme-toggle");
    const body = document.body;

    // Vérifie si un thème est déjà enregistré dans le localStorage
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        body.classList.add(savedTheme);
    }

    // Change le thème lorsqu'on clique sur le bouton
    themeToggleButton.addEventListener("click", () => {
        if (body.classList.contains("dark-theme")) {
            body.classList.remove("dark-theme");
            localStorage.setItem("theme", ""); // Supprime le thème enregistré
        } else {
            body.classList.add("dark-theme");
            localStorage.setItem("theme", "dark-theme"); // Enregistre le thème sombre
        }
    });
});