<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ajouter un fruit - Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>
</head>

<body>

    <!-- Inclusion du menu -->
    <?php include VIEWS_DIR . '/partials/menu.php'; ?>

    <div class="container">

        <!-- Titre H1 -->
        <div class="row my-5">

            <h1 class="col-12 text-center">Ajouter un fruit - Wikifruit</h1>

        </div>

        <!-- Contenu de la page -->
        <div class="row">




            <?php

            // Si l success existe, on l'affiche
            if (isset($success)) {

                echo '<div class="alert alert-success text-center">' . $success . '</div>';
            } else {

            ?>

                <!-- Formulaire d'inscription -->
                <form class="col-12 col-md-6 mx-auto" action="<?= PUBLIC_PATH ?>/fruits/ajouter-un-fruit/" method="POST">

                    <?php

                    // Si il y a des erreurs à afficher
                    if (isset($errors)) {

                        foreach ($errors as $error) {
                            echo '<div class="alert alert-danger">' . $error . '</div>';
                        }
                    }

                    ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input name="name" id="name" class="form-control" type="text">
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Couleur</label>
                        <input name="color" id="color" class="form-control" type="text">
                    </div>

                    <div class="mb-3">
                        <label for="origin" class="form-label">Pays d'origine</label>
                        <input name="origin" id="origin" class="form-control" type="text">
                    </div>

                    <div class="mb-3">
                        <label for="price-per-kilo" class="form-label">Prix au kilo</label>
                        <input name="price-per-kilo" id="price-per-kilo" class="form-control" type="text">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <br>


                    <div class="mb-3">
                        <input type="submit" class="col-12 btn btn-success">
                    </div>

                </form>

            <?php
            }
            ?>

        </div>




    </div>

    </div>


    <!-- Inclusion du contenu du fichier footer.php -->
    <?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>

</html>