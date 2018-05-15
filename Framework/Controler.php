<?php

require_once('Framework/Request.php');
require_once('Framework/View.php');

abstract class Controler
{
	// Action à réaliser
	private $action;

	// requete entrante
	protected $request;

	// hydrate $request avec la requete entrante
	public function setRequest(Request $request)
	{ $this->request = $request; }

	// Execute l'action à réaliser
	public function executeAction($action)
	{
		if(method_exists($this, $action))
		{
			$this->action = $action;
			$this->{$this->action}();
		}
		else
		{
			$controlerClass = get_class($this);
			throw new Exception("Action ".$this->action." non défini dans la classe $controlerClass");
		}
	}

	// Methode abstraite correspondant à l'action par defaut
	// Oblige les classe filles à implémenter cette action par defaut
	public abstract function index();

	// Génère la vue associée au controler courant
	protected function generateView($viewDatas = array(), $view = null)
	{
		// Determiner le fichier vue à partir du nom du controler actuel
		$controlerClass = get_class($this);
		$controler = str_replace("Controler", "", $controlerClass);
		
		
		$action = (is_null($view)) ? $this->action : $view;

		// Instanciation et génération de la vue
		$view = new View($action, $controler);
		$view->generate($viewDatas);
	}

	// Effectue une redirection vers un controler et une action specifiques
	protected function redirect($controler, $action = null, $id = null)
	{
		$webRoot = Configuration::get("webRoot", "/");
		// redirection vers l'url web_root/controler/action
		$url = $webRoot.$controler.'/'.$action;
		if(isset($id)){
			$url .= '/'.$id;
		}
		header("Location:".$url);
	}
}