<!DOCTYPE html>
<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "discAlterar.php" method = "POST" onsubmit = "return pavilhao();">
				<div class="panel panel-default jumbotron">	
					<div id="vpav"></div>
					<div class="input-group">  
						<span class="input-group-addon"  id="sizing-addon2"> Nome </span>
	  					<input type="text" class="form-control" id = "nome" name="nome" placeholder="Digite o Nome da Disciplina" aria-describedby="sizing-addon2">
	  					<span class="input-group-addon" id="sizing-addon2">Código</span>
	  					<input type="text" class="form-control" id = "cod" name="cod" placeholder="Digite o Código da Disciplina" aria-describedby="sizing-addon2">
						<span class="input-group-addon" id="sizing-addon2">Semestre</span>
	  					<input type="text" class="form-control" id = "semestre" name="semestre" placeholder="Digite o Semestre da Disciplina" aria-describedby="sizing-addon2">
					</div>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2"> Carga Horária</span>
	  					<input type="text" class="form-control" id = "carga" name="carga" placeholder="Digite a Carga Horária" aria-describedby="sizing-addon2">
					
					</div>
					<input type="submit" id = "bm" class="btn btn-default topElementos" value="Alterar Valores" />
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>
