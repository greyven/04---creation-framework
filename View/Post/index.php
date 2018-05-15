<?php $this->title = 'Mon blog - '.$this->clean($post['title']); ?>

<?php $image = 'Content/Images/post/'.$this->clean($post['image']); ?>

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
			<form method="post" action="index.php?controler=post&action=toComment">
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