<?php $title = 'Mon blog - '.$post['title']; ?>

<?php ob_start(); ?>
<article>
	<header>
		<h1 class="postTitle"><?= $post['title']; ?></h1>
		<time><?= $post['date']; ?></time>
	</header>
	<p><?= $post['content']; ?></p>
</article>
<hr/>
<header>
	<h1 id="responsesTitle">Réponses à <?= $post['title']; ?></h1>
</header>
<?php
	foreach ($comments as $oneComment)
	{
		?>
		<p>
			<?= $oneComment['author']; ?> dit: <br/>
			<?= $oneComment['content']; ?>
		</p>
		<?php
	}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>