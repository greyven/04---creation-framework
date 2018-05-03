<?php

class Configuration
{
	private static $parameters;

	// Renvoie la valeur d'un parametre de configuration
	public static function get($key, $defaultValue = null)
	{
		if(isset(self::getParameters()[$key])) $value = self::getParameters()[$key];
		else $value = $defaultValue;
		return $value;
	}

	// Renvoie le tableau des parametres en le chargeant si besoin
	private static function getParameters()
	{
		if(self::$parameters == null)
		{
			$filePath = "Config/dev.ini";
			if(!file_exists($filePath)) $filePath = "Config/prod.ini";
			if(!file_exists($filePath)) throw new Exception("Aucun fichier de configuration trouvé.");
			else self::$parameters = parse_ini_file($filePath);
		}
		return self::$parameters;
	}
}