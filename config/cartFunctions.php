<?php
  function requestProducts($productsId){
    $products = [];
    if(require("connexion.php")){
      for ($i = 0; $i < count($productsId); $i++){
        $query = $pdo->query("SELECT * FROM products WHERE id = '$productsId[$i]'");
        $data = $query->fetchALL(PDO::FETCH_OBJ);
        $products = array_merge($products, $data);
      }
    }

    return $products;
  }
  // function requestProducts(): array{
  //   if(require("connexion.php")){
  //     $products = $_SESSION['cart']['id'];
  //     $productsList = [];
  //     foreach($products as $id){
  //       $query = $pdo->query("SELECT * FROM products WHERE id = '$id'");
  //       $data = $query->fetchALL(PDO::FETCH_OBJ);

  //       $productsList[] = $data;
  //     }
  //     return $productsList;
  //   }
  // }