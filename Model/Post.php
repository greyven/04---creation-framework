<?php

require_once('Framework/Model.php');

class Post extends Model
{
	// Renvoie la liste de tous les posts triés par id decroissant
	public function getPosts($firstPost, $nbPosts)
	{
		$sql = 'SELECT post_id AS id, post_date AS date, post_title AS title, post_content AS content, post_image AS image
				FROM posts
				ORDER BY post_id
				DESC LIMIT ' . $firstPost . ', ' . $nbPosts;
		$posts = $this->executeRequest($sql);
		return $posts;
	}

	// Renvoie les infos d'un post
	public function getPost($postId)
	{
		$sql = 'SELECT post_id AS id, post_date AS date, post_title AS title, post_content AS content, post_image AS image FROM posts WHERE post_id = ?';
		$post = $this->executeRequest($sql, array($postId));
		if($post->rowCount() > 0) return $post->fetch();
		else throw new Exception("Aucun post ne correspond à l'id");
	}

	// Renvoie le nb total de posts
	public function countPosts()
	{
		$sql = 'SELECT COUNT(*) AS postsNb FROM posts';
		$result = $this->executeRequest($sql);
		$row = $result->fetch();
		return $row['postsNb'];
	}
}