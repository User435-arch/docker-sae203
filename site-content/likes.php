// Chemin du fichier JSON pour stocker les likes et dislikes
$likesFile = 'likes.json';

// Vérifie si le fichier JSON existe, sinon le crée
if (!file_exists($likesFile)) {
    file_put_contents($likesFile, json_encode([]));
}

// Charge les données des likes et dislikes
$likesData = json_decode(file_get_contents($likesFile), true);

// Récupère le nom de la vidéo depuis la requête
if (isset($_GET['video'])) {
    $videoName = $_GET['video'];

    // Initialise les données si elles n'existent pas
    if (!isset($likesData[$videoName])) {
        $likesData[$videoName] = ["likes" => 0, "dislikes" => 0];
    }

    // Si une requête POST est envoyée, met à jour les likes/dislikes
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['type'])) {
        $type = $_GET['type'];
        if ($type === "like") {
            $likesData[$videoName]["likes"]++;
        } elseif ($type === "dislike") {
            $likesData[$videoName]["dislikes"]++;
        }

        // Sauvegarde les données mises à jour
        file_put_contents($likesFile, json_encode($likesData));
    }

    // Retourne les données au format JSON
    header('Content-Type: application/json');
    echo json_encode($likesData[$videoName]);
} else {
    echo "Aucune vidéo spécifiée.";
}