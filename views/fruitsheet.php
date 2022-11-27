<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?=ucfirst(htmlspecialchars($fruit->getName()))?> - Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php  -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>
</head>
<body>
    
    <!-- Inclusion du contenu du fichier menu.php  -->
    <?php include VIEWS_DIR . '/partials/menu.php'; ?>

    <!-- Inclusion du contenu du fichier footer.php  -->
    <?php include VIEWS_DIR . '/partials/footer.php'; ?>

    <div class="container">

    <!-- Titre H1 -->
    <div class="row my-5">

        <h1 class="col-12 text-center">Fiche de présentation</h1>

    </div>

    <!-- Contenu de la page -->
    <div class="container">

        <!-- Titre h1 -->
        <div class="row my-5">
            <h1 class="col-12 text-center"><?=ucfirst(htmlspecialchars($fruit->getName()))?>- Wikifruit</h1>
        </div>

        <div class="row">

            <!-- Lien de retour à la liste des fruits -->
            <div class="col-12 my-3 text-center">
                <a href="<?= PUBLIC_PATH ?>/fruits/liste/">Revenir à la liste des fruits</a>
            </div>

            
        </div>

        <!-- Affichage des infos du fruit (avec htmlspecialchars pour se protéger des failles XSS) -->
        <div class="row">
            <div class="col-12">

                <div class="card text-center">
                    <div class="card-body">
                        Couleur : <?=ucfirst(htmlspecialchars($fruit->getColor()))?> | Origine : <?=ucfirst(htmlspecialchars($fruit->getOrigin()))?> | Prix : <?=ucfirst(htmlspecialchars($fruit->getPricePerKilo()))?>
                        <p class="card-text my-5">La banane est le fruit ou la baie dérivant de l’inflorescence du bananier. Les bananes sont des fruits très généralement stériles issus de variétés domestiquées. Seuls les fruits des bananiers sauvages et de quelques cultivars domestiques contiennent des graines. Les bananes sont généralement jaunes avec des taches brunâtres lorsqu&#039;elles sont mûres et vertes quand elles ne le sont pas.

                                                    Les bananes constituent un élément essentiel du régime alimentaire dans certaines régions, comme en Ouganda, qui offrirait une cinquantaine de variétés de ce fruit. </p>
                    </div>
                    <div class="card-footer text-muted">
                        Ce fruit a été ajouté sur le site par <?=ucfirst(htmlspecialchars($fruit->getAuthor()->getFirstName()))?>
                    </div>
                </div>

            </div>
        </div>

    </div>


</body>
</html>