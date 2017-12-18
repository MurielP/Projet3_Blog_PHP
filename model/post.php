<?php 
require_once 'connection.php';

/** 
 * class Post qui gère les requêtes des billets 
 */
class Post extends Database 
{

/**
 * getPosts retourne toute la liste des billets
 * @return l'intégralité des billets
 */
	public function getPosts() 
	{
		$sql = ('SELECT id, author, title, content, date_FORMAT (creation_date, \'%d %m %Y à %Hh%imin%ss\') AS creation_date FROM posts ORDER BY creation_date DESC ');
		$posts = $this->executeQuery($sql);
		
		return $posts;
	}

/**
 * getPost  affiche un billet sélectionné selon son Id
 * @param  [int] $postId est l'Id du billet
 * @return le billet sélectionné en fonction de son Id
 */
	public function getPost($postId) 
	{
		$sql = ('SELECT id, author, title, content, date_FORMAT (creation_date, \'%d %m %Y à %Hh%imin%ss\') AS creation_date FROM posts WHERE id = ?');
		$post = $this->executeQuery($sql, array($postId));
		if ($post->rowCount() == 1)
			return $post->fetch();
		else 
			throw new Exception('Aucun billet ne correspond au numéro ' .$postId. '.');
	}
}