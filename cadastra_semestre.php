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
			<form action = "insert_semestre.php" method = "POST" onsubmit = "return semestre();">
				<div class="panel panel-default jumbotron">	
					<div id="vsem"></div>
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

<?php
	}
?>
