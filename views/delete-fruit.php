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

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
      </symbol>
      
      
    </svg>
    
    <div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"></use></svg>
      <div>
        Vous avez bien supprimé le fruit !
      </div>

    </div>

      <a href="<?= PUBLIC_PATH ?>/fruits/liste/">Liste des fruits</a>

    </div>



    <?php include VIEWS_DIR . '/partials/footer.php'; ?>
</body>
</html>