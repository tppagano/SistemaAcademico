<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	else {
		include_once("banco/banco.php");
		$b = new Database();

?>


<?php

$op = trim($_POST["turma_op"]);
$t = trim($_POST["id_turma"]);

//echo ('<h3>'.$op.' '.$t.' '.$p. '</h3>');

	if($op == "Remover"){
		$b -> query("DELETE FROM turma WHERE id_turma='$t';");
		?>
			<script>
				alert("Concluído com sucesso!");
				window.location = "interface_editar_turma.php";
			</script>
		<?php


	}else if($op == "Editar") {
?>

	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "alter_turma.php" method = "POST" onsubmit = "return turma_alt();">
				<div class="panel panel-default jumbotron">	
					<div id="vturma1"></div>
					<div id="vturma2"></div>

					<?php
						echo '<input type="hidden" name="id_turma" value='.$t.' />';
					?>

					<div class="input-group sizeMedio">
						<span class="input-group-addon sizePequeno"  id="sizing-addon2"> Nome Turma </span>
	  					<input type="text" class="form-control" id = "turma" name="turma" placeholder="Nome da Turma" aria-describedby="sizing-addon2">
	  				</div>
	  				<div class="input-group sizeMedio">
	  					<span class="input-group-addon sizePequeno" id="ssizing-addon2">SIAPE Professor</span>
	  					<input type="text" class="form-control" id = "siape" name="siape" placeholder="SIAPE do Professor" aria-describedby="sizing-addon2">
					</div>	
					<div class="input-group sizeMedio">
						<span class="input-group-addon sizePequeno" id="sizing-addon2">Código Disciplina</span>
						<select size="1" class="form-control " name="cod" > ";
						<?php $stmt = $b ->busca("select * from disciplina");
							while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
							echo "<option value=".$rs -> cod_disciplina."> ".$rs -> cod_disciplina." - ".$rs -> nome_disciplina."</option>";		 
							}
						?>
						</select>	
					</div>
					<div class="input-group sizeMedio">
						<span class="input-group-addon sizePequeno" id="sizing-addon2"> Semestre</span>
						<select size="1" class="form-control " name="semestre" > ";
						<?php $stmt = $b ->busca("select * from semestre");
						while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
						echo "<option> ".$rs -> nome_semestre."</option>";		 
							}
						?>
						</select>					
					</div>
					<input type="submit" id = "bm" class="btn btn-default topElementos" value="Atualizar" />
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>

<?php
	}
?>	

</html>

<?php
	}
?>
