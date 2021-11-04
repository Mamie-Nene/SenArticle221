<?php
        require '../controllers/ControllerAdmin.php';  
        $controller = new Controller();
        //s'il nya pas d'actions
        if(!isset($_GET['action'])){
            $controller->showAccueil();
            $controller->showCrudArticle();
            $controller->showCrudCategorie();
            $controller->showCrudUser();
        }
        else 
        {
            if($_GET['action']==='articles')
            {
                if(isset($_GET['id']))
                {
                    $controller->showArticles();
                }
            }
            else
            {   
                if($_GET['action']==='categories')
                {
                    if(isset($_GET['id']))
                    {
                        $controller->showCategories();
                    }
                }
                else $controller->showAccueil();
            } 
        } 
?>
       