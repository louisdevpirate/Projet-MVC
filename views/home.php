<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil-Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>

</head>
<body>
    <!--Inclusion du menu-->
    <?php include VIEWS_DIR . '/partials/menu.php'; ?>

    <div class="container">

        <!-- Titre H1 -->
        <div class="row my-5">

        <h1 class="col-12 text-center">Accueil - Wikifruit</h1>

        </div>

        <!-- Contenu de la page -->
        <div class="row">

            <p class="col-12 mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At illo dolore molestias sint, voluptates eveniet nam harum deleniti excepturi quisquam numquam, et cumque suscipit dolorem modi velit voluptatibus deserunt? Dolores perspiciatis eius ipsa labore amet suscipit reiciendis harum modi, dicta minima deleniti enim illo eum obcaecati quia numquam. Delectus, quo.</p>

            <div class="col-12 d-flex justify-content-center flex-wrap home-fruits">
                <img src="<?= PUBLIC_PATH ?>/images/banane.jpg" alt="">
                <img src="<?= PUBLIC_PATH ?>/images/kiwi.jpg" alt="">
                <img src="<?= PUBLIC_PATH ?>/images/orange.jpg" alt="">
            </div>

        </div>

    </div>



    <?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>