<?php

// namespace correspondant à l'espace physique dans le projet (dans le dossier "src")
namespace Controllers;

// Importation des classes dont on a besoin dans les contrôleurs des pages 
use Models\DTO\User;
use Models\DTO\Fruit;
use Models\DAO\UserManager;
use Models\DAO\FruitManager;

use DateTime;

class MainController{


    /**
     * Contrôleur de la page d'accueil
     */
    public function home(): void
    {
        // Charge la vue "home.php" dans les views 
        include VIEWS_DIR . '/home.php';
    }

    /**
     * Contrôleur de la page d'inscription
     */
    public function register(): void
    {
        // Redirige sur l'accueil si on est déjà connecté
        if(isConnected()){
            header('Location: ' . PUBLIC_PATH . '/');
            die();
        }

        // Traitement du formulaire d'inscription

        // Appel
        if(
            isset($_POST['email']) &&
            isset($_POST['password']) &&
            isset($_POST['confirm-password']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname'])
        ){

            // Vérifs
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errors[] = 'Adresse email invalide';
            }

            if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/u', $_POST['password'])){
                $errors[] = 'Mot de passe invalide';
            }

            if($_POST['password'] != $_POST['confirm-password']){
                $errors[] = 'Confirmation du mot de passe différente du mot de passe';
            }

            if(mb_strlen($_POST['firstname']) < 2 || mb_strlen($_POST['firstname']) > 50){
                $errors[] = 'Prénom invalide (entre 2 et 50 caractères)';
            }

            if(mb_strlen($_POST['lastname']) < 2 || mb_strlen($_POST['lastname']) > 50){
                $errors[] = 'Nom invalide (entre 2 et 50 caractères)';
            }

            // Si pas d'erreurs
            if(!isset($errors)){

                $userManager = new UserManager();
                $verifIfExists = $userManager->findOneBy('email', $_POST['email']);

                if(!empty($verifIfExists)){
                    $errors[] = 'Cette adresse email est déjà utilisée !';
                } else {

                    $newUserToInsert = new User();

                    // Hydratation de l'objet avec les données du formulaire + la date actuelle 
                    $newUserToInsert
                        ->setEmail( $_POST['email'])
                        ->setPassWord( password_hash($_POST['password'], PASSWORD_BCRYPT))
                        ->setRegisterDate( new DateTime() )
                        ->setFirstName( $_POST['firstname'])
                        ->setLastName( $_POST['lastname'])
                    ;
                

                    $userManager->save( $newUserToInsert );

                    $success = 'Votre compte a bien été créé !';

                }
            }

        }

