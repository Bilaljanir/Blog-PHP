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

* - app : Contient les classes principales de l'application Laravel. Le répertoire app/Models contient les modèles, tels que le modèle User pour représenter les utilisateurs et le modèle Article pour représenter les articles de blog. Le répertoire app/Controllers contient les contrôleurs qui gèrent les actions de l'application.


* - database : Contient les fichiers de migration et les seeders pour la base de données. Les migrations sont utilisées pour créer et modifier les tables de la base de données, tandis que les seeders permettent de remplir la base de données avec des données de test.


* - resources : Contient les ressources de l'application, telles que les fichiers JavaScript, CSS et les vues. Le répertoire resources/js contient les fichiers JavaScript, y compris le fichier app.js qui sert de point d'entrée à l'application Vue.js. Le répertoire resources/css contient les feuilles de style CSS. Le répertoire resources/views contient les fichiers de vue utilisés pour afficher les différentes pages de l'application.


* - routes : Contient les fichiers de définition des routes de l'application. Le fichier routes/web.php contient les routes pour les pages de l'application, tandis que le fichier routes/api.php contient les routes pour les API utilisées par Vue.js. Ces routes définissent les actions à effectuer lorsqu'une requête est faite à une certaine URL.


* - tests : Contient les tests automatisés pour les différentes fonctionnalités de l'application. Les tests unitaires se trouvent dans le répertoire tests/Unit, tandis que les tests de fonctionnalités sont stockés dans le répertoire tests/Feature. Ces tests permettent de vérifier que le code fonctionne correctement et de détecter les éventuels problèmes ou erreurs.


* - public : Contient les fichiers accessibles publiquement tels que les images, les feuilles de style CSS et les scripts JavaScript. Le fichier index.php situé à la racine du répertoire public est le point d'entrée de l'application Laravel, qui gère les requêtes et les dirige vers les contrôleurs appropriés.
