<?php

    function ajouterProduit($image, $titre, $prix, $category){
        if(require("connexion.php")){
            $req = $access -> prepare("INSERT INTO products (image, titre, prix, category) VALUES ('$image', '$titre', '$prix', '$category')");
                    
            $req -> execute(array($image,$titre,$prix,$category));

            $req -> closeCursor();
        }
    }
    function afficherListeProduits(){
        if(require("connexion.php")){
            // Récupère les élément de produits, ordonné par id
            $req = $access->prepare("SELECT * FROM products ORDER BY id DESC");
            // exécute la commande précédente
            $req -> execute();

            $data = $req->fetchALL(PDO::FETCH_OBJ);
            
            return $data;
            
            $req -> closeCursor();
        }
    }
    function afficherPP($id){
        if(require("config/connexion.php")){
            // Récupère les élément de produits, ordonné par id
            $req = $access->prepare("SELECT * FROM products WHERE id = '$id'");
            // exécute la commande précédente
            $req -> execute();
            
            $data = $req -> fetchALL(PDO::FETCH_OBJ);
            
            $req -> closeCursor();

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
                
                // $req = execute();
                
                // $req = closeCursor();
            }
        }
        // function ajouter($image, $titre, $prix, $category){
        //     if(require("connexion.php")){
        //         $req = $access -> prepare("INSERT INTO produits (image, titre, prix, category) VALUES ('$image', '$titre', '$prix', '$category')");
                
        //         $req -> execute();
    
        //         $lastId = $req -> lastInsertId();
                
        //         ajouterLien($lastId,$category);
    
        //         $req -> closeCursor();
    
        //     }
        // }
?>