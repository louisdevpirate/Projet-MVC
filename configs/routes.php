<?php

// Fichier contenant tous les points d'entré du site (chaque route = une nouvelle page du site)


//Importation et inclusion de la classe MainController
use Controllers\MainController;

//On instancie

$mainController = new MainController();

switch(ROUTE){

    // Route de la page d'accueil
    case '/';
        $mainController->home();
    break;

    //Acces page d'inscription
    case '/creer-un-compte/';
        $mainController->account();
    break;

    //Acces page de connexion
    case '/se-connecter/';
        $mainController->login();
    break;

    //Acces page de déconnexion
    case '/deconnexion/';
        $mainController->logout();
    break;

    //Acces page de profil
    case '/mon-profil/';
        $mainController->profil();
    break;

    //Acces page d'ajout de fruit
    case '/fruits/ajouter-un-fruit/';
        $mainController->newFruit();
    break;

    //Acces page de vue des fruits
    case '/fruits/liste/';
        $mainController->fruitList();
    break;

    case '/fruits/fiche/';
        $mainController->fruitForm();
    break;

    case '/fruits/supprimer/';
        $mainController->fruitDelete();
    break;

    case '/fruits/modifier/';
        $mainController->fruitUpdate();
    break;



    //Si aucune des URL précédentes ne matchent, c'est la page 404 qui sera appellée par défaut
    default:
        $mainController->page404();
    break;
 

}