<?php

	include_once ("controle_acesso.php");
	$c = new Controle_acesso();
	if(isset($_POST["siape"]) && $c -> passou_pela_pagina_anterior("login")){

		include_once ("banco/banco.php");
		include_once ("seguranca.php");

		$b = new database();
		


		$siape = trim($_POST["siape"]);
		$senha = trim($_POST["senha"]);		
		
		$flag = false;
		$stmt = $b -> busca("select login,senha from usuario where login = '$siape' and senha = '$senha'");
		while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
			$flag = true;
			$c -> login($rs -> login);

			/** 
				Deleta a session, fazendo com que a pessoas não possa acessar outra vez 
				essa pagina
			*/
			$c -> destuir_passagen();
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=home.php'>";
		}
		if(!$flag) include("error.html");
	}echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
?>