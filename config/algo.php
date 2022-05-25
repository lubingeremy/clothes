<?php
	function ratio(): array{
		$categoriesPoints = [(int)($_COOKIE['streetwear']), (int)($_COOKIE['casual']), (int)($_COOKIE['chic']), (int)($_COOKIE['boheme'])];
		$result = [];

		for ($i = 0; $i < 4; $i++){
			$compute = ($categoriesPoints[$i] * 100) / 12;
			// var_dump($compute);
			$compute = round((20 * ($compute / 100)), 0, PHP_ROUND_HALF_ODD);
			if($compute < 1){
				$compute = 1;
				// if($compute < 2){
				// 	$compute +=2;
				// }
			}
			array_push($result, $compute);
		}
		return($result);
	}
	function assembleProductsList(){
		$categories = ['streetwear', 'casual', 'chic', 'boheme'];
		$productsRatio = ratio();
		$listProducts = [];
		$i = 0;
		foreach($productsRatio as $ratio){
			$listProducts = array_merge($listProducts, requestProducts($categories[$i],$ratio));
			$i++;
		}
		shuffle($listProducts);
		return $listProducts;
	}
	function percentage(): array{
		$categoriesPoints = [(int)($_COOKIE['streetwear']), (int)($_COOKIE['casual']), (int)($_COOKIE['chic']), (int)($_COOKIE['boheme'])];
		$result = [];

		for ($i = 0; $i < 4; $i++){
			$compute = ($categoriesPoints[$i] * 100) / 12;
			array_push($result, $compute);
		}
		return($result);
	}
	function requestProducts($category, $number): array{
		$productsList = [];
		if(require("connexion.php")){
			$query = $pdo->query("SELECT * FROM products WHERE category = '$category'");

			$data = $query -> fetchALL(PDO::FETCH_OBJ);
			// var_dump($number);
			// var_dump($data);
			$products = (array)array_rand($data, $number);

			for ($i = 0; $i < count($products); $i++) {
				array_push($productsList, $data[$products[$i]]);
			}
			return $productsList;
		}
	}


	// COMPUTE POINTS

	// function addPoints($category, $type){
	// 	// (int)($_COOKIE['streetwear']), (int)($_COOKIE['casual']), (int)($_COOKIE['chic']), (int)($_COOKIE['boheme'])
	// 	if
	// }
	// function removePoints($category){

	// }
