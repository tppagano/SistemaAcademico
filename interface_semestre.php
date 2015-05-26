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
			<div class="panel panel-default jumbotron">
				<center>
				<h2>Semestre</h2><br>
				<a href="cadastra_semestre.php" ><button class="btn btn-default topElementos"> Cadastrar</button></a>&nbsp&nbsp
				<a href="busca_semestre.php" ><button class="btn btn-default topElementos"> Buscar</button></a>&nbsp&nbsp
				<a href="edita_semestre.php" ><button class="btn btn-default topElementos"> Editar</button></a>&nbsp&nbsp
				<a href="remove_semestre.php" ><button class="btn btn-default topElementos"> Remover</button></a>
				</center>
			</div>
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>


<?php
	}
?>
