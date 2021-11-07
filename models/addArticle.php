<?php
session_start();
    if(isset($_POST['valider'])){      
        if((empty($_POST['titre'])) or (empty($_POST['contenu'])) or (empty($_POST['categorie']))){
            echo 'veuillez remplir tous les champs ';
        }
        else{
            $connexion =mysqli_connect("127.0.0.1", "root", "passer123", "mglsi_news") ;
            //$connexion=databaseConnexion::getDatabaseConnexion();
            $titre= $_POST['titre'];
            $contenu= $_POST['contenu'];
            $editeur= $_SESSION['id']; 
            $categorie = intval($_POST['categorie']);
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
    
