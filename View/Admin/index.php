<?php
	if(isset($_SESSION['admin']) && $_SESSION['admin'])
	{
		$this->title = 'Mon blog - Administration';
		?>

		<h2>Administration</h2>

		Bienvenu Jean!
		Ce blog comporte <?= $this->clean($postsNb); ?> billet<?php if($this->clean($postsNb) > 1) echo 's'; ?> et <?= $this->clean($commentsNb); ?> commentaire<?php if($this->clean($commentsNb) > 1) echo 's'; ?>.

		<?php
	}
	else header("Location:home");
?>