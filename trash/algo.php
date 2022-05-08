<?php
    function ratio(): array{
        $categoriesPoints = [(int)($_COOKIE['streetwear']), (int)($_COOKIE['casual']), (int)($_COOKIE['glamour']), (int)($_COOKIE['boheme'])];
        $result = [];

        for ($i = 0; $i < 4; $i++){
            $compute = ($categoriesPoints[$i] * 100) / 12;
            $compute = round((12 * ($compute / 100)), 0, PHP_ROUND_HALF_ODD);
            if($compute == 0){
                $compute +=1;
            }
            array_push($result, $compute);
        }
        return($result);
    }
    function percentage(): array{
        $categoriesPoints = [(int)($_COOKIE['streetwear']), (int)($_COOKIE['casual']), (int)($_COOKIE['glamour']), (int)($_COOKIE['boheme'])];
        $result = [];

        for ($i = 0; $i < 4; $i++){
            $compute = ($categoriesPoints[$i] * 100) / 12;
            array_push($result, $compute);
        }
        return($result);
    }
    function requestProducts($category, $number): array{
        $productsList = [];
        if(require("config/connexion.php")){
            $query = $pdo->query("SELECT * FROM products WHERE category = '$category'");

            $data = $query -> fetchALL(PDO::FETCH_OBJ);

            $products = (array)array_rand($data, $number);

            for ($i = 0; $i < count($products); $i++) {
                array_push($productsList, $data[$products[$i]]);
            }
            // var_dump($productsList);
            return $productsList;
        }
    }
    function assembleProductsList(){
        $categories = ['streetwear', 'casual', 'glamour', 'boheme'];
        $productsRatio = ratio();
        $listProducts = [];
        $i = 0;
        foreach($productsRatio as $ratio){
            $listProducts = array_merge($listProducts, requestProducts($categories[$i],$ratio));
            $i++;
        }
        // var_dump($listProducts);
        shuffle($listProducts);
        return $listProducts;
    }