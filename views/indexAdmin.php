<?php
        session_start();    
        var_dump($_SESSION['username']);    
        require_once "../models/databaseConnexion.php";
        require '../controllers/ControllerAdmin.php';  
        $controller = new ControllerAdmin();
        //s'il nya pas d'actions
        if(!isset($_GET['action'])){
            $controller->showAccueil();
           // $controller->showCrudArticle();
            //$controller->showCrudCategorie();
            //$controller->showCrudUser();
        }
?>
       
