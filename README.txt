README - Projet Symfony

Ce README a pour but de vous aider à démarrer le projet afin de pouvoir le tester.
Vous trouverez également le projet sur mon repo GitHub -> https://github.com/Maxeu444/testWeBreathe

Prérequis : 

PHP 7.4 (ou version ultérieure)
Composer (https://getcomposer.org/download/)
Symfony CLI (https://symfony.com/download)
Node.js (https://nodejs.org/)

Installation
Suivez ces étapes pour installer le projet localement :

Une fois le projet ouvert dans votre IDE, ouvrez un terminal et saisissez ces commandes: 

 1- composer install (pour installer toutes les dépendances du projet)

 2- npm install
    npm run build
 
 3- Création de la base de données : 

symfony console doctrine:database:create
symfony console doctrine:migrations:migrate 

Il sera peut être necessaire de modifier les paramètres de connexion à la base de données : 
fichier .env ligne 27.

Une fois tout cela fait symfony server:start