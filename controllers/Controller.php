<?php
    require_once 'models/mesFonctionsSql.php';
    class Controller{
        function __construct()
        {
        }
        public function showAccueil(){
            ?>
            <!DOCTYPE html>
            <html lang="FR">
    <head>
        <title>page d'accueil </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
         <h2 class="text-center"> Bienvenue à SenArticle221 </h2>
         <button><a href="views/connexion.php"> Connexion</a> </button>
         <button><a href="views/inscription.php"> Inscription</a> </button>
         <hr>
       
    </body>
</html>
            <?php
            require 'views/article.php';
            afficherArticle();
             afficherCategorie();
        }
        public function showArticles(){
            $articles = getAllArticle();
            //$id=$articles['id'];
            readArticle($articles);
        }
        public function showCategories(){
            $id=$categories['id'];
            readArticle($id);
        }

    }
?>