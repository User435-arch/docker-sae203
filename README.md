# docker-sae203 (groupe 07)

## Instructions pour lancer l'application

 - Vérifiez si docker est installé :
```
docker --version
```
 - Cloner le référentiel :
```
git clone git@github.com:User435-arch/docker-sae203.git
```
 - Aller au référentiel :
```
cd docker-sae203
```
 - Construisez l'image décrite dans dockerfile avec docker build :
```
docker build -t <choisir-un-nom-pour-l'image> .
```
 - Lancer le serveur web :
```
docker run -d -p 8080:80 <nom-de-l'image-choisie>
```
 - Vérifier que l'application est en cours d'exécution. Pour ce faire, ouvrez un navigateur et tapez `localhost:8080`
 - Vérifier que le conteneur associé est actif :
```
docker ps
```
 - Finalement, arrêtez le conteneur avec la commande suivante (les dernières chiffres sont le code de hachage affiché par docker ps):
```
docker stop <id_du_docker>
```
 - Encore, si on souhaite supprimer le conteneur, on peut taper :
```
docker rm <id_du_docker>
```  

**NOTE** : Au lieu du code de hachage, on peut toujours taper le nom du conteneur.