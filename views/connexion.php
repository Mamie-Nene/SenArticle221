<?php
    require ('../models/connexion.php');
?>
<!DOCTYPE html>
<html lang=fr>

<head>
    <title> la page de connexion</title>
    
</head>

<body>
    <form action="../models/connexion.php" method="POST">
        <h2> Connexion </h2>
        <div class="form-group row">
            <label for="name"> username : </label>
            <input type="text" name="uname" />
            <br>
        </div>
        <div class="form-group row">
            <label for="name">Mot de passe : </label>
            <input type="password"  name="mdp" />
            <br>

            <button type="submit" name="connexion"> Connexion </button>

            <a href="inscription.php"> <button type="button" name="inscription"> Inscription</button></a>
        </div>
    </form>
</body>

</html>