<?php $this->title = 'Mon blog'; ?>

<?php
	foreach ($posts as $onePost)
	{
		?>
		<article>
			<header>
				<a href="<?= "post/index/".$this->clean($onePost['id']) ?>">
					<h1 class="postTitle"><?= $this->clean($onePost['title']) ?></h1>
				</a>
				<time><?= $this->clean($onePost['date']) ?></time>
			</header>
			<p><?= $this->clean($onePost['content']) ?></p>
		</article>
		<hr/>
		<?php
	}
?>