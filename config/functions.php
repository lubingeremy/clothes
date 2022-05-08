<?php
    function ajouterProduit($image, $titre, $prix, $category){
        if(require("connexion.php")){
            try{
                $req = $pdo->exec("INSERT INTO products (image, titre, prix, category) VALUES ('$image', '$titre', '$prix', '$category')");
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }
    }
    function afficherListeProduits(){
        if(require("connexion.php")){
            // Récupère les élément de produits, ordonné par id
            $query = $pdo->query("SELECT * FROM products ORDER BY id DESC");
            // exécute la commande précédente
            // $req -> execute();

            $data = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $data;
            
            // $req -> closeCursor();
        }
    }
    function afficherPP($id){
        if(require("connexion.php")){
            // Récupère les élément de produits, ordonné par id
            $query = $pdo->query("SELECT * FROM products WHERE id = '$id'");
            
            $data = $query -> fetchALL(PDO::FETCH_OBJ);

            return $data;
        }
    }
    function ajouterLien($product_id,$category){
        if(require("connexion.php")){
            switch($category){
                case "casual":
                    $category_id = 1;
                    break;
                case "boheme":
                    $category_id = 2;
                    break;
                    case "streetwear":
                    $category_id = 3;
                    break;
                case "glamour":
                    $category_id = 4;
                    break;
                default:
                    var_dump("erreur");
            }
            $pdo->exec("INSERT INTO product_category (product_id, category_id) VALUES ('$product_id', '$category_id')");
        }
    }




  /////////////////////CART/////////////////////

	function createCart(){
		if(!isset($_SESSION['cart']))
		{
				$_SESSION['cart'] = array();
				$_SESSION['cart']['title'] = array();
				$_SESSION['cart']['id'] = array();
				$_SESSION['cart']['quantity'] = array();
				$_SESSION['cart']['price'] = array();
		}
	}
	function addToCart($title, $id, $quantity, $price){
    createCart();
    $position_produit = array_search($id,  $_SESSION['cart']['id']);
    if($position_produit !== false)
    {
        $_SESSION['cart']['quantity'][$position_produit] += $quantity ;
    }
    else
    {
			$_SESSION['cart']['title'][] = $title;
			$_SESSION['cart']['id'][] = $id;
			$_SESSION['cart']['quantity'][] = $quantity;
			$_SESSION['cart']['price'][] = $price;
    }
	}
	function totalPrice(){
		$total=0;
		for($i = 0; $i < count($_SESSION['cart']['id']); $i++){
			$total += $_SESSION['cart']['quantity'][$i] * $_SESSION['cart']['prix'][$i];
		}
		return round($total,2); 
	}
	function removeProductCart($id_product){
		$productIndex = array_search($id_product,  $_SESSION['cart']['id']);
		if ($productIndex !== false)
		{
			array_splice($_SESSION['cart']['title'], $productIndex, 1);
			array_splice($_SESSION['cart']['id'], $productIndex, 1);
			array_splice($_SESSION['cart']['quantity'], $productIndex, 1);
			array_splice($_SESSION['cart']['price'], $productIndex, 1);
		}
	}

?>