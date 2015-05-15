<!DOCTYPE html>
<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "select_semestre.php" method = "POST" onsubmit = "return semestre();">
				<div class="panel panel-default jumbotron">
				<center>	
					<div id="vsem"></div>
					<div id="vdisciplina">
					<h4>Escolha um semestre</h4>
					<select id="semestre" name="semestre">
					<option>Selecione...</option>
					<?php
					// incluindo o arquivo do banco de dados
					include ("banco/banco.php");
					// instanciando a classe do banco
					$b = new database();
					// chamando a função query da classe banco para adicionar ao banco de dados
					$rs = $b -> busca("SELECT DISTINCT semestre FROM disciplina;");
					while($row = $rs->fetch(PDO::FETCH_OBJ))
					{
						if($row->semestre != null) {
							echo "<option value=".$row->semestre .">".$row->semestre. "</option>";
						}
					}
					?>
	        		</select><br><br>
	        		</div>
	        		<input type="submit" id = "bm" class="btn btn-default topElementos" value="Buscar" />&nbsp&nbsp&nbsp
					<input type="button" class="btn btn-default topElementos" value="Voltar" onclick="location.href='interface_semestre.php'"/>
					</center>
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>
