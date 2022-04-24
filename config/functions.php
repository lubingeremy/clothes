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
        if(require("config/connexion.php")){
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

?>