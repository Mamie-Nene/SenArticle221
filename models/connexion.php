<?php 
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
            $connexion =mysqli_connect("127.0.0.1", "root", "passer123", "mglsi_news") ;
             //mysqli_connect("localhost", "root", "passer123", "mglsi_news");
            //on sécurise les données entrées
            $username=stripcslashes($_REQUEST['uname']);
            $password =stripcslashes($_REQUEST['mdp']);
            $username= mysqli_real_escape_string($connexion,$username);
            $password= mysqli_real_escape_string($connexion, $password);
            
            // on se connecte à la base de données et on récupére la connexion à la base de données
           
            // $db_username= 'root';
           // $db_password='passer123';
            // $db_name='mglsi_news';
            // $db_host='127.0.0.1';
            // $db= mysqli_connect($db_host,$db_username, $db_password, $db_name) or die('connexion à la base de données échouée');
          
            //pour eviter les attaques de type injection sql et xss
            
            
            
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
                $_SESSION['username']=$uname;
                //echo " bienvenue , $uname"  ;
                header("Location: ../views/indexAdmin.php");
                exit;
            }
                mysqli_close($connexion); //fermer la connexion

        }
    }
 
   
?>