<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<title>Alterando semestre...</title>
</head>
<?php
	/*
	Da forma que o banco foi modelado, inserir e alterar o semestre são a mesma coisa.
	a modelagem do banco foi feita para que cada disciplina da tabela disciplina, tenha
	apenas um semestre. Dessa forma, a inserção de semestre depende de uma disciplina e
	não pode ser tratada independentemente.
	
	*/
?>
<script>
	window.location = "cadastra_semestre.php";
</script> 

</html>