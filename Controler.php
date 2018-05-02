<?php

require('Model.php');

// Affiche la liste de tous les posts du blog
function home()
{
	$posts = getPosts();
	require('viewHome.php');
}

// Affiche les détails d'un post
function post($postId)
{
	$post = getPost($postId);
	$comments = getComments($postId);
	require('viewPost.php');
}

// Affiche une erreur
function error($errorMsg)
{ require('viewError.php'); }