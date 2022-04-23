<?php
    require_once("config/functions.php");
    require_once("functions/auth.php");
    require_once("config/cookies.php");

    require("header.php");
    
    user_connected();
    if($_SESSION['reload']){
        $produits = (array)afficherListeProduits();
        shuffle($produits);
        $_SESSION['homeList'] = $produits;
        $_SESSION['reload'] = False;
    } else{
        $produits = $_SESSION['homeList'];
    }
    
    if(isset($_POST['reloadList'])){
        $_SESSION['reload'] = True;
        header('Location: index.php');
        exit();
    }
    updateCookies($_COOKIE['casual'], $_COOKIE['boheme'], $_COOKIE['streetwear'], $_COOKIE['glamour'], $_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHES</title>    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Permanent+Marker&display=swap" rel="stylesheet">
</head>
<body>
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