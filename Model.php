<?php

// Renvoie la liste de tous les posts triés par id decroissant
function getPosts()
{
	$db = getDb();
	$posts = $db->query('SELECT post_id AS id, post_date AS date, post_title AS title, post_content AS content FROM posts ORDER BY post_id DESC');
	return $posts;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getDb()
{
	$db = new PDO('mysql:host=localhost;dbname=_myblog;charset=utf8', 'root', '',
				   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $db;
}