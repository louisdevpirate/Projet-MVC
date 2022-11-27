<?php
// Ce fichier est le contrôleur frontal, qui chargera tout le site web et ses composants !

// Inclusion des dépendances installées avec composer
require __DIR__ . '/../vendor/autoload.php';

// Inclusion du fichier contenant les fonctions et configurations générales du site
require __DIR__ . '/../configs/functions.php';

// Inclusion du fichier contenant les paramètres personnalisables du site (comme les accès BDD par exemple)
require __DIR__ . '/../configs/params.php';

// Trycatch général qui capturera toutes les exceptions pouvant arriver sur le site ("Throwable" capture tout ce qui est lancé avec "throw")
try{

    // Inclusion du fichier qui contient toutes les routes (urls du site) et qui chargera le contrôleur pour chaque route.
    require __DIR__ . '/../configs/routes.php';

} catch(Throwable $e){

    // Affichage sympa de nos erreurs PHP
    ?>

    <div style="background-color: #FFA2A2; padding: 15px;">
        <h1><b>Erreur PHP !</b></h1>
        <hr>
        <p><b>Fichier</b> : <?= $e->getFile() ?></p>
        <p><b>Ligne</b> : <?= $e->getLine() ?></p>
        <p><b>Message</b> : <?= $e->getMessage() ?></p>
        <hr>
        <?php
        // Affichage de la pile d'erreur dans un dump ou cas où on aurait besoin de détails sur l'erreur affichée
        dump( $e->getTrace() );
        ?>
    </div>

    <?php
}