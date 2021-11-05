<?php
    require_once '../models/Article.php';
    require_once '../models/Categorie.php';
    class ControllerAdmin{
        function __construct()
        {
        }
        public function showAccueil()
        {
        require_once '../views/accueilAdmin.php';
        }
       
    }
?>
