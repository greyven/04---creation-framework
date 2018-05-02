<?php

require_once('Model/Model.php');

class Post extends Model
{
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
}