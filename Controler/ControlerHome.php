<?php

require_once('Framework/Controler.php');
require_once('Model/Post.php');

class ControlerHome extends Controler
{
	private $post;

	public function __construct()
	{ $this->post = new Post(); }

	// Affiche la liste de tous les posts du blog
	public function index()
	{
		$posts = $this->post->getPosts();
		$this->generateView(array('posts' => $posts));
	}
}