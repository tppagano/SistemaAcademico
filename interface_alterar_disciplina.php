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
	<?php include("head.html");
	 ?>	
	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "discAlterar.php" method = "POST" onsubmit = "">
				<div class="panel panel-default jumbotron">	
					<div id="vpav"></div>
					<div class="input-group sizeMedio">  	
						<select size="1" class="form-control " name="cod" > ";
						<?php $stmt = $b ->busca("select * from disciplina");
						echo "<option value=-1> Selecione a disciplina que deseja modificar </option>";
						while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
						echo "<option value=".$rs -> cod_disciplina."> ".$rs -> cod_disciplina." - ".$rs -> nome_disciplina."</option>";		 
							}
						?>
						</select>
					</div>
					<div class="input-group sizeMedio">  	
	  					<span class="input-group-addon sizePequeno" id="sizing-addon2">Nova Área</span>
						<select size="1" class="form-control " name="area" > ";
						<?php $stmt = $b ->busca("select * from area");
						while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
						echo "<option> ".$rs -> sigla_area."</option>";		 
							}
						?>
						</select>
					</div>
					<div class="input-group sizeMedio">  
						<span class="input-group-addon sizePequeno"  id="sizing-addon2"> Novo Nome </span>
	  					<input type="text" class="form-control" id = "nome" name="nome" placeholder="Novo Nome da Disciplina" aria-describedby="sizing-addon2">
	  				</div>	
					<div class="input-group sizeMedio">
						<span class="input-group-addon sizePequeno" id="sizing-addon2">Nova Carga Horária</span>
	  					<input type="text" class="form-control" id = "carga" name="carga" placeholder="Nova Carga Horária" aria-describedby="sizing-addon2">
	  				</div>	
					<input type="submit" id = "bm" class="btn btn-default topElementos" value="Alterar Valores" />
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>

<?php
	}
?>
