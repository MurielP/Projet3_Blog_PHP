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
	public function addUser($username, $pass, $mail) 
	{
		$sql = ('INSERT INTO members (username, mail, pass, inscription_date) VALUES (?,?,?,NOW())');
		$user = $this->executeQuery($sql, array($username, $pass, $mail));

		/*  user->hydrate([
			'id'=> $this->db->lastInserId(),
			'username' => 'toto',
			'mail' => 'toto@mail.com',
			'pass' => 'toto1',
			'inscription_date'=> '00/00/0000',
		]); */
	}

	public function getUserDetails($userId)
	{
		$sql = ('SELECT id, username, mail, date_FORMAT (inscription_date, \'%d %m %Y à %Hh%imin%ss\') AS inscription_date FROM members WHERE id = ?');
		$user = $this->executeQuery($sql, array($userId));
		if ($user->rowCount() == 1)
			return $user->fetch();
		else 
			throw new Exception('Aucun utilisateur ne correspond au numéro ' .$userId. '.');
	}
}

