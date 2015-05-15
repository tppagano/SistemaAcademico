<?php
	

	
	if(isset($_POST["cod"])){

		// incluindo o arquivo do banco de dados
		include ("banco/banco.php");
		// instanciando a classe do banco
		$b = new database();
		// pegando o nome e tirando os espaços no inicio e no fim com a funcao "trim"
		$nome = trim($_POST["nome"]);
		$siape = trim($_POST["siape"]);
		$telefone = trim($_POST["telefone"]);
		$email = trim($_POST["email"]);
		// chamando a função query da classe banco para adicionar ao banco de dados
		$consulta = $b -> busca("select * from professor where siape='$siape';");
		while($rs = $consulta->fetch(PDO::FETCH_OBJ)){
			$b -> query("update professor set nome='$nome', siape='$siape', telefone='$telefone' where email='$email';");
			break;
		}
		$consulta = $b -> busca("select * from professor where siape='$siape';");
		if($rs = $consulta->fetch(PDO::FETCH_OBJ)){
			echo"<script type='text/javascript'> alert('Professor alterado com sucesso');</script>";
		}else{
			echo"<script type='text/javascript'> alert('Siape não encontrado');</script>";
		}
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}else {
		echo"<script type='text/javascript'> alert('Desculpe, ocorreu um problema');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}
?>
