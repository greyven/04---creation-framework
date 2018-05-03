<?php

require_once('Model/Model.php');

class Comment extends Model
{
	// Renvoie la liste des commentaires d'un post
	function getComments($postId)
	{
		$sql = 'SELECT comm_id AS id, comm_date AS date, comm_author AS author, comm_content AS content FROM comments WHERE post_id = ?';
		$comments = $this->executeRequest($sql, array($postId));
		return $comments;
	}
}