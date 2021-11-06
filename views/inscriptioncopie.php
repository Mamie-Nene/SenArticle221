<!Doctype html>
<html>
    <head>
        <title> Formulaire d'inscription</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <form action="../models/essai.php" method="POST">
            <div class="input-group">
                <h2 class="text-center"> Formulaire d'inscription </h2>
                <hr>
                <label for="nom"> <strong> NOM </strong></label>
                <input type="text" id="nom" name="nom"/>
            </div>
            <div class="input-group">
                <label for="uname"> username </label>
                <input type="text" id=" uname" name="uname"/> 
            </div>
            <div class="input-group">           
                <label for="mdp"> Mot de passe </label>
                <input type="password" id=" mdp" name="mdp" /> 
            </div>
            <div class="input-group">
                <label for="confmdp"> Confirmation du Mot de passe </label>
                <input type="password" id=" confmdp" name="confmdp" />
            </div>
            <div class="input-group">
                <label for="mail"> Email </label>
                <input type="text" id=" mail" name="mail"/> 
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="valider"> Valider </button>
                <a href="../index.php"><button class="btn" type="button" name="annuler"> Annuler </button></a>
            </div>
        </form> 
    </body>    
</html>