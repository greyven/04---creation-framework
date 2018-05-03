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
<form method="post" action="index.php?action=toComment">
	<input id="author" name="author" type="text" placeholder="Votre pseudo" required/>
	<br/>
	<textarea id="txtComment" name="content" rows="6" placeholder="Votre commentaire" required></textarea>
	<br/>
	<input type="hidden" name="id" value="<?= $post['id'] ?>"/>
	<input type="submit" value="Valider"/>
</form>