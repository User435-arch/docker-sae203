 document.getElementById('file').addEventListener('change', function(event) {
            var file = event.target.files[0]; // Récupère le premier fichier sélectionné
            if (file) {
                document.getElementById('fileName').textContent = "Nom du fichier : " + file.name;
            } else {
                document.getElementById('fileName').textContent = "Aucune vidéo";
            }
        });