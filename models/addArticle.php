<?php
session_start();
    if(isset($_POST['valider']))
    {      
        if((empty($_POST['titre'])) or (empty($_POST['contenu'])) )
        {
            echo 'veuillez remplir tous les champs ';
        }
        else
        {
            $connexion =mysqli_connect("127.0.0.1", "221shadow", "772972920lodye", "mglsi_news") ;
            $titre= $_POST['titre'];
            $contenu= $_POST['contenu'];
            $editeurs= $_SESSION['username']; 
            $categorie = intval($_POST['categorie']);
            $requete ="INSERT INTO Article (titre, contenu, categorie, editeur) VALUES ('{$titre}','{$contenu}',{$categorie},'{$editeurs}')";
            //retunr true si c'est reussi
            if (mysqli_query($connexion, $requete)) {
                echo "New record created successfully";
                header("Location: ../views/accueilAdmin.php");
              } else {

            }
                  
        }
            //hachage du mot de passe 
            //$pass_hache=password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            //pour eviter les attaques de type injection sql et xss
            // on insere les données dans la bd
                        
    }else{
        echo "didnt go in the if statement";

    }
?>