<?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	else {
		include_once("banco/banco.php");
		$b = new Database();

?>

<?php

	if(isset($_POST["sala"])){
		// pegando o nome e tirando os espaços no inicio e no fim com a funcao "trim"
		$temp=0;
		$id_pav=0;
		$id_turma=0;
		$sala = trim($_POST["sala"]);
		$disciplina = trim($_POST["disciplina"]);
		$semestre = trim($_POST["semestre"]);
		$turma = trim($_POST["turma"]);
		$pav=trim($_POST["pav"]);
		$horario = $_POST["horario"];
		$dias = $_POST["dias"];
		
		
		$consulta = $b -> busca("select * from turma where nome_semestre='$semestre' and nome_turma='$turma' and cod_disciplina='$disciplina';");
		$consulta1 = $b -> busca("select * from pavilhao where nome_pavilhao='$pav';");
		//consulta a sala a partir do id do pavilhao
		if($rs1 = $consulta1->fetch(PDO::FETCH_OBJ)){
			$id_pav= $rs1 -> id_pavilhao;
			$consulta2 = $b -> busca("select * from sala where id_pavilhao='$id_pav' and numero_sala='$sala';");
		}
			// se existe a sala indicada
			if($rs2 = $consulta2->fetch(PDO::FETCH_OBJ)){ 
				//se existe a turma indicada
				if($rs = $consulta->fetch(PDO::FETCH_OBJ)){ 
					$id_sala=$rs2 -> id_sala;
					$id_turma=$rs -> id_turma;
					$consultaExistencia = $b -> busca("select * from turma_sala where id_turma=$id_turma and id_sala=$id_sala;");
					//só aloca a turma, se ela nunca foi alocada antes
					if(!$rsExistencia = $consultaExistencia->fetch(PDO::FETCH_OBJ)){
						$b -> query("INSERT INTO turma_sala (id_turma,id_sala) VALUES ($id_turma,$id_sala)");
						$consulta3 = $b -> busca("select * from turma_sala where id_turma=$id_turma and id_sala=$id_sala;");
						//verifica se a turma_sala foi criada e pega o id dela
						if($rs3 = $consulta3->fetch(PDO::FETCH_OBJ)){ 
							$id_turma_sala=$rs3 -> id_turma_sala;
							//loop para adicionar os dias e os horarios das aulas
							for($posicao = 0; $posicao < count($dias); $posicao++){
								$consulta4 = $b -> busca("select * from dia_semana where nome_dia_semana='$dias[$posicao]'");
								if($rs4 = $consulta4->fetch(PDO::FETCH_OBJ)){ 
									$id_dia_semana=$rs4 -> id_dia_semana;
									//formatar data
									if(strlen($horario[$posicao])>3){
									$hinicial=$horario[$posicao];
									}else{
									$hinicial=$horario[$posicao].":00:00";
									}
									if(strlen($horario[$posicao+1])>3){
									$hfinal=$horario[$posicao+1];
									}else{
									$hfinal=$horario[$posicao+1].":00:00";
									}
									
									
									$b -> query("INSERT INTO horario_turma (id_dia_semana,horario_inicial,horario_final,id_turma_sala) VALUES ($id_dia_semana,'$hinicial','$hfinal',$id_turma_sala)");			
								}
							}
						}
					}else{
						$temp=1;
						echo"<script type='text/javascript'> alert('Está turma já foi alocada');</script>";
						echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
					}
				}else{
					$temp=1;
					echo"<script type='text/javascript'> alert('Turma Não Existe');</script>";
					echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
				}
			}else{
				$temp=1;
				echo"<script type='text/javascript'> alert('Sala Não Existe');</script>";
				echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
			}
		if($temp==0){	
			echo"<script type='text/javascript'> alert('Turma alocada com sucesso');</script>";
			echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
		}
	}else {
		echo"<script type='text/javascript'> alert('Desculpe, ocorreu um problema');</script>";
		echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	}
?>

<?php
	}
?>
