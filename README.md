# resto_delice
Bienvenue dans le fichier README du site fictif  "Resto-Delice"  basé sur Symfony 6.
Ce site est conçu pour représenter un site fictif nommé "Resto-Delice".
Il est développé à l'aide du framework Symfony 6, qui est une technologie populaire pour le développement d'applications web PHP.

## Prérequis
Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre système :

- PHP (version 8.0 ou supérieure)
- Composer
- Symfony CLI

## Installation
Suivez les étapes ci-dessous pour installer et exécuter le projet :

1. Clonez ce référentiel sur votre machine locale :
   ```shell
   git clone https://github.com/aouatefdev/Resto-Delice.git
   
2. Accédez au répertoire du projet :
   ```shell
   cd Restaurant-Delice

3. Installez les dépendances du projet à l'aide de Composer :
   ```shell
   composer install
   
4. Configurez la base de données dans le fichier .env. Assurez-vous d'avoir une base de données configurée
   et que les informations d'identification appropriées y sont ajoutées.
   
5. Créez les tables de base de données en utilisant la commande Doctrine :
   symfony console doctrine:migrations:migrate 
   
6. Lancez le serveur Symfony :
   http://localhost:8000
   
Félicitations ! Le site "Resto-Delice" est maintenant prêt à être exploré.

## Fonctionnalités
Le site "Resto-Delice" propose les fonctionnalités suivantes :

- Affichage des différents menus et plats proposés par le restaurant.
- Possibilité de passer des commandes en ligne.
- Gestion des réservations pour les clients.
- Présentation des informations sur l'emplacement du restaurant.
- Possibilité de s'inscrire en tant qu'utilisateur pour bénéficier d'avantages spéciaux.
- Possibilité de me contacter via le formulaire de contact.

## Structure du projet
La structure du projet "Resto-Delice" est organisée de la manière suivante :

- config/ : Contient les fichiers de configuration de l'application Symfony.
- public/ : Contient les fichiers publics accessibles via le navigateur, tels que les images, les fichiers CSS et JavaScript.
- src/ : Contient le code source de l'application Symfony.
- templates/ : Contient les fichiers de templates Twig pour l'affichage des pages HTML.
- tests/ : Contient les tests unitaires et fonctionnels.
- var/ : Contient les fichiers générés par Symfony, tels que les journaux et le cache.
- vendor/ : Contient les dépendances du projet gérées par Composer.

Grand merci pour votre visite.
