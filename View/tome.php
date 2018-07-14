<?php
$nameManga = $info->Query('manga', 'WHERE ID = '.$_GET['id'], null, 'line');
?>
<h1>Les Tomes de <?= $nameManga['name'] ?></h1>
<?php
if(!isset($_GET['page'])){
	$numberpage = 1;
}else{
	$numberpage = intval($_GET['page']);
}
$start = $view->Paginage('start', 'tome', $numberpage, null, "WHERE manga = ".$_GET['id']);
$list = $info->Query('tome',"WHERE manga = ".$_GET['id']." ORDER BY ID LIMIT ".$start.", 10");
while($data = $list->fetch()){
	?>
	<div class="list">
		<?php if($data['quantite'] > 0){
			echo '<img src="Public/Image/'.$nameManga['name'].'/'.$data['picture'].'">';
		}else{
			echo '<img src="Public/Image/'.$nameManga['name'].'/'.$data['picture'].'" style="-webkit-filter: grayscale(100%); -webkit-filter: grayscale(100%);">';
		}
		?>
		<ul>
		<?php
		echo $view->ListCharact('N°', $data['name']);
		echo $view->ListCharact('Quantité', $data['quantite']);
		?>
		</ul>
	</div>
	<?php
}
$paginage = $view->Paginage('end', 'tome', $numberpage, 'index.php?action=tome&id='.$_GET['id'].'&page=', "WHERE manga = ".$_GET['id']);