<?php
  require_once("header.php");
  require_once("config/functions.php");
  require_once("config/wishlistFunctions.php");
  user_connected();
  createWishlist();
  $produits = requestWishlistProducts($_SESSION['wishlist']['id']);
?>

<html>
  <head>
    <link rel="stylesheet" href="style/cartStyle.css">
  </head>
  <body>
    <button>Tout ajouter au panier</button>
    <div id="tableContainer">
      <?php if(!empty($_SESSION['wishlist']['id'])):?>
        <table>
          <?php foreach($produits as $index => $produit): ?>
            <tr id="row">
              <td class="case">
                <img class="imgProduct" src="<?= $produit -> image ?>" alt="Image produit"></td>
              <td class="case"><p class="pPrice"><?= $produit -> prix ?></p></td>
              <td class="case">
                <a href="article.php?idProduit=<?= $produit -> id ?>">
                  <p class="pName"><?= $produit -> titre ?></p>
                </a>
              </td>
              <td class="case">
                <form method="POST">
                  <input type="number" name="index" style="display: none" value=<?= $index ?>>
                  <input type="number" name="price" style="display: none" value=<?= $produit -> prix ?>>
                  <input name="addToCart" type="submit" value="Ajouter au panier">
                  <input name="remove" type="submit" value="Retirer">
                  <p></p>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
            <tr>
            </tr>
        </table>
      <?php else: ?>
        <h2>Vous n'avez aucun favoris</h2>
      <?php endif; ?>
    </div>
  </body>
</html>


<?php 
  if(isset($_POST['addToCart'])){
    unset($_POST['addToCart']);
    try {
      addToCart($_POST['index'], $_POST['price']);
    } catch (Exception $e) 
    {
      $e->getMessage();
    }
  }
  if(isset($_POST['remove'])){
    unset($_POST['remove']);
    try {
      removeProductWishlist($_SESSION['wishlist']['id'][$_POST['index']]);
      header('Location: ../wishlist.php');
      exit();
    } catch (Exception $e) 
    {
      $e->getMessage();
    }
  }