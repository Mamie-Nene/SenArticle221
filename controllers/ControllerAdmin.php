<?php
    require_once "../models/databaseConnexion.php";
    require_once '../models/Article.php';
    require_once '../models/Categorie.php';
    require_once '../models/User.php';
    class ControllerAdmin{
        function __construct()
        {
        }
        public function showAccueil()
        {
            $articles = Article::getLimitArticle();
            $categories= Categorie::getAllCategory();
        require_once '../views/accueilAdmin.php';
        }
        public function showArticles($id){
            
            $article=Article::ArticleById($id);
            $categories= Categorie::getAllCategory();
            require '../views/articleAdmin.php';
            
        }
        public function showCategories($id){
            $articles=Article::categoryArticle($id);
            $categories=Categorie::getAllCategory();
            require '../views/categorieAdmin.php';
        }
        public function showGestionArticle(){
            $articles=Article::getAllArticle();
            require '../views/gererArticles.php';
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
            require '../views/gererCategories.php';
        }
        public function showGestionUsers(){
            $users=User::getAllUsers();
            require '../views/gererUsers.php';
        }
        
    } 
?>
