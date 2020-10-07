<?php class Connection {

	private $host= 'localhost';
	private $dbname= 'forum';
	private $charset= 'utf8mb4';
	private $user='root';
	private $pass= '';

	protected function connect (){
		$dsn= "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";

			try {
					$pdo= new pdo ($dsn,$this->user,$this->pass); 
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false );
					$pdo->setattribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
					return $pdo;
				}
			 catch (Exception $e) {
					echo 'Error: '.$e->getMessage();
			}

		

	}
}

?>