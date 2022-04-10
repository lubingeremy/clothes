<?php
    require_once('../functions/auth.php');
    $error = null;
    $admin = False;

    if(is_connected()){
        header('Location: ../index.php');
        exit();
    }
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        if($_POST['username'] === 'user' && $_POST['password'] === 'pwd'){
            session_start();
            $_SESSION['connected'] = True;
            header('Location: ../index.php');
            exit();
        } else{
            $error = "Identifiant incorrect";
            var_dump($error);
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHES | Connexion</title>
</head>
<body>
    <h1>Connexion client</h1>
    <form action="" method="POST">
        <label for="username">Nom d'utilisateur</label>
        <input id="username" type="text" name="username" value="user">

        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password" value="pwd">
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>