<?php

require_once('Model/Post.php');
require_once('View/View.php');

class ControlerHome
{
	private $post;

	public function __construct()
	{ $this->post = new Post(); }

	// Affiche la liste de tous les posts du blog
	public function home()
	{
		$posts = $this->post->getPosts();
		$view = new View("Home");
		$view->generate(array('posts' => $posts));
	}
}