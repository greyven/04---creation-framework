<?php

require_once('Framework/Session.php');

class Request
{
	// parametres de la requete
	private $parameters;
	private $session;

	public function __construct($parameters)
	{
		$this->parameters = $parameters;
		$this->session = new Session();
	}

	// Renvoie l'objet session associé à la requete
	public function getSession()
	{ return $this->session; }

	// Renvoie vrai si le parametre existe dans la requete
	public function existParameter($key)
	{ return (isset($this->parameters[$key]) && $this->parameters[$key] != ""); }

	// Renvoie la valeur du parametre demandé sinon exception
	public function getParameter($key)
	{
		if($this->existParameter($key)) return $this->parameters[$key];
		else throw new Exception("Parametre '$key' absent de la requete.");
	}

	/* public function addParameter($param)
	{ $this->parameters = array_merge($this->parameters, $param); } */
}