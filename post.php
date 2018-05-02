<?php

require('Model.php');

try
{
	if(isset($_GET['id']))
	{
		$id = intval($_GET['id']);
		if($id !=0)
		{
			$post = getPost($id);
			$comments = getComments($id);
			require('viewPost.php');
		}
		else throw Exception("Identifiant de post incorrect.");
	}
	else throw Exception("Aucun identifiant de post.");
}
catch(Exception $e)
{
	$errorMsg = $e->getMessage();
	require('viewError.php');
}