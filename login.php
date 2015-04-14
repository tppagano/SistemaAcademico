<?php
	if(isset($_POST["siape"])){

		include ("banco/banco.php");
		$b = new database();

		$siape = trim($_POST["siape"]);
		$senha = trim($_POST["senha"]);		
		$flag = false;
		$stmt = $b -> busca("select login,senha from usuario where login = '$siape' and senha = '$senha'");
		while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
			$flag = true;
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=home.php'>";
		}
		if(!$flag) include("error.html");
	}
?>
