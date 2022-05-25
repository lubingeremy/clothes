<?php
  function requestCartProducts($productsId){
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

  function mainRemove($category, $number){
    $categories = ["boheme","casual","chic","streetwear"];
    $categories = filterCookie($category, $categories);
    
    $selectedCategory = topCookie($categories);

    if($number === 2){

      if ($_COOKIE[$selectedCategory] > 2){
        remove($selectedCategory, 2);
        return 2;
      } elseif($_COOKIE[$selectedCategory] > 1){
        remove($selectedCategory, 1);
        $categories = filterCookie($selectedCategory, $categories);
        $selectedCategory = topCookie($categories);
        if ($_COOKIE[$selectedCategory] > 1){
          remove($selectedCategory, 1);
          return 2;
        } else {
          return 1;
        }
      } else {
        return 0;
      }
    } else {
      if ($_COOKIE[$selectedCategory] > 1){
        remove($selectedCategory, 1);
        return 1;
      } else {
        return 0;
      }
    }
  }
  function filterCookie($category, $categories){
    $key = array_search($category, $categories);
    array_splice($categories,$key,1);
    return $categories;
  }
  function topCookie($categories){
    $selectedCategory = $categories[0];
    foreach ($categories as $category){
      if ($_COOKIE[$category] >= $_COOKIE[$selectedCategory]){
        $selectedCategory = $category;
      }
    }
    return $selectedCategory;
  }
  function remove($selectedCategory, $number){
    $inter = $_COOKIE[$selectedCategory] - $number;
    setcookie($selectedCategory, null, time() - 3600, "/");
    setcookie($selectedCategory, $inter, 0, "/");
  }
  function addPoints($category, $points){
    if ($points === 2){
      if (($_COOKIE[$category] + $points) <= 9){
        var_dump("ici?1");
        $result = mainRemove($category, $points);
        $inter = $_COOKIE[$category] + $result;
        setcookie($category, null, time() - 3600, "/");
        setcookie($category, $inter, 0, "/");
      } elseif (($_COOKIE[$category] + $points - 1) <= 9){
        var_dump("ici?2");
        $result = mainRemove($category, $points - 1);
        $inter = $_COOKIE[$category] + $result;
        setcookie($category, null, time() - 3600, "/");
        setcookie($category, $inter, 0, "/");
      } else {
        var_dump("ici?3");
        return "Exceed";
      }
    } elseif ($points === 1){
      if (($_COOKIE[$category] + $points) <= 9){
        var_dump("ici?4");
        $result = mainRemove($category, $points);
        $inter = $_COOKIE[$category] + $result;
        setcookie($category, null, time() - 3600, "/");
        setcookie($category, $inter, 0, "/");
      } else {
        var_dump("ici?5");
        return "Exceed";
      }
    }
  }