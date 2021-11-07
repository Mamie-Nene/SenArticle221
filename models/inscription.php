 <?php
 //require('mesFonctionsSql.php');

    //$connexion= getDatabaseConnexion();
    $connexion =mysqli_connect("127.0.0.1", "root", "passer123", "mglsi_news") ;
    if(isset($_POST['valider']))
    {      
        if((!empty($_POST['nom'])) and (!empty($_POST['username'])) and (!empty($_POST['motDePasse'])) and (!empty($_POST['confmdp']))  and (!empty($_POST['mail'])))
        { 
            $verifMotDePasse=strcasecmp($_POST['motDePasse'],$_POST['confmdp']); 
            if($verifMotDePasse != 0)
            {
                echo "veuillez mettre des mots de passe identiques";
            }
            else
            {
                $connexion =mysqli_connect("127.0.0.1", "root", "passer123", "mglsi_news");
                $nom= $_POST['nom'];
                $username= $_POST['username'];
                $motDePasse= $_POST['motDePasse'];
                $mail=$_POST['mail'];
                $userRole=1;
                $requete ="INSERT INTO Users (nom, username, motDePasse, mail, userRole) VALUES ('{$nom}', '{$username}', '{$motDePasse}', '{$mail}', '{$userRole}')";                
                        //retunr true si c'est reussi
                if(mysqli_query($connexion,$requete))
                {        
                    header("Location: ../views/connexion.php");
                }
                else
                {
                    echo 'probleme integration dans la base ';
                }            
            }            
        }
        else {
                    echo 'veuillez remplir tous les champs';
                }  
            
    }
?>
