<?php


/**
 * classe Database qui génère la connexion à la base de données avec une instance pdo
 */
abstract class Database 
{ 
	private $db_host;
	private $db_name;
	private $db_user;
	private $db_password;
	private $db;

/**
 * constructeur de la base de données __construct 
 * @param [string] $db_host     
 * @param [string] $db_name
 * @param [string] $db_user
 * @param [string] $db_password 
 */
	public function __construct($db_host, $db_name, $db_user, $db_password)
	{
		$this->db_host = $db_host;
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
	}
/**
* fonction getDb qui renvoie un objet de connexion à la bdd en initialisant la connexion au besoin
* @return $resultat objet de connexion à la bdd
*/
	private function getDb()
	{
		// technique du chargement tardif (« lazy loading ») pour retarder l'instanciation de l'objet $bdd à sa première utilisation.
		if ($this->db == null) {
			$this->db = new PDO('mysql:host=localhost; dbname=OC_Projet3; charset=utf8', 'root', 'root');
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return $this->db;
	}

/**
 * fonction executeQuery qui exécute une requête SQL éventuellement paramétrée
 * @param  $sql   la requête sql 
 * @param  $params les paramètres 
 * @return $result le résultat de la requête
 */
	protected function executeQuery($sql, $params = null)
	{
		if ($params === null) {
			$result = $this->getDb()->query($sql);
		} else {
			$result = $this->getDb()->prepare($sql); // $sth = $dbh->prepare('req')
			$result->execute($params); 
		}
		return $result;
	}
}