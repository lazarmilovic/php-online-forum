<?php 

class Model extends Connection {
	
	public function getUsers(){
		$sql= "SELECT * FROM users";
		$stmt=$this->connect()->query($sql);
		return $stmt;

	}
	public function getForums(){

	}
	public function getTopics(){

	}
	public function getComments(){

	}

	public function getUser(){

	}
	public function getForum(){

	}
	public function getTopic(){

	}
	public function getComment(){

	}
}

?>