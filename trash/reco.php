<?php
    require_once("config/functions.php");
    require_once("functions/auth.php");
    require_once("config/cookies.php");
    require_once("algo.php");

    require("header.php");
    
    user_connected();
    // if($_SESSION['reload']){
    //     $produits = (array)assembleProductsList()();
    //     // shuffle($produits);
    //     $_SESSION['recoList'] = $produits;
    //     $_SESSION['reload'] = False;
    // } else{
    //     $produits = $_SESSION['recoList'];
    // }
    
    // if(isset($_POST['reloadList'])){
    //     $_SESSION['reload'] = True;
    //     header('Location: index.php');
    //     exit();
    // }
    updateCookies($_COOKIE['casual'], $_COOKIE['boheme'], $_COOKIE['streetwear'], $_COOKIE['glamour'], $_SESSION['id']);
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
        <h1>Recommandations</h1>
        <div id="info">
            <p class="streetwear">Streetwear: <?= $percentage[0]?>, soit <?= $nombre[0]?></p>
            <p class="casual">Casual: <?= $percentage[1]?> soit <?= $nombre[1]?></p>
            <p class="glamour">Glamour: <?= $percentage[2]?> soit <?= $nombre[2]?></p>
            <p class="boheme">Bohème: <?= $percentage[3]?> soit <?= $nombre[3]?></p>
        </div>
        <form action="" method="post">
            <input type="submit" id="reloadList" name="reloadList" value="Reload article list">
        </form>

        <div class="container">
            <div class="row">
                <?php foreach($produits as $produit): ?>
                    <a href="article.php?idProduit=<?= $produit -> id ?>">
                        <div class="product <?= $produit -> category ?>">
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