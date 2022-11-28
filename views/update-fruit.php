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
        <!-- Formulaire de modification du fruit -->
        <form class="col-12 col-md-6 mx-auto" action="<?= PUBLIC_PATH ?>fruits/modifier/?id=<?= htmlspecialchars($fruitToUpdate->getId()) ?>" method="POST">

                                
            <!-- On affiche un champ désactivé pour l'id seulement à titre indicatif, sans qu'il puisse être modifié -->
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input id="id" disabled value="<?= htmlspecialchars($fruitToUpdate->getId()) ?>" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input name="name" value="<?= htmlspecialchars($fruitToUpdate->getName()) ?>" id="name" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Couleur</label>
                <input name="color" value="<?= htmlspecialchars($fruitToUpdate->getColor()) ?>" id="color" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="origin" class="form-label">Pays d'origine</label>
                <input name="origin" value="<?= htmlspecialchars($fruitToUpdate->getOrigin()) ?>" id="origin" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="price-per-kilo" class="form-label">Prix au kilo</label>
                <input name="price-per-kilo" value="<?= htmlspecialchars($fruitToUpdate->getPricePerKilo()) ?>" id="price-per-kilo" class="form-control" type="text">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                <?= htmlspecialchars($fruitToUpdate->getDescription()) ?>

                </textarea>
            </div>

            <div class="mb-3">
                <input type="submit" class="col-12 btn btn-success">
            </div>

            </form>


    <?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>