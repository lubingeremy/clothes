<?php
    require_once ("config/functions.php");
    // var_dump($_GET);
    if(!empty($_GET['idProduit'])){
        $produit = afficherPP($_GET['idProduit']);
    }
    require("header.php");    

    foreach($produit as $prd): ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>CLOTHES | <?=$prd -> titre?></title>
        </head>
        <body>
            <p id="compteur">COMPTEUR</p>
            <h2><?=$prd -> titre?></h2>
            <p>Catégorie: </p>
            <p id="category"><?= $prd -> category?></p>
            <div class="infos">
                <p class="pPrice"><?= $prd -> prix ?></p>
                <p class="pId"><?= $prd -> id ?></p>
            </div>
            <img src="<?= $prd -> image ?>" alt="Image produit">
            <script src="node_modules/timeme.js/timeme.min.js"></script>
            <script src="scr.js"></script>
        </body>
        </html>
    <?php endforeach; ?>
    

