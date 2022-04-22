<?php
    require_once("../config/functions.php");
    require_once("../functions/auth.php");
    require_once("../header.php");
    user_connected();
    if(!$_SESSION['op']){
        header('Location: ../admin/login.php');
        exit();
    }
    $produits = (array)afficherListeProduits();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Interface Admin</title>
        <link rel="stylesheet" href="../style.css">
</head>
<body>
    <form method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" name="nom"  required>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" step="0.01" min="0" required placeholder="ex: 789,98">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" name="image" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Style</label>
            <select name="category" id="category" required>
                <option value="boheme">Bohème</option>
                <option value="casual">Casual</option>
                <option value="glamour">Glamour</option>
                <option value="streetwear">Streetwear</option>
            </select>
        </div>
        <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
    </form>

    <div class="container">
        <div class="row">
            <?php foreach($produits as $produit): ?>
                <a href="../article.php?idProduit=<?= $produit -> id ?>">
                    <div class="product">
                        <div class="image">
                            <img src="<?= $produit -> image ?>" alt="Image produit">
                        </div>
                        <div class="infos">
                            <p class="pName"><?= $produit -> titre ?></p>
                            <p class="pPrice"><?= $produit -> prix ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

    <?php

    if(isset($_POST['valider']))
    {
        if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['category']))
        {
        if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['category']))
            {
                $image = htmlspecialchars(strip_tags($_POST['image']));
                $nom = htmlspecialchars(strip_tags($_POST['nom']));
                $prix = htmlspecialchars(strip_tags($_POST['prix']));
                $category = htmlspecialchars(strip_tags($_POST['category']));
            
            try 
            {
                ajouterProduit($image, $nom, $prix, $category);
            } 
            catch (Exception $e) 
            {
                $e->getMessage();
            }

            }
        }
    }

    ?>

</body>
</html>