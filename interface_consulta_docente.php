<!DOCTYPE html>

<?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	else {	    
	     $c -> pagina_anterior("docente");

?>

<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "interface_consulta_docente_result.php" method = "POST" onsubmit = "return pavilhao();">
				<div class="panel panel-default jumbotron">	
					<div id="vpav"></div>
					<div class="input-group">  
						<span class="input-group-addon"  id="sizing-addon2"> Nome </span>
	  					<input type="text" class="form-control" id = "nome" name="nome" placeholder="Digite o Nome do Docente" aria-describedby="sizing-addon2">
	  				<!--	<span class="input-group-addon" id="sizing-addon2">Siape</span> --> 
	  				<!--	<input type="text" class="form-control" id = "siape" name="siape" placeholder="Digite o Siape do professor" aria-describedby="sizing-addon2"> -->
					<!--	<span class="input-group-addon" id="sizing-addon2">Telefone</span>  -->
	  				<!--	<input type="text" class="form-control" id = "telefone" name="telefone" placeholder="Digite o telefone do professor" aria-describedby="sizing-addon2">  -->
	  				<!--	<span class="input-group-addon" id="sizing-addon2">Email</span>  -->
	  				<!--	<input type="text" class="form-control" id = "email" name="email" placeholder="Digite o email do professor" aria-describedby="sizing-addon2">  -->
					</div>
					<input type="submit" id = "bm" class="btn btn-default topElementos" value="Buscar" />
				</div>
			</form>	
			

			
			<!---->
			
			
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>


<?php
	}
?>
