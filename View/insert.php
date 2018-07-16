<?php
if($_GET['in'] === 'tome'){
	?>
	<h1>Ajouté un tome</h1>
	<form method="post" style="text-align: center;">
		<select name="mangaID">
			<?php
			$list = $info->Query('manga',' ORDER BY name'); 
			while ($data = $list->fetch()){
				$view->Form($data['name'], 'select', null, null, $data['ID']);
			}
			?>
		</select>
		<?php
		$view->Form('Nom du tome', 'input', 'text', 'nameTome', null);
		$view->Form('Image', 'input', 'text', 'picture', null);
		$view->Form('Quantité', 'input', 'text', 'quantite', null);
		$view->Form(null, 'submit', null, null, 'Ajouté');
		?>
	</form>
	<?php
}
elseif($_GET['in'] === 'manga'){
	?>
	<h1>Ajouté un manga</h1>
	<form method="post" style="text-align: center;">
		<?php
		$view->Form('Nom du manga', 'input', 'text', 'nameManga', null);
		$view->Form('Image', 'input', 'text', 'pictureManga', null);
		$list = $info->Query('category', 'ORDER BY category');
		echo '<select name="nameCatagory">';
		while ($data = $list->fetch()){
			$view->Form($data['category'], 'select', null, null, $data['ID']);
		}
		echo '</select><br>';
		$view->Form(null, 'submit', null, null, 'Ajouté');
		?>
	</form>
	<?php
}
elseif($_GET['in'] === 'category'){
	?>
	<h1>Ajouté une catégorie</h1>
	<form method="post" style="text-align: center;">
	<?php
	$view->Form('Nouvelle catégorie', 'input', 'text', 'newCategory', null);
	$view->Form(null, 'submit', null, null, 'Ajouté');
	echo '</form>';
}