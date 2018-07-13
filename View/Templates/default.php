<!DOCTYPE html>
<html>
<head>
	<title>Bibliothéque</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Public/Css/style.css">
</head>
<body>
	<header>
		<ul>
			<li><a href="index.php">Acceuil</a></li>
			<li><a href="">Ajouter un Tome</a></li>
			<li><a href="">Ajouter un Manga</a></li>
			<li><a href="">Ajouter une Catégorie</a></li>
			<li><a href="">Modifier</a></li>
		</ul>
	</header>
	<section>
		<div id="left">
			<h1>Chiffrages</h1>
			<?php 
			$chiffre = $view->Chiffre('manga'); 
			$chiffre = $view->Chiffre('tome');
			$chiffre = $view->Chiffre('tome','WHERE quantite = 1');
			?>
			<br>
			<h1>Les Genres</h1>
			<ul id="category">
				<?php
				$category = $view->List('category', 'category');
				 ?>
			</ul>
		</div>
		<div id="right">
			<?= $content; ?>
		</div>
	</section>
</body>
</html>