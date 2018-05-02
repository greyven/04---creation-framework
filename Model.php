<?php

// Renvoie la liste de tous les posts triés par id decroissant
function getPosts()
{
	$db = getDb();
	$posts = $db->query('SELECT post_id AS id, post_date AS date, post_title AS title, post_content AS content FROM posts ORDER BY post_id DESC');
	return $posts;
}

// Renvoie les infos d'un post
function getPost($postId)
{
	$db = getDb();
	$post = $db->prepare('SELECT post_id AS id, post_date AS date, post_title AS title, post_content AS content FROM posts WHERE post_id = ?');
	$post->execute(array($postId));
	if($post->rowCount() == 1) return $post->fetch();
	else throw new Exception("Aucun post ne correspond à l'id");
}

// Renvoie la liste des commentaires d'un post
function getComments($postId)
{
	$db = getDb();
	$comments = $db->prepare('SELECT comm_id AS id, comm_date AS date, comm_author AS author, comm_content AS content FROM comments WHERE post_id = ?');
	$comments->execute(array($postId));
	return $comments;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getDb()
{
	$db = new PDO('mysql:host=localhost;dbname=_myblog;charset=utf8', 'root', '',
				   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $db;
}