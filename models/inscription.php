 <?php
 //require('mesFonctionsSql.php');

    //$connexion= getDatabaseConnexion();
    $connexion =mysqli_connect("127.0.0.1", "root", "passer123", "mglsi_news") ;
    if(isset($_POST['valider']))
    {      
        if(empty($_POST['uname']) )
        {
            echo "username requis !!"; 
        }
        else
        {
            if(empty($_POST['mdp']) or (empty($_POST['confmdp'])))
            {
                echo "mot de passe requis et confirmation !!"; 
            }
            else
            { 
                $verifMotDePasse=strcasecmp($_POST['mdp'],$_POST['confmdp']); 
                if($verifMotDePasse != 0)
                {
                    echo "veuillez mettre des mdp identiques";
                }
                else
                {
                    if((empty($_POST['nom'])) or (empty($_POST['mail'])) or (empty($_POST['groupe'])))
                    {
                        echo 'veuillez remplir les champs restants';
                        
                    }
                    else
                    {
                       $nom= mysqli_real_escape_string($connexion,$_POST['nom']);
                        $uname= mysqli_real_escape_string($connexion,$_POST['uname']);
                        $mdp= mysqli_real_escape_string($connexion,$_POST['mdp']);
                        $confmdp= mysqli_real_escape_string($connexion,$_POST['confmdp']);
                        $mail= mysqli_real_escape_string($connexion,$_POST['mail']);
                        $groupe= mysqli_real_escape_string($connexion,$_POST['groupe']);
                            
                        $requete ="INSERT INTO Users (nom, username, motDePasse, mail, groupe) VALUES ('".$nom."', '".$uname."', '".$mdp."', '".$mail."', '".$groupe."')";
                        $req = mysqli_query($connexion,$requete);
                        //retunr true si c'est reussi
                        if($req){
                            echo 'inscription avec succes';
                            header("Location: ../index.php");
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
            }
        }
    }
?>