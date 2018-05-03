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
					if(isset($_GET['id']))
					{
						$postId = intval($_GET['id']);
						if($postId != 0)
						{ $this->ctrlPost->post($postId); }
						else throw new Exception("Identifiant de post non valide.");
					}
					else throw new Exception("Identifiant de post non défini.");
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

	private function error($errorMsg)
	{
		$view = new View("Error");
		$view->generate(array('errorMsg' => $errorMsg));
	}
}