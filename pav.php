<?php
	

	/** 
		LEMBRAR DE MUDAR OS PARAMETROS DO BANCO DE DADOS, USER E SENHA.
	*/

	/** Confere se foi passado a varialve com id "pav" se existir ele ira adicionar no banco! 
		Caso não existe ele ira redirecionar para a pagina principal!
		
		Aqui anda existe uma mudança a se fazer que e uma forma de retornar para a pagina de casdastro para 
		mostrar uma mensagem de que foi adicionado com sucesso. Deve fazer isso ate hoje de noite

	*/
	include_once ("controle_acesso.php");
	$c = new Controle_acesso();
	if(isset($_POST["pav"]) && $c -> passou_pela_pagina_anterior("pav")){

		// incluindo o arquivo do banco de dados
		include_once ("banco/banco.php");
		// instanciando a classe do banco
		$b = new database();
		// pegando o nome e tirando os espaços no inicio e no fim com a funcao "trim"
		$nome = trim($_POST["pav"]);
		// chamando a função query da classe banco para adicionar ao banco de dados
		$b -> query("INSERT INTO pavilhao (nome_pavilhao) VALUES ('$nome')");
		
		/** 
				Deleta a session, fazendo com que a pessoas não possa acessar outra vez 
				essa pagina
		*/
		$c -> destuir_passagen();

		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = interface_pavilhao.php'>";
		echo "<script>alert('Pavilhao adicionado com sucesso')</script>";
	}else echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
?>|