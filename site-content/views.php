<?php
// filepath: c:\iut\TP\sae\2.03\web\views.php

// Chemin du fichier JSON pour stocker les vues
$viewsFile = 'views.json';

// Vérifie si le fichier JSON existe, sinon le crée
if (!file_exists($viewsFile)) {
    file_put_contents($viewsFile, json_encode([]));
}

// Charge les données des vues
$viewsData = json_decode(file_get_contents($viewsFile), true);

// Récupère le nom de la vidéo depuis la requête
if (isset($_GET['video'])) {
    $videoName = $_GET['video'];

    // Incrémente le compteur de vues pour la vidéo
    if (!isset($viewsData[$videoName])) {
        $viewsData[$videoName] = 0; // Initialise à 0 si la vidéo n'a pas encore de vues
    }
    $viewsData[$videoName]++;

    // Sauvegarde les données mises à jour dans le fichier JSON
    file_put_contents($viewsFile, json_encode($viewsData));

    // Retourne le nombre de vues actuel
    echo $viewsData[$videoName];
} else {
    echo "Aucune vidéo spécifiée.";
}