<?php
session_start();
    if(isset($_POST['valider'])){      
        if((empty($_POST['titre'])) or (empty($_POST['contenu'])) ){
            echo 'veuillez remplir tous les champs ';
        }
        else{
            $connexion =mysqli_connect("127.0.0.1", "221shadow", "mot de passe", "mglsi_news") ;
            $titre= $_POST['titre'];
            $contenu= $_POST['contenu'];
            $editeurs= $_SESSION['username']; 
            $categorie = intval($_POST['categorie']);
            $requete ="INSERT INTO Article (titre, contenu, categorie, editeur) VALUES ('{$titre}','{$contenu}',{$categorie},'{$editeurs}')";
            if (mysqli_query($connexion, $requete)) {
                echo "New record created successfully";
              } else {
                    echo "couldnt add article";
            }       
        }         
    }else{
        echo "didnt go in the if statement";
    }
?>
