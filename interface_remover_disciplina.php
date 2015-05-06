<!DOCTYPE html>
<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "discRemover.php" method = "POST" onsubmit = "return pavilhao();">
				<div class="panel panel-default jumbotron">	
					<div id="vpav"></div>
					<div class="input-group">
						
	  					<span class="input-group-addon" id="sizing-addon2">Código</span>
	  					<input type="text" class="form-control" id = "cod" name="cod" placeholder="Digite o Código da Disciplina" aria-describedby="sizing-addon2">
					</div>
					<div class="input-group">
					<input type="submit" id = "bm" class="btn btn-default topElementos" value="Remover" />
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>
