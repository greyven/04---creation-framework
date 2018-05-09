<?php
	$bg = array('bg1.jpg', 'bg2.jpg', 'bg3.jpg'); // array of filenames
  	$i = rand(0, count($bg)-1); // generate random number size of the array
  	$selectedBg = 'Content/Images/'.$bg[$i]; // set variable equal to which random filename was chosen
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<base href="<?= $webRoot ?>">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Content/style.css">
	<style type="text/css">
		body
		{ background: url(<?php echo $selectedBg; ?>) no-repeat fixed; }
	</style>
	<title><?= $title ?></title> <!-- titre spécifique -->
</head>
<body>
	<div id="global">
		<header>
		    <div class="jumbotron horizontalAlignCenter">
		    	<h2 class="blogTitle"><a href="index.php">Billet simple pour l'Alaska</a></h2>
		    </div>
		</header>
		<div id="content" class="container">
			<div id="leftContent">
				<?= $content ?> <!-- contenu spécifique -->
			</div>
			<div id="rightContent">
				
			</div>
		</div>
		<footer class="horizontalAlignCenter">
			Blog réalisé avec PHP, HTML5 et CSS.
		</footer>
	</div>
</body>
</html>