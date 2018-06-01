
<?php
namespace App\Controler;

use App\Framework\Controler;
use App\Model\User;

class ControlerConnexion extends Controler
{
	private $user;

	public function __construct()
	{ $this->user = new User(); }

	public function index()
	{ $this->generateView(); }

	public function connect()
	{
		if($this->request->existParameter('justRegistered') && $this->request->getParameter('justRegistered'))
		{
			$_POST['user_login'] = $_SESSION['user_login'];
			$_POST['user_pwd'] = $_SESSION['user_pwd'];
		}

		if($this->request->existParameter("user_login") && $this->request->existParameter("user_pwd"))
		{
			$login = $this->request->getParameter("user_login");
			$pwd = $this->request->getParameter("user_pwd");

			if($this->user->existUser($login, $pwd))
			{
				$user = $this->user->getUser($login, $pwd);
				$this->request->getSession()->setAttribute("user_id", $user['user_id']);
				$this->request->getSession()->setAttribute("user_login", $user['user_login']);

				if($user['user_id'] == 1)
				{ $this->request->getSession()->setAttribute("admin", true); }

				$this->redirect("home");
			}
			else $this->generateView(array('errorMsg' => 'Login ou mot de passe incorrects'), "index");
		}
		else throw new \Exception("Action CONNEXION impossible: login ou mot de passe non défini.");
	}

	public function deconnect()
	{
		$this->request->getSession()->destroy();
		$this->redirect("home");
	}
}