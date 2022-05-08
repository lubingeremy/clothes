<?php
  require_once("header.php");
  require_once("config/functions.php");
  require_once("config/cartFunctions.php");
  user_connected();
  createCart();
  $produits = requestProducts();
  var_dump($produits);
?>

<html>
  <?php foreach($produits as $produit): ?>
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
  <?php endforeach; ?>
</html>