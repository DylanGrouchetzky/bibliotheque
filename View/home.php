<h1>Les Mangas</h1>
<?php
if(!isset($_GET['page'])){
	$numberpage = 1;
}else{
	$numberpage = intval($_GET['page']);
}
$start = $view->Paginage('start', 'manga', $numberpage);
$list = $info->Query('manga',' ORDER BY name LIMIT '.$start.', 10');
while($data = $list->fetch()){
	?>
	<div class="list">
		<a href="index.php?action=tome&id=<?= $data['ID'] ?>">
			<img src="Public/Image/<?= $data['picture']; ?>">
		</a>
		<ul>
			<?php
			echo $view->ListCharact('Nom', $data['name']);
			$category = $info->Query('category','WHERE ID = '.$data['category'],null,true);
			echo $view->ListCharact('Categorie', $category['category']);
			$numberTome = $info->Query('tome','WHERE manga = '.$data['ID'],'total');
			echo $view->ListCharact('Nombe de tome', $numberTome);
			$numberTomePosseser = $info->Query('tome','WHERE manga = '.$data['ID'].' AND quantite = 1','total');
			echo $view->ListCharact('Nombre de tome possédé', $numberTomePosseser);
			?>
		</ul>
	</div>
	<?php
}
$paginage = $view->Paginage('end', 'manga', $numberpage);