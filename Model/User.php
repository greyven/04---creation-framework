<?php
namespace App\Model;

use App\Framework\Model;

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

	// Vérifie qu'un pseudo existe dans la bdd
	public function existLogin($login)
	{
		$sql = 'SELECT * FROM users WHERE user_login = ?';
		$user = $this->executeRequest($sql, array($login));
		return ($user->rowCount() == 1);
	}

	// Renvoie un utilisateur existant dans la bdd
	public function getUser($login, $pwd)
	{
		$sql = 'SELECT user_id, user_login, user_pwd
				FROM users
				WHERE user_login = ? AND user_pwd = ?';
		$user = $this->executeRequest($sql, array($login, $pwd));
		if($user->rowCount() == 1) return $user->fetch();
		else throw new \Exception("Aucun utilisateur ne correspond aux identifiants fournis.");
	}

	// Ajoute un nouvel utilisateur dans la bdd
	public function addUser($login, $pwd)
	{
		$sql = 'INSERT INTO users(user_login, user_pwd) VALUES(?, ?)';
		return ($this->executeRequest($sql, array($login, $pwd)));
	}
}