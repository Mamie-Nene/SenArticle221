<?php

    if(isset($_POST['valider'])){      
        if((empty($_POST['nom'])) or (empty($_POST['uname'])) or (empty($_POST['motDepass'])) or (empty($_POST['mail'])))
        {
            echo 'veuillez remplir tous les champs ';
        }
        else
        {
            $nom= mysqli_real_escape_string($connexion,$_POST['nom']);
            $uname= mysqli_real_escape_string($connexion,$_POST['uname']);
            $motDePasse= mysqli_real_escape_string($connexion,$_POST['motDePasse']);
            $mail= mysqli_real_escape_string($connexion,$_POST['mail']);
            $groupe= mysqli_real_escape_string($connexion,$_POST['groupe']);
                            
            $requete ="INSERT INTO Users (nom, username, motDePasse, mail, groupe) VALUES ('".$nom."', '".$uname."', '".$mdp."', '".$mail."', '".$groupe."')";
            $req = mysqli_query($connexion,$requete);
        
            //retunr true si c'est reussi
            if($req)
            {
            echo 'inscription avec succes';
            header("Location: index.php");
            }
            else
            {
                echo 'probleme insertion';
            }
                    
        }
            //hachage du mot de passe 
            //$pass_hache=password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            //pour eviter les attaques de type injection sql et xss
            // on insere les données dans la bd
                        
    }
?>