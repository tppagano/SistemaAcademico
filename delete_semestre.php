<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>Removendo semestre...</title>
</head>

<body>


<?php
	
		// incluindo o arquivo do banco de dados
		include ("banco/banco.php");

		// instanciando a classe do banco
		$b = new database();
		// pegando o nome e tirando os espaços no inicio e no fim com a funcao "trim"
		$semestre = trim($_POST["semestre"]);
		// chamando a função query da classe banco para adicionar ao banco de dados
		$b -> query("UPDATE disciplina SET semestre = NULL WHERE semestre= '$semestre';");
	
?>
<script>
	alert("Removido com sucesso.");
	window.location = "interface_semestre.php";
</script> 
</body>
</html>