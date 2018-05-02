<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="Content/style.css">
	<title><?= $title ?></title> <!-- titre spécifique -->
</head>
<body>
	<div id="global">
		<header>
			<a href="index.php"><h1 id="blogTitle">Mon blog</h1></a>
			<p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
		</header>
		<hr/>
		<div id="content">
			<?= $content ?> <!-- contenu spécifique -->
		</div>
		<footer id="blogFooter">
			Blog réalisé avec PHP, HTML5 et CSS.
		</footer>
	</div>
</body>
</html>