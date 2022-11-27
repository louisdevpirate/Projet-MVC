<?php
// Fichier contenant tous les points d'entré du site (chaque route = une nouvelle page du site)

use Controllers\MainController;

$mainController = new MainController();


switch(ROUTE){

    // Route de la page d'accueil
    case '/';
        $mainController->home();
    break;

    // Route de la page d'accompte
    case '/creer-un-compte/';
        $mainController->register();
    break;

     // Route de la page de connexion
     case '/se-connecter/';
        $mainController->login();
     break;

     // Route de la page de deconnexion
     case '/deconnexion/';
        $mainController->logout();
     break;

     // Route de la page de profil
     case '/mon-profil/';
        $mainController->profil();
     break;

     // Route de la page pour ajouter un fruit
     case '/fruits/ajouter-un-fruit/';
        $mainController->newFruit();
     break;

     // Route de la page de la liste des fruits
     case '/fruits/liste/';
        $mainController->fruitList();
     break;

     // Route de la page fiche de présentation
     case '/fruits/fiche/';
        $mainController->fruitSheet();
     break;


    // Si aucune des URL précédentes ne match, c'est la page 404 qui sera appelée par défaut 
    default: 
        $mainController->page404();
    break;

}