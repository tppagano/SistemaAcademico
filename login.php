<?php
	if(isset($_POST["siape"])){

		include_once ("banco/banco.php");
		include_once ("seguranca.php");
		include_once ("controle_acesso.php");

		$b = new database();
		$c = new Controle_acesso();


		$siape = trim($_POST["siape"]);
		$senha = trim($_POST["senha"]);		
		
		$flag = false;
		$stmt = $b -> busca("select login,senha from usuario where login = '$siape' and senha = '$senha'");
		while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
			$flag = true;
			$c -> login($rs -> login);
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=home.php'>";
		}
		if(!$flag) include("error.html");
	}
?>