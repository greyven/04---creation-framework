<?php $this->title = 'Mon blog - '.$this->clean($post['title']); ?>

<article class="post shadow">

	<header class="postTitle toto verticalAlignCenter" style="background-image: url('Content/Images/post/<?= $this->clean($post['image']); ?>')" >
		<h1 class="postLink"><?= $this->clean($post['title']); ?></h1>
	</header>
	<p class="postContent"><?= $this->clean($post['content']); ?></p>
	<footer class="postFooter verticalAlignCenter">
		<div class="postFooterText">
			Jean Forteroche, le
			<time><?= $this->clean($post['date']); ?></time>
		</div>
	</footer>
</article>
<hr/>
<div class="comments">
	<div class="row commentsContent">
		<header class="commHeader">
			<h1 id="responsesTitle">Réponses à <?= $this->clean($post['title']); ?></h1>
		</header>
		<div class="commBody">
			<?php
				foreach ($comments as $oneComment)
				{
					?>
					<p class="comment">
						<?= $this->clean($oneComment['author']); ?> dit: <br/>
						<?= $this->clean($oneComment['content']); ?>
					</p>
					<?php
				}
			?>
		</div>
		<div class="commFooter">
			<form method="post" action="post/toComment/">
				<input id="author" name="author" type="text" placeholder="Votre pseudo" required/>
				<br/>
				<textarea id="txtComment" name="content" rows="6" placeholder="Votre commentaire" required></textarea>
				<br/>
				<input type="hidden" name="id" value="<?= $post['id'] ?>"/>
				<input type="submit" value="Valider"/>
			</form>
		</div>
	</div>
</div>