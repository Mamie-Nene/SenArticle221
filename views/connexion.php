<?php
    require ('../models/connexion.php');
?>
<!DOCTYPE html>
<html lang=fr>

<head>
    <title> la page de connexion</title>
    
    <!-- Bootstrap core CSS -->
  <link href="../asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../asset/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../asset/css/style.css" rel="stylesheet">
  <link href="../asset/css/style-responsive.css" rel="stylesheet">
</head>

<body>
    <div id="login-page">
        <div class="container">
            <form class="form-login" action="../models/connexion.php" method="POST">
                <h2 class="form-login-heading"> Connectez-vous </h2>
                <div class="login-wrap"> 
                    <input class="form-control" type="text" name="uname" placeholder="Nom d'utilisateur"/>
                    <br/>
                    <input class="form-control" type="password"  name="mdp" placeholder="Mot de passe"/> <br/>
                    <button class="btn btn-theme btn-block" type="submit" name="connexion"><i class="fa fa-lock"></i> Connexion </button>
                    <hr>
                    <div class="registration">
                        Vous n'avez pas encore de compte? <br/>
                        <a href="inscription.php">   Inscrivez vous!  </a> 
                    </div>
                </div>
            </form>
        </div>
    </div>

   
  
</body>

</html>