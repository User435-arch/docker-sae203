<!-- filepath: c:\iut\TP\sae\2.03\web\index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie d'Images</title>
    <link rel="stylesheet" href="style.css?v=1">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <script src="theme.js" defer></script>
    <script src="dropdown.js" defer></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="#top">
                <img src="logo.png" alt="Logo" class="logo-image">
            </a>
        </div>
        <div class="settings">
            <img src="gear-icon.png" alt="Settings" class="settings-icon" id="settings-icon">
            <div class="dropdown-menu" id="dropdown-menu">
                <button id="theme-toggle">Changer de thème</button>
                <button id="trending-button">Tendance</button> <!-- Nouveau bouton -->
            </div>
        </div>
        <a href="update.html" class="upload-button">Upload</a>
    </div>

    <div id="top">
        <h1>Galerie d'Images</h1>
        <div class="gallery">
            <?php
            // Chemin du dossier contenant les images
            $imageDir = 'image';
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Extensions autorisées

            if (is_dir($imageDir)) {
                $images = array_diff(scandir($imageDir), ['.', '..']); // Récupère tous les fichiers sauf '.' et '..'

                // Filtre les fichiers pour ne garder que ceux avec des extensions autorisées
                $filteredImages = array_filter($images, function ($image) use ($imageDir, $allowedExtensions) {
                    $fileExtension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                    return in_array($fileExtension, $allowedExtensions);
                });

                // Mélange les images aléatoirement
                shuffle($filteredImages);

                // Affiche les images
                foreach ($filteredImages as $image) {
                    $filePath = $imageDir . '/' . $image;
                    $title = pathinfo($image, PATHINFO_FILENAME); // Récupère le nom du fichier sans extension
                    echo "
                    <div class='gallery-item'>
                        <a href='video.html' class='video-link' data-video='$title'>
                            <img src='$filePath' alt='$title'>
                            <p class='image-title'>$title</p>
                        </a>
                    </div>
                    ";
                }
            } else {
                echo "<p>Le dossier d'images n'existe pas.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>