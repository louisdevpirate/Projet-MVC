<?php

//Namespace correspondant à l'emplacement physique dans le projet (dans le dossier "src")
namespace Controllers;

//Importation des classes dont on a besoin dans les controlleurs des pages
use Models\DTO\User;
use Models\DAO\UserManager;
use DateTime;
use Models\DTO\Fruit;
use Models\DAO\FruitManager;


class MainController{


    /**
     * Controlleur de la page d'accueil
     */
    public function home(): void
    {
        //Charge la vue "home.php" dans "views"
        include VIEWS_DIR . '/home.php';
    }

    /**
     * Controlleur page account
     */
    public function account(): void
    {

        //Redirige sur l'accueil si on est déjà connecté
        if(isConnected()){
            header('Location: ' . PUBLIC_PATH . '/');
            die();
        }

        
        //Appels des variables

        if(
            isset($_POST['email']) &&
            isset($_POST['password']) &&
            isset($_POST['confirm-password']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname'])

        ){
            //Vérif Mail

            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                $errors[] = 'Cette adresse email n\'est pas valide !';
        
            }

            //Vérif Mot de Passe

            if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/u', $_POST['password'])){

                $errors[] = "Votre mot de passe doit comporter : Une lettre majuscule, minuscule, un caractère spécial, un chiffre et doit comporter au moins 8 caractères.";

            }

            //Vérif confirmation du mot de passe

            if($_POST['confirm-password'] != $_POST['password']){

                $errors[] = 'Les deux mots de passe ne correspondent pas.';

            }

            //Vérif Prénom

            if(mb_strlen($_POST['firstname']) < 2 || mb_strlen($_POST['firstname']) > 50){

                $errors[] = 'Prénom invalide !';

            }

            //Vérif Nom 
            
            if(mb_strlen($_POST['lastname']) < 2 || mb_strlen($_POST['lastname']) > 50){

                $errors[] = 'Nom invalide !';
                
            }
        
            //Si pas d'erreurs
            if(!isset($errors)){

                

                $userManager = new UserManager();

                $verifIfExists = $userManager->findOneBy('email', $_POST['email']);
                

                if(!empty($verifIfExists)){

                    $errors[] = 'Cette adresse email est déjà utilisée !';

                }else{


                    $newUserToInsert = new User();

                    $newUserToInsert
                        ->setEmail( $_POST['email'] )
                        ->setPassword( password_hash( $_POST['password'], PASSWORD_BCRYPT) )
                        ->setRegisterDate( new DateTime() )
                        ->setFirstname( $_POST['firstname'] )
                        ->setLastname( $_POST['lastname'] )
                    ;

                    

                    $userManager->save( $newUserToInsert);

                    $success = 'Votre formulaire d\'inscription à bien été envoyé!';
                }
            }


        }

