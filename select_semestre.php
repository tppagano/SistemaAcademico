<!DOCTYPE html>
<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<div id="busca" class="panel panel-default jumbotron">
			<center>
			<table>
			<tr>
			<td><h4>Código</h4></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><h4>Disciplinas</h4></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><h4>Semestre</h4></td>
			</tr>
					<?php
					// incluindo o arquivo do banco de dados
					include ("banco/banco.php");
					// instanciando a classe do banco
					$b = new database();
					$semestre = trim($_POST["semestre"]);
					// chamando a função query da classe banco para adicionar ao banco de dados
					$rs = $b -> busca("SELECT * FROM disciplina WHERE semestre = '$semestre';");
					while($row = $rs->fetch(PDO::FETCH_OBJ))
					{
						echo("<tr><td>".$row->cod."</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row->nome."</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row->semestre."</td></tr>");
					}
					?>
			</table>
			<input type="button" class="btn btn-default topElementos" value="Voltar" onclick="location.href='interface_semestre.php'"/>
			</center>
			</div>
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>
