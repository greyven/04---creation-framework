<?php

class View
{
	// Nom du fichier associé à la vue
	private $file;
	// Titre de la vue (défini dans le fichier de la vue)
	private $title;

	public function __construct($action)
	{
		// Détermination du nom du fichier vue à partir de l'action
		$this->file = "View/view".$action.".php";
	}

	// Génère et affiche la vue
	public function generate($datas)
	{
		// Génération de la partie spécifique de la vue
		$content = $this->generateFile($this->file, $datas);
		// Génération du template commun + partie spécifique
		$view = $this->generateFile('View/template.php', array('title' => $this->title, 'content' => $content));
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
}