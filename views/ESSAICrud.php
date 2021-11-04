
On commence donc par le fichier principal, database.php

<?php class Database { private static $dbName = 'testphp' ; private static $dbHost = 'localhost' ; private static $dbUsername = 'root'; private static $dbUserPassword = ''; private static $cont = null; public function __construct() { die('Init function is not allowed'); } public static function connect() { if ( null == self::$cont ) { try { self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); } catch(PDOException $e) { die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
        

Ce fichier contient une classe qu’on va appeler « database » et qui contient les informations de connexion à notre base de donnée .On instancie l’objet PDO qui nous permet le lien à la base.
Reportez vous à la doc pour en savoir plus sur l’objet PDO.

Pour aller plus vite, et permettre à tous de beaux copier coller(: ) ) je vais lister les fichiers un à un.
index.php

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud en php</title>
        
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        	<link href="css/responsive.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
        

    </head>
    <body>
        <br />
        <div class="container">
            <br />
            <div class="row">
                <br />
                <h2>Crud en Php</h2>
                <p>
            </div>
            <p>
            <br />
            <div class="row">
                <a href="add.php" class="btn btn-success">Ajouter un user</a>
                <br />
                <div class="table-responsive">
                <br />
                    <table class="table table-hover table-bordered">
                <br />
                        <thead>
                            <th>Name</th>
                            <p>
                            <th>Firstname</th>
                            <p>
                            <th>Age</th>
                            <p>
                            <th>Tel</th>
                            <p>
                            <th>Pays</th>
                            <p>
                            <th>Email</th>
                            <p>
                            <th>Comment</th>
                            <p>
                            <th>metier</th>
                            <p>
                            <th>Url</th>
                            <p>
                            <th>Edition</th>
                            <p>
                        </thead>
                        <p>
                        <br />
                        <tbody>
                            <?php include 'database.php'; //on inclut notre fichier de connection $pdo = Database::connect(); //on se connecte à la base $sql = 'SELECT * FROM user ORDER BY id DESC'; //on formule notre requete foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                                echo '<br /> <tr>';
                                echo'<td>' . $row['name'] . '</td><p>';
                                echo'<td>' . $row['firstname'] . '</td><p>';
                                echo'<td>' . $row['age'] . '</td><p>';
                                echo'<td>' . $row['tel'] . '</td><p>';
                                echo'<td>' . $row['email'] . '</td><p>';
                                echo'<td>' . $row['pays'] . '</td><p>';
                                echo'<td>' . $row['comment'] . '</td><p>';
                                echo'<td>' . $row['metier'] . '</td><p>                            ';
                                echo'<td>' . $row['url'] . '</td><p>';
                                echo '<td>';
                                echo '<a class="btn" href="edit.php?id=' . $row['id'] . '">Read</a>';// un autre td pour le bouton d'edition
                                echo '</td><p>';
                                echo '<td>';
                                echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>';// un autre td pour le bouton d'update
                                echo '</td><p>';
                                echo'<td>';
                                echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
                                echo '</td><p>';
                                echo '</tr><p>';
                            }
                            Database::disconnect(); //on se deconnecte de la base;
                            ?>   
                        </tbody>
                        <p>
                    </table>
                    <p>
                </div>
                <p>
            </div>
            <p>
        </div>
<p>

    </body>
</html>

    Comme on le voit ici, je crée d’abord ma partie html, mon tableau contenant tous les champs.
    Je définis les différents titres de mon tableau (th) ,
    puis de manière dynamique, je ramène dans chaque case(td) les valeurs trouvées dans la base : l’objet PDO est deja instancié dans le fichier database.php , ici j’appelle ce fichier grâce au  include ‘database.php‘;
    Je me connecte  à la base,
    je formule ma requête SQL,
    et pour chaque ligne retournée, je renseigne la valeur trouvée
    enfin je crée mes trois liens sous forme de bouton, vers les pages update, delete et edit.

Pour l’instant on n »a pas rempli notre base, donc ce fichier ne retourne rien. Il va falloir ajouter manuellement les éléments, via notre page add.php.
Add.php

Première chose à faire dans chaque fichier désormais, c’est l’appel à la base :

require 'database.php';

Ensuite, dans ce fichier on va demander à l’utilisateur d’insérer des données, qu’il faudra traiter et sécuriser.

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){

On commence par traiter la méthode de notre formulaire puis vérifier qu’il a bien été soumis. Alors, dans ce cas on teste un a un les inputs :

On assigne une variable d’erreur

$nameError = null;

On récupère notre valeur

$name = htmlentities(trim($_POST['name']));

On crée notre message d’erreur

$valid = true;
       if (empty($name)) {
           $nameError = 'Please enter Name';
           $valid = false;
       }

On se connecte à la base, on formule notre requête, puis on passe au formulaire:

Voici le fichier en entier avec tous les champs input. Dans la vérification des champs on inclut les expressions régulières pour le nom, le mail, le tel, l’url.

     <?php require 'database.php'; if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){ //on initialise nos messages d'erreurs; $nameError = ''; $firstnameError=''; $ageError=''; $telError =''; $emailError =''; $paysError=''; $commentError=''; $metierError=''; $urlError=''; // on recupère nos valeurs $name = htmlentities(trim($_POST['name'])); $firstname=htmlentities(trim($_POST['firstname'])); $age = htmlentities(trim($_POST['age'])); $tel=htmlentities(trim($_POST['tel'])); $email = htmlentities(trim($_POST['email'])); $pays=htmlentities(trim($_POST['pays'])); $comment=htmlentities(trim($_POST['comment'])); $metier=htmlentities(trim($_POST['metier'])); $url=htmlentities(trim($_POST['url'])); // on vérifie nos champs $valid = true; if (empty($name)) { $nameError = 'Please enter Name'; $valid = false; }else if (!preg_match("/^[a-zA-Z ]*$/",$name)) { $nameError = "Only letters and white space allowed"; } if(empty($firstname)){ $firstnameError ='Please enter firstname'; $valid= false; }else if (!preg_match("/^[a-zA-Z ]*$/",$name)) { $nameError = "Only letters and white space allowed"; } if (empty($email)) { $emailError = 'Please enter Email Address'; $valid = false; } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) { $emailError = 'Please enter a valid Email Address'; $valid = false; } if (empty($age)) { $ageError = 'Please enter your age'; $valid = false; } if (empty($tel)) { $telError = 'Please enter phone'; $valid = false; }else if(!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#",$tel)){ $telError = 'Please enter a valid phone'; $valid = false; } if (!isset($pays)) { $paysError = 'Please select a country'; $valid = false; } if(empty($comment)){ $commentError ='Please enter a description'; $valid= false; } if(empty($metier)){ $metierError ='Please select a job'; $valid= false; } if(empty($url)){ $urlError ='Please enter website url'; $valid= false; } else if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) { $urlError='Enter a valid url'; $valid=false; } // si les données sont présentes et bonnes, on se connecte à la base if ($valid) { $pdo = Database::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO user (name,firstname,age,tel, email, pays,comment, metier,url) values(?, ?, ?, ? , ? , ? , ? , ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$firstname, $age, $tel, $email,$pays,$comment, $metier, $url));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud</title>
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
        
    </head>
    <body>



<br />
<div class="container">

<br />
<div class="row">

<br />
<h3>Ajouter un contact</h3>
<p>

</div>
<p>

<br />
<form method="post" action="add.php">

<br />
<div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>

<br />
<div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
</div>
<p>

</div>
<p>

                

<br />
<div class="control-group<?php echo !empty($firstnameError)?'error':'';?>">
                    <label class="control-label">firstname</label>

<br />
<div class="controls">
                            <input type="text" name="firstname" value="<?php echo !empty($firstname)?$firstname:''; ?>">
                            <?php if(!empty($firstnameError)):?>
                            <span class="help-inline"><?php echo $firstnameError ;?></span>
                            <?php endif;?>
</div>
<p>

</div>
<p>


<br />
<div class="control-group<?php echo !empty($ageError)?'error':'';?>">
                    <label class="control-label">age</label>

<br />
<div class="controls">
                            <input type="date" name="age" value="<?php echo !empty($age)?$age:''; ?>">
                            <?php if(!empty($ageError)):?>
                            <span class="help-inline"><?php echo $ageError ;?></span>
                            <?php endif;?>
</div>
<p>

</div>
<p>

                 

<br />
<div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>

<br />
<div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
</div>
<p>

</div>
<p>

                

<br />
<div class="control-group <?php echo !empty($telError)?'error':'';?>">
                        <label class="control-label">Telephone</label>

<br />
<div class="controls">
                            <input name="tel" type="text" placeholder="Telephone" value="<?php echo !empty($tel) ? $tel:'';?>">
                            <?php if (!empty($telError)): ?>
                                <span class="help-inline"><?php echo $telError;?></span>
                            <?php endif;?>
</div>
<p>

</div>
<p>

                

<br />
<div class="control-group<?php echo !empty($paysError)?'error':'';?>">
                 <select name="pays">

<option value="paris">Paris</option>

<option value="londres">Londres</option>

<option value="amsterdam">Amsterdam</option>

</select>
                     <?php if (!empty($paysError)): ?>
                                <span class="help-inline"><?php echo $paysError;?></span>
                            <?php endif;?>
</div>
<p>

                

<br />
<div class="control-group<?php echo !empty($metierError)?'error':'';?>">
                    <label class="checkbox-inline">Metier</label>

<br />
<div class="controls">
                        Dev : <input type="checkbox" name="metier" value="dev" <?php if (isset($metier) && $metier == "dev") echo "checked"; ?>>
                        Integrateur <input type="checkbox" name="metier" value="integrateur" <?php if (isset($metier) && $metier == "integrateur") echo "checked"; ?>>
                        Reseau <input type="checkbox" name="metier" value="reseau" <?php if (isset($metier) && $metier == "reseau") echo "checked"; ?>>
</div>
<p>

                     <?php if (!empty($metierError)): ?>
                                <span class="help-inline"><?php echo $metierError;?></span>
                            <?php endif;?>
</div>
<p>

                 

<br />
<div class="control-group  <?php echo !empty($urlError)?'error':'';?>">
                    <label class="control-label">Siteweb</label>

<br />
<div class="controls">
                       <input type="text" name="url" value="<?php echo !empty($url)? $url:'' ; ?>">
                        <?php if(!empty($urlError)):?>
                       <span class="help-inline"><?php echo $urlError ;?></span>
                       <?php endif;?>
</div>
<p>

</div>
<p>

                

<br />
<div class="control-group <?php echo !empty($commentError)?'error':'';?>">
                    <label class="control-label">Commentaire </label>

<br />
<div class="controls">
                           <textarea rows="4" cols="30" name="comment" ><?php if(isset($comment)) echo $comment;?></textarea>    
                            <?php if(!empty($commentError)):?>
                               <span class="help-inline"><?php echo $commentError ;?></span>
                            <?php endif;?>
</div>
<p>

</div>
<p>

<br />
<div class="form-actions">
                 <input type="submit" class="btn btn-success" name="submit" value="submit">
                 <a class="btn" href="index.php">Retour</a>
</div>
<p>

            </form>
<p>
            
            
            
</div>
<p>

        
    </body>
</html>

Editer

La page edit.php est sans doute la plus simple, ici pas d’opération complexe, mais juste la lecture d’un élément du tableau.

    On inclut notre fichier de connexion.
    On initialise une variable $id,
    si on a bien un id envoyé dans l’url ($_GET), on le récupère.( le lien crée en index.php « href=« delete.php?id=‘ . $row[‘id’] . ‘  » attend cet id en paramètre)
    s’il n’y pas d’id, on redirige vers l’index.
    Autrement,  on se connecte à la base et avec une requête Select toute simple sur l’id,  on affiche simplement chaque élément retourné.

<?php require('database.php'); //on appelle notre fichier de config $id = null; if (!empty($_GET['id'])) { $id = $_REQUEST['id']; } if (null == $id) { header("location:index.php"); } else { //on lance la connection et la requete $pdo = Database ::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
    $sql = "SELECT * FROM user where id =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
    </head>

    <body>

<br />
<div class="container">


<br />
<div class="span10 offset1">

<br />
<div class="row">

<br />
<h3>Edition</h3>
<p>

</div>
<p>



<br />
<div class="form-horizontal" >

<br />
<div class="control-group">
                        <label class="control-label">Name</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Firstname</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['firstname']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Email Address</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Phone</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tel']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Pays</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['pays']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Metier</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['metier']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Url</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['url']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Comment</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['comment']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form-actions">
                        <a class="btn" href="index.php">Back</a>
</div>
<p>



</div>
<p>

</div>
<p>


</div>
<p>
<!-- /container -->
    </body>
</html>

Mettre à jour

Pour ce fichier et sa partie html, on peut reprendre le fichier add et faire un copier coller du tableau.C’est la requête qui change ici:

  <?php require 'database.php'; $id = null; if ( !empty($_GET['id'])) { $id = $_REQUEST['id']; } if ( null==$id ) { header("Location: index.php"); } if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { // on initialise nos erreurs $nameError = null; $firstnameError = null; $ageError = null; $telError = null; $emailError = null; $paysError = null; $commentError = null; $metierError = null; $urlError = null; // On assigne nos valeurs $name = $_POST['name']; $firstname = $_POST['firstname']; $age = $_POST['age']; $tel = $_POST['tel']; $email = $_POST['email']; $pays = $_POST['pays']; $comment = $_POST['comment']; $metier = $_POST['metier']; $url = $_POST['url']; // On verifie que les champs sont remplis $valid = true; if (empty($name)) { $nameError = 'Please enter Name'; $valid = false; } if (empty($firstname)) { $firstnameError = 'Please enter firstname'; $valid = false; } if (empty($email)) { $emailError = 'Please enter Email Address'; $valid = false; } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $emailError = 'Please enter a valid Email Address'; $valid = false; } if (empty($age)) { $ageError = 'Please enter your age'; $valid = false; } if (empty($tel)) { $telError = 'Please enter phone'; $valid = false; } if (!isset($pays)) { $paysError = 'Please select a country'; $valid = false; } if (empty($comment)) { $commentError = 'Please enter a description'; $valid = false; } if (!isset($metier)) { $metierError = 'Please select a job'; $valid = false; } if (empty($url)) { $urlError = 'Please enter website url'; $valid = false; } // mise à jour des donnés if ($valid) { $pdo = Database::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             
                $sql = "UPDATE user SET name = ?,firstname = ?,age = ?,tel = ?, email = ?, pays = ?, comment = ?, metier = ?, url = ? WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($name,$firstname, $age, $tel, $email,$pays,$comment, $metier, $url,$id));
                Database::disconnect();
                header("Location: index.php");
            } 
           }else {

                 $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM user where id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $name = $data['name'];
                $firstname = $data['firstname'];
                $age = $data['age'];
                $tel = $data['tel'];
                $email = $data['email'];
                $pays = $data['pays'];
                $comment = $data['comment'];
                $metier = $data['metier'];
                $url = $data['url'];
                Database::disconnect();
            }
        
        ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud-Update</title>
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />

    </head>
    <body>
     

