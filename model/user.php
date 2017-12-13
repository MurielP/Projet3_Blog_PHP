<?php

require_once 'connection.php';

class User extends Database 
{
	private $id;
	private $username;
	private $pass;
	private $mail;
	// private $inscription_date;

	public function __construct(array $data)
	{
		$this->hydrate($data); 
	}

	// getters
	public function id() { return $this->id = $id; }
	public function username() { return $this->username = $username; }
	public function pass() { return $this->pass = $pass; }
	public function mail() { return $this->mail = $mail; }
	// public function inscription_date() { return $this->inscription_date = $inscription_date; }

	//setters
	public function setId($id)
	{
		$id = (int)$id;
		if ($id > 0) {
			$this->id = $id;
		}
	}

	public function setUsername($username) 
	{
		if (is_string($username)) {
			$this->username = $username;
		}
	}

	public function setPass($pass) 
	{	
		$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$this->passwword = $password;

	}

	public function setMail($mail) 
	{
		if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['mail']));
			$this->mail = $mail;
	}

}