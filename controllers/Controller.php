<?php
    require_once "models/databaseConnexion.php";
    require_once 'models/Article.php';
    require_once 'models/Categorie.php';
    class Controller{
        function __construct()
        {
        }
        public function showAccueil()
        {
            $articles = Article::getLimitArticle();
            $categories= Categorie::getAllCategory();
            require 'views/accueil.php';
        }
        public function showPagination()
        {
            $articles = Article::paginationNext();
            $categories= Categorie::getAllCategory();
            require 'views/pagination.php';
        }
        public function showArticles($id)
        {
            $articles=Article::getArticleById($id);
            require 'views/accueil.php';
        }
        public function showCategories()
        {
            $categories=Categorie::getArticleByCategorie($id);
            require 'views/accueil.php';
        }

    }
?>