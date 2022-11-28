<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?=ucfirst(htmlspecialchars($fruit->getName()))?>-Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>

</head>
<body>
    <!--Inclusion du menu-->
    <?php include VIEWS_DIR . '/partials/menu.php'; ?>

    <div class="container">

        <!-- Titre H1 -->
        <div class="row my-5">

        <h1 class="col-12 text-center"> <?=ucfirst(htmlspecialchars($fruit->getName()))?> - Wikifruit</h1>

        </div>

        <!-- Contenu de la page -->
        <div class="row">

            <!-- Lien de retour à la liste des fruits -->
            <div class="col-12 my-3 text-center">
                <a href="<?= PUBLIC_PATH ?>/fruits/liste/">Revenir à la liste des fruits</a>
            </div>

            <?php
            // Si l'utilisateur est connecté, on affiche les boutons "modifier" et "supprimer"
            if(isConnected()){
                ?>
                <div class="col-12 text-center">


                    <div class="my-4 text-center">
                        <a class="text-success me-3" href="<?= PUBLIC_PATH . '/fruits/modifier/?id=' . htmlspecialchars($fruit->getId()) ?>"><i class="fas fa-edit me-2"></i>Modifier le fruit</a>
                        <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fruit ?')" class="text-danger" href="<?= PUBLIC_PATH . '/fruits/supprimer/?id=' . htmlspecialchars($fruit->getId()) ?>"><i class="fas fa-times me-2"></i>Supprimer le fruit</a>
                    </div>

                </div>
                <?php
            }

            ?>

            
        </div>

            <!-- Affichage des infos du fruit (avec htmlspecialchars pour se protéger des failles XSS) -->
            <div class="row">
                <div class="col-12">

                    <div class="card text-center">
                        <div class="card-body">

                            Couleur : <b><?=ucfirst(htmlspecialchars($fruit->getColor()))?></b> | Origine : <b><?=ucfirst(htmlspecialchars($fruit->getOrigin()))?></b> | Prix : <b><?= htmlspecialchars( number_format($fruit->getPricePerKilo(), 2, ',' ) )?>€/kg</b>

                            <p class="card-text my-5"> <?=ucfirst(htmlspecialchars($fruit->getDescription()))?></p>
                        </div>

                        <div class="card-footer text-muted">
                            Ce fruit a été ajouté sur le site par <b><?=ucfirst(htmlspecialchars($fruit->getAuthor()->getFirstname()))?></b>
                        </div>
                    </div>

                </div>
            </div>
            

        </div>

    </div>



    <?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>