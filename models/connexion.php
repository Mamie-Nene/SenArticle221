<?php
 require_once("databaseConnexion.php");

    // pour maintenir $_SESSION
    //require('mesFonctionsSql.php');

    
    session_start();
    if(isset($_POST['connexion'])) //si l'user appuie sur le bouton connexion 
    {
        if( (empty($_POST['uname'])) OR (empty($_POST['mdp'])))
        {
            echo 'un des champs est vide !!';
        }
        else 
        { 
            //$username = $_POST['uname'];
            //$password = $_POST['mdp'];
            $connexion = mysqli_connect("localhost","221shadow","772972920lodye","mglsi_news");
             //mysqli_connect("localhost", "root", "passer123", "mglsi_news");
            //on sécurise les données entrées
            $username=stripcslashes($_REQUEST['uname']);
            $password =stripcslashes($_REQUEST['mdp']);
            $username= mysqli_real_escape_string($connexion,$username);
            $password= mysqli_real_escape_string($connexion, $password);
            $_SESSION['limit'] = 0;
            
            //hachage du mot de passe 
            //$pass_hache=password_hash($_POST['password'], PASSWORD_DEFAULT);
            //recherche dans la base de données pour voir si les données existent 
            $requete = mysqli_query($connexion,"SELECT * FROM  Users WHERE username= '".$username."' AND motDePasse='".$password."' ");
            //on verifie s'il ya un resultat
            if(mysqli_num_rows($requete)==0)
            {
                echo 'le compte n\'a pas été trouvé';
            } 
            else
            {
                //on ouvre la session
                $user= mysqli_fetch_array($requete);
                $_SESSION['username']=$user['username'];
                $_SESSION['userRole']=$user['userRole'];
                $_SESSION['id']=$user['id'];
                if($user['userRole']==2)
                {
                header("Location: ../views/indexAdmin.php");                
                }
                else header("Location: ../views/indexEditeurs.php");
                exit;
            }
                mysqli_close($connexion); //fermer la connexion

        }
    }
 
   
?>
