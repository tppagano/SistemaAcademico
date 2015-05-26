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
			<form action = "delete_semestre.php" method = "POST" onsubmit = "return semestre_rm();">
				<div class="panel panel-default jumbotron">
				<center>	
					<div id="vsem"></div>
					
					<h4>Escolha um semestre para remover</h4>
					<select id="sem_rm" name="sem_rm">
					<option>Selecione...</option>
					<option>Todos</option>
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

	        		<input type="submit" id = "bm" class="btn btn-default topElementos" value="Remover" />&nbsp&nbsp&nbsp
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
