<!DOCTYPE html>
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
			</br></br>
			<form action = "turmaAdd.php" method = "POST" onsubmit = "return pavilhao();">
				<div class="panel panel-default jumbotron">	
					<div id="vpav"></div>
					<div class="input-group sizeMedio">
						<span class="input-group-addon sizePequeno"  id="sizing-addon2"> Nome Turma </span>
	  					<input type="text" class="form-control" id = "nome" name="nome" placeholder="Nome da Turma" aria-describedby="sizing-addon2">
	  				</div>
	  				<div class="input-group sizeMedio">
	  					<span class="input-group-addon sizePequeno" id="sizing-addon2">Nome Professor</span>
						<select size="1" class="form-control " name="siape" > ";
						<?php $stmt = $b ->busca("select * from professor");
						while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
						echo "<option value=".$rs -> siape_professor."> ".$rs -> nome_professor."</option>";		 
							}
						?>
						</select>
					
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
					<input type="submit" id = "bm" class="btn btn-default topElementos" value="Cadastrar" />
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>

<?php
	}
?>
