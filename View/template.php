<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<base href="<?= $webRoot ?>">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Content/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
		tinyMCE.init({
			// type de mode
			mode : "exact", 
			// id ou class, des textareas
			elements : "createPost,texte2", 
			// en mode avancé, cela permet de choisir les plugins
			theme : "advanced", 
			// langue
			language : "fr", 
			// liste des plugins
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

			// les outils à afficher
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
			
			// emplacement de la toolbar
			theme_advanced_toolbar_location : "top",  
			// alignement de la toolbar
			theme_advanced_toolbar_align : "left",
			// positionnement de la barre de statut
			theme_advanced_statusbar_location : "bottom", 
			// permet de redimensionner la zone de texte
			theme_advanced_resizing : true,
			
			// chemin vers le fichier css
			content_css : " ./design-tiny.css,", 
			// taille disponible
			theme_advanced_font_sizes: "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,25px", 
			// couleur disponible dans la palette de couleur
			theme_advanced_text_colors : "33FFFF, 007fff, ff7f00", 
			// balise html disponible
			theme_advanced_blockformats : "h1, h2,h3,h4,h5,h6",
			// class disponible
			theme_advanced_styles : "Tableau=textTab;TableauSansCadre=textTabSansCadre;", 
			// possibilité de définir les class et leurs styles directement avec le code suivant
			/*
			style_formats : [
				{title : 'Bold text', inline : 'b'},
				{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
				{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
				{title : 'Example 1', inline : 'span', classes : 'example1'},
				{title : 'Example 2', inline : 'span', classes : 'example2'},
				{title : 'Table styles'},
				{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
			],
			*/
		});
	</script>

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
						if(isset($_GET['controler']) && ($_GET['controler'] == "admin" || $_GET['controler'] == "managecomments" || $_GET['controler'] == "createpost" || $_GET['controler'] == "modifypost"))
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
						if(isset($_GET['controler']) && ($_GET['controler'] == "admin" || $_GET['controler'] == "managecomments" || $_GET['controler'] == "createpost" || $_GET['controler'] == "modifypost"))
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