<br />
<div class="container">

<br />
<div class="row">

<br />
<h3>Modifier un contact</h3>
<p>

</div>
<p>

<br />
<form method="post" action="update.php?id=<?php echo $id ;?>">

<br />
<div class="control-group <?php echo!empty($nameError) ? 'error' : ''; ?>">
                    <label class="control-label">Name</label>

<br />
<div class="controls">
                        <input name="name" type="text"  placeholder="Name" value="<?php echo!empty($name) ? $name : ''; ?>">
                        <?php if (!empty($nameError)): ?>
                            <span class="help-inline"><?php echo $nameError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group<?php echo!empty($firstnameError) ? 'error' : ''; ?>">
                    <label class="control-label">firstname</label>

<br />
<div class="controls">
                        <input type="text" name="firstname" value="<?php echo!empty($firstname) ? $firstname : ''; ?>">
                        <?php if (!empty($firstnameError)): ?>
                            <span class="help-inline"><?php echo $firstnameError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>


<br />
<div class="control-group<?php echo!empty($ageError) ? 'error' : ''; ?>">
                    <label class="control-label">age</label>

<br />
<div class="controls">
                        <input type="number" name="age" value="<?php echo!empty($age) ? $age : ''; ?>">
                        <?php if (!empty($ageError)): ?>
                            <span class="help-inline"><?php echo $ageError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group <?php echo!empty($emailError) ? 'error' : ''; ?>">
                    <label class="control-label">Email Address</label>

