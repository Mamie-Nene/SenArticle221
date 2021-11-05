<?php 
    class databaseConnexion
    {
        public static function getDatabaseConnexion()
        {
        //connexion à la bd
            try 
            {   
                 $db= new PDO('mysql:host=127.0.0.1;dbname=mglsi_news;charset=utf8','221shadow','password');
                 //dsn:url de notre base
            }
            catch (Exception $e){
                die('Erreur : ' .$e->getMessage()); //pour arreter l'execution

            }
            return $db;
        }
    }
?>