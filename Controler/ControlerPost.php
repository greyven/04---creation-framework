<?php

require_once('Framework/Controler.php');
require_once('Model/Post.php');
require_once('Model/Comment.php');

class ControlerPost extends Controler
{
	private $post;
	private $comment;

	public function __construct()
	{
		$this->post = new Post();
		$this->comment = new Comment();
	}

	// Affiche les détails sur un post
	public function index()
	{
		$postId = $this->request->getParameter("post_id");

		$post = $this->post->getPost($postId);
		$comments = $this->comment->getComments($postId);
		
		$this->generateView(array('post' => $post, 'comments' => $comments));
	}

	// Ajout un commentaire à un post
	public function toComment()
	{
		$postId = $this->request->getParameter("post_id");
		$author = $this->request->getParameter("comm_author");
		$content = $this->request->getParameter("comm_content");

		// Sauvegarde du commentaire dans la bdd
		$this->comment->addComment($author, $content, $postId);
		
		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("post","index",$postId);
	}

	// Signaler un commentaire déplacé
	public function report()
	{
		$postId = $this->request->getParameter("post_id");
		$commId = $this->request->getParameter("comm_id");

		// Mise à jour du commentaire $commId
		$this->comment->reportComment($commId);

		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("post","index",$postId);
	}
}