# Image de base
FROM debian:latest

# Met à jour les paquets et installe NGINX
RUN apt-get update && \
    apt-get install -y nginx && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copier les fichiers du site
COPY ./site-content/ /var/www/html/

# Copier la config personnalisée
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose le port 80
EXPOSE 80

# Lancer NGINX au démarrage
CMD ["nginx", "-g", "daemon off;"]
