<?php
	

	
	if(isset($_POST["cod"])){

		// incluindo o arquivo do banco de dados
		include ("banco/banco.php");
		// instanciando a classe do banco
		$b = new database();
		// pegando o nome e tirando os espaços no inicio e no fim com a funcao "trim"
		$nome = trim($_POST["nome"]);
		$cod = trim($_POST["cod"]);
		$carga = trim($_POST["carga"]);
		$semestre = trim($_POST["semestre"]);
		// chamando a função query da classe banco para adicionar ao banco de dados
		$b -> query("INSERT INTO disciplina (nome,cod,carga_horaria,semestre) VALUES ('$nome','$cod',$carga,$semestre)");
		echo"<script type='text/javascript'> alert('Disciplina inserida com sucesso');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}else {
		echo"<script type='text/javascript'> alert('Desculpe, ocorreu um problema');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}
?>
