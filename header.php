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
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@100;400;500;800&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div>
            <h1>CLOTHES</h1>
        </div>
        <?php if(is_connected()): ?>
            <div id="name">
                <h2>Bienvenue</h2>
                <a id="account" href="#">
                    <h2><?= $_SESSION['firstName']; ?> <?= $_SESSION['lastName']; ?> </h2>
                    <img class="icons" src="images/account.png" alt="">
                </a>
            </div>
        <?php endif ?>
        <div id="navbar">
            <div>
                <?php if($_SESSION['op']):?>
                    <a href="indexAdmin.php" >Admin</a>
                <?php endif ?>
                <a href="index.php" >Accueil</a>
                <a href="reco.php" >Recommandations</a>
                <?php if(!is_connected()): ?>
                    <a href="register.php" >Inscription</a>
                    <a href="login.php" >Connexion</a>
                <?php  else: ?>
                <a id="wishHeader" href="wishlist.php">
                    <img class="icons" src="images/wishlist.png" alt="">
                </a>
                <a id="cartHeader" href="cart.php" >
                    <img class="icons" src="images/cart.png" alt="">
                </a>
            </div>
            <div id="logout">
                <a href="logout.php">Se déconnecter</a>
            </div>
                <?php endif ?>
        </div>
    </header>
</body>
</html>