<br />
<div class="controls">
                        <input name="email" type="text" placeholder="Email Address" value="<?php echo!empty($email) ? $email : ''; ?>">
                        <?php if (!empty($emailError)): ?>
                            <span class="help-inline"><?php echo $emailError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group <?php echo!empty($telError) ? 'error' : ''; ?>">
                    <label class="control-label">Telephone</label>

<br />
<div class="controls">
                        <input name="tel" type="text" placeholder="Telephone" value="<?php echo!empty($tel) ? $tel : ''; ?>">
                        <?php if (!empty($telError)): ?>
                            <span class="help-inline"><?php echo $telError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group<?php echo!empty($paysError) ? 'error' : ''; ?>">
                    <select name="pays">

<option value="paris">Paris</option>

<option value="londres">Londres</option>

<option value="amsterdam">Amsterdam</option>

</select>
                    <?php if (!empty($paysError)): ?>
                        <span class="help-inline"><?php echo $paysError; ?></span>
                    <?php endif; ?>
</div>
<p>



<br />
<div class="control-group<?php echo!empty($metierError) ? 'error' : ''; ?>">
                    <label class="checkbox-inline">Metier</label>

<br />
<div class="controls">
                        Dev : <input type="checkbox" name="metier" value="dev" <?php if (isset($metier) && $metier == "dev") echo "checked"; ?>>
                        Integrateur <input type="checkbox" name="metier" value="integrateur" <?php if (isset($metier) && $metier == "integrateur") echo "checked"; ?>>
                        Reseau <input type="checkbox" name="metier" value="reseau" <?php if (isset($metier) && $metier == "reseau") echo "checked"; ?>>
