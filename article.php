<?php
	require_once("config/functions.php");
	require_once("config/algo.php");
	require_once("config/wishlistFunctions.php");
	require_once("config/cartFunctions.php");
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
			<h2><?=$prd -> titre?></h2>
			<form method="POST">
				<input name="panier" type="submit" value="Ajouter au panier">
				<input name="wishlist" type="submit" value="Ajouter aux favoris">
			</form>
			<p>Catégorie: </p>
			<p id="category"><?= $prd -> category?></p>
			<div class="infos">
				<p class="pPrice"><?= $prd -> prix ?></p>
				<p class="pId"><?= $prd -> id ?></p>
			</div>
			<img src="<?= $prd -> image ?>" alt="Image produit">
			<script src="../node_modules/timeme.js/timeme.min.js"></script>
			<script src="../scr.js"></script>
		</body>
		</html>
	<?php endforeach; ?>

<?php 

if(isset($_POST['panier'])){
	unset($_POST['panier']);
	try {
		addPoints($produit[0] -> category, 2);
		addToCart($produit[0] -> id, $produit[0] -> prix);
	} catch (Exception $e) 
	{
		$e->getMessage();
	}
}
if(isset($_POST['wishlist'])){
	unset($_POST['wishlist']);
	try {	
		addPoints($produit[0] -> category, 1);
		addToWishlist($produit[0] -> id, $produit[0] -> prix);
		// UNSET POUR RETRAIT WISHLIST
	} catch (Exception $e) 
	{
		$e->getMessage();
	}
}