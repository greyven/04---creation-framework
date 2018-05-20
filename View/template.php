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
		
		<!-- FILTRE COLORÉ -->
		<div class="filter"></div>

		<!-- HEADER -->
		<header class="permanent verticalAlignCenter horizontalAlignCenter">
		    <h2 class="blogTitle"><a href="home">Billet simple pour l'Alaska</a></h2>
		</header>

		<!-- CONTENT -->
		<div id="content">
			<div class="container">
				<div class="row">

					<?php
						if(isset($_GET['controler']) && $_GET['controler'] == "admin")
						{ $class = "col-lg-12"; }
						else
						{ $class = "col-lg-8"; }
					?>
					<section id="leftContent" class="<?= $class ?>">
						<div class="row">
							<div class="col-lg-offset-1 col-lg-10">
								<?= $content ?> <!-- AFFICHAGE PARTIE GAUCHE LISTE POSTS, OU UN POST PRECIS -->
							</div>
						</div>
					</section>

					<?php
						if(isset($_GET['controler']) && $_GET['controler'] == "admin")
						{ }
						else
						{
							?>
							<section id="rightContent" class="col-lg-4">
								<?php require_once('View/biography.php'); ?> <!-- AFFICHAGE PARTIE DROITE BIOGRAPHIE -->
							</section>
							<?php
						}
					?>
				</div>
			</div>
		</div>

		<!-- FOOTER -->
		<footer class="permanent verticalAlignCenter">
			<div class="row">
				<div class="col-lg-3">
					<div class="row">
						<?php
							if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0)
							{
								?>
								<div class="col-lg-3">
									<div class="floatRight">
										<?= $_SESSION['user_login']; ?>
									</div>
								</div>
								<div class="col-lg-1">-</div>
								<div class="col-lg-6">
									<a href="connexion/deconnect">Déconnexion</a>
								</div>
								<?php
							}
							else
							{
								?>
								<div class="col-lg-3">
									<div class="floatRight">
										<a href="connexion">Connexion</a>
									</div>
								</div>
								<div class="col-lg-1">/</div>
								<div class="col-lg-6">
									<div class="floatLeft">
										<a href="register">Inscription</a>
									</div>
								</div>
								<?php
							}
						?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="horizontalAlignCenter">
						Blog réalisé avec PHP, HTML5 et CSS.
					</div>
				</div>
				<div class="col-lg-3">
					<?php
						if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1)
						{
							?>
							<div class="col-lg-6"></div>
							<div class="col-lg-6">
								<a href="admin">Administration</a>
							</div>
							<?php
						}
					?>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>