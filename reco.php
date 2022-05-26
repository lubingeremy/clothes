<?php
    require_once("config/functions.php");
    require_once("config/auth.php");
    require_once("config/cookies.php");
    require_once("config/algo.php");

    require("header.php");
    
    user_connected();
    updateCookies($_COOKIE['casual'], $_COOKIE['boheme'], $_COOKIE['streetwear'], $_COOKIE['chic'], $_SESSION['id']);
    $produits = (array)assembleProductsList();
    $percentage = percentage();
    $nombre = ratio();
    // var_dump($produits);

?>

<html>
    <head>
        <title>CLOTHES | Recommandations</title>    
    </head>
    <body>
        <!-- <h2>Recommandations</h2> -->
        <div id="ratio">
            <p class="streetwear">Streetwear: points <?= $_COOKIE['streetwear']?>, nombre <?= $nombre[0]?></p>
            <p class="casual">Casual: points <?= $_COOKIE['casual']?>, nombre <?= $nombre[1]?></p>
            <p class="chic">Chic: points <?= $_COOKIE['chic']?>, nombre <?= $nombre[2]?></p>
            <p class="boheme">Bohème: points <?= $_COOKIE['boheme']?>, nombre <?= $nombre[3]?></p>
        </div>
        <!-- <form action="" method="post">
            <input type="submit" id="reloadList" name="reloadList" value="Reload article list">
        </form> -->

        <div id="container">
            <!-- <div class="row"> -->
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
            <!-- </div> -->
        </div>
    </body>
</html>