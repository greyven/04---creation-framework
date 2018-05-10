<?php header("Content-type: text/css; charset: UTF-8"); ?>

/* Pour pouvoir utiliser une hauteur (height) ou une hauteur minimale
   (min-height) sur un bloc, il faut que son parent direct ait lui-même une
   hauteur déterminée (donc toute valeur de height sauf "auto": hauteur en
   pixels, em, autres unités...).
   Si la hauteur du parent est en pourcentage, elle se réfère alors à la
   hauteur du «grand-père», et ainsi de suite.
   Pour pouvoir utiliser un "min-height: 100%" sur div#global, il nous faut:
   - un parent (body) en "height: 100%";
   - le parent de body également en "height: 100%". */

html, body
{ height: 100%; }

body
{
	padding: none;
	color:#bfbfbf;
	background: black;
	font-family: 'Futura-Medium', 'Futura', 'Trebuchet MS', sans-serif;
}

header
{ display: block; }

footer
{ background-color: rgba(255,255,255,.85); }

h1
{ color: white; }

article.post
{
	background-color: rgba(255,255,255,.85);
}

.jumbotron
{
	height: 70px;
	background-color: rgba(255,255,255,.85);
	display: flex; /* contexte sur le parent */
  	flex-direction: column; /* direction d'affichage verticale */
  	justify-content: center; /* alignement vertical */
}

.blogTitle
{
	margin-top:  0px;
	margin-bottom: 0px;
	font-size: 40px;
}

.postTitle
{ margin-bottom: 0px; }
.postContent
{ background-color: rgba(0,50,200,.85); }
.postDate
{ background-color: rgba(0,0,200,.85); }

.horizontalAlignCenter
{ text-align: center; }

#global
{
	min-height: 100%; /* Voir commentaire sur html et body plus haut */
	width: 100%;
	text-align: justify;
}

#content
{ margin-bottom: 30px; }

#responsesTitle
{ font-size: 100%; }

#txtComment
{ width: 50%; }