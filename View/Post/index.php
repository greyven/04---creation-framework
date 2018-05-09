<?php $this->title = 'Mon blog - '.$this->clean($post['title']); ?>

<?php $image = 'Content/Images/post/'.$post['image']; ?>

<article class="post">
	<style type="text/css">
		.postTitle
		{
			<?php
				if(file_exists($image)) echo 'background: url('.$image.') no-repeat fixed;';
				else echo 'background-color: rgb(44,106,165);';
			?>
		}
	</style>
	<header class="postTitle">
		<h1><?= $this->clean($post['title']); ?></h1>
	</header>
	<p class="postContent"><?= $this->clean($post['content']); ?></p>
	<footer class="postDate">
		Jean Forteroche, le
		<time><?= $this->clean($post['date']); ?></time>
	</footer>
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