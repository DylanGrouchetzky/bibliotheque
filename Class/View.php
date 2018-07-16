<?php

class View extends Database{

	public function ListCharact($name, $data){
		$charact = '<li><span class="souligner">'.$name.':</span> '.$data.'</li>';
		return $charact;
	}

	public function Chiffre($table, $condition = null){
		if(is_null($condition)){
			$number = $this->Query($table,null,'total');
			echo 'Nombre de '.$table.': '.$number.'<br>';
		}else{
			$number = $this->Query($table,$condition,'total');
			echo 'Nombre de '.$table.' possédé: '.$number.'<br>';
		}	
	}

	public function List($table, $name, $condition=null){
		$nameList = $this->Query($table, $condition);
		while($data = $nameList->fetch()){
			echo '<li>'.$data[$name].'</li>';
		}
	}

	public function Paginage($tour, $table, $page, $lien = null, $condition = null){
		$mangaParPage = 10;
		$mangaTotal = $this->Query($table,$condition,'total');
		$nombreDePage = ceil($mangaTotal/$mangaParPage);

		if(isset($page) AND $page>0){
			$pageActuelle = intval($page);
			if($pageActuelle>$nombreDePage){
				$pageActuelle = $nombreDePage;
			}
		}else{
			$pageActuelle = 1;
		}

		$premiereEntre = ($pageActuelle-1)*$mangaParPage;

		if($tour==='start'){
			return $premiereEntre;
		}elseif($tour==='end'){

			for($i=1;$i<=$nombreDePage;$i++){
				if($i===$pageActuelle){
					echo '<span class="active"> [ '.$i.' ] </span>';
				}else{
					echo '<a href="'.$lien.$i.'" class="paginage">'.$i.'</a>';
				}
			}
		}
	}

	public function Form($label = null, $typeForm, $type = null, $name = null, $value = null){
		if($typeForm === 'input'){
			echo '<p><label for="'.$name.'">'.$label.'</label><br>
			<input type="'.$type.'" name="'.$name.'" id="'.$name.'"></p>';
		}elseif($typeForm === 'select'){
			echo '<option value="'.$value.'">'.$label.'</option>';
		}elseif($typeForm === 'submit'){
			echo '<input type="submit" value="'.$value.'">';
		}

	}
}