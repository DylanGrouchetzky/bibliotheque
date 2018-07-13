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
}