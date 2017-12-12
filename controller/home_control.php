<?php
 require_once 'model/post.php';
 require_once 'view/view.php';

class Home_control 
{
	private $post;

	public function __construct() 
	{
		$this->post = new Post();

	}

/**
 * fonction home qui affiche tous les billets 
 */
	public function home() 
	{
		$posts = $this->post->getPosts();
		$view = new View("_home");
		$view ->setTitle('Billet simple pour l\'Alaska');
		$view ->generate(array('posts' => $posts));
		
	}
}