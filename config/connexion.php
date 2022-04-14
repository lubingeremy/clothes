<?php

    // try {
    //     Lier fichier à la base de données
    //     $access = new pdo("mysql:host=localhost;dbname=shop;charset=utf8","root","");

    //     Afficher erreurs rencontrées
    //     $access -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    // } catch (Exception $e) {
    //     $e -> getMessage();
    // }
?>

<?php
    try{
        $pdo = new PDO("mysql:dbname=shop;host=localhost;charset=utf8","root","", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    } catch (Exception $e){
        $e -> getMessage();
    }
?>