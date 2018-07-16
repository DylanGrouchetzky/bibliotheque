<?php

require ('class/autoloader.php');
Autoloader::register();
$info = new Database();
$view = new View();

if(!empty($_POST['nameTome'])){
	$nameTome = $_POST['nameTome'];
	$mangaID = $_POST['mangaID'];
	if(empty($_POST['picture'])){
		$picture = ' ';
	}
	if(empty($_POST['quantite'])){
		$quantite = '0';
	}
	$info->Insert('insert', 'tome', 'name, manga, picture, quantite', '?,?,?,?', array($nameTome, $mangaID, $picture, $quantite), 'index.php?action=tome&id='.$_POST['mangaID']);
}
if(!empty($_POST['nameManga'])){
	if(empty($_POST['pictureManga'])){
		$pictureManga = ' ';
	}else{
		$pictureManga = $_POST['pictureManga'];
	}
	$nameManga = $_POST['nameManga'];
	$nameCatagory = $_POST['nameCatagory'];
	$info->Insert('insert', 'manga', 'name, picture, category', '?,?,?', array($nameManga, $pictureManga, $nameCatagory), 'index.php');
}
if(!empty($_POST['newCategory'])){
	$newCategory = $_POST['newCategory'];
	$info->Insert('insert', 'category', 'category', '?', array($newCategory), 'index.php');
}

ob_start();
if(isset($_GET['action'])){
	if($_GET['action'] === 'tome'){
		require('View/tome.php');
	}elseif($_GET['action'] === 'insert'){
		require('View/insert.php');
	}
}else{
	require ('View/home.php');
}
$content = ob_get_clean();
require ('View/Templates/default.php');

?>