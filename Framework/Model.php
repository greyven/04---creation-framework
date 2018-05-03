<?php

require_once('Framework/Configuration.php')

abstract class Model
{
	// Objet PDO d'accès à la BDD
	private static $db;


	// Exécute une requête SQL éventuellement paramétrée
	protected function executeRequest($sql, $params = null)
	{
		if($params == null)
		{ $result = self::getDb()->query($sql); } // exécution directe
		else
		{
			$result = self::getDb()->prepare($sql); // requête préparée
			$result->execute($params);
		}
		return $result;
	}
	
	// Effectue la connexion à la BDD
	// Instancie et renvoie l'objet PDO associé
	private static function getDb()
	{
		if(self::$db === null)
		{
			// recuperation des parametres de configuration bdd
			$dsn = Configuration::get("dsn");
			$login = Configuration::get("login");
			$pwd = Configuration::get("pwd");
			// Création de la connexion
			self::$db = new PDO($dsn, $login, $pwd,
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		return self::$db;
	}
}