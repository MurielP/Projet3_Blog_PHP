<?php
 require_once 'model/user.php';
 require_once 'view/view.php';

class User_control
{
	private $user;

	public function __construct()
	{
		$this->user = new User();
		
	}
	public function register($id, $username, $pass, $mail)
	{
		$sql = $this->register('INSERT INTO members SET id = ?, username = ?, mail = ?, pass = ?');
		$user = $this->executeQuery($sql, array($id, $username, $pass, $mail));
	}
}


