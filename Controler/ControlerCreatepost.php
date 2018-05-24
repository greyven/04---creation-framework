<?php

require_once('Controler/ControlerSecured.php');
require_once('Model/Post.php');
require_once('Model/Comment.php');

// Controleur des actions d'administration
class ControlerCreatepost extends ControlerSecured
{
	private $post;

	// Constructeur
	public function __construct()
	{
		$this->post = new Post();
	}

	public function index()
	{ $this->generateView(); }

	public function addPost()
	{
		$title = $this->request->getParameter("createPostTitle");
		$content = $this->request->getParameter("createPostContent");

		// Création du post dans la bdd
		$this->post->createPost($title, $content);
		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("createpost","index");
	}
}