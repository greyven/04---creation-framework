<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Mon blog</title>
</head>
<body>
	<div id="global">
		<header>
			<a href="index.php"><h1 id="blogTitle">Mon blog</h1></a>
			<p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
		</header>
		<div id="content">
			<?php
				foreach ($posts as $onePost)
				{
					?>
					<article>
						<header>
							<h1 class="postTitle"><?= $onePost['title'] ?></h1>
							<time><?= $onePost['date'] ?></time>
						</header>
						<p><?= $onePost['content'] ?></p>
					</article>
					<hr/>
					<?php
				}
			?>
		</div>
		<footer id="blogFooter">
			Blog réalisé avec PHP, HTML5 et CSS.
		</footer>
	</div>
</body>
</html>