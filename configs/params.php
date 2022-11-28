<?php

// Création d'une constante contenant la route actuelle
define('ROUTE', request_path());

//Emplacement du dossier qui contient les vues du site
define('VIEWS_DIR', __DIR__ . '/../views');

// URL du dossier "public" (avec fichiers CSS, JS, images, etc...), servira pour construire les liens dans la partir frontend
define('PUBLIC_PATH', mb_substr($_SERVER['SCRIPT_NAME'], 0, -(mb_strlen(basename(__FILE__)))));

//Paramètre de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'project_mvc_wikifruit');
define('DB_USER', 'root');
define('DB_PASSWORD', '');