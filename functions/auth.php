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

    function register($lastName,$name,$gender,$age,$email,$password){
        if(require("../config/connexion.php")){
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $pdo->exec("INSERT INTO users (lastName, firstName, gender, age, email, password, casual, boheme, streetwear, glamour) VALUES ('$lastName','$name', '$gender','$age', '$email', '$pass',3,3,3,3)");
        }
    }

    function login($email,$password){
        if(require("../config/connexion.php")){
            $query = $pdo->query("SELECT * FROM users WHERE email = '$email'");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($data as $user){
                if(password_verify($password,$user -> password)){
                    session_start();
                    $_SESSION['connected'] = True;
                    if($user -> op === 1){
                        $_SESSION['op'] = True;
                    }
                    $_SESSION['id'] = $user -> id;
                    $_SESSION['lastName'] = $user -> lastName;
                    $_SESSION['firstName'] = $user -> firstName;
                    header('Location: ../index.php');
                    exit();
                } else{
                    return False;
                }
            }
        }
    }