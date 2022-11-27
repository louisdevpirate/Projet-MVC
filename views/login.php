<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Connexion - Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>
</head>
<body>

    <!-- Inclusion du menu -->
    <?php include VIEWS_DIR . '/partials/menu.php'; ?>

    <div class="container">

        <!-- Titre h1 -->
        <div class="row my-5">
            <h1 class="col-12 text-center">Connexion - Wikifruit</h1>
        </div>

        <!-- Contenu de la page -->
        <div class="row">

            <?php

            // Si la variable "$success" existe, on l'affiche, sinon on affiche le formulaire de connexion
            if(isset($success)){

                echo '<div class="col-12 alert alert-success text-center">' . $success . '</div>';

            } else {

                ?>

                <!-- Formulaire de connexion -->
                <form class="col-12 col-md-6 mx-auto" action="<?= PUBLIC_PATH ?>/se-connecter/" method="POST">

                    <?php

                    // Affichage des erreurs si "$errors" existe
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