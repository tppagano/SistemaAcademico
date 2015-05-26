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
			<form action = "disc.php" method = "POST" onsubmit = "">
				<div class="panel panel-default jumbotron">	
					<div id="vpav"></div>
					<div class="input-group sizeMedio">
						<span class="input-group-addon sizePequeno"  id="sizing-addon2"> Nome </span>
	  					<input type="text" class="form-control" id = "nome" name="nome" placeholder="Nome da Disciplina" aria-describedby="sizing-addon2">
	  				</div>
	  				<div class="input-group sizeMedio">
	  					<span class="input-group-addon sizePequeno" id="sizing-addon2">Código</span>
	  					<input type="text" class="form-control" id = "cod" name="cod" placeholder="Código da Disciplina" aria-describedby="sizing-addon2">
					</div>	
					<div class="input-group sizeMedio">	
						<span class="input-group-addon sizePequeno" id="sizing-addon2">Área</span>
	  					<select size="1" class="form-control " name="area" > ";
						<?php $stmt = $b ->busca("select * from area");
						while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
						echo "<option> ".$rs -> sigla_area."</option>";		 
							}
						?>
						</select>
					</div>
					<div class="input-group sizeMedio">
						<span class="input-group-addon sizePequeno" id="sizing-addon2"> Carga Horária</span>
	  					<input type="text" class="form-control" id = "carga" name="carga" placeholder="Carga Horária" aria-describedby="sizing-addon2">		
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
