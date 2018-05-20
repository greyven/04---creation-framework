<?php
	if(isset($_SESSION['admin']) && $_SESSION['admin'])
	{
		$this->title = 'Mon blog - Administration';
		?>

		<ul class="horizontal">
			<li><a href="home" class="active">Accueil</a></li>
			<li><a href="#">Créer billet</a></li>
			<li><a href="#">Modifier billet</a></li>
			<li><a href="#">Gérer commentaires</a></li>
		</ul>

		<br/>

		<h2>Administration</h2>

		Bienvenu Jean!
		Ce blog comporte <?= $this->clean($postsNb); ?> billet<?php if($this->clean($postsNb) > 1) echo 's'; ?> et <?= $this->clean($commentsNb); ?> commentaire<?php if($this->clean($commentsNb) > 1) echo 's'; ?>.
		
		<br/>
		<br/>		

		<?php
	}
	else header("Location:home");
?>