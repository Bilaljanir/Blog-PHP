<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Projet de blog avec Laravel et Vue.js
Ce projet est un blog développé avec le framework Laravel et le framework JavaScript Vue.js. Il comprend un système d'authentification permettant aux utilisateurs de se connecter et de gérer leurs articles de blog. La base de données utilisée est PostgreSQL.

##  Prérequis
Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :
* PHP (version X.X.X)
* Composer (version X.X.X)
* Node.js (version X.X.X)
* PostgreSQL (version X.X.X)


## Installation pour activer mon projet

1. Clonez ce dépôt de code sur votre machine :

        git clone https://github.com/Bilaljanir/blog-php
2. Accédez au répertoire du projet :

         cd nom-du-projet

3. Installez les dépendances PHP en utilisant Composer :

         composer install

4. Installez les dépendances JavaScript en utilisant npm :
   
          npm install
 
5. Copiez le fichier d'environnement .env.example et renommez-le en .env. Configurez les paramètres de la base de données PostgreSQL dans ce fichier.
        

6. Générez une clé d'application Laravel :

          php artisan key:generate
7. Exécutez les migrations pour créer les tables de la base de données :

          php artisan migrate

8. ancez le serveur de développement :

          php artisan serve



## Structure du projet

Le projet suit une structure de répertoires Laravel standard. Voici une brève explication des principaux répertoires et fichiers :

- `app` : Contient les classes principales de l'application Laravel, y compris les modèles, les contrôleurs et les politiques d'accès. Le modèle `User` représente les utilisateurs du système, tandis que le modèle `Article` représente les articles de blog.


- `config` : Contient les fichiers de configuration de l'application. Le fichier `config/app.php` permet de configurer divers aspects de l'application, y compris les fournisseurs de services.


- `database` : Contient les fichiers de migration et les seeders pour la base de données. Les migrations sont utilisées pour créer les tables nécessaires pour le système d'authentification, les articles et les commentaires.


- `resources` : Contient les ressources JavaScript, CSS et les vues du projet Vue.js. Les fichiers JavaScript se trouvent dans le répertoire `resources/js`, les fichiers CSS dans le répertoire `resources/css` et les fichiers de vue dans le répertoire `resources/views`.


- `routes` : Contient les fichiers de définition des routes de l'application. Le fichier `routes/web.php` contient les routes pour les pages de l'application, tandis que le fichier `routes/api.php` contient les routes pour les API utilisées par Vue.js.


- `tests` : Contient les tests automatisés pour les différentes fonctionnalités de l'application. Les tests unitaires et les tests de fonctionnalités sont stockés respectivement dans les répertoires `tests/Unit` et `tests/Feature`.


- `public` : Contient les fichiers accessibles publiquement tels que les images, les feuilles de style CSS et les scripts JavaScript. Le fichier `public/index.php` est le point d'entrée de l'application Laravel.

---

##  configure Bootstrap 

        composer require laravel/ui
        php artisan ui bootstrap --auth
        npm install && npm run dev
---

## Créer les table avec les migration

Les migrations sont comme un contrôle de version pour votre base de données, permettant à votre équipe de définir et de partager la définition du schéma de la base de données de l'application. Si vous avez déjà dû dire à un coéquipier d'ajouter manuellement une colonne au schéma de sa base de données locale après avoir intégré vos modifications depuis le contrôle de la source, vous avez été confronté au problème que les migrations de base de données permettent de résoudre.

        EX:php artisan make:migration create_users_table
---
## Créer les models

        php artisan make:model NomDuModele

---

## Créer les Controllers

        php artisan make:controller NomDuController

---

## installer Pinia (bibliothèque de gestion d'état d'application pour Vue.js)

        npm install pinia

---

