<?php
  function createWishlist(){
		if(!isset($_SESSION['wishlist']))
		{
      $_SESSION['wishlist'] = array();
      $_SESSION['wishlist']['title'] = array();
      $_SESSION['wishlist']['id'] = array();
      $_SESSION['wishlist']['quantity'] = array();
      $_SESSION['wishlist']['price'] = array();
		}
	}
  function addToWishlist($productId, $price){
    createWishlist();
    $position_produit = array_search($productId,  $_SESSION['wishlist']['id']);
    if($position_produit !== false)
    {
      $_SESSION['wishlist']['quantity'][$position_produit] += 1 ;
    }
    else
    {
      // $_SESSION['wishlist']['title'][] = $product -> title;
      $_SESSION['wishlist']['id'][] = $productId;
      $_SESSION['wishlist']['quantity'][] = 1;
      $_SESSION['wishlist']['price'][] = $price;
    }
    header('Location: ../wishlist.php');
    exit();
	}
	function removeProductWishlist($id_product){
		$productIndex = array_search($id_product,  $_SESSION['wishlist']['id']);
		if ($productIndex !== false)
		{
      array_splice($_SESSION['wishlist']['title'], $productIndex, 1);
      array_splice($_SESSION['wishlist']['id'], $productIndex, 1);
      array_splice($_SESSION['wishlist']['quantity'], $productIndex, 1);
      array_splice($_SESSION['wishlist']['price'], $productIndex, 1);
		}
	}
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