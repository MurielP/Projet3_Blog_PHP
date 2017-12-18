<?php

require_once 'connection.php';

class User extends Database 
{
/** 
* addMember ajout d'un membre 
* @param  [string] $username est le pseudonyme saisi
* @param  [mail] $mail est le mail saisi
* @param  [string] $pass est le mot de passe saisi
*/
	public function addUser($username, $mail, $pass) 
	{
		$sql = ('INSERT INTO members  (username, mail, pass, inscription_date) VALUES (?,?,?,NOW())');
		$this->executeQuery($sql, array($username, $pass, $mail));
	}


}

