<?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	else {
		include_once("banco/banco.php");
		$b = new Database();

?>

<?php
	

	
	if(isset($_POST["cod"])){

		// pegando o nome e tirando os espaços no inicio e no fim com a funcao "trim"
		$nome = trim($_POST["nome"]);
		$siape = trim($_POST["siape"]);
		$semestre = trim($_POST["semestre"]);
		$cod = trim($_POST["cod"]);
		// verifica a integridade, ou seja, se existe o semestre, professor e area.
		$consulta = $b -> busca("select * from semestre where nome_semestre='$semestre';");
		$consulta2 = $b -> busca("select * from professor where siape_professor='$siape';");
		$consulta3 = $b -> busca("select * from disciplina where cod_disciplina='$cod';");
		$temp=0;
		// se a disciplina realmente existir	
		if($rs3 = $consulta3->fetch(PDO::FETCH_OBJ)){ 
			// se o professor realmente existir	
			if($rs2 = $consulta2->fetch(PDO::FETCH_OBJ)){ 
				// se o semestre existir
				if($rs = $consulta->fetch(PDO::FETCH_OBJ)){ 
					//add a turma
					$b -> query("INSERT INTO turma (nome_turma,nome_semestre,siape_professor,cod_disciplina) VALUES ('$nome','$semestre','$siape','$cod')");		
				}else{
					$temp=1;
				}
			}else{
				$tem=2;
			}
		}else{
			echo"<script type='text/javascript'> alert('Código da Disciplina Incorreto');</script>";
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
		}
		echo"<script type='text/javascript'> alert('Turma inserida com sucesso');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}else {
		echo"<script type='text/javascript'> alert('Desculpe, ocorreu um problema');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}
?>

<?php
	}
?>
