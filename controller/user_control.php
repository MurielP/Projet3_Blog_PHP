<?php
 require_once 'model/user.php';
 require_once 'view/view.php';

class User_control
{
	private $id;
	private $username;
	private $pass;
	private $mail;
	private $inscription_date;


/**
 * liste les getters 
 */
	public function id() { return $this->id = $id; }
	public function username() { return $this->username = $username; }
	public function pass() { return $this->pass = $pass; }
	public function mail() { return $this->mail = $mail; }
	public function inscription_date() { return $this->inscription_date = $inscription_date; }


/** [setId Id du user] */
	public function setId($id)
	{
		$id = (int)$id;
		if ($id > 0) {
			$this->id = $id;
		}
	}
/** [setUsername pseudonyme] */
	public function setUsername($username) 
	{
		if (is_string($username) AND strlen($username) <= 50) {
			$this->username = $username;
		}
	}
/**
 * [setPass mot de passe]
 * @param [string] $pass [mot de passe haché]
 */
	public function setPass($pass) 
	{	
		$pass = $_POST['pass'];

		if (!empty ($_POST['pass'])){
			$pass = password_hash($pass, PASSWORD_BCRYPT);
			$this->pass = $pass;
		} else {
			echo 'Le mot de passe saisi n\'est pas valide.';
		}
	}
/** [setMail mail]
* @param [string] $mail selon regex
**/
	public function setMail($mail) 
	{
		$mail = $_POST['mail'];

		if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $mail)) {
			echo 'Mot de passe valide';
			$this->mail = $mail;
		} else {
			echo 'L\'email saisi n\'est pas valide';
		}
	}

/** [register enregistre nouveau user ] */
	public function registerUser($username, $pass, $mail)
	{
		$this->user = new User();
		$this->registerUser->addUser($username, $pass, $mail);
	}

}


