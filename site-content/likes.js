// Fonction pour charger les likes et dislikes
function loadLikesDislikes(videoName) {
    fetch(`likes.php?video=${encodeURIComponent(videoName)}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById("like-count").textContent = data.likes || 0;
            document.getElementById("dislike-count").textContent = data.dislikes || 0;
        })
        .catch(error => console.error("Erreur lors du chargement des likes/dislikes :", error));
}

// Fonction pour gérer les clics sur les boutons
function handleLikeDislike(videoName, type) {
    fetch(`likes.php?video=${encodeURIComponent(videoName)}&type=${type}`, { method: "POST" })
        .then(response => response.json())
        .then(data => {
            document.getElementById("like-count").textContent = data.likes || 0;
            document.getElementById("dislike-count").textContent = data.dislikes || 0;

            // Désactive les boutons après un clic
            document.getElementById("like-button").disabled = true;
            document.getElementById("dislike-button").disabled = true;
        })
        .catch(error => console.error("Erreur lors de la mise à jour des likes/dislikes :", error));
}

// Ajoute les événements aux boutons
document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const videoName = urlParams.get("video");

    if (videoName) {
        document.getElementById("like-button").addEventListener("click", () => {
            console.log("Bouton Like cliqué");
            handleLikeDislike(videoName, "like");
        });

        document.getElementById("dislike-button").addEventListener("click", () => {
            console.log("Bouton Dislike cliqué");
            handleLikeDislike(videoName, "dislike");
        });
    }
});