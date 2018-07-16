<?php

class Database{

	protected function Connect(){
		$db = new PDO('mysql:host=localhost;dbname=manga2;charset=utf8', 'root' , '');
		return $db;
	}

	public function Query($table, $condition = null, $total = null, $line = null){
		$db = $this->Connect();
		if(is_null($condition)){
			$info = $db->query('SELECT * FROM '.$table);
		}else{
			$info = $db->query('SELECT * FROM '.$table.' '.$condition);
		}
		if(!is_null($total)){
			$count = $info->rowCount();
			return $count;
		}
		if(!is_null($line)){
			$line = $info->fetch();
			return $line;
		}
		return $info;
	}

	public function Insert($action, $table, $colonne, $valuesnumber = null, $values, $lien, $condition = null){
		$db = $this->Connect();
		if($action === 'insert'){
			$insert = $db->prepare('INSERT INTO '.$table.'('.$colonne.') VALUES ('.$valuesnumber.')');
			$insert->execute($values);
		}elseif($action === 'update'){
			$updata = $db->prepare('UPDATE '.$table.' SET '.$colonne.' WHERE '.$condition);
			$update->execute($values);
		}
	}
}