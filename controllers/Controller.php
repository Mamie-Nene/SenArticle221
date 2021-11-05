<?php
    require_once 'models/Article.php';
    require_once 'models/Categorie.php';
    class Controller{
        function __construct()
        {
        }
        public function showAccueil()
        {
            require 'views/accueil.php';
    
        }
        public function showArticles()
        {
            Article::getArticleById($id);
        }
        public function showCategories()
        {
            $id=$categories['id'];
            readArticle($id);
        }

    }
?>
