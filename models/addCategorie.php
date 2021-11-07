<?php
session_start();
    if(isset($_POST['valider'])){      
        if(empty($_POST['libelle'])){
            echo 'veuillez remplir le champs ';
        }
        else
        {
            $connexion =mysqli_connect("127.0.0.1", "root", "passer123", "mglsi_news") ;
            //$connexion=databaseConnexion::getDatabaseConnexion();
            $libelle= $_POST['libelle'];
            $requete ="INSERT INTO Categorie (libelle) VALUES ('{$libelle}')";
            if (mysqli_query($connexion, $requete)) {
                header("Location: ../views/indexAdmin.php?action=gerercategories");
                
              } else {
                    echo "couldnt add categorie";
            }       
        }         
    }else{
        echo "didnt go in the if statement";
    }
?>
    