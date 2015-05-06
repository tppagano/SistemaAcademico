<?php
	

	/** 
		LEMBRAR DE MUDAR OS PARAMETROS DO BANCO DE DADOS, USER E SENHA.
	*/

	/** Confere se foi passado a varialve com id "pav" se existir ele ira adicionar no banco! 
		Caso não existe ele ira redirecionar para a pagina principal!
		
		Aqui anda existe uma mudança a se fazer que e uma forma de retornar para a pagina de casdastro para 
		mostrar uma mensagem de que foi adicionado com sucesso. Deve fazer isso ate hoje de noite
	*/
	if(isset($_POST["pav"])){

		// incluindo o arquivo do banco de dados
		include ("banco/banco.php");
		// instanciando a classe do banco
		$b = new database();
		// pegando o nome e tirando os espaços no inicio e no fim com a funcao "trim"
		$nome = trim($_POST["pav"]);
		// chamando a função query da classe banco para adicionar ao banco de dados
		$b -> query("INSERT INTO pavilhao (nome) VALUES ('$nome')");
	}else echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index1.php'>";
?>