<?php
        require_once "../models/databaseConnexion.php";
        require '../controllers/ControllerEditeurs.php';  
        $controller = new ControllerAdmin();
        //s'il nya pas d'actions
        if(!isset($_GET['action'])){
            $controller->showAccueil();
        }
        
?>
       
