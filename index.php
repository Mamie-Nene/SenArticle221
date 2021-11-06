<?php
        require_once "models/databaseConnexion.php";
        require 'controllers/Controller.php';
        $controller = new Controller();
        //s'il n'ya pas d'actions on lui affiche la page d'accueil
        if(!isset($_GET['action'])){
            $controller->showAccueil();
        }
        else 
        {
            if(strtolower($_GET['action'])==='article')
            {
                if(isset($_GET['id']))
                {
                    $controller->showArticles($_GET['id']);
                }
                else
                {
                    echo'Erreur';
                }
            }
            else if(strtolower($_GET['action'])==='categorie')
            {   
                if(isset($_GET['id']))
                {
                    $controller->showCategories($_GET['id']);
                }
                else
                {
                    echo'Erreur';
                }
            }
            else if (strtolower($_GET['action'])==='pagination')
            {
                $controller->showPagination(); 
            }
            else $controller->showAccueil();
             
        } 
       
?>
       
