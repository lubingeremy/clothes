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
    <!-- <button>Tout ajouter au panier</button> -->
    <div id="caContainer">
      <?php if(!empty($_SESSION['wishlist']['id'])):?>
        <table>
          <?php foreach($produits as $index => $produit): ?>
            <tr class="caRow">
              <th class="caseImg">
                <a class="prodLink" href="article.php?idProduit=<?= $produit -> id ?>">
                  <img class="caImg" src="<?= $produit -> image ?>" alt="Image produit">
                </a>
              </th>
              <td class="caseTitle">
                <a href="article.php?idProduit=<?= $produit -> id ?>">
                  <p class="caTitle"><?= $produit -> titre ?></p>
                </a>
              </td>
              <td class="casePrice"><p class="caPrice"><?= $produit -> prix ?> €</p></td>
              <td class="caseQte">
                <form class="caForm" method="POST">
                  <input type="number" name="index" style="display: none" value=<?= $index ?>>
                  <input type="number" name="price" style="display: none" value=<?= $produit -> prix ?>>
                  <input name="remove" class="caRemove" type="submit" value="X">
                  <p></p>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
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