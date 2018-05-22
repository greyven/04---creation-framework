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

	// Renvoie la liste de tous les commentaires
	public function getAllComments()
	{
		$sql = 'SELECT comm_id, comm_date, comm_author, comm_content, post_id, comm_reported
				FROM comments
				ORDER BY comm_id DESC';
		$allComments = $this->executeRequest($sql);
		return $allComments;
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

	// Renvoie la liste des commentaires signalés
	public function getReportedComments()
	{
		$sql = 'SELECT comm_id, comm_date, comm_author, comm_content, c.post_id comm_postid, comm_reported, p.post_id, post_date, post_title, post_content
				FROM comments c
				INNER JOIN posts p
				ON c.post_id = p.post_id
				WHERE comm_reported = 1
				ORDER BY p.post_id DESC, comm_id DESC';
		//$reportedComments = $this->executeRequest($sql);
		//return $reportedComments;


		$sql = 'SELECT * FROM `posts` INNER JOIN comments ON comments.post_id = posts.post_id WHERE comments.comm_reported = 1';
		return $this->executeRequest($sql);


		// $ret = [];

  //       10 => [postTile, postId, postDate, Comments => []]

  //       $posts = [];

		// while ($post = $reportedComments->fetch())){
	 //        if(!isset($posts[$post['post_id']]){
	 //        	$modelPost = new Post();
	 //        	$modelPost->setContent($post['post_content']);
	 //        	$modelPost->addComment()
  //               $posts[$post['post_id'] = $modelPost

	 //        }else{
	 //        	$posts[$post['post_id']->addComment($post['comm_content']);
	 //        }
		// }
		// return $posts;



	}

	// Supprimer un commentaire
	public function deleteComment($commId)
	{
		$sql = 'DELETE FROM comments WHERE comm_id = ?';
		$this->executeRequest($sql, array($commId));
	}
}