<!-- Menu principal du site -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark main-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-lemon main-logo me-2"></i>Wikifruit</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- Bouton accueil-->
                <li class="nav-item">
                    <a class="nav-link<?= ROUTE == '/' ? ' active' : '' ?>" href="<?= PUBLIC_PATH ?>/">Accueil</a>
                </li>

                <?php
                
                //Si l'utilisateur est connecté
                if( isConnected()){

                    ?>

                    <!--Bouton de profil-->
                    <li class="nav-item">
                    <a class="nav-link<?= ROUTE == '/mon-profil/' ? ' active' : '' ?>" href="<?= PUBLIC_PATH ?>/mon-profil/">Mon Profil</a>
                    </li>



                    <!--Bouton de déconnexion-->

                    <li class="nav-item">
                    <a class="nav-link<?= ROUTE == '/deconnexion/' ? ' active' : '' ?>" href="<?= PUBLIC_PATH ?>/deconnexion/">Déconnexion</a>
                    </li>


                    <!--Bouton d'ajout de fruit-->
                    <li class="nav-item">
                    <a class="nav-link<?= ROUTE == '/fruits/ajouter-un-fruit/' ? ' active' : '' ?>" href="<?= PUBLIC_PATH ?>/fruits/ajouter-un-fruit/">Ajouter un fruit</a>
                    </li>

                    <?php
                
                }else{

                ?>

                    <!--Bouton inscription-->

                    <li class="nav-item">
                        <a class="nav-link<?= ROUTE == '/creer-un-compte/' ? ' active' : '' ?>" href="<?= PUBLIC_PATH ?>/creer-un-compte/">Inscription</a>
                    </li>

                    <!--Bouton de connexion -->
                    <li class="nav-item">
                        <a class="nav-link<?= ROUTE == '/se-connecter/' ? ' active' : '' ?>" href="<?= PUBLIC_PATH ?>/se-connecter/">Connexion</a>
                    </li>
                
                <?php

                }
                
                ?>

                <!--Bouton de connexion -->
                <li class="nav-item">
                        <a class="nav-link<?= ROUTE == '/fruits/liste/' ? ' active' : '' ?>" href="<?= PUBLIC_PATH ?>/fruits/liste/">Liste des fruits</a>
                </li>
                

            </ul>
        </div>
    </div>
</nav>