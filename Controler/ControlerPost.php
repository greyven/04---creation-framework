<?php
require_once('Model/Post.php');
require_once('Model/Comment.php');
require_once('View/View.php');

class ControlerPost
{
	private $post;
	private $comment;

	public function __construct()
	{
		$this->post = new Post();
		$this->comment = new Comment();
	}

	// Affiche les détails sur un post
	public function post($postId)
	{
		$post = $this->post->getPost($postId);
		$comments = $this->comment->getComments($postId);
		$view = new View('Post');
		$view->generate(array('post' => $post, 'comments' => $comments));
	}

	// Ajout un commentaire à un post
	public function toComment($author, $content, $postId)
	{
		// Sauvegarde du commentaire dans la bdd
		$this->comment->addComment($author, $content, $postId);
		// Actualisation de l'affichage du post
		$this->post($postId);
	}
}