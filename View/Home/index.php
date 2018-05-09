<?php $this->title = 'Mon blog'; ?>

<?php
	foreach ($posts as $onePost)
	{
		?>
		<article class="post">
			<header class="postTitle">
				<a href="<?= "post/index/".$this->clean($onePost['id']) ?>">
					<h1><?= $this->clean($onePost['title']) ?></h1>
				</a>
			</header>
			<p class="postContent"><?= $this->clean($onePost['content']) ?></p>
			<footer class="postDate">
				Jean Forteroche, le
				<time><?= $this->clean($onePost['date']) ?></time>
			</footer>
		</article>
		<br/>
		<?php
	}
?>