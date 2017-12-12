<?php
/**
 * classe Database qui génère la connexion à la base de données avec une instance pdo
 */
abstract class Database 
{ 
	private $db;

/**
* fonction getDb qui renvoie un objet de connexion à la bdd en initialisant la connexion au besoin
* @return $resultat objet de connexion à la bdd
*/
	private function getDb()
	{
		// technique du chargement tardif (« lazy loading ») pour retarder l'instanciation de l'objet $bdd à sa première utilisation.
		if ($this->db == null) {
			$this->db = new PDO('mysql:host=localhost; dbname=OC_Projet3; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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