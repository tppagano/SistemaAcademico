<?php
	 
class Database {
	
	 private $pdo;

	function __construct(){
		try{
			// ALTERAR AQUI OS PARAMETROS DO BANCO
			$this -> pdo =  new PDO("mysql:host = localhost; dbname = salas","root","root");
			$this -> pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);		
			$stmt = $this -> pdo->prepare("use salas;");
			$this -> pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$stmt -> execute();		
		}catch(PDOException $e){
			echo $e->getMessage(), " opendatabase";
		}
	}
		
	function query($q){	
		try{	
			$stmt = $this -> pdo->prepare($q);
			$this -> pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$stmt -> execute();
		}catch(PDOException $e){
        	if ($e->errorInfo[1] == 1062){
            	echo"<script type='text/javascript'> alert('Esse E-mail já existe');</script>";
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index1.php'>";
        	}else echo "</br>".$e->getMessage()." query";
			die($e);
		}	
		$pdo = null;
	}
	
	function busca($q){
		try{	
			$stmt = $this -> pdo->prepare($q);
			$this -> pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$stmt -> execute();
			return $stmt;
		}catch(PDOException $e){
			echo "</br>".$e->getMessage()." query";
			die($e);
		}	
		$pdo = null;
	}
}
?>
