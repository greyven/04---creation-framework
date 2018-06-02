<?php
namespace App\Controler;

use App\Framework\Controler;
use App\Model\Post;
use App\Model\Comment;
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
		$postId = $this->request->getParameter("id");
		$post = $this->post->getPost($postId);

		$this->generateView(array('post' => $post));
	}

	// Modifie un post
	public function updatePost()
	{
		$postId = $this->request->getParameter("id");
		$title = $this->request->getParameter("modifyPostTitle");
		$content = $this->request->getParameter("modifyPostContent");

		// Création du post dans la bdd
		$this->post->updatePost($postId, $title, $content);
		// Execution de l'action par defaut pour actualiser l'affichage du post
		$this->redirect("admin","index");
	}
}