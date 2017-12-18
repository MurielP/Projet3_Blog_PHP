<?php
require_once 'model/post.php';
require_once 'model/comment.php';
require_once 'view/view.php';

/**
 * 
 */

class Post_control 
{
	private $post;
	private $comment;

	public function __construct() 
	{
		$this->post = new Post();
		$this->comment = new Comment();
	}
	
/** 
* post récupère le billet en fonction de son Id et affiche la vue demandée
*/
	public function post($postId) 
	{
		$post = $this->post->getPost($postId);
		$comments = $this->comment->getComments($postId);
		$view = new View("_post");
		$view ->setTitle('Billet simple pour l\'Alaska');
		$view->generate(array(
			'post' => $post,
			'comments' => $comments));
	}

/** 
* toComment sauvegarde le commentaire en allant chercher la méthode addComment 
* et actualise le commentaire 
*/
	public function toComment($author, $comment, $post_id) 
	{
		$this->comment->addComment($author, $comment, $post_id); 
		$this->post($post_id); 
	}

}