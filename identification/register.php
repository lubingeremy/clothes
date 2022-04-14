<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLOTHES | Inscription</title>
</head>
<body>
    <form action="/action_page.php" method="POST">
        <div class="container">
            <h1>Inscription</h1>
            <hr>

            <label for="email"><b>Email</b></label>
            <!-- Ici AJOUT D'UNE ADRESSE MAIL RANDOM VENANT DE BASE DE DONNEE -->
            <input type="text" placeholder="Enter Email" name="email" required value="adresse@mail.com"> 

            <label for="psw"><b>Mot de passe</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required value="placeholderpassword">
            
            <p>En créant un compte vous acceptez nos <a href="#" style="color:dodgerblue">Termes et Conditions d'utilisations</a>.</p>

            <div class="clearfix">
            <button type="button" class="cancelbtn">Annuler</button>
            <button type="submit" class="signupbtn">S'inscrire</button>
        </div>
    </form>
</body>
</html>