<!DOCTYPE html>
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
			<form action = "edita_aloca_turma.php" method = "POST" >
				<div class="panel panel-default">
					<div class="panel-heading">Horario Turmas</div>
					<!-- Table -->
				  	<table class="table"">
				  		<tr>
				  			<td><h4>Disciplina</h4></td>
				  			<td><h4>Código</h4></td>
				  			<td><h4>Turma</h4></td>
				  			<td><h4>Semestre</h4></td>
				  			<td><h4>Pavilhão</h4></td>
				  			<td><h4>Sala</h4></td>
				  			<td><h4>Dia</h4></td>
				  			<td><h4>Início</h4></td>
				  			<td><h4>Fim</h4></td>
				  			<!--<td><h4>Editar</h4></td>-->
				  			<td><h4>Remover</h4></td>
				  		<tr>
				    	<?php 
				    		$sql="
				    			SELECT t.nome_turma, t.nome_semestre, 
								d.cod_disciplina, d.nome_disciplina,
								pav.nome_pavilhao, s.numero_sala,
								ht.horario_inicial, ht.horario_final,
								dia.nome_dia_semana,
								ts.id_turma_sala, ht.id_horario_turma
								FROM turma t  
								JOIN disciplina d ON t.cod_disciplina = d.cod_disciplina
								JOIN turma_sala ts ON t.id_turma = ts.id_turma
								JOIN sala s ON ts.id_sala = s.id_sala
								JOIN pavilhao pav ON s.id_pavilhao = pav.id_pavilhao
								JOIN horario_turma ht ON ht.id_turma_sala = ts.id_turma_sala
								JOIN dia_semana dia ON ht.id_dia_semana = dia.id_dia_semana
				    			";

	                            $stmt = $b ->busca($sql);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
	                                echo '<tr> <form action = "edita_aloca_turma.php" method = "POST" > ';
	                                echo "<td>".$rs->nome_disciplina."</td>";
	                                echo "<td>".$rs->cod_disciplina."</td>";
	                                echo "<td>".$rs->nome_turma."</td>";
	                                echo "<td>".$rs->nome_semestre."</td>";
	                                echo "<td>".$rs->nome_pavilhao."</td>";
	                                echo "<td>".$rs->numero_sala."</td>";
	                                echo "<td>".$rs->nome_dia_semana."</td>";
	                                echo "<td>".$rs->horario_inicial."</td>";
	                                echo "<td>".$rs->horario_final."</td>";
	                                //echo '<td><input type="hidden" name="ts" value='.$rs->id_turma_sala.' />';
	                                //echo '<input type="hidden" name="ht" value='.$rs->id_horario_turma.' />';
									//echo '<input type="submit" name = "op" value="Editar" /></td>';
	                                echo '<td><input type="hidden" name="ts" value='.$rs->id_turma_sala.' />';
	                                echo '<input type="hidden" name="ht" value='.$rs->id_horario_turma.' />';
									echo '<input type="submit" name = "op" value="Remover" /></td>';
	                                echo "</form></tr>";
	                            }

				    	?>
				  	</table>
				</div>
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>


<?php
	}
?>
