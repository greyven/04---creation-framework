<?php

require_once('Controler/ControlerSecured.php');
require_once('Model/Post.php');
require_once('Model/Comment.php');

// Controleur des actions d'administration
class ControlerModifypost extends ControlerSecured
{
	private $post;
	private $comment;

	// Constructeur
	public function __construct()
	{
		$this->post = new Post();
		$this->comment = new Comment();
	}

	public function index()
	{
		$postId = $this->request->getParameter("post_id");
		$post = $this->post->getPost($postId);

		$this->generateView(array('post' => $post));
	}

	// Modifie un post
	public function updatePost()
	{
		$postId = $this->request->getParameter("post_id");
		$title = $this->request->getParameter("modifyPostTitle");
		$content = $this->request->getParameter("modifyPostContent");

		// Création du post dans la bdd
		$this->post->updatePost($postId, $title, $content);
		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("admin","index");
	}
}