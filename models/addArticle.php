<?php
    if(isset($_POST['valider']))
    {      
        if((empty($_POST['titre'])) or (empty($_POST['contenu'])) or (empty($_POST['dateCreation'])) or (empty($_POST['dateModif'])))
        {
            echo 'veuillez remplir tous les champs ';
        }
        else
        {
            $titre= mysqli_real_escape_string($connexion,$_POST['titre']);
            $contenu= mysqli_real_escape_string($connexion,$_POST['contenu']);
            $dateCreation= mysqli_real_escape_string($connexion,$_POST['dateCreation']);
            $dateModif= mysqli_real_escape_string($connexion,$_POST['dateModif']);
            $editeurs= mysqli_real_escape_string($connexion,$_POST['editeurs']);
                            
            $requete ="INSERT INTO Users (nom, username, motDePasse, mail, groupe) VALUES ('".$nom."', '".$uname."', '".$mdp."', '".$mail."', '".$groupe."')";
            $req = mysqli_query($connexion,$requete);
            //retunr true si c'est reussi
            if($req)
            {
            echo 'inscription avec succes';
            header("Location: ../indexEditeurs.php");
            }
            else
            {
                echo 'probleme bd';
            }
                    
        }
            //hachage du mot de passe 
            //$pass_hache=password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            //pour eviter les attaques de type injection sql et xss
            // on insere les données dans la bd
                        
    }
?>