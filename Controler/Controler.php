<?php

require('Model/Model.php');

// Affiche la liste de tous les posts du blog
function home()
{
	$posts = getPosts();
	require('View/viewHome.php');
}

// Affiche les détails d'un post
function post($postId)
{
	$post = getPost($postId);
	$comments = getComments($postId);
	require('View/viewPost.php');
}

// Affiche une erreur
function error($errorMsg)
{ require('View/viewError.php'); }