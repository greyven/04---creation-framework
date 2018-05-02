<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
	<?php
		foreach ($posts as $onePost)
		{
			?>
			<article>
				<header>
					<h1 class="postTitle"><?= $onePost['title'] ?></h1>
					<time><?= $onePost['date'] ?></time>
				</header>
				<p><?= $onePost['content'] ?></p>
			</article>
			<hr/>
			<?php
		}
	?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>