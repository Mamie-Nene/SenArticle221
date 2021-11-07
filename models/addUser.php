<?php
session_start();
    if(isset($_POST['valider']))
    {      
        if((empty($_POST['nom'])) or (empty($_POST['username'])) or (empty($_POST['motDePasse'])) or (empty($_POST['mail'])))
        {
            echo 'veuillez remplir tous les champs ';
        }
        else
        {
            $connexion =mysqli_connect("127.0.0.1", "root", "passer123", "mglsi_news") ;
            $nom= $_POST['nom'];
            $username= $_POST['username'];
            $motDePasse= $_POST['motDePasse'];
            $mail= $_POST['mail'];
            $userRole=1;
            $requete ="INSERT INTO Users (nom, username, motDePasse, mail, userRole) VALUES ('{$nom}', '{$username}', '{$motDePasse}', '{$mail}', '{$userRole}')";    
            if (mysqli_query($connexion, $requete)) 
            {
                header("Location: ../views/indexAdmin.php?action=gererusers");
                //mysqli_close($connexion); fermer la connexion
            } 
            else 
            {
                    echo "couldnt add user";
            }  
               //
        }
            
    }
    else{
             echo "didnt go in the if statement";
    }
              

?>
    