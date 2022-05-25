<?php

    function is_connected(): bool {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        return !empty($_SESSION['connected']);
    }
    
    function user_connected(): void{
            if(!is_connected()){
                header('Location: login.php');
                exit();
            }
    }

    function register($lastName,$name,$gender,$age,$email,$password){
        if(require("connexion.php")){
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $pdo->exec("INSERT INTO users (lastName, firstName, gender, age, email, password, casual, boheme, streetwear, chic) VALUES ('$lastName','$name', '$gender','$age', '$email', '$pass',3,3,3,3)");
        }
    }

    function login($email,$password){
        if(require("connexion.php")){
            $query = $pdo->query("SELECT * FROM users WHERE email = '$email'");
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($data as $user){
                if(password_verify($password,$user -> password)){
                    session_start();
                    $_SESSION['connected'] = True;
                    if($user -> op == 1){
                        $_SESSION['op'] = True;
                    } else {
                        $_SESSION['op'] = False;
                    }
                    $_SESSION['id'] = $user -> id;
                    $_SESSION['lastName'] = $user -> lastName;
                    $_SESSION['firstName'] = $user -> firstName;
                    $_SESSION['reload'] = True;

                    setcookie('chic', null, time() - 3600, "/");
                    setcookie('streetwear', null, time() - 3600, "/");
                    setcookie('boheme', null, time() - 3600, "/");
                    setcookie('casual', null, time() - 3600, "/");

                    setcookie('boheme',$user -> boheme, 0, '/');
                    setcookie('chic',$user -> chic, 0, '/');
                    setcookie('streetwear',$user -> streetwear, 0, '/');
                    setcookie('casual',$user -> casual, 0, '/');

                    header('Location: index.php');

                    exit();
                } else{
                    return False;
                }
            }
        }
    }