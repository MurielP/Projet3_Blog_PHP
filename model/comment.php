<?php
require_once 'connection.php';

class Comment extends Database 
{

/**
 * getComments renvoie la liste des commentaires associés à 1 billet
 * @param  $postId soit l'Id du billet sélectionné
 * @return tous les commentaires liés à l'id du billet choisi     
 */
	public function getComments($postId) 
	{
		$sql = ('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date,\'%d %m %Y à %Hh%imin%ss\')  AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date');
		$comments = $this->executequery($sql, array($postId));
		return $comments;
	}

/**
 * addComment traiter et insérer les données du formulaire dans la bdd
 * @param [string] $author  [auteur du commentaire]
 * @param [string] $comment [commentaire]
 * @param [int] $post_id [id du billet choisi]
 */
	public function addComment($author, $comment, $post_id) 
	{
		$sql = ('INSERT INTO comments (author, comment, post_id, comment_date) VALUES (?,?,?,NOW())');
		$this->executeQuery($sql, array($author, $comment, $post_id));
	}
}