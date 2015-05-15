<!DOCTYPE html>
<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "insert_semestre.php" method = "POST" onsubmit = "return semestre();">
				<div class="panel panel-default jumbotron">	
					<div id="vsem"></div>
					<div id="vdisciplina">
					<h5>Escolha um disciplina</h5>
					<select id="disciplina" name="disciplina">
					<option>Selecione...</option>
					<?php
					// incluindo o arquivo do banco de dados
					include ("banco/banco.php");
					// instanciando a classe do banco
					$b = new database();
					// chamando a função query da classe banco para adicionar ao banco de dados
					$rs = $b -> busca("select * from disciplina;");
					while($row = $rs->fetch(PDO::FETCH_OBJ))
					{
						echo "<option value=" . $row->cod.  ">" . $row->nome . "</option>";
					}
					?>
	        		</select><br><br>
	        		</div>
					<div class="input-group">
	  					<span class="input-group-addon" id="sizing-addon2">Semestre</span>
	  					<input type="text" class="form-control" id = "sem" name="sem" placeholder="Digite o novo semestre" aria-describedby="sizing-addon2">
					</div>
					<input type="submit" id = "bm" class="btn btn-default topElementos" value="Cadastrar" />&nbsp&nbsp&nbsp
					<input type="button" class="btn btn-default topElementos" value="Voltar" onclick="location.href='interface_semestre.php'"/>
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>
