<?php
    require_once "../models/databaseConnexion.php";
    require_once '../models/Article.php';
    require_once '../models/Categorie.php';
    class ControllerAdmin{
        function __construct()
        {
        }
        public function showAccueil()
        {
            $articles = Article::getLimitArticle();
            $categories= Categorie::getAllCategory();
        require_once '../views/accueilEditeur.php';
        }
        public function showArticles($id){
            
            $article=Article::ArticleById($id);
            $categories= Categorie::getAllCategory();
            require '../views/articleEditeur.php';
            
        }
        public function showCategories($id){
            $articles=Article::categoryArticle($id);
            $categories=Categorie::getAllCategory();
            require '../views/categorieEditeur.php';
        }
        public function showGestionArticle(){
            $articles=Article::getAllArticle();
            require '../views/gererArticlesEditeurs.php';
        }
         public function showEditArticle($id){
            
            $article=Article::ArticleById($id);
            require '../views/editArticle.php';
            
        }
        public function showDeleteArticle($id){
            
            $article=Article::ArticleById($id);
            require '../views/deleteArticle.php';
            
        }
        public function showGestionCategorie(){
            $categories=Categorie::getAllCategory();
            require '../views/gererCategoriesEditeurs.php';
        }
        
    } 

?>
