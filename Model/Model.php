<?php

abstract class Model
{
	// Objet PDO d'accès à la BDD
	private $db;


	// Effectue la connexion à la BDD
	// Instancie et renvoie l'objet PDO associé
	private function getDb()
	{
		if($this->db == null)
		{
			$this->db = new PDO('mysql:host=localhost;dbname=_myblog;charset=utf8',
				'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		return $this->db;
	}

	// Exécute une requête SQL éventuellement paramétrée
	protected function executeRequest($sql, $params = null)
	{
		if($params == null)
		{ $result = $this->getDb()->query($sql); } // exécution directe
		else
		{
			$result = $this->getDb()->prepare($sql); // requête préparée
			$result->execute($params);
		}
		return $result;
	}
}