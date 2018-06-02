<?php

namespace App\Framework;
class Session
{
	// Démarre ou restaure la session
	public function __construct()
	{ session_start(); }

	// Détruit la session actuelle
	public function destroy()
	{ session_destroy(); }

	// Ajoute un attribut à la session
	public function setAttribute($key, $value)
	{ $_SESSION[$key] = $value; }

	// Test si un attribut existe et renvoie vrai ou faux
	public function existAttribute($key)
	{ return (isset($_SESSION[$key]) && $_SESSION[$key] != ""); }

	// Renvoie la valeur de l'attribut demandé
	public function getAttribute($key)
	{
		if($this->existAttribute($key)) return $_SESSION[$key];
		else throw new \Exception("Attribut '$key' introuvable.");
	}
}