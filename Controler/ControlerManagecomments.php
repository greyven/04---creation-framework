<?php

require_once('Controler/ControlerSecured.php');
require_once('Model/Post.php');
require_once('Model/Comment.php');

// Controleur des actions d'administration
class ControlerManagecomments extends ControlerSecured
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
		$postsNb = $this->post->countPosts();
		$commentsNb = $this->comment->countComments();
		$postsWithReportedComments = $this->post->getAllWithReportedComments();
		$this->generateView(array('postsNb' => $postsNb, 'commentsNb' => $commentsNb, 'postsWithReportedComments' => $postsWithReportedComments));
	}

	// Désignaler un commentaire jugé déplacé
	public function unreport()
	{
		$commId = $this->request->getParameter("comm_id");

		// Mise à jour du commentaire $commId
		$this->comment->unreportComment($commId);

		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("managecomments","index");
	}
}