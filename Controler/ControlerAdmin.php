<?php
namespace App\Controler;

use App\Framework\Controler;
use App\Model\Post;
use App\Model\Comment;

// Controleur des actions d'administration
class ControlerAdmin extends ControlerSecured
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
		$this->generateView(array('postsNb' => $postsNb, 'commentsNb' => $commentsNb, 'allPosts' => $allPosts));
	}

	// Supprimer un post
	public function deletePost()
	{
		$postId = $this->request->getParameter("id");

		// Suppression du post
		$this->post->destroyPost($postId);

		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("admin","index");
	}
}