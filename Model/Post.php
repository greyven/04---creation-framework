<?php
namespace App\Model;
use App\Framework\Model;

class Post extends Model
{
	// Renvoie la liste de tous les posts triés par id decroissant sur un numéro page précise
	public function getPosts($firstPost, $nbPosts)
	{
		$sql = 'SELECT post_id, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin\') AS post_date, post_title, post_content
				FROM posts
				ORDER BY post_id DESC
				LIMIT ' . $firstPost . ', ' . $nbPosts;
		$posts = $this->executeRequest($sql);
		return $posts;
	}

	// Renvoie la liste de tous les posts triés par id décroissant
	public function getAllPosts()
	{
		$sql = 'SELECT post_id, post_title
				FROM posts
				ORDER BY post_id DESC';
		$posts = $this->executeRequest($sql);
		return $posts;
	}

	// Renvoie les infos d'un post
	public function getPost($postId)
	{
		$sql = 'SELECT post_id, DATE_FORMAT(post_date, \'%d/%m/%Y à %Hh%imin\') AS post_date, post_title, post_content
				FROM posts
				WHERE post_id = ?';
		$post = $this->executeRequest($sql, array($postId));
		if($post->rowCount() > 0) return $post->fetch();
		else throw new Exception("Aucun post ne correspond à l'id");
	}

    public function getAllWithReportedComments()
	{
		$sql = 'SELECT * FROM `posts`
				INNER JOIN comments ON comments.post_id = posts.post_id
				WHERE comments.comm_reported = 1
				ORDER BY posts.post_id';
		return $this->executeRequest($sql);
	}

	// Renvoie le nb total de posts
	public function countPosts()
	{
		$sql = 'SELECT COUNT(*) AS postsNb FROM posts';
		$result = $this->executeRequest($sql);
		$row = $result->fetch();
		return $row['postsNb'];
	}

	// Crée un nouveau post
	public function createPost($title, $content)
	{
		$sql = 'INSERT INTO posts(post_date, post_title, post_content)
				VALUES(NOW(), ?, ?)';
		$this->executeRequest($sql, array($title, $content));
	}

	// Modifie un post existant
	public function updatePost($postId, $title, $content)
	{
		$sql = 'UPDATE posts
				SET post_date = NOW(), post_title = ?, post_content = ?
				WHERE post_id = ?';
		$this->executeRequest($sql, array($title, $content, $postId));
	}

	// Supprime un post existant
	public function destroyPost($postId)
	{
		$sql = 'DELETE FROM posts WHERE post_id = ?';
		$this->executeRequest($sql, array($postId));
	}
}