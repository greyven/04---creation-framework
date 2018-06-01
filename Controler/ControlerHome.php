<?php
namespace App\Controler;

use App\Framework\Controler;
use App\Model\Post;

class ControlerHome extends Controler
{
	private $post;

	public function __construct()
	{ $this->post = new Post(); }

	// Affiche la liste de tous les posts du blog
	public function index()
	{
		$nbPostsPerPage = 5;

		$nbPosts = $this->post->countPosts(); //les 4 lignes suivantes servent à déterminer le nb de pages de commentaires
        $nbPages = ceil($nbPosts / $nbPostsPerPage); //ceil renvoi l'entier superieur en cas de division avec reste.

		if($this->request->existParameter('page') && $this->request->getParameter('page') > 1)
			$noPage = $this->request->getParameter('page');
		else $noPage = 1;

		$firstPostToShow = ($noPage - 1) * $nbPostsPerPage;

		$posts = $this->post->getPosts($firstPostToShow, $nbPostsPerPage);
		$this->generateView(array('posts' => $posts, 'nbPages' => $nbPages));
	}
}