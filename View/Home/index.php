<?php $this->title = 'Mon blog'; ?>

<div class="row textHorizontalAlignCenter">
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
		?>
		<div class="col-lg-12 col-xs-12">
			<article class="post shadow">
				<header class="postTitle verticalAlignCenter">
					<a href="<?= "post/index/".$this->clean($onePost['post_id']) ?>">
						<h1 class="postLink"><?= $this->clean($onePost['post_title']) ?></h1>
					</a>
				</header>
				<div class="homeContent">
					<p class="postContent">
						<?= $onePost['post_content'] ?>
					</p>
				</div>
				<footer class="postFooter verticalAlignCenter">
					<div class="postFooterText">
						Jean Forteroche, le
						<time><?= $this->clean($onePost['post_date']) ?></time>
					</div>
				</footer>
			</article>
		</div>
		<?php
	} ?>
</div>

<div class="row textHorizontalAlignCenter">
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