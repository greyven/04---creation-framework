<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
	<?php
		foreach ($posts as $onePost)
		{
			?>
			<article>
				<header>
					<a href="<?= "index.php?action=post&id=".$onePost['id'] ?>">
						<h1 class="postTitle"><?= $onePost['title'] ?></h1>
					</a>
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