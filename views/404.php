<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Erreur 404-Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>

</head>
<body>
    <!--Inclusion du menu-->
    <?php include VIEWS_DIR . '/partials/menu.php'; ?>

    <div class="container">

        <!-- Titre H1 -->
        <div class="row my-5">

        <h1 class="col-12 text-center">Erreur 404 : page introuvable</h1>

        </div>

        <div class="row">

            <div class="col-12">

                <p class="alert alert-warning fw-bold text-center">Desolé cette page n'existe pas!</p>

                <div class="text-center">

                <img src="<?= PUBLIC_PATH ?>/images/404.png" alt="">

                </div>

            </div>


        </div>

    </div>



    <?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>