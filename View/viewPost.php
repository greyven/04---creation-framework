<?php $this->title = 'Mon blog - '.$post['title']; ?>

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