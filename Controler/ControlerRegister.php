<?php

require_once('Framework/Controler.php');
require_once('Model/User.php');

class ControlerRegister extends Controler
{
	private $user;

	public function __construct()
	{ $this->user = new User(); }

	public function index()
	{ $this->generateView(); }

	public function subscribe()
	{
		if($this->request->existParameter("user_login") && $this->request->existParameter("user_pwd"))
		{
			$login = $this->request->getParameter("user_login");
			$pwd = $this->request->getParameter("user_pwd");

			if($login != "" && $pwd != "")
			{
				if(!$this->user->existLogin($login))
				{
					$added = $this->user->addUser($login, $pwd);
					if($added)
					{
						/* $this->request->getSession()->setAttribute('login', $login);
						$this->request->getSession()->setAttribute('pwd', $pwd);
						$this->request->getSession()->setAttribute('justRegistered', true);
						$this->request->addParameter($this->request->getSession()->getAttribute('justRegistered'));
						$this->redirect("connexion/connect"); */
						$this->redirect("home");
					}
					else throw new Exception("Erreur, impossible d'ajouter l'utilisateur à la base de données.");
				}
				else $this->generateView(array('errorMsg' => 'Pseudo déjà existant.'), "index");
			}
			else $this->generateView(array('errorMsg' => 'Vous devez remplir les champs.'), "index");
		}
		else throw new Exception("Action REGISTER impossible: login ou mot de passe non défini.");
	}
}