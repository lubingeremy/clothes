<?php
    require_once("config/auth.php");
?>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Permanent+Marker&display=swap" rel="stylesheet">
</head>
<body>
    <h1>CLOTHES</h1>
    <a href="index.php" class="btnMenu">Accueil</a>
    <?php if(isset($_SESSION['firstName'])): ?>
        <div id="name">
            <h2><?= $_SESSION['firstName']; ?></h2>
            <h2><?= $_SESSION['lastName']; ?></h2>
        </div>
    <?php endif ?>
    <?php if(isset($_SESSION['connected']) && isset($_SESSION['op']) === True):?>
        <a href="indexAdmin.php" class="btnMenu">Admin</a>
    <?php endif ?>
    <?php if(!isset($_SESSION['connected'])):?>
      <a href="identification.php" class="btnMenu">Connexion/Inscription</a>
      <?php  else: ?>
        <a href="reco.php" class="btnMenu">Recommandations</a>
        <a href="cart.php" class="btnMenu">Panier</a>
        <a href="wishlist.php" class="btnMenu">Favoris</a>
        <a href="logout.php" class="btnMenu">Se déconnecter</a>
    <?php endif ?>
</body>
</html>