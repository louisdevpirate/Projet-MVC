<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Inscription - Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>
</head>
<body>

    <!-- Inclusion du menu -->
    <?php include VIEWS_DIR . '/partials/menu.php'; ?>

    <div class="container">

        <!-- Titre H1 -->
        <div class="row my-5">

            <h1 class="col-12 text-center">Inscription - Wikifruit</h1>

        </div>

        <div class="row">


                <?php

                // Si l success existe, on l'affiche
                if(isset($success)){

                    echo '<div class="alert alert-success text-center">' . $success . '</div>';

                } else {

                    ?>

                    <!-- Formulaire d'inscription -->
                    <form class="col-12 col-md-6 mx-auto" action="<?= PUBLIC_PATH ?>/creer-un-compte/" method="POST">

                        <?php

                        // Si il y a des erreurs à afficher
                        if(isset($errors)){

                            foreach($errors as $error){
                                echo '<div class="alert alert-danger">' . $error . '</div>';
                            }

                        }

                        ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" id="email" class="form-control" type="text">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input name="password" id="password" class="form-control" type="password">
                        </div>

                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirmation du mot de passe</label>
                            <input name="confirm-password" id="confirm-password" class="form-control" type="password">
                        </div>

                        <div class="mb-3">
                            <label for="firstname" class="form-label">Prénom</label>
                            <input name="firstname" id="firstname" class="form-control" type="text">
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Nom de famille</label>
                            <input name="lastname" id="lastname" class="form-control" type="text">
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="col-12 btn btn-success">
                        </div>

                    </form>

                    <?php
                }
                ?>

        </div>

    </div>


    <!-- Inclusion du contenu du fichier footer.php -->
    <?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>