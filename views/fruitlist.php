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

    
        <!-- Titre h1 -->
        <div class="row my-5">
            <h1 class="col-12 text-center">Liste des fruits - Wikifruit</h1>
        </div>

        <div class="row">


                <?php

            

                if(!empty($fruits)){
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

                    foreach($fruits as $fruit){

                        ?>

                        <!-- Table liste des fruits -->
                        
                            <tbody>
                                <td><?= htmlspecialchars($fruit->getId()) ?></td>
                                <td><?= ucfirst(htmlspecialchars($fruit->getName())) ?></td>
                                <td><?= ucfirst(htmlspecialchars($fruit->getColor())) ?></td>
                                <td><?= ucfirst(htmlspecialchars($fruit->getOrigin())) ?></td>
                                <td><?= htmlspecialchars( number_format($fruit->getPricePerKilo(), 2, ',' ) )?>€</td>
                                <td><a href="<?= PUBLIC_PATH . '/fruits/fiche/?id=' . htmlspecialchars($fruit->getId())?>">Voir la fiche</a></td>
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