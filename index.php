<?php
    require("header.php");
    require_once("config/functions.php");
    require_once("config/auth.php");
    require_once("config/cookies.php");

    user_connected();
    $produits = (array)afficherListeProduits();
    shuffle($produits);
    updateCookies($_COOKIE['casual'], $_COOKIE['boheme'], $_COOKIE['streetwear'], $_COOKIE['chic'], $_SESSION['id']);
?>
<html>
    <head>
        <title>CLOTHES</title>    
    </head>
    <body>
        <div id="container">
            <?php foreach($produits as $produit): ?>
                <a href="article.php?idProduit=<?= $produit -> id ?>">
                    <div class="product <?= $produit -> category ?>">
                        <div class="image">
                            <img class="imgProd" src="<?= $produit -> image ?>" alt="Image produit">
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
    </body>
    <?php require("footer.php"); ?>
</html>


