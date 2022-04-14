<?php
    try{
        $pdo = new PDO("mysql:dbname=shop;host=localhost;charset=utf8","root","", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    } catch (Exception $e){
        $e -> getMessage();
    }
?>