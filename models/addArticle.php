<?php
session_start();
require_once("api_call.php");

    if(isset($_POST['valider'])){      
        if((empty($_POST['titre'])) or (empty($_POST['contenu'])) or (empty($_POST['categorie']))){
            echo 'veuillez remplir tous les champs ';
        }
        else{
            $connexion =mysqli_connect("127.0.0.1", "221shadow", "772972920lodye", "mglsi_news") ;
            //$connexion=databaseConnexion::getDatabaseConnexion();
            $titre= $_POST['titre'];
            $contenu= $_POST['contenu'];
            $editeur= $_SESSION['id']; 
            $categorie = intval($_POST['categorie']);
            $article = array(
                'titre'=>$titre,
                'contenu'=>$contenu,
                'contenu'=>$editeur,
                'categorie'=>$categorie
            );
            $payload = json_encode(array('article'=>$article));
            $requete ="INSERT INTO Article (titre, contenu, categorie, editeur) VALUES ('{$titre}','{$contenu}',{$categorie},'{$editeur}')";
            if (mysqli_query($connexion, $requete)) {
                header("Location: ../views/indexAdmin.php?action=gererarticles");
                
              } else {
                    echo "couldnt add article";
            }       
        }         
    }else{
        echo "didnt go in the if statement";
    }
?>
    
