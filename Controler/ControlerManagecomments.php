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
		$allPosts = $this->post->getAllPosts();
		$reportedComments = $this->comment->getReportedComments();
		$allComments = $this->comment->getAllComments();
		$this->generateView(array('postsNb' => $postsNb, 'commentsNb' => $commentsNb, 'allPosts' => $allPosts, 'reportedComments' => $reportedComments, 'allComments' => $allComments));
	}
}