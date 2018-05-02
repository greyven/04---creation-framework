<?php
	require('Model.php');

	try
	{
		$posts = getPosts();
		require('viewHome.php');
	}
	catch(Exception $e)
	{
		$errorMsg = $e->getMessage();
		require('viewError.php');
	}