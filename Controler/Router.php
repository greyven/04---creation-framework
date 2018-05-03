<?php

require_once('Controler/ControlerHome.php');
require_once('Controler/ControlerPost.php');
require_once('View/View.php');

class Router
{
	private $ctrlHome;
	private $ctrlPost;

	public function __construct()
	{
		$this->ctrlHome = new ControlerHome();
		$this->ctrlPost = new ControlerPost();
	}

	// Traite une action entrante
	public function routeRequest()
	{
		try
		{
			if(isset($_GET['action']))
			{
				if($_GET['action'] == 'post')
				{
					$postId = intval($this->getParameter($_GET, 'id'));
					if($postId != 0)
					{ $this->ctrlPost->post($postId); }
					else throw new Exception("Identifiant de post non valide.");
				}
				elseif($_GET['action'] == 'toComment')
				{
					$author = $this->getParameter($_POST, 'author');
					$content = $this->getParameter($_POST, 'content');
					$postId = $this->getParameter($_POST, 'id');
					$this->ctrlPost->toComment($author, $content, $postId);
				}
				else throw new Exception("Action non valide");
			}
			else $this->ctrlHome->home();
		}
		catch(Exception $e)
		{
			$this->error($e->getMessage());
		}
	}

	// Recherche un paramètre dans un tableau (provenant de $_GET ou $_POST)
	private function getParameter($array, $key)
	{
		if(isset($array[$key])) return $array[$key];
		else throw new Exception("Parametre '$key' absent.");
	}

	private function error($errorMsg)
	{
		$view = new View("Error");
		$view->generate(array('errorMsg' => $errorMsg));
	}
}