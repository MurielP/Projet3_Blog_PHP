<?php
require_once 'model/post.php';
require_once 'model/comment.php';
require_once 'view/view.php';

class Post_control 
{
	private $post;
	private $comment;

	public function __construct() 
	{
		$this->post = new Post();
		$this->comment = new Comment();
	}
	
	public function post($postId) 
	{
		$post = $this->post->getPost($postId);
		$comments = $this->comment->getComments($postId);
		$view = new View("_post");
		$view->generate(array(
			'post' => $post,
			'comments' => $comments));
	}

	public function toComment ($author, $comment, $post_id) 
	{
		$this->comment->addComment($author, $comment, $post_id); // sauvegarde du commentaire
		$this->post($post_id); // actualisation du commentaire
	}

}