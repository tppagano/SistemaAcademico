<?php
	

	
	if(isset($_POST["cod"])){

		// incluindo o arquivo do banco de dados
		include ("banco/banco.php");
		// instanciando a classe do banco
		$b = new database();
		// pegando o nome e tirando os espaços no inicio e no fim com a funcao "trim"
		$cod = trim($_POST["cod"]);
		// chamando a função query da classe banco para adicionar ao banco de dados
		
		$consulta = $b -> busca("select * from disciplina where cod_disciplina='$cod';");
		if($rs = $consulta->fetch(PDO::FETCH_OBJ)){
			$b -> query("delete from disciplina where cod_disciplina='$cod';");
			echo"<script type='text/javascript'> alert('Disciplina removida com sucesso');</script>";
		}else{
			echo"<script type='text/javascript'> alert('Código da Disciplina não encontrado');</script>";
		}
		
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}else {
		echo"<script type='text/javascript'> alert('Desculpe, ocorreu um problema');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}
?>
