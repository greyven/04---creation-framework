<?php

require_once('Framework/Model.php');

// Modélise un utilisateur du blog
class User extends Model
{
	// Vérifie qu'un utilisateur existe dans la bdd
	public function existUser($login, $pwd)
	{
		$sql = 'SELECT user_id FROM users WHERE user_login = ? AND user_pwd = ?';
		$user = $this->executeRequest($sql, array($login, $pwd));
		return ($user->rowCount() == 1);
	}

	// Renvoie un utilisateur existant dans la bdd
	public function getUser($login, $pwd)
	{
		$sql = 'SELECT user_id AS userId, user_login AS login, user_pwd AS pwd FROM users WHERE user_login = ? AND user_pwd = ?';
		$user = $this->executeRequest($sql, array($login, $pwd));
		if($user->rowCount() == 1) return $user->fetch();
		else throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis.");
	}
}