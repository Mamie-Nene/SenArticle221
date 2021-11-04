<?php
        require 'controllers/Controller.php';
        $controller = new Controller();
        //s'il nya pas d'actions
        if(!isset($_GET['action'])){
            $controller->showAccueil();
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
       