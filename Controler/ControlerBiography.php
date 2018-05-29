<?php

require_once('Framework/Controler.php');

class ControlerBiography extends Controler
{
	// Affiche les détails sur un post
	public function index()
	{ $this->generateView(); }
}