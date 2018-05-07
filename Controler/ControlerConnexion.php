<?php

require_once('Framework/Controler.php');
require_once('Model/User.php');

class ControlerConnexion extends Controler
{
	private $user;

	public function __construct()
	{ $this->user = new User(); }

	public function index()
	{ $this->generateView(); }

	public function connect()
	{
		if($this->request->existParameter("login") && $this->request->existParameter("pwd"))
		{
			$login = $this->request->getParameter("login");
			$pwd = $this->request->getParameter("pwd");

			if($this->user->existUser($login, $pwd))
			{
				$user = $this->user->getUser($login, $pwd);
				$this->request->getSession()->setAttribute("userId", $user['userId']);
				$this->request->getSession()->setAttribute("login", $user['login']);
				$this->redirect("admin");
			}
			else $this->generateView(array('errorMsg' => 'Login ou mot de passe incorrects'), "index");
		}
		else throw new Exception("Action impossible: login ou mot de passe non défini.");
	}

	public function deconnect()
	{
		$this->request->getSession()->destroy();
		$this->redirect("home");
	}
}