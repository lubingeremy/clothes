<?php
	require_once("config/functions.php");
	require_once("config/algo.php");
	require_once("config/wishlistFunctions.php");
	require_once("config/cartFunctions.php");
	if(!empty($_GET['idProduit'])){
		$produit = afficherPP($_GET['idProduit']);
	}

	require("header.php");    
?>

	<!DOCTYPE html>
	<html lang="fr">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="style/articleStyle.css">
			<title>CLOTHES | <?=$prd -> titre?></title>
			</head>
			<body>
			<?php foreach($produit as $prd): ?>
				<div id="arContainer">
					<div id="arImg">
						<img id="arImage" src="<?= $prd -> image ?>" alt="Image produit">
					</div>
					<div id="arInfos">
						<h2 id="arTitle"><?=$prd -> titre?></h2>
						<p id="arCategory"><?= $prd -> category?></p>
						<p id="category" style="display: none"><?= $prd -> category?></p>
						<p class="arPrice"><?= $prd -> prix ?> €</p>
						<select name="" id="size" required>
							<option value="">Sélectionner une taille</option>
							<option value="XS">XS</option>
							<option value="S" disabled>S - Indisponible</option>
							<option value="M" disabled>M - Indisponible</option>
							<option value="L">L</option>
							<option value="XL" disabled>XL - Indisponible</option>
							<option value="2XL">2XL</option>
							<option value="3XL">3XL</option>
							<option value="4XL">4XL</option>
						</select>
						<form id="arForm" method="POST">
							<input class="arButtons" name="panier" type="submit" value="Ajouter au panier">
							<input class="arButtons" name="wishlist" type="submit" value="Ajouter aux favoris">
						</form>
						<p id="arCaption">Lorem ipsum dolor sit amet concentre consectetur adipisicing toi elit. Quas nam, sur quod et la illo prez, cupiditate ipsum aut eos excepturi reprehenderit exercitationem nisi explicabo. Rem reiciendis iusto Description d'article robcaecati aliquam repudiandae fugit?</p>
					</div>
				</div>
				
				
				<script src="../node_modules/timeme.js/timeme.min.js"></script>
				<script src="../script.js"></script>
			<?php endforeach; ?>
		</body>
	</html>

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
		} catch (Exception $e) 
		{
			$e->getMessage();
		}
	}