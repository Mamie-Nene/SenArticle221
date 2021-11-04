<?php
    require_once '../models/mesFonctionsSql.php';
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
         <button> <a href="../models/logout.php"> Deconnexion</a> </button>
         <hr>
       
    </body>
</html>
            <?php
            require_once '../views/article.php';
             afficherArticle();
             afficherCategorie();
        }
        public function showArticles(){
            
            readArticle($articles);
        }
        public function showCategories(){
            $categories = getAllCategory();
            $id=$categories['id'];
            readArticle($id);
        }
        public function showCrudArticle(){
            require_once '../views/gererArticles.php';
            afficherTableauArticles();
        }
        public function showCrudCategorie(){  
            afficherTableauCategories();
        }
        public function showCrudUser(){
            require_once '../views/gererUser.php';
            afficherTableauUsers();
        }
    }
?>