<!DOCTYPE html>

<?php
    require_once("config/commandes.php");
    require_once("functions/auth.php");
    $produits = (array)afficherListeProduits();
    $prod = shuffle($produits);
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHES</title>
    <link rel="stylesheet" href="styles.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Permanent+Marker&display=swap" rel="stylesheet">
</head>
<body>
    <a href="admin/index.php" class="btnMenu">Admin</a>
    <?php if(!is_connected()): ?>
        <a href="identification/signup.php" class="btnMenu">Inscription</a>
        <a href="identification/login.php" class="btnMenu">Connexion</a>
    <?php  else: ?>
        <a href="identification/logout.php" class="btnMenu">Se déconnecter</a>
    <?php endif ?>
    <div class="container">
        <div class="row">
            <?php foreach($produits as $produit): ?>
                <a href="article.php?idProduit=<?= $produit -> id ?>">
                    <div class="product">
                        <div class="image">
                            <img src="<?= $produit -> image ?>" alt="Image produit">
                        </div>
                        <div class="infos">
                            <p class="pName"><?= $produit -> titre ?></p>
                            <p class="pPrice"><?= $produit -> prix ?></p>
                            <p class="pId"><?= $produit -> id ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>