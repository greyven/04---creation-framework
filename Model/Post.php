<?php

require_once('Framework/Model.php');

class Post extends Model
{
	// Renvoie la liste de tous les posts triés par id decroissant sur un numéro page précise
	public function getPosts($firstPost, $nbPosts)
	{
		$sql = 'SELECT post_id, post_date, post_title, post_content, post_image
				FROM posts
				ORDER BY post_id
				DESC LIMIT ' . $firstPost . ', ' . $nbPosts;
		$posts = $this->executeRequest($sql);
		return $posts;
	}


    public function getAllWithReportedComments()
	{
		$sql = 'SELECT * FROM `posts` INNER JOIN comments ON comments.post_id = posts.post_id WHERE comments.comm_reported = 1';
		return $this->executeRequest($sql);
	}


	// Renvoie la liste de tous les posts triés par id décroissant
	public function getAllPosts()
	{
		$sql = 'SELECT post_id, post_date, post_title, post_content, post_image
				FROM posts
				ORDER BY post_id DESC';
		$allPosts = $this->executeRequest($sql);
		return $allPosts;
	}	

	// Renvoie les infos d'un post
	public function getPost($postId)
	{
		$sql = 'SELECT post_id, post_date, post_title, post_content, post_image
				FROM posts
				WHERE post_id = ?';
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