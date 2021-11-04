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
            <label for="name"> username : </label>
            <input type="text" name="uname" />
            <br>
        </div>
        <div class="input-group">
            <label for="name">Mot de passe : </label>
            <input type="password"  name="mdp" />
            <br>
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="connexion"> Connexion </button>

             <button class="btn" type="button" name="inscription"> <a href="inscription.php"> Inscription </a> </button>
        </div>
    </form>
</body>

</html>
