<?php
    function updateCookies($casual, $boheme, $streetwear, $glamour, $id){
        if(require("connexion.php")){
            $req = $pdo->exec("UPDATE users SET `casual` = $casual, `boheme` = $boheme, `streetwear` = $streetwear, `glamour` = $glamour WHERE `id` = $id");
        }
    }
?>