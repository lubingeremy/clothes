<?php
    // require_once('../functions/auth.php');
    require_once 'config' . DIRECTORY_SEPARATOR . 'auth.php';
    // require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'auth.php';
    $error = null;

    if(is_connected()){
        header('Location: index.php');
        exit();
    }
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        var_dump(login($_POST['email'],$_POST['password']));
    }

    // IDENTIFIANT INCORRECT A IMPLEMENTER
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        if(!login($_POST['email'],$_POST['password'])){
            $error = "Mot de passe incorrect";
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
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h1>Connexion client</h1>
    <form action="" method="POST">
        <label for="email">Adresse mail</label>
        <input id="email" type="email" name="email" value="adresse@mail.com">

        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password" value="mdpali">
        <!-- <button type="submit">Se connecter</button> -->
        <input type="submit" value="Se connecter">
    </form>
    <!-- <a href="../admin/login.php">Admin</a> -->
    <a href="register.php">S'inscrire</a>
</body>
</html>