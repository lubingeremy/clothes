<?php
  function requestProducts(): array{
    if(require("connexion.php")){
      $products = $_SESSION['cart']['id'];
      $productsList = [];
      foreach($products as $id){
        $query = $pdo->query("SELECT * FROM products WHERE id = '$id'");
        $data = $query->fetchALL(PDO::FETCH_OBJ);

        $productsList[] = $data;
      }
      return $productsList;
    }
}