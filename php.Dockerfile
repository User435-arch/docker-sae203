# Image de base
FROM debian:latest

# Met à jour les paquets et installe PHP-FPM
RUN apt-get update && \
    apt-get install -y php php-fpm && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers du site
COPY ./site-content/ /var/www/html/

# Expose le port de PHP-FPM (9000)
EXPOSE 9000

# Lancer PHP-FPM au démarrage
CMD ["php-fpm", "-F"]
