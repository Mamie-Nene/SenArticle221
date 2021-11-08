<?php
    require ('../models/connexion.php');
?>
<!DOCTYPE html>
<html lang=fr>

<head>
    <title> la page de connexion</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <form action="../models/connexion.php" method="POST">
        <h2> Connexion </h2>
        <div class="input-group">
            <input type="text" name="uname" placeholder="Nom d'utilisateur"/>
            <br>
        </div>
        <div class="input-group">
            <br>
            <input type="password"  name="mdp" placeholder="Mot de passe"/>
            <br>
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="connexion"> Connexion </button>

            <a href="inscription.php"> <button class="btn" type="button" name="inscription">  Inscription </button> </a> 
        </div>
    </form>
</body>

</html>