        // Charge la vue "register.php" dans "views"
        include VIEWS_DIR . '/register.php';
    }

    /**
     * Contrôleur de la page de connexion
     */
    public function login(): void
    {

        // Appel des variables
        if(
            isset($_POST['email']) &&
            isset($_POST['password'])
        ){

            // Vérifs
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errors[] = 'Adresse email invalide';
            }

            if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/u', $_POST['password'])){
                $errors[] = 'Mot de passe invalide';
            }

            // Si pas d'erreurs
            if(!isset($errors)){

                $userManager = new UserManager();

                $userToConnect = $userManager->findOneBy('email', $_POST['email']);

                // Si le compte n'existe pas
                if(empty($userToConnect)){

                    $errors[] = 'Ce compte n\'existe pas !';
    
                } else {

                    // Si le mot de passe n'est pas le bon
                    if(!password_verify($_POST['password'], $userToConnect->getPassword()) ){
                        
                        $errors[] = 'Le mot de passe n\'est pas le bon !';

                    } else {
                        
                        // Stockage de l'utilisateur en session
                        $_SESSION['user'] = $userToConnect;

                        $success = 'Vous êtes bien connecté !';

                    }

                }

            }

        }

        // Charge la vue "login.php" dans "views"
        include VIEWS_DIR . '/login.php';
    }

    /**
     * Contrôleur de la page de déconnexion
     */
    public function logout(): void 
    {

        // Redirige sur l'accueil si on n'est pas connecté
        if(!isConnected()){
            header('Location :' . PUBLIC_PATH . '/');
            die();
        }

        // Suppression d el'utulistauer en session
        unset($_SESSION['user']);

        // Charge la vue "logout.php" dans "views"
        include VIEWS_DIR . '/logout.php';
    }

    /**
     * Contrôleur de la page de profil
     */
    public function profil(): void 
    {   
        // Redirige sur l'accueil si on n'est pas connecté
        if(!isConnected()){
            header('Location: ' . PUBLIC_PATH . '/se-connecter/');
            die();
        }

        // Charge la vue "profil.php" dans "views"
        include VIEWS_DIR . '/profil.php';
    }

    /**
     * Contrôleur de la page d'ajout d'un fruit
     */
    public function newFruit(): void
    {

        // Redirige sur la page de connexion si on n'est pas connecté
        if(!isConnected()){
            header('Location: ' . PUBLIC_PATH . '/se-connecter/');
            die();
        }

        // Appel des variables
        if(
            isset($_POST['name']) &&
            isset($_POST['color']) &&
            isset($_POST['origin']) &&
            isset($_POST['price-per-kilo']) &&
            isset($_POST['description'])
        ){

            // Vérifs
            if(mb_strlen($_POST['name']) < 2 || mb_strlen($_POST['name']) > 50){
                $errors[] = 'Nom invalide';
            }

            if(mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 50){
                $errors[] = 'Couleur invalide';
            }

            if(mb_strlen($_POST['origin']) < 2 || mb_strlen($_POST['origin']) > 50){
                $errors[] = 'Pays d\'origine invalide';
            }

            if(mb_strlen($_POST['description']) < 5 || mb_strlen($_POST['description']) > 10000){
                $errors[] = 'Description invalide';
            }

            if(!preg_match('/^[0-9]{1,7}([.,][0-9]{1,2})?$/', $_POST['price-per-kilo'])){
                $errors[] = 'Prix invalide';
            }

            // Si pas d'erreurs
            if(!isset($errors)){

                // création d'un nouveau fruit
                $newFruit = new Fruit();

                // Remplacement de la virgule par un point
                $convertedPrice = str_replace(',', '.', $_POST['price-per-kilo']);


                // Hydratation du nouveau fruit
                $newFruit
                    ->setName( $_POST['name'] )
                    ->setColor( $_POST['color'] )
                    ->setOrigin( $_POST['origin'] )
                    ->setPricePerKilo( $convertedPrice )
                    ->setDescription( $_POST['description'] )
                    ->setAuthor( $_SESSION['user'] )    // l'auteur du fruit est l'utilisateur connecté
                ;

                // Instantiation du manager des fruits
                $fruitManager = new FruitManager();

                // On lui demande de sauvegarder notre nouveau fruit
                $fruitManager->save( $newFruit );

                // Message de succès
                $success = 'Le fruit a bien été ajouté !';

            }

        }

        // Charge la vue "addNewFruit.php" dans "views"
        include VIEWS_DIR . '/add-fruit.php';
    }

    /**
     * Contrôleur de la page liste des fruits
     */
    public function fruitList(): void 
    {
        $fruitManager = new FruitManager();

            $fruits = $fruitManager->findAll();

        include VIEWS_DIR . '/fruitlist.php'; 
    }

    /**
     * Contrôleur de la page de présentation des fruits
     */
    public function fruitSheet(): void 
    {

        if(!isset($_GET['id'])){
            $this->page404();
            die();
        }

        $fruitManager = new FruitManager();

        $fruit = $fruitManager->findOneBy('id', $_GET['id']);
        
        include VIEWS_DIR . '/fruitsheet.php';
    }


    /**
     * Contrôleur de la page 404
     */
    public function page404(): void
    {
        // Modification du code HTTP pour qu'il soit bien en 404 et non en 200
        header('HTTP/1.1 404 Not Found');

        // Charge la vue "404.ph" dans "views" 
        include VIEWS_DIR . '/404.php';
    }

    



}