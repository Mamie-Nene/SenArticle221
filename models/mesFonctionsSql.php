<?php 
    function getDatabaseConnexion(){
        //va recuperer la base de données
        try 
            {   //pour tester la presence d'erreur
                 //connexion à la base de donnée
                //$db= new PDO('msyql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=mglsi_news;charset=utf8','root','passer123');
                 $db= new PDO('mysql:host=127.0.0.1;dbname=mglsi_news;charset=utf8','root','passer123');
                 //dsn:url de notre base
               // $db = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $db;
            }
            catch (Exception $e){
                die('Erreur : ' .$e->getMessage()); //pour arreter l'execution

            }
    }
    function getAllArticle(){
        //on recupere la connexion à la bd
        $connexion=getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Article ORDER BY id DESC';
        //affiche en ligne (rows) et pour le la fonction query c'est pour executer la requete
        $donnees =$connexion->query($requete);
        $rows =$donnees->fetchAll();
        return $rows;
    }
    function getAllCategory(){ 
        $connexion=getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Categorie';
        // et pour le la fonction query c'est pour executer (preparer) la requete
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
    }
    function getAllUsers(){ 
        $connexion=getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Users';
        // et pour le la fonction query c'est pour executer (preparer) la requete
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
    }
    function getAllGroupe(){ 
        $connexion=getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Groupe';
        // et pour le la fonction query c'est pour executer (preparer) la requete
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
    }
    function createArticle($titre, $contenu, $dateCreation, $dateModification, $categorie)
    { //si on met des donnes erronnees
       try {
        $connexion=getDatabaseConnexion();
        $requete="INSERT INTO Article (titre, contenu, dateCreation, dateModification, categorie)
                 VALUES ('$titre','$contenu','$dateCreation','$dateModification','$categorie')";
        $connexion ->exec($requete);
       }
       catch(Exception $e){
        die('Erreur $:' .$e->getMessage());
       }
    }
    function createCategory($libelle){
            try {
             $connexion=getDatabaseConnexion();
             $requete="INSERT INTO Categorie (libelle) VALUES ('$libelle')";
             $connexion ->exec($requete);
            }
            catch(Exception $e){
             die('Erreur $:' .$e->getMessage());
            }
    }
    function readArticle($id){
        $connexion=getDatabaseConnexion();
        //on met la requete oour récuperer l'article choisit
        $requete="SELECT * FROM Article where id==' .$id '";
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
        //if (!empty ($rows)){return $rows[0];}else {die ('article introuvable');}
    }
    function readCategory($id)
    {
        $connexion=getDatabaseConnexion();
        $requete="SELECT * FROM Categorie where id='$id'";
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        if (!empty ($rows))
        {
            return $rows[0];
        }
    }
    function updateArticle($id, $titre, $contenu, $dateCreation, $dateModification, $categorie){
        //on use id car il faut savoir quelle article mettre a jour
        try {
            $connexion=getDatabaseConnexion();
            //on met la requete oour récuperer tous les articles 
            $requete="UPDATE Article set 
                     titre='$titre', 
                     contenu='$contenu', 
                     dateCreation='$dateCreation', 
                     dateModification='$dateModification', 
                     categorie='$categorie' 
                     where id='$id' ";
            $donnees =$connexion->query($requete);
           }  
           catch(Exception $e){
            die('Erreur $:' .$e->getMessage());
           }

    }
    function updateCategory($id, $libelle){
        try {
            $connexion=getDatabaseConnexion();
            //on met la requete oour récuperer tous les articles 
            $requete="UPDATE Categorie set 
                     libelle='$libelle' 
                     where id='$id' ";
            $donnees =$connexion->query($requete);
           }  
           catch(Exception $e){
            die('Erreur $:' .$e->getMessage());
           }
        }
    function deleteArticle($id){
        try {
            $connexion=getDatabaseConnexion();
            //on met la requete oour récuperer tous les articles 
            $requete="DELETE FROM Article where id='$id' ";
                     
            $donnees =$connexion->query($requete);
           }  
           catch(Exception $e){
            die('Erreur $:' .$e->getMessage());
           }
    }
    function deleteCategory($id){
        try {
            $connexion=getDatabaseConnexion();
            //on met la requete oour récuperer tous les articles 
            $requete="DELETE FROM Categorie where id='$id' ";
                     
            $donnees =$connexion->query($requete);
           }  
           catch(Exception $e){
            die('Erreur $:' .$e->getMessage());
           }
    }
    function categoryArticle($categorie)
    {
        $connexion=getDatabaseConnexion();
        $requete="SELECT * FROM Article where categorie='$categorie'";
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
    }

?>