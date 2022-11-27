<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mon profil - Wikifruit</title>
    <!-- Inclusion du contenu du fichier header.php -->
    <?php include VIEWS_DIR . '/partials/header.php'; ?>
</head>
<body>

    <!-- Inclusion du menu -->
    <?php include VIEWS_DIR . '/partials/menu.php'; ?>

    <div class="container">

        <!-- Titre H1 -->
        <div class="row my-5">

            <h1 class="col-12 text-center">Mon profil</h1>

        </div>

        <!-- Contenu de la page -->
        <div class="row">

            <div class="col-12 col-lg-6 mx-auto">

                <table class="table table-bordered">

                    <tbody>

                        <tr>
                            <td class="col-6 fw-bold">Adresse email :</td>
                            <td><?= htmlspecialchars( $_SESSION['user']->getEmail() ) ?></td>
                        </tr>

                        <tr>
                            <td class="col-6 fw-bold">Prénom :</td>
                            <td><?= htmlspecialchars( $_SESSION['user']->getFirstname() ) ?></td>
                        </tr>

                        <tr>
                            <td class="col-6 fw-bold">Nom :</td>
                            <td><?= htmlspecialchars( $_SESSION['user']->getLastname() ) ?></td>
                        </tr>

                        <tr>
                            <td class="col-6 fw-bold">Date d'inscription :</td>
                            <td><?= ( $_SESSION['user']->getRegisterDate()->format('d/m/Y à H:i:s') ) ?></td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- Inclusion du contenu du fichier footer.php -->
    <?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>