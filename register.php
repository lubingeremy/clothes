<?php
    require_once('config/auth.php');
    $error = null;
    
    if(is_connected()){
        header('Location: index.php');
        exit();
    }
    if(!empty($_POST['lastName']) && !empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['password'])){
        try{
            register($_POST['lastName'],$_POST['name'],$_POST['gender'],$_POST['age'],$_POST['email'],$_POST['password']);
        } catch (Exception $e){
            $error = TRUE;
            var_dump($e);
        }
        // if($_POST['username'] === 'user' && $_POST['password'] === 'pwd'){
        //     session_start();
        //     $_SESSION['connected'] = True;
        //     header('Location: ../index.php');
        //     exit();
        // } else{
        //     $error = "Identifiant incorrect";
        //     var_dump($error);
        // }
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHES | Inscription</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Inscription</h1>
    <a href="index.php">Acceuil</a>
    <a href="login.php">Connexion</a>
    <hr>
        <form action="" method="POST">
            <label for="lastName">Nom</label>
            <input id="lastName" name="lastName" type="text" required value="fsognnqfqdp">

            <label for="name">Prénom</label>
            <input id="name" name="name" type="text" required value="fsognnqfqdp">

            <label for="gender">Genre</label>
            <select name="gender" id="gender" required>
                <option value="" selected disabled hidden>Choisir</option>
                <option value="man">Homme</option>
                <option value="woman">Femme</option>
                <option value="nb">NB</option>
            </select>

            <label for="age">Âge</label>
            <input type="number" name="age" id="age" step="1" min="13" required value="25">

            <label for="email">Email</label>
            <input type="text" placeholder="adresse@mail.com" id="email" name="email" required value="adresse@mail.com"> 

            <label for="password">Mot de passe</label>
            <input type="password" placeholder="Password" id="password" name="password" required value="newpass">
            
            <p>En créant un compte vous acceptez nos Termes et Conditions d'utilisations.</p>

            <input type="submit" name="submit" value="S'inscrire">
        </form>
</body>
</html>