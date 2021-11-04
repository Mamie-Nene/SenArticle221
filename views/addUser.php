<?php
    require '../models/mesFonctionsSql.php';
?> 
<!DOCTYPE HTML>
<html lang=fr>
    <head>
        <title> </title> 
    </head>
    <body>
        <h1> Formulaire d'ajout d'un utilisateur </h1>
        <form action="../models/addUser.php" method="post">
            <label for="nom">Nom de l'utilisateur </label> :
            <input type="text" name="nom" id="nom"/> </br>
            <label for="uname"> Nom d'utilisateur </label> :
            <input type="text" name="uname" id="uname"/> </br>
            <label for="motDePasse"> Mot de Passe de l'utilisateur </label> :
            <input type="password" name="motDePasse" id="motDePasse"> </br>
            <label for="mail">Mail </label> : 
            <input type="email" name="mail" id="mail"> </br>
            <label for="groupe"> Groupe </label>
            <input type="number" name="groupe" id="egroup">
            <button type="submit" value="valider">Valider </button>
        </form>
    </body>
</html>