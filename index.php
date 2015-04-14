<!DOCTYPE html>



<html>
	<?php include("head.html"); ?>	
	<body>
		<div class="panel-default">
			<div class = "divCenter">
				<form action="login.php" method="post" onsubmit="return verifica()">
					<center><img src="img/logoUFRB.jpg"  width="130px" height="130px"></center><br>
					<div id="alertas"></div>
					<div id="err"></div>
	    			<input type="text" class="form-control" placeholder="SIAPE" aria-describedby="basic-addon1" id="siape" name="siape"><br>
	    			<input type="password" class="form-control" placeholder="Senha" aria-describedby="basic-addon1" id="senha" name="senha"><br>
	 				<center><button type="submit" class="btn" id="acao" name="acao" value="logar">Entrar</button></center>
				</form>
			</div>	
			<?php if(isset($_POST["err"])) echo "<script> addsms(err,'Login ou senha incorretos'); </script>";?>
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>

