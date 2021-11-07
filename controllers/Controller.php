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
        public function showArticles($id)
        {
            $article=Article::ArticleById($id);
            $categories= Categorie::getAllCategory();
            require 'views/article.php';
        }
        public function showCategories($id)
        {
            $articles=Article::categoryArticle($id);
            $categories=Categorie::getAllCategory();
            require 'views/categorie.php';
        }
        public function showPagination()
        {
            $articles = Article::paginationNext();
            $categories= Categorie::getAllCategory();
            require 'views/pagination.php';
        }
        

    }
?>
