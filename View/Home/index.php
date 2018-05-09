<?php $this->title = 'Mon blog'; ?>

<?php
	foreach ($posts as $onePost)
	{
		?>
		<article class="post">
			<header>
				<a href="<?= "post/index/".$this->clean($onePost['id']) ?>">
					<h1 class="postTitle"><?= $this->clean($onePost['title']) ?></h1>
				</a>
				<time class="postDate"><?= $this->clean($onePost['date']) ?></time>
			</header>
			<p class="postContent"><?= $this->clean($onePost['content']) ?></p>
		</article>
		<br/>
		<?php
	}
?>