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
		$area = trim($_POST["area"]);
		// chamando a função query da classe banco para adicionar ao banco de dados
		$consulta = $b -> busca("select * from area where sigla_area='$area';");
		while($rs = $consulta->fetch(PDO::FETCH_OBJ)){ 
				$id_area=$rs -> id_area;
				$b -> query("INSERT INTO disciplina (nome_disciplina,cod_disciplina,carga_horaria_disciplina,id_area) VALUES ('$nome','$cod',$carga,$id_area)");
			break;
		}
		echo"<script type='text/javascript'> alert('Disciplina inserida com sucesso');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}else {
		echo"<script type='text/javascript'> alert('Desculpe, ocorreu um problema');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}
?>