</div>
<p>

                    <?php if (!empty($metierError)): ?>
                        <span class="help-inline"><?php echo $metierError; ?></span>
                    <?php endif; ?>
</div>
<p>



<br />
<div class="control-group  <?php echo!empty($urlError) ? 'error' : ''; ?>">
                    <label class="control-label">Siteweb</label>

<br />
<div class="controls">
                        <input type="text" name="url" value="<?php echo!empty($url) ? $url : ''; ?>">
                        <?php if (!empty($urlError)): ?>
                            <span class="help-inline"><?php echo $urlError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group <?php echo!empty($commentError) ? 'error' : ''; ?>">
                    <label class="control-label">Commentaire </label>

<br />
<div class="controls">
                        <textarea rows="4" cols="30" name="comment" ><?php if (isset($comment)) echo $comment; ?></textarea>    
                        <?php if (!empty($commentError)): ?>
                            <span class="help-inline"><?php echo $commentError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>


<br />
<div class="form-actions">
                    <input type="submit" class="btn btn-success" name="submit" value="submit">
                    <a class="btn" href="index.php">Retour</a>
</div>
<p>

            </form>
<p>



</div>
<p>


    </body>
</html>

Quand on est sur une ligne du tableau et qu’on veut supprimer ou mettre à jour, on renvoie vers un lien contenant l’id de la ligne à supprimer. Ce sont nos liens dans la page index.php

