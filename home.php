<!DOCTYPE html>

<!-- Esse Pode e do modelo para todas as outras paginas, com isso já adiciona o Nav bar, rodape e tambem o <head> do html com todas
	as importações necessarias

	Pagina do bootstrap para ver os componentes existentes e usa -los 

									http://getbootstrap.com/components/
	
	La pode ser varios exemplos que podem ser usados! Eles permitem que customize via CSS também. 
	Criem seus css na pasta css! E cada pessoas crie seu css! Não esqueçam de importar eles no arquivo head.html.

-->
<?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	else {
		include_once("banco/banco.php");
		$b = new Database();

?>

<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>

			<div class="table espacamento">
				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading">Horario Turmas</div>
					<!-- Table -->
				  	<table class="table" BORDER RULES=all>
				  		<tr>
				  			<td><h4>Disciplina</h4></td>
				  			<td><h4>Codigo</h4></td>
				  			<td><h4>Turma</h4></td>
				  			<td><h4>Semestre</h4></td>
				  			<td><h4>Horário Inicial</h4></td>
				  			<td><h4>Horário Final</h4></td>
				  			<td><h4>Dia</h4></td>
				  			<td><h4>Carga Horaria</h4></td>
				  			<td><h4>Sala</h4></td>
				  			<td><h4>Pavilhão</h4></td>
				  			<td><h4>Professor</h4></td>
				  		<tr>
				    	<?php 
				    		$sql="
				    			SELECT t.nome_turma, t.nome_semestre, 
								   d.cod_disciplina, d.nome_disciplina, d.carga_horaria_disciplina, 
								   p.siape_professor,p.nome_professor, p.tel_professor,
								   a.nome_area, a.sigla_area,
								   s.numero_sala,
								   pv.nome_pavilhao,
							       ht.horario_inicial, ht.horario_final, ht.id_dia_semana, ds.nome_dia_semana
									   FROM turma t  
									   JOIN disciplina d ON t.cod_disciplina = d.cod_disciplina
									   JOIN professor p ON t.siape_professor = p.siape_professor
									   JOIN area a ON a.id_area = d.id_area
									   JOIN turma_sala ts ON ts.id_turma = t.id_turma
									   JOIN sala s ON s.id_sala = ts.id_sala
									   JOIN pavilhao pv ON pv.id_pavilhao = s.id_pavilhao
									   JOIN horario_turma ht ON ts.id_horario=ht.id_horario
									   JOIN dia_semana ds ON ds.id_dia_semana = ht.id_dia_semana
				    			";

	                            $stmt = $b ->busca($sql);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
	                                echo "<tr>";
	                                echo "<td>".$rs->nome_disciplina."</td>";
	                                echo "<td>".$rs->cod_disciplina."</td>";
	                                echo "<td>".$rs->nome_turma."</td>";
	                                echo "<td>".$rs->nome_semestre."</td>";
	                                echo "<td>".$rs->horario_inicial."</td>";
	                                echo "<td>".$rs->horario_final."</td>";
	                                echo "<td>".$rs->nome_dia_semana."</td>";
	                                //echo "<td>".date( 'H:i', strtotime( $rs->horario ) )."</td>";
	                                //echo "<td>".date( 'd', strtotime( $rs->data_horario_turma ) )."</td>";
	                                echo "<td><center>".$rs ->carga_horaria_disciplina."</center></td>";
	                                echo "<td>".$rs ->numero_sala."</td>";
	                                echo "<td>".$rs ->nome_pavilhao."</td>";
	                                echo "<td>".$rs ->nome_professor."</td>";
	                                echo "</tr>";
	                            }


				    	?>
				  	</table>
				</div>
			</div>	


		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>


<?php
	}
?>
