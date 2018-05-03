<?php

class Request
{
	// parametres de la requete
	private $parameters;

	public function __construct($parameters)
	{ $this->parameters = $parameters }

	// Renvoie vrai si le parametre existe dans la requete
	public function existParameter($key)
	{ return (isset($this->parameters[$key]) && $this->parameters[$key] != ""); }

	// Renvoie la valeur du parametre demandé sinon exception
	public function getParameter($key)
	{
		if($this->existParameter($key)) return $this->parameters[$key];
		else throw new Exception("Parametre '$key' absent de la requete.");
	}
}