href="delete.php?id=' . $row['id'] . ' "

href="update.php?id=' . $row['id'] . ' "

Ces quelque lignes en début de fichier sont donc la pour tester qu’on a bien un Id passé en paramètre dans notre url, via notre lien:

  $id = null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: index.php");
}

dans ce fichier on va modifier et insérer des données dans la base, on enchaîne donc avec toutes les vérif nécessaires.

Puis on se connecte à la base. On a ici deux requêtes, une pour l’affichage des données, puis une pour l’UPDATE des données. Sans la première on se retrouverait avec un tableau vide. Les deux requêtes sont donc nécessaires.
Supprimer

Dans notre tableau d’index, on a enfin un dernier bouton, « delete ». Ce lien renvoie vers notre fichier delete.php qui est beaucoup plus simple. C’est juste une petite interface qui demande à l’utilisateur la confirmation de suppression. A l’intérieur de ce fichier, une requête de suppression et le petit formulaire de confirmation

<?php require 'database.php'; $id=0; if(!empty($_GET['id'])){ $id=$_REQUEST['id']; } if(!empty($_POST)){ $id= $_POST['id']; $pdo=Database::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "DELETE FROM user  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
 
<body>

<br />
<div class="container">
     

<br />
<div class="span10 offset1">

<br />
<div class="row">

<br />
<h3>Delete a user</h3>
<p>

</div>
<p>

                     
<br />
<form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      
Are you sure to delete ?

<br />
<div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="index.php">No</a>
</div>
<p>

                    </form>
<p>
</div>
<p>

                 
</div>
<p>
<!-- /container -->
  </body>
</html>

Et voila, on a ici notre petite appli qui fonctionne, on peut rajouter des users dans la base via notre fichier add.php, et ensuite les mettre à jour les supprimer ou les lire tout simplement.
