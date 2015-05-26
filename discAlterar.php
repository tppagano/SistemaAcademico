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
		$area=trim($_POST["area"]);
		// verifica se realmente existe o código e a area informada
		$consulta = $b -> busca("select * from disciplina where cod_disciplina='$cod';");
		$consulta2 = $b -> busca("select * from area where sigla_area='$area';");
		while($rs = $consulta->fetch(PDO::FETCH_OBJ)){
			if($rs2 = $consulta2->fetch(PDO::FETCH_OBJ)){
			    $id_area=$rs2 -> id_area;
				$b -> query("update disciplina set nome_disciplina='$nome', carga_horaria_disciplina='$carga', id_area=$id_area where cod_disciplina='$cod';");
				break;
			}else{
				echo"<script type='text/javascript'> alert('A Área informada não existe');</script>";
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
			}
		}
		$consulta = $b -> busca("select * from disciplina where cod_disciplina='$cod';");
		if($rs = $consulta->fetch(PDO::FETCH_OBJ)){
			echo"<script type='text/javascript'> alert('Disciplina alterada com sucesso');</script>";
		}else{
			echo"<script type='text/javascript'> alert('Código da Disciplina não encontrado');</script>";
		}
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}else {
		echo"<script type='text/javascript'> alert('Desculpe, ocorreu um problema');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}
?>
