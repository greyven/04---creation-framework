<?php
	$bg = array('bg1.jpg', 'bg2.jpg', 'bg3.jpg'); // array of filenames
  	$i = rand(0, count($bg)-1); // generate random number size of the array
  	$selectedBg = 'Content/Images/bg/'.$bg[$i]; // set variable equal to which random filename was chosen
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
		    <div class="jumbotron verticalAlignCenter horizontalAlignCenter">
		    	<h2 class="blogTitle"><a href="index.php">Billet simple pour l'Alaska</a></h2>
		    </div>
		</header>
		<div id="content" class="container">
			<div class="row">
				<section id="leftContent" class="col-lg-8">
					<div class="col-lg-offset-1 col-lg-10">
						<?= $content ?> <!-- contenu spécifique -->
					</div>
				</section>
				<section id="rightContent" class="col-lg-4">
					<div class="col-lg-10 biography shadow">
						<br/>
						<div class="row">
							<div class="col-lg-offset-1 col-lg-6">
								<img class="photoJean shadow" src="Content/Images/avatar/jean_forteroche.png"/>
							</div>
							<div class="col-lg-5 horizontalAlignCenter">
								<br/>
								<p>Jean Forteroche</p>
								<p>Acteur, écrivain.</p>
							</div>
						</div>
						<br/>
						<br/>
						<br/>
						<div class="row livre">
							<div class="col-lg-8">
								<p>
									Son nouveau roman en cours d'écriture, Billet simple pour l'alaska.
									Retrouvez ici ses prochaines publications journalieres.
								</p>
							</div>
							<div class="col-lg-4">
								<img class="photoLivre" src="Content/Images/biography/livre.png"/>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<footer class="permanent verticalAlignCenter horizontalAlignCenter">
			Blog réalisé avec PHP, HTML5 et CSS.
		</footer>
	</div>
</body>
</html>