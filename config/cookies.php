<?php
    function updateCookies($casual, $boheme, $streetwear, $chic, $id){
        if(require("connexion.php")){
            $req = $pdo->exec("UPDATE users SET `casual` = $casual, `boheme` = $boheme, `streetwear` = $streetwear, `chic` = $chic WHERE `id` = $id");
        }
    }
?>