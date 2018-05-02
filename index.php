<?php
	require('Controler/Controler.php');

	try
	{
		if(isset($_GET['action']))
		{
			if($_GET['action'] == 'post')
			{
				if(isset($_GET['id']))
				{
					$postId = intval($_GET['id']);
					if($postId != 0) post($postId);
					else throw new Exception("Identifiant de post non valide.");
				}
				else throw new Exception("Identifiant de post non défini.");
			}
			else throw new Exception("Action non valide.");
		}
		else home();
	}
	catch(Exception $e)
	{
		error($e->getMessage());
	}