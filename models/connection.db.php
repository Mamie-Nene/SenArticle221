<?
class DBConnection{
    private static $bdd;

    public static function getInstance(){
        if (self::$bdd === null){
            try{
                self::$bdd = new PDO('mysql:host=localhost;dbname=mglsi_news;charset=utf8', '221shadow', '772972920lodye');
            }
            catch (Exception $e){
                echo "Erreur de connexion à la base de données : ".$e->getMessage();
                self::$bdd = null;
            }
        }
        
        return self::$bdd;
    }
}
?>