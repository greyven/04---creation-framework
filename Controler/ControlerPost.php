<?php
namespace App\Controler;

use App\Framework\Controler;
use App\Model\User;
use App\Model\Post;
use App\Model\Comment;

class ControlerPost extends Controler
{
	private $post;
	private $comment;
	private $user;

	public function __construct()
	{
		$this->post = new Post();
		$this->comment = new Comment();
		$this->user = new User();
	}

	// Affiche les détails sur un post
	public function index()
	{
		$postId = $this->request->getParameter("id");

		$post = $this->post->getPost($postId);
		$comments = $this->comment->getComments($postId);
		
		$this->generateView(array('post' => $post, 'comments' => $comments));
	}

	// Ajout un commentaire à un post
	public function toComment()
	{
		$postId = $this->request->getParameter("id");
		$content = $this->request->getParameter("comm_content");

		if(!$this->request->getSession()->existAttribute('user_login')) // Si c'est un visiteur,
		{
			$author = $this->request->getParameter("comm_author")." [visiteur]";

			// Sauvegarde du commentaire dans la bdd
			$this->comment->addComment($author, $content, $postId);
			
			// Execution de l'action par defaut pour actualiser l'affichage du post
			$this->redirect("post","index",$postId);
		}
		else // sinon c'est un utilisateur authentifié
		{
			$author = $this->request->getParameter("comm_author");

			// Sauvegarde du commentaire dans la bdd
			$this->comment->addComment($author, $content, $postId);
			
			// Execution de l'action par defaut pour actualiser l'affichage du post
			$this->redirect("post","index",$postId);
		}
	}

	// Signaler un commentaire déplacé
	public function report()
	{
		$commId = $this->request->getParameter("id");
		$comment = $this->comment->getComment($commId);

		// Mise à jour du commentaire $commId
		$this->comment->reportComment($commId);

		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("post","index",$comment['post_id']);
	}

	// Supprimer un commentaire depuis un post
	public function deleteComment()
	{
		$commId = $this->request->getParameter("id");
		$comment = $this->comment->getComment($commId);

		// Suppression du commentaire $commId
		$this->comment->deleteComment($commId);

		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("post","index",$comment['post_id']);
	}

	// Supprimer un commentaire depuis l'administration
	public function deleteCommentFromAdmin()
	{
		$commId = $this->request->getParameter("id");

		// Suppression du commentaire $commId
		$this->comment->deleteComment($commId);

		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("managecomments","index");
	}
}