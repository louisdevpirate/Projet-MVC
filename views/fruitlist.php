<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de fruit-wikifruit</title>
</head>

<body>

</body>

</html>

<head>
    <title>Accueil-Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>

</head>

<body>
    <!--Inclusion du menu-->
    <?php include VIEWS_DIR . '/partials/menu.php'; ?>


    <!-- Titre h1 -->
    <div class="row my-5">
        <h1 class="col-12 text-center">Liste des fruits - Wikifruit</h1>
    </div>

    <div class="row">


        <?php



        if (!empty($fruits)) {
        ?>
            <table class="col-12 table table-bordered text-center table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Fruit</th>
                        <th>Couleur</th>
                        <th>Pays d'origine</th>
                        <th>Prix /kg</th>
                        <th>Fiche</th>
                    </tr>
                </thead>

                <?php

                foreach ($fruits as $fruit) {

                ?>

                    <!-- Table liste des fruits -->

                    <tbody>
                        <td><?= $fruit->getId() ?></td>
                        <td><?= ucfirst($fruit->getName()) ?></td>
                        <td><?= ucfirst($fruit->getColor()) ?></td>
                        <td><?= ucfirst($fruit->getOrigin()) ?></td>
                        <td><?= $fruit->getPricePerKilo() . '€' ?></td>
                        <td><a href="<?= PUBLIC_PATH . '/fruits/fiche/?id=' . htmlspecialchars($fruit->getId()) ?>">Voir la fiche</td>

                    </tbody>





                <?php
                }
                ?>
            </table>

        <?php
        }
        ?>
    </div>



    <?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>

</html>