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
    <div id="caContainer">
    <?php if(!empty($_SESSION['cart']['id'])):?>
      <table>
        <?php foreach($produits as $index => $produit): ?>
          <tr class="caRow">
            <th class="caseImg">
              <a class="prodLink" href="article.php?idProduit=<?= $produit -> id ?>">
              <img class="caImg" src="<?= $produit -> image ?>" alt="Image produit">
              </a>
            </th>
            <td class="caseTitle">
              <a class="prodLink" href="article.php?idProduit=<?= $produit -> id ?>">
                <p class="caTitle"><?= $produit -> titre ?></p>
              </a>
            </td>
            <td class="casePrice"><p class="caPrice"><?= $produit -> prix ?> €</p></td>
            <td class="caseQte">
              <p class="caQte">Quantité: <?= $_SESSION['cart']['quantity'][$index] ?></p>
              <form class="caForm" method="POST">
                <input type="number" name="index" style="display: none" value=<?= $index ?>>
                <input name="add" class="caAdd" type="submit" value="+">
                <input name="remove" class="caRemove" type="submit" value="-">
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
        <tfoot id="caProceed">
          <td></td>
          <td></td>
          <td>Total: <?= totalPrice();?> €</td>
          <td>
            <button>
              <a href="order.php">Procéder au paiement</a>
            </button>
          </td>
        </tfoot>
      </table>
      <?php else: ?>
        <h2>Votre panier est vide</h2>
        <?php endif; ?>
      
      <div></div>
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