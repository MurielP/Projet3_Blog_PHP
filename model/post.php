<?php 
require_once 'connection.php';

class Post extends Database 
{

/**
 * @return liste des billets
 */
	public function getPosts() 
	{
		$sql = ('SELECT id, author, title, content, date_FORMAT (creation_date, \'%d %m %Y à %Hh%imin%ss\') AS creation_date FROM posts ORDER BY creation_date DESC ');
		$posts = $this->executeQuery($sql);
		
		return $posts;
	}

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