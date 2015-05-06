<!DOCTYPE html>
<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "pav.php" method = "POST" onsubmit = "return pavilhao();">
				<div class="panel panel-default jumbotron">	
					<div id="vpav"></div>
					<div class="input-group">
	  					<span class="input-group-addon" id="sizing-addon2">Pavilhao</span>
	  					<input type="text" class="form-control" id = "pav" name="pav" placeholder="Digite o nome para o pavilhao" aria-describedby="sizing-addon2">
					</div>
					<input type="submit" id = "bm" class="btn btn-default topElementos" value="Cadastrar" />
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>