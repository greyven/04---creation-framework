<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<base href="<?= $webRoot ?>">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Content/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="tinymce/jquery.tinymce.min.js"></script>
	<script type="text/javascript">
		/*tinyMCE.init({
			// id ou class, des textareas
			selector : "textarea.tiny", 
			// en mode avancé, cela permet de choisir les plugins
			theme : "modern", 
			// langue
			language : "fr_FR",

			setup: function (editor)
			{
		        editor.on('change', function () {
		            tinymce.triggerSave();
		        });
		    }
		});*/

		tinymce.init
		({
			selector: 'textarea.tiny',
			theme: 'modern',
			plugins: 'print preview searchreplace autolink directionality visualblocks image link media table charmap hr insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
			toolbar1: 'sizeselect fontselect fontsizeselect bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
			fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
			branding: false,

			setup: function (editor)
			{
		        editor.on('change', function () {
		            tinymce.triggerSave();
		        });
		    }
		});

	</script>

	<title><?= $title ?></title> <!-- titre spécifique -->
</head>
<body class="bg<?= mt_rand(1,3) ?>">
	
	<?php
		// SI L'ADMIN EST CONNECTÉ
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == 1) $admin = true;
		else $admin = false;

		// SI C'EST UN CONTROLLEUR D'ADMINISTRATION
		if((isset($_GET['controler']) && ($_GET['controler'] == "admin" || $_GET['controler'] == "managecomments" || $_GET['controler'] == "createpost" || $_GET['controler'] == "modifypost"))) $adminControler = true;
		else $adminControler = false;

		// SI L'ADMIN EST CO ET CONTROLLEUR D'ADMINISTRATION
		if($admin && $adminControler) $adminAndControlerOk = true;
		else $adminAndControlerOk = false;
	?>

	<div id="global" class="container">
		
		<!-- FILTRE COLORÉ -->
		<div class="filter"></div>

		<!-- HEADER -->
		<?php
			if($adminAndControlerOk) require_once('View/menuAdmin.php');
			else
			{
				?>
				<div class="row">
					<div class="col-lg-12">
						<header class="permanent verticalAlignCenter textHorizontalAlignCenter">
						    <h2 class="blogTitle"><a href="home">Billet simple pour l'Alaska</a></h2>
						</header>
					</div>
				</div>
				<?php
			}
		?>

		<!-- CONTENT -->
		<div <?php if($adminAndControlerOk) echo 'id="adminContent"';
				   else echo 'id="content"'; ?> >
			<div class="container">
				<div class="row">

					<?php
						if($adminAndControlerOk)
						{ $class = "col-lg-12 hideForPhone"; }
						else
						{ $class = "col-lg-8 col-md-8 col-sm-8 col-xs-12"; }
					?>
					<section id="leftContent" class="<?= $class ?>">
						<div class="row">
							<div class="col-lg-offset-1 col-lg-10 col-xs-12 marginPhone">
								<?= $content ?> <!-- AFFICHAGE PARTIE GAUCHE LISTE POSTS, OU UN POST PRECIS, OU ADMINISTRATION -->
							</div>
						</div>
					</section>

					<?php
						if(!$adminAndControlerOk)
						{
							?>
							<section id="rightContent" class="col-lg-4 hideForPhone">
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
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="row">
						<?php
							if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0)
							{
								?>
								<div class="footerLinksPhone horizontalAlignCenter">
									<div class="col-lg-3 col-xs-5">
										<div class="floatRight">
											<?= $_SESSION['user_login']; ?>
										</div>
									</div>
									<div class="col-lg-1 col-xs-1 textHorizontalAlignCenter">-</div>
									<div class="col-lg-6 col-xs-6">
										<a href="connexion/deconnect">Déconnexion</a>
									</div>
								</div>
								<?php
							}
							else
							{
								?>
								<div class="footerLinksPhone horizontalAlignCenter">
									<div class="col-lg-3 col-xs-5">
										<div class="floatRight">
											<a href="connexion">Connexion</a>
										</div>
									</div>
									<div class="col-lg-1 col-xs-2 textHorizontalAlignCenter">/</div>
									<div class="col-lg-6 col-xs-5">
										<div class="floatLeft">
											<a href="register">Inscription</a>
										</div>
									</div>
								</div>
								<?php
							}
						?>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 hideForPhone">
					<div class="textHorizontalAlignCenter">
						Blog réalisé par Stephen Séré avec PHP, HTML5, CSS et un peu de JavaScript pour l'inclusion de TinyMCE.
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 hideForPhone">
					<?php
						if($admin)
						{
							?>
							<div class="col-lg-offset-1 col-lg-6">
								<div class="floatRight">
									<a href="home">Retour à l'accueil</a>
								</div>
							</div>
							<div class="col-lg-1">/</div>
							<div class="col-lg-4">
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