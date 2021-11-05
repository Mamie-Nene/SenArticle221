<?
require_once("./connection.db.php");

class Article{
    private $bdd;
    public function __construct(){
			$this->bdd = (new ConnexionManager)->getInstance();
		}
    public function get_all_articles (){
        $data = $this->bdd->query('SELECT * FROM Article');
		return $data->fetchAll(PDO::FETCH_CLASS, 'Article');
    }
    public function get_article_by_id($id){
			$data = $this->bdd->query('SELECT * FROM Article WHERE id = '.$id);
			return $data->fetch(PDO::FETCH_OBJ);
		}

		public function bet_article_by_category($id){
			$data = $this->bdd->query('SELECT * FROM Article WHERE categorie = '.$id);
			return $data->fetchAll(PDO::FETCH_CLASS, 'Article');
		}
}
?>