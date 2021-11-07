<?session_start()?>
<!DOCTYPE HTML>
<html lang=fr>
    <head>
        <title> </title> 
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <form action="../models/addUser.php" method="post">
            <h2> Formulaire d'ajout d'un utilisateur </h2>
            <div class="input-group">
                <label for="nom">Nom de l'utilisateur </label> 
                <input type="text" name="nom" id="nom"/> </br>
            </div>
            <div class="input-group">
                <label for="username"> Nom d'utilisateur </label> 
                <input type="text" name="username" id="username"/> </br>
            </div>
            <div class="input-group">
                <label for="motDePasse"> Mot de Passe de l'utilisateur </label> 
                <input type="password" name="motDePasse" id="motDePasse"> </br>
            </div>
            <div class="input-group">
                <label for="mail">Mail </label>  
                <input type="email" name="mail" id="mail"> </br>
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="valider">Valider </button>
                <a href="../views/indexAdmin.php?action=gererusers"> <button class="btn" type="button"> Annuler </button> </a>
            </div>
        </form>
    </body>
</html>
