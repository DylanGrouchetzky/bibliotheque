<?php

require ('class/autoloader.php');
Autoloader::register();
$info = new Database();
$view = new View();

ob_start();
if(isset($_GET['action'])){
	if($_GET['action'] === 'tome'){
		require('View/tome.php');
	}
}else{
	require ('View/home.php');
}
$content = ob_get_clean();
require ('View/Templates/default.php');

?>