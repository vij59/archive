# archive

Prérequis
*Prérequis sur votre machine pour le bon fonctionnement de ce projet :

PHP Version 7.4
MySQL Installer MySQL ou Installer MariaDB
Symfony version 5.0 
Composer Installer Composer

Installation

Après avoir cloné le projet avec git clone https://github.com/vij59/archive.git

Exécutez la commande cd archive pour vous rendre dans le dossier depuis le terminal.


Ensuite, dans l'ordre taper les commandes dans votre terminal :

 composer install afin d'installer toutes les dépendances composer du projet.


 installer la base de donnée MySQL. Pour paramétrer la création de votre base de donnée, rdv dans le fichier .env du projet, et modifier la variable d'environnement selon vos paramètres :

DATABASE_URL=mysql://User:Password@127.0.0.1:3306/nameDatabasse?serverVersion=5.7

Puis exécuter la création de la base de donnée avec la commande : symfony console doctrine:database:create

Exécuter la migration en base de donnée : symfony console doctrine:migration:migrate

 Exécuter les dataFixtures avec la commande : php bin/console doctrine:fixtures:load

 Vous pouvez maintenant accéder à votre portfolio en vous connectant au serveur : symfony server:start

   
