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
			<form action = "edita_turma.php" method = "POST" >
				<div class="panel panel-default">
					<div class="panel-heading">Horario Turmas</div>
					<!-- Table -->
				  	<table class="table"">
				  		<tr>
				  			<td><h4>Disciplina</h4></td>
				  			<td><h4>Codigo</h4></td>
				  			<td><h4>Turma</h4></td>
				  			<td><h4>Semestre</h4></td>
				  			<td><h4>Professor</h4></td>
				  			<td><h4>Editar</h4></td>
				  			<td><h4>Remover</h4></td>
				  		<tr>
				    	<?php 
				    		$sql="
				    			SELECT t.nome_turma, t.nome_semestre, 
								d.cod_disciplina, d.nome_disciplina,
								p.nome_professor, p.siape_professor,
								t.id_turma
								FROM turma t  
								JOIN disciplina d ON t.cod_disciplina = d.cod_disciplina
								JOIN professor p ON t.siape_professor = p.siape_professor
				    			";

	                            $stmt = $b ->busca($sql);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
	                                echo '<tr> <form action = "edita_turma.php" method = "POST" > ';
	                                echo "<td>".$rs->nome_disciplina."</td>";
	                                echo "<td>".$rs->cod_disciplina."</td>";
	                                echo "<td>".$rs->nome_turma."</td>";
	                                echo "<td>".$rs->nome_semestre."</td>";
	                                echo "<td>".$rs->nome_professor."</td>";
	                                echo '<td><input type="hidden" name="id_turma" value='.$rs->id_turma.' />';
									echo '<input type="submit" name = "turma_op" value="Editar" /></td>';
									echo '<td><input type="hidden" name="id_turma" value='.$rs->id_turma.' />';
									echo '<input type="submit" name = "turma_op" value="Remover" /></td>';
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
