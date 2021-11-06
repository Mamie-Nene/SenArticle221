<?php
    require_once "../models/databaseConnexion.php";
    require_once '../models/Article.php';
    require_once '../models/Categorie.php';
    class ControllerAdmin
    {
        function __construct()
        {
        }
        public function showAccueil()
        {
             $articles = Article::getAllArticle();
            $categories= Categorie::getAllCategory();
        require_once '../views/accueilEditeurs.php';
        }
    }
?>