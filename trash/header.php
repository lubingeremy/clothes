<?php
    require_once("functions/auth.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Permanent+Marker&display=swap" rel="stylesheet">

</head>
<body>
    <h1>CLOTHES</h1>
    <?php if(is_connected()): ?>
        <div id="name">
            <h2><?= $_SESSION['firstName']; ?></h2>
            <h2><?= $_SESSION['lastName']; ?></h2>
        </div>
    <?php endif ?>
    <?php if($_SESSION['op']):?>
        <a href="admin/index.php" class="btnMenu">Admin</a>
    <?php endif ?>
    <a href="index.php" class="btnMenu">Accueil</a>
    <a href="reco.php">Recommandations</a>
    <?php if(!is_connected()): ?>
        <a href="identification/register.php" class="btnMenu">Inscription</a>
        <a href="identification/login.php" class="btnMenu">Connexion</a>
    <?php  else: ?>
        <a href="identification/logout.php" class="btnMenu">Se déconnecter</a>
    <?php endif ?>
</body>
</html>