        //Charge la vue "account.php" dans "views"*
        include VIEWS_DIR . '/account.php';


    }


    /**
    * Contrôleur de la page de connexion
    */
    public function login(): void
    {

        //Redirige sur l'accueil si on est déjà connecté
        if(isConnected()){
            header('Location: ' . PUBLIC_PATH . '/');
            die();
        }


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

                //Si le compte n'existe pas
                if(empty($userToConnect)){

                    $errors[] = 'Ce compte n\'existe pas!';

                } else {

                    //Si le mot de passe n'est pas le bon
                    if(!password_verify($_POST['password'], $userToConnect->getPassword() ) ){

                        $errors[] = 'Mauvais mot de passe';

                    } else {

                        //Stockage de l'utilisateur en session
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
    * Contrôleur de la page de connexion
    */
    public function logout(): void
    {
        //Suppression de l'utilisateur en session (déconnexion)
        unset($_SESSION['user'] );
        
        //Charge la vue "logout.php" dans "views"
        include VIEWS_DIR . '/logout.php';

        
    }

    /**
     * Controlleur de la page de profil
     */

    public function profil(): void
    {
        //Redirige sur l'accueil si on est pas connecté
        if(!isConnected()){
            header('Location: ' . PUBLIC_PATH . '/se-connecter/');
            die();
        }

        //Charge la vue "profil.php" dans "views"
        include VIEWS_DIR . '/profil.php';
    }

    /**
     * Controlleur page d'ajout de fruit
     */

    public function newFruit(): void
    {

        //Redirige sur l'accueil si on est pas connecté
        if(!isConnected()){
            header('Location: ' . PUBLIC_PATH . '/se-connecter/');
            die();
        }
          
        //Appels des variables

        if(
            isset($_POST['name']) &&
            isset($_POST['color']) &&
            isset($_POST['origin']) &&
            isset($_POST['price']) &&
            isset($_POST['description'])

        ){

            if (mb_strlen($_POST['name']) < 2 || mb_strlen($_POST['name']) > 50) {
                $errors[] = 'Nom invalide (entre 2 et 50 caractères)';
            }

            if (mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 50) {
                $errors[] = 'Couleur invalide (entre 2 et 50 caractères)';
            }

            if (mb_strlen($_POST['origin']) < 2 || mb_strlen($_POST['origin']) > 50) {
                $errors[] = 'Origine invalide (entre 2 et 50 caractères)';
            }

            if (!preg_match('/^[0-9]{1,7}([.,][0-9]{1,2})?$/', $_POST['price'])) {
                $errors[] = 'Prix invalide';
            }

            if (mb_strlen($_POST['origin']) < 5 || mb_strlen($_POST['origin']) > 10000) {
                $errors[] = 'Description invalide (entre 5 et 10k caractères)';
            }


            if(!isset($errors)){

                $newFruit = new Fruit();

                $convertedPrice = str_replace(',', '.', $_POST['price']);


                $newFruit
                    ->setName( $_POST['name'])
                    ->setColor( $_POST['color'])
                    ->setOrigin( $_POST['origin'])
                    ->setPricePerKilo( $convertedPrice )
                    ->setDescription( $_POST['description'])
                    ->setAuthor( $_SESSION['user'])
                ;

                $fruitManager = new FruitManager();

                $fruitManager->save( $newFruit );

                $success = 'Le fruit à bien été ajouté!';
                
            }



        }

        //Charge la vue "new-fruit.php" dans "views"

        include VIEWS_DIR . '/add-fruit.php';

    }


    /**
     * Controlleur page de liste de fruits
     */
    public function fruitList(): void
    {

        $fruitManager = new FruitManager();

        $fruits = $fruitManager->findAll();


        //Charge la vue "fruitlist.php" dans "views"
        include VIEWS_DIR . '/fruitlist.php';
        

    }

    public function fruitDelete(): void
    {
        if(!isset($_GET['id'])){
            $this->page404();
            die();
        }

        $fruitManager = new FruitManager();

        $fruitToDelete = $fruitManager->findOneBy('id', $_GET['id']);

        if(!isset($fruitToDelete)){
            $this->page404();
            die();
        }

        $fruitManager->delete($fruitToDelete);

        //Charge la vue "delete-fruit.php" dans "views"
        include VIEWS_DIR . '/delete-fruit.php';
        

    }

    /**
     * Contrôleur de la page de modification
     */
    public function fruitUpdate(): void
    {
        if(!isset($_GET['id'])){
            $this->page404();
            die();
        }

        $fruitManager = new FruitManager();

        $fruitToUpdate = $fruitManager->findOneBy('id', $_GET['id']);

        if(!isset($fruitToUpdate)){
            $this->page404();
            die();
        }

        // Appels des variables
        if(
            isset($_POST['name']) &&
            isset($_POST['color']) &&
            isset($_POST['origin']) &&
            isset($_POST['price-per-kilo']) &&
            isset($_POST['description'])

        ){

            if (mb_strlen($_POST['name']) < 2 || mb_strlen($_POST['name']) > 50) {
                $errors[] = 'Nom invalide (entre 2 et 50 caractères)';
            }

            if (mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 50) {
                $errors[] = 'Couleur invalide (entre 2 et 50 caractères)';
            }

            if (mb_strlen($_POST['origin']) < 2 || mb_strlen($_POST['origin']) > 50) {
                $errors[] = 'Origine invalide (entre 2 et 50 caractères)';
            }

            if (!preg_match('/^[0-9]{1,7}([.,][0-9]{1,2})?$/', $_POST['price-per-kilo'])) {
                $errors[] = 'Prix invalide';
            }

            if (mb_strlen($_POST['origin']) < 5 || mb_strlen($_POST['origin']) > 10000) {
                $errors[] = 'Description invalide (entre 5 et 10k caractères)';
            }


            if(!isset($errors)){

                $convertedPrice = str_replace(',', '.', $_POST['price']);


                $fruitToUpdate
                    ->setName( $_POST['name'])
                    ->setColor( $_POST['color'])
                    ->setOrigin( $_POST['origin'])
                    ->setPricePerKilo( $convertedPrice )
                    ->setDescription( $_POST['description'])
                ;

                $fuitManager->update($fruitToUpdate);


                $success = 'Le fruit à bien été ajouté!';
                
            }

            
        }
        
        //Charge la vue "update-fruit.php" dans "views"
        include VIEWS_DIR . '/update-fruit.php';

    }



    /**
     * Controlleur page de fiche des fruits
     */
    public function fruitForm(): void
    {   

        if(!isset($_GET['id'])){
            $this->page404();
            die();
        }

        $fruitManager = new FruitManager();

        $fruit = $fruitManager->findOneBy('id', $_GET['id']);

        if(empty($fruit)){
            $this->page404();
            die();
        }


        //Charge la vue "fruitform.php" dans "views"
        include VIEWS_DIR . '/fruitform.php';
        

    }



    /**
     * Controlleur page 404
     */

    public function page404(): void
    {   
        //Modification du code HTTP pour qu'il soit bien en 404 et non en 200
        header('HTTP/1.1 404 Not Found');

        //Charge la vue "404.php" dans "views"
        include VIEWS_DIR . '/404.php';
    }

}