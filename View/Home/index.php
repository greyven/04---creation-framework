<?php $this->title = 'Mon blog'; ?>

<?php
	foreach ($posts as $onePost)
	{
		$image = 'Content/Images/post/'.$this->clean($onePost['image']);
		?>
		<article class="post ">
			<style type="text/css">
				.postTitle
				{
					<?php
						if(file_exists($image)) echo 'background: url('.$image.') no-repeat;';
						else echo 'background-color: rgb(44,106,165);';
					?>
				}
			</style>
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