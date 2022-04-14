<?php

    function is_connected(): bool {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        return !empty($_SESSION['connected']);
    }
    
    function user_connected(): void{
            if(!is_connected()){
                header('Location: ../identification/login.php');
                exit();
            }
    }

    function disconnect(): void{
        // $_SESSION[];
    }

    function register($lastName,$name,$username,$gender,$age,$email,$password){
        if(require("../config/connexion.php")){
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $pdo->exec("INSERT INTO users (lastName, firstName, username, gender, age, email, password, casual, boheme, streetwear, glamour) VALUES ('$lastName','$name', '$username', '$gender','$age', '$email', '$pass',3,3,3,3)");
        }
    }