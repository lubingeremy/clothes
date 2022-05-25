<?php
  require_once("header.php");
  require_once("config/functions.php");
  require_once("config/cartFunctions.php");
  user_connected();
  createCart();
  $produits = requestCartProducts($_SESSION['cart']['id']);
  // var_dump($_SESSION['cart']);
  // var_dump($produits);
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
              <p><?= $_SESSION['cart']['quantity'][$index] ?></p>
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
            <td></td>
            <td>Total: <?= totalPrice();?></td>
              <td>
                <button>Payer commande</button>
              </td>
            </tr>
          </table>
    </div>
  </body>
</html>


<?php 
  if(isset($_POST['remove'])){
    unset($_POST['sub']);
    try {
      if($_SESSION['cart']['quantity'][$_POST['index']] <= 1){
        removeProductCart($_SESSION['cart']['id'][$_POST['index']]);
      } else{
        $_SESSION['cart']['quantity'][$_POST['index']] -= 1;
      }
      header('Location: ../cart.php');
      exit();
    } catch (Exception $e) 
    {
      $e->getMessage();
    }
  } 
  if(isset($_POST['add'])){
    unset($_POST['add']);
    try {
      $_SESSION['cart']['quantity'][$_POST['index']] += 1;
      header('Location: ../cart.php');
      exit();
    } catch (Exception $e) 
    {
      $e->getMessage();
    }
  } 