<?php
    session_start();     
        require_once '../controllers/ControllerAdmin.php';  
        $controller = new ControllerAdmin();
        //s'il nya pas d'actions
        if(!isset($_GET['action']))
        {
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
            elseif(strtolower($_GET['action'])==='categorie')
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
            elseif(strtolower($_GET['action'])==='gererarticles')
            {   
                    $controller->showGestionArticle();
            }
            elseif(strtolower($_GET['action'])==='gerercategories')
            {   
                    $controller->showGestionCategorie();
            }
            elseif(strtolower($_GET['action'])==='gererusers')
            {   
                    $controller->showGestionUsers();
            }
            elseif (strtolower($_GET['action'])==='pagination')
            {
                $controller->showPagination(); 
            }
            else $controller->showAccueil();
        }
       
