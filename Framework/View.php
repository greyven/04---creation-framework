<?php

require_once('Framework/Configuration.php');

class View
{
	// Nom du fichier associé à la vue
	private $file;
	// Titre de la vue (défini dans le fichier de la vue)
	private $title;

	public function __construct($action, $controler = "")
	{
		// Détermination du nom du fichier vue à partir de l'action et du contructeur
		$file = "View/";
		if($controler != "") $file = $file.$controler."/";
		$this->file = $file.$action.".php";
	}

	// Génère et affiche la vue
	public function generate($datas)
	{
		// Génération de la partie spécifique de la vue
		$content = $this->generateFile($this->file, $datas);

		// On definit une variable locale accessible par la vue pour la racine web
		// il s'agit du chemin vers le site sur le serveur web
		// necessaire pour les URI de type controler/action/id
		$webRoot = Configuration::get("webRoot", "/");

		// Génération du template commun + partie spécifique
		$view = $this->generateFile('View/template.php', array('title' => $this->title, 'content' => $content, 'webRoot' => $webRoot));
		echo $view;
	}

	// Génère un fichier vue et renvoie le résultat produit
	private function generateFile($file, $datas)
	{
		if(file_exists($file))
		{
			// rend les éléments du tableau $datas accessibles dans la vue
			extract($datas);
			// démarrage de la temporisation de sortie
			ob_start();
				// inclut le fichier vue
				// son résultat est placé dans le tampon de sortie
				require $file;
			return ob_get_clean();
		}
		else throw new Exception("Fichier '$file' introuvable.");
	}

	// Néttoie une valeur insérée dans une page HTML
	private function clean($value)
	{ return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false); }
}