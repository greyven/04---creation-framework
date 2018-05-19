<?php

require_once('Framework/Controler.php');

// Classe parente des controleurs soumis à authentification
abstract class ControlerSecured extends Controler
{
	public function executeAction($action)
	{
		// Vérifie si les informations utilisateur sont présents dans la session
 		// Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action
 		// continue normalement
 		// Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
 		if($this->request->getSession()->existAttribute('user_id'))
 			parent::executeAction($action);
 		else $this->redirect("connexion");
	}
}