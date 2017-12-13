<?php
/**
 * création de la classe Router 
 * dont la méthode principale analyse la requête entrante pour déterminer l'action à entreprendre 
 */
require_once 'home_control.php';
require_once 'post_control.php';
require_once 'view/view.php';

/////
require_once 'user_control.php';

class Router {
	private $homeControl;
	private $postControl;

	///
	private $userControl;

	public function __construct() {
		$this->homeControl = new Home_control();
		$this->postControl = new Post_control();

		////
		$this->userControl = new User_control();
		
	}

	public function routeQuery() {
		try {
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'post') {
					$postId = intval($this->getParam($_GET, 'id'));
					if ($postId != 0) {
						$this->postControl->post($postId);
					} else 
						throw new Exception ('Le numéro du billet est incorrect.');
				} elseif ($_GET['action'] == "toComment") {
					$author = $this->getParam($_POST, 'author');
					$comment = $this->getParam($_POST, 'comment');
					$post_id = $this->getParam($_POST, 'id');

					$this->postControl->toComment($author, $comment, $post_id);					
				}

				/// 
				elseif ($_GET['action'] == 'register') {
					$id = $this->getParam($_GET, 'id');
					$username = $this->getParam($_POST, 'username');
					$pass = $this->getParam($_POST, 'pass');
					$mail = $this->getParam($_POST, 'mail');

					$this->userControl->register($id, $username, $pass, $mail);
				}
				///
			
				else 
				throw New Exception ('Action non valide');
			}
			else {
				$this->homeControl->home();
			}
			
		} 
		catch (Exception $e) {
			$this->error($e->getMessage());
		}
	}

	private function error($errorMessage) {
		$view = new View("_error");
		$view->generate(array(
			'errorMessage' => $errorMessage));
	}

	private function getParam($array, $name) {
		if (isset($array[$name])) {
			return $array[$name];
		} else 
		throw new Exception ('Le paramètre ' . $name . ' est absent.');
	}
}