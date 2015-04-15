<!DOCTYPE html>


<?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	else {

?>

<html>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "pav.php" method = "POST" onsubmit = "return pavilhao();">
				<div class="panel panel-default jumbotron">	
					<div id="vpav"></div>
					<div id="err"></div>
					<div class="input-group">
	  					<span class="input-group-addon" id="sizing-addon2">Pavilhao</span>
	  					<input type="text" class="form-control" id = "pav" name="pav" placeholder="Digite o nome para o pavilhao" aria-describedby="sizing-addon2">
					</div>
					<input type="submit" id = "bm" class="btn btn-default espacamento" value="Cadastrar" />
				</div>
				<?php if(isset($_POST["err"])) echo "<script> addsms(err,'Login ou senha incorretos'); </script>";?>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>

<?php
	}
?>