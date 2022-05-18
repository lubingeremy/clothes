<?php
  require_once("header.php");
  require_once("config/functions.php");
  require_once("config/wishlistFunctions.php");
  user_connected();
  createWishlist();
  $produits = requestProducts($_SESSION['wishlist']['id']);
?>

<html>
  <head>
    <link rel="stylesheet" href="style/cartStyle.css">
  </head>
  <body>
    <div id="tableContainer">
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
              <p><?= $_SESSION['wishlist']['quantity'][$index] ?></p>
            </td>
            <td class="case">
              <form method="POST">
                <input type="number" name="index" style="display: none" value=<?= $index ?>>
                <input name="add" type="submit" value="+">
                <input name="remove" type="submit" value="-">
                <p></p>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
          <tr>
            <td>
              <button>Tout ajouter au panier</button>
            </td>
            </tr>
          </table>
    </div>
  </body>
</html>


<?php 
  if(isset($_POST['remove'])){
    try {
      if($_SESSION['wishlist']['quantity'][$_POST['index']] <= 1){
        removeProductCart($_SESSION['wishlist']['id'][$_POST['index']]);
      } else{
        $_SESSION['wishlist']['quantity'][$_POST['index']] -= 1;
      }
      unset($_POST['sub']);
      header('Location: ../wishlist.php');
      exit();
    } catch (Exception $e) 
    {
      $e->getMessage();
    }
  } 
  if(isset($_POST['add'])){
    try {
        $_SESSION['wishlist']['quantity'][$_POST['index']] += 1;
      unset($_POST['add']);
      header('Location: ../wishlist.php');
      exit();
    } catch (Exception $e) 
    {
      $e->getMessage();
    }
  } 