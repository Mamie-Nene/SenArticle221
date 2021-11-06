<!Doctype html>
<html>
    <head>
        <title> Formulaire d'inscription</title>
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
    </head>
    <body> 
        <div class="row mt">
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form"  action="../models/essai.php" method="POST">
                                <h2 class="form-login-heading"> Formulaire d'inscription </h2>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="nom"> Nom </label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="text" id="nom" name="nom" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="uname"> Nom d'utilisateur</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="text" id=" uname" name="uname" /> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="uname"> Mot de passe</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="password" id=" mdp" name="mdp" /> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="uname"> Confirmation du mot de passe</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="password" id=" confmdp" name="confmdp"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="uname"> Email</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" type="text" id=" mail" name="mail" />  
                                    </div>
                                </div>
                                <button class="btn btn-theme" type="submit" name="valider"> Valider </button>
                                <a href="../index.php"><button class="btn btn-theme04" type="button" name="annuler"> Annuler </button></a>
                            </div>
                        </form> 
                    </div>
                </div>
            
        </div>

        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
        <script>
            $.backstretch("../login-bg.jpg", {
            speed: 500
            });
        </script>
    </body>    
</html>