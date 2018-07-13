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

	public function List($table, $name){
		$nameList = $this->Query($table);
		while($data = $nameList->fetch()){
			echo '<li>'.$data[$name].'</li>';
		}
	}

	public function Paginage($tour, $table, $page){
		$mangaParPage = 10;
		$mangaTotal = $this->Query($table,null,'total');
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
					echo '<a href="index.php?page='.$i.'" class="paginage">'.$i.'</a>';
				}
			}
		}
	}
}