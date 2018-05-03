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
			throw new Exception("Action 'action' non défini dans la classe $controlerClass");
		}
	}

	// Methode abstraite correspondant à l'action par defaut
	// Oblige les classe filles à implémenter cette action par defaut
	public abstract function index();

	// Génère la vue associée au controler courant
	protected function generateView($viewDatas = array())
	{
		// Determiner le fichier vue à partir du nom du controler actuel
		$controlerClass = get_class($this);
		$controler = str_replace("Controler", "", $controlerClass);
		// Instanciation et génération de la vue
		$view = new View($this->action, $controler);
		$view->generate($viewDatas);
	}
}