<?php
namespace App\Controler;

use App\Framework\Controler;
use App\Model\Post;
use App\Model\Comment;

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
		$commId = $this->request->getParameter("id");

		// Mise à jour du commentaire $commId
		$this->comment->unreportComment($commId);

		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("managecomments","index");
	}
}