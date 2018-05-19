<?php

require_once('Framework/Model.php');

class Comment extends Model
{
	// Renvoie la liste des commentaires d'un post
	public function getComments($postId)
	{
		$sql = 'SELECT comm_id, comm_date, comm_author, comm_content, comm_reported
				FROM comments
				WHERE post_id = ?
				ORDER BY comm_id DESC';
		$comments = $this->executeRequest($sql, array($postId));
		return $comments;
	}

	// Ajoute un commentaire dans la bdd
	public function addComment($author, $content, $postId)
	{
		$sql = 'INSERT INTO comments(comm_date, comm_author, comm_content, post_id)
				VALUES(NOW(), ?, ?, ?)';
		$this->executeRequest($sql, array($author, $content, $postId));
	}

	// Renvoie le nb total de commentaires
	public function countComments()
	{
		$sql = 'SELECT COUNT(*) AS commentsNb FROM comments';
		$result = $this->executeRequest($sql);
		$row = $result->fetch();
		return $row['commentsNb'];
	}

	// Signaler un commentaire déplacé
	public function reportComment($commId)
	{
		$sql = 'UPDATE comments SET comm_reported = 1 WHERE comm_id = ?';
		$this->executeRequest($sql, array($commId));
	}
}