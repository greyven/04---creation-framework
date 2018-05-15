<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<base href="<?= $webRoot ?>">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Content/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title><?= $title ?></title> <!-- titre spécifique -->
</head>
<body class="bg<?= mt_rand(1,3) ?>">
	<div id="global" class="container">
		
		<!-- HEADER -->
		<header class="permanent verticalAlignCenter horizontalAlignCenter">
		    <h2 class="blogTitle"><a href="index.php">Billet simple pour l'Alaska</a></h2>
		</header>

		<!-- CONTENT -->
		<div id="content">
			<div class="container">
				<div class="row">
					<section id="leftContent" class="col-lg-8">
						<div class="row">
							<div class="col-lg-offset-1 col-lg-10">
								<?= $content ?> <!-- contenu spécifique -->
							</div>
						</div>
					</section>
					<section id="rightContent" class="col-lg-4">
						<div class="row">
							<div class="col-lg-10 biography shadow" data-spy="affix" data-offset-top="0">
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
						</div>
					</section>
				</div>
			</div>
		</div>

		<!-- FOOTER -->
		<footer class="permanent verticalAlignCenter horizontalAlignCenter">
			Blog réalisé avec PHP, HTML5 et CSS.
		</footer>
	</div>
</body>
</html>