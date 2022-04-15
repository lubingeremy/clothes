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

    function login($email,$password){
        if(require("../config/connexion.php")){
            $query = $pdo->query("SELECT * FROM users WHERE email = '$email'");
            foreach ($query as $user){
                if(password_verify($user -> password, $password)){
                    session_start();
                    $_SESSION['connected'] = True;
                    $_SESSION['id'] = $user -> id;
                    $_SESSION['lastName'] = $user -> lastName;
                    $_SESSION['name'] = $user -> name;
                    header('Location: ../index.php');
                    exit();
                } else{
                    return False;
                }
            }
        }
    }