<?php
    require_once('config/auth.php');
    $error = null;
    
    if(is_connected()){
        header('Location: index.php');
        exit();
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHES | Inscription</title>
    <link rel="stylesheet" href="style/registerStyle.css">

</head>
<body>
	<!-- <div id="forms"> -->
		<form id="register" action="" method="POST">
			<h2>Inscription</h2>
			<label for="lastName">Nom</label>
			<input id="lastName" name="lastName" type="text" required>
			
			<label for="name">Prénom</label>
			<input id="name" name="name" type="text" required >
			
			<label for="gender">Genre</label>
			<select name="gender" id="gender" required>
				<option value="" selected disabled hidden>Choisir</option>
				<option value="man">Homme</option>
				<option value="woman">Femme</option>
				<option value="nb">NB</option>
			</select>
			
			<label for="age">Âge</label>
			<input type="number" name="age" id="age" step="1" min="13" required>
			
			<label for="email">Email</label>
			<input type="text" placeholder="adresse@mail.com" id="email" name="email" required value="@mail.com"> 

			<label for="password">Mot de passe</label>
			<input type="password" placeholder="Password" id="password" name="password" required>
			
			<a id="terms">En créant un compte vous acceptez nos termes et Conditions d'utilisations.</a>
			
			<input type="submit" name="submit" value="S'inscrire">
		</form>
		<form id="login" action="" method="POST">
			<h2>Connexion</h2>
			<label for="logEmail">Adresse mail</label>
			<input id="logEmail" type="email" name="logEmail" value="adresse@mail.com">

			<label for="logPassword">Mot de passe</label>
			<input id="logPassword" type="password" name="logPassword" value="mdpali">
			<!-- <button type="submit">Se connecter</button> -->
			<input type="submit" name="logSubmit" value="Se connecter">
		</form>
	<!-- </div> -->
</body>
</html>


<?php
	if(isset($_POST['submit'])){
		unset($_POST['submit']);

		if(!empty($_POST['lastName']) && !empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['age']) && !empty($_POST['email']) && !empty($_POST['password'])){
			try{
				register($_POST['lastName'],$_POST['name'],$_POST['gender'],$_POST['age'],$_POST['email'],$_POST['password']);
				header('Location: identification.php');
				exit();
			} catch (Exception $e){
				$error = TRUE;
				var_dump($e);
			}
		}
	}
	if(isset($_POST['logSubmit'])){
		unset($_POST['logSubmit']);
		// require_once 'config' . DIRECTORY_SEPARATOR . 'auth.php';
		$error = null;
		if(!empty($_POST['logEmail']) && !empty($_POST['logPassword'])){
				$result = login($_POST['logEmail'],$_POST['logPassword']);
				if (!$result){
					echo "<script>alert(\"Identifiant ou mot de passe incorect\")</script>";
				}
		}
		// IDENTIFIANT INCORRECT A IMPLEMENTER
		// if(!empty($_POST['email']) && !empty($_POST['password'])){
		// 		if(!login($_POST['email'],$_POST['password'])){
		// 				$error = "Mot de passe incorrect";
		// 				var_dump($error);
		// 		}
		// }
	}




