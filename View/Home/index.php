<?php $this->title = 'Mon blog'; ?>

<div class="row horizontalAlignCenter">
	<fieldset>
		<?php

			// --------------- Étape 1 -----------------
	        // Créer les liens vers les pages
	        // -----------------------------------------

	        if($nbPages > 1)
	        {
	            for($numPage=1; $numPage<=$nbPages; $numPage++)
	            {
	                echo '<a class="pagination pTop shadow" href="index.php?page=' . $numPage . '">' . $numPage . '</a>' . ' ';
	            }
	        }
	    ?>
	</fieldset>
</div>

<div class="row">
	<?php
    // --------------- Étape 2 -----------------
    // Afficher les messages
    // -----------------------------------------


	foreach ($posts as $onePost)
	{
		$image = 'Content/Images/post/'.$this->clean($onePost['image']);
		?>
		<article class="post shadow">
			<style type="text/css">
				.postTitle
				{
					<?php
						if(file_exists($image)) echo 'background: url('.$image.') no-repeat;';
						else echo 'background-color: rgb(44,106,165);';
					?>
				}
			</style>
			<header class="postTitle verticalAlignCenter">
				<a href="<?= "post/index/".$this->clean($onePost['id']) ?>">
					<h1 class="postLink"><?= $this->clean($onePost['title']) ?></h1>
				</a>
			</header>
			<div class="homeContent">
				<p class="postContent">
					<?= $this->clean($onePost['content']) ?>
				</p>
			</div>
			<footer class="postFooter verticalAlignCenter">
				<div class="postFooterText">
					Jean Forteroche, le
					<time><?= $this->clean($onePost['date']) ?></time>
				</div>
			</footer>
		</article>
		<?php
	} ?>
</div>

<div class="row horizontalAlignCenter">
	<?php
		// --------------- Étape 3 -----------------
	    // Créer les liens vers les pages
	    // -----------------------------------------
	    if($nbPages > 1)
	    {
	        for($numPage=1; $numPage<=$nbPages; $numPage++)
	        {
	            echo '<a class="pagination pBottom shadow" href="index.php?page=' . $numPage . '">' . $numPage . '</a>' . ' ';
	        }
	    }
	?>
</div>