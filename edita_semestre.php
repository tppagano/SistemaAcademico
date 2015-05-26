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
			<form action = "alter_semestre.php" method = "POST" onsubmit = "return semestre_alt();">
				<div class="panel panel-default jumbotron">
				<center>	
					<div id="vsem1"></div>
					<div id="vsem2"></div>
					
					<h4>Escolha um semestre para editar</h4>
					<select id="sem_alt" name="sem_alt">
					<option>Selecione...</option>
					<?php
					// instanciando a classe do banco
					//$b = new database();
					// chamando a função query da classe banco para adicionar ao banco de dados
					$rs = $b -> busca("SELECT nome_semestre FROM semestre;");
					while($row = $rs->fetch(PDO::FETCH_OBJ))
					{
						if($row->nome_semestre != null) {
							echo "<option value=".$row->nome_semestre.">".$row->nome_semestre. "</option>";
						}
					}
					?>
	        		</select><br><br>
					<div class="input-group">
	  					<span class="input-group-addon" id="sizing-addon2">Novo Semestre</span>
	  					<input type="text" class="form-control" id = "sem_alt_new" name="sem_alt_new" placeholder="Digite o novo semestre" aria-describedby="sizing-addon2">
					</div>
	        		<input type="submit" id = "bm" class="btn btn-default topElementos" value="Atualizar" />&nbsp&nbsp&nbsp
					<input type="button" class="btn btn-default topElementos" value="Voltar" onclick="location.href='interface_semestre.php'"/>
					</center>
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>

<?php
	}
?>
