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
 * fonction home qui affiche tous les billets sur la page d'accueil
 */
	public function home() 
	{
		$posts = $this->post->getPosts();
		$view = new View("_home");
		$view ->setTitle('Accueil - Jean Forteroche');
		$view ->generate(array('posts' => $posts));
		
	}
}