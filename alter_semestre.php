<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	else {
		include_once("banco/banco.php");
		$b = new Database();

?>

<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>Alterando semestre...</title>
</head>

<body>

<?php	
		// instanciando a classe do banco
		// pegando o nome e tirando os espaços no inicio e no fim com a funcao "trim"
		$semestre = trim($_POST["sem_alt"]);
		$new_semestre = trim($_POST["sem_alt_new"]);
		// chamando a função query da classe banco para adicionar ao banco de dados		
		$b -> query("UPDATE semestre SET nome_semestre = '$new_semestre' WHERE nome_semestre= '$semestre';");
	
?>
<script>
	alert("Alterado com sucesso.");
	window.location = "interface_semestre.php";
</script> 
</body>
</html>

<?php
	}
?>
