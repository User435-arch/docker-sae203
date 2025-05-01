<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "./video/";
    
    // Upload de la vidéo
    $video_file = $target_dir . basename($_FILES["video"]["name"]);
    $videoType = strtolower(pathinfo($video_file, PATHINFO_EXTENSION));
    $allowed_video_types = ["mp4", "avi", "mov", "wmv"];
    
    // Upload de la miniature
    $thumbnail_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
    $thumbnailType = strtolower(pathinfo($thumbnail_file, PATHINFO_EXTENSION));
    $allowed_image_types = ["jpg", "jpeg", "png", "gif"];
    
    // Vérification des formats
    if (!in_array($videoType, $allowed_video_types) || !in_array($thumbnailType, $allowed_image_types)) {
        echo "Formats non autorisés.";
        exit;
    }

    // Enregistrement des fichiers
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $video_file) && 
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbnail_file)) {
        
        // Récupération du titre et de la description
        $title = htmlspecialchars($_POST["title"]);
        $description = htmlspecialchars($_POST["description"]);

        // Sauvegarde des infos dans un fichier JSON (ou une base de données)
        $video_data = [
            "title" => $title,
            "description" => $description,
            "video_path" => $video_file,
            "thumbnail_path" => $thumbnail_file
        ];
        
        file_put_contents("data.json", json_encode($video_data, JSON_PRETTY_PRINT));

        echo "Vidéo et miniature uploadées avec succès !";
    } else {
        echo "Erreur lors de l'upload.";
    }
}
?>

