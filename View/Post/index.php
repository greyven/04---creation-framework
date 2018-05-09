<?php $this->title = 'Mon blog - '.$this->clean($post['title']); ?>

<article class="post">
	<header>
		<h1 class="postTitle"><?= $this->clean($post['title']); ?></h1>
		<time class="postDate"><?= $this->clean($post['date']); ?></time>
	</header>
	<p class="postContent"><?= $this->clean($post['content']); ?></p>
</article>
<hr/>
<header>
	<h1 id="responsesTitle">Réponses à <?= $this->clean($post['title']); ?></h1>
</header>
<?php
	foreach ($comments as $oneComment)
	{
		?>
		<p>
			<?= $this->clean($oneComment['author']); ?> dit: <br/>
			<?= $this->clean($oneComment['content']); ?>
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