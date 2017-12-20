<?php
/**
 * création de la classe Router 
 * dont la méthode principale analyse la requête entrante pour déterminer l'action à entreprendre 
 */
require_once 'home_control.php';
require_once 'post_control.php';
require_once 'user_control.php';
require_once 'view/view.php';


class Router {
	private $homeControl;
	private $postControl;
	private $userControl;

	public function __construct() {
		$this->homeControl = new Home_control();
		$this->postControl = new Post_control();
		$this->userControl = new User_control();		
	}


/**
 * routeQuery méthode qui permet d'appeler la page nécessaire pour exécuter l'action passée en paramètre
 * @return affiche la page demandée
 */
	public function routeQuery() {
		try {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'post') {

					$postId = intval($this->getParam($_GET, 'id'));
					if ($postId != 0) {
						$this->postControl->post($postId);
					} else 
						throw new Exception ('Le numéro du billet est incorrect.');
				} 
				elseif ($_GET['action'] == 'toComment') {

					$author = $this->getParam($_POST, 'author');
					$comment = $this->getParam($_POST, 'comment');
					$post_id = $this->getParam($_POST, 'id');

					$this->postControl->toComment($author, $comment, $post_id);
				} 
				///	
				elseif ($_GET['action'] == 'registerUser'){
// pourquoi je dois faire une vérification alors que le getParam le vérifie déjà ????
// manque l'action pour diriger vers le formulaire ?
					if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) and !empty($_POST['mail'])) {
					$username = $this->getParam($_POST, 'username');
					$pass = $this->getParam($_POST, 'pass');
					$mail = $this->getParam($_POST, 'mail');

					$this->userControl->registerUser($username, $pass, $mail);
					} else 
					throw new Exception ('Vous ne pouvez pas vous enregistrer.');
				////
				}
				else 
				throw New Exception ('Action non valide.');
			}
			else {
				$this->homeControl->home();
			}
			
		} 
		catch (Exception $e) {
			$this->error($e->getMessage());
		}
	}

/**
 * error méthode qui permet de générer la vue pour les messages d'erreur
 * @param  [string] $errorMessage 
 * @return [string]  message d'erreur dans la vue             
 */
	private function error($errorMessage) {
		$view = new View("_error");
		$view->generate(array(
			'errorMessage' => $errorMessage));
	}

/** 
* getParam méthode privée qui recherche un paramètre dans un tableau. Si un paramètre est manquant on affiche un message indiquant le nom du parmètre manquant 
*/
	private function getParam($array, $name) {
		if (isset($array[$name])) {
			return $array[$name];
		} else 
		throw new Exception ('Le paramètre ' . $name . ' est absent.');
	}
}