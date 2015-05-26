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
	<title>Alterando turma...</title>
</head>

<body>

<?php	
		$id_turma = trim($_POST["id_turma"]);
		$turma = trim($_POST["turma"]);
		$siape = trim($_POST["siape"]);
		$cod = trim($_POST["cod"]);
		$semestre = trim($_POST["semestre"]);

		//echo ('<h3>'.$nome_turma.' '.$disc.' '.$turma.' '.$siape.' '.$cod.' '.$semestre.' <h/3>');
		// chamando a função query da classe banco para adicionar ao banco de dados		
		$sql = "UPDATE turma SET nome_turma = '$turma',
				nome_semestre = '$semestre',
				siape_professor = '$siape',
				cod_disciplina = '$cod'
				WHERE id_turma= '$id_turma';";
		$b -> query($sql);
	
?>
<script>
	alert("Alterado com sucesso.");
	window.location = "interface_editar_turma.php";
</script> 
</body>
</html>

<?php
	}
?>
