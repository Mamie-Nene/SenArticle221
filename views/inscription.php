<!Doctype html>
<html>
    <head>
        <title> Formulaire d'inscription</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    </head>
    <body>
        <form action="../models/inscription.php" method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-3">
                        <br>
                        <h2 class="text-center"> Formulaire d'inscription </h2>
                        <hr>
                        <label for="nom"> <strong> NOM </strong></label>
                        <input class="form-control" type="text" id="nom" name="nom"/>

                        <label for="uname"> username </label>
                        <input class="form-control" type="text" id=" uname" name="uname"/> 
                        <label for="mdp"> Mot de passe </label>
                        <input class="form-control" type="password" id=" mdp" name="mdp" /> 
                        <label for="confmdp"> Confirmation du Mot de passe </label>
                        <input class="form-control" type="password" id=" confmdp" name="confmdp" />
            
                        <label for="mail"> Email </label>
                        <input class="form-control" type="text" id=" mail" name="mail"/> 
                
                        <button class="form-control" type="submit" name="valider"> Valider </button>
                        <a href="../index.php"><button type="button" name="annuler"> Annuler </button></a>
                    </div>
                </div> 
            </div>
        </form> 
    </body>    
</html>