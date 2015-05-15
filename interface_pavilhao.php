<!DOCTYPE html>


<?php
	
	include_once("controle_acesso.php");
	$c = new controle_acesso();
	if(!($c -> esta_logado())) echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL = index.php'>";
	else {
		$c -> pagina_anterior("pav");
		include_once("banco/banco.php"); 
        $b = new Database();
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
			</form>	


			<form action = "pavEdit.php" method = "POST" onsubmit = "return pavilhao2();">
				<div class="panel panel-default jumbotron">	
					<div id="vpvCE"></div>
					<div id="vpvE2"></div>
					<div id="err"></div>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">Pavilhao</span>
	  					<select class="form-control" id="pvCE" name = "pvCE">
                        	<option>Selecione</option>
	                        <?php
	                            
	                            $sql="SELECT id_pavilhao, nome_pavilhao FROM pavilhao ORDER BY nome_pavilhao";
	                            $stmt = $b ->busca($sql);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
	                                echo "<option>".$rs -> nome_pavilhao."</option>";
	                            }
	                       	?>
                    	</select>
					</div>
					
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">Pavilhao</span>
	  					<input type="text" class="form-control" id = "pvE2" name="pvE2" placeholder="Digite o nome para o pavilhao" aria-describedby="sizing-addon2">
					</div>
					
					<input type="submit" id = "bm" class="btn btn-default espacamento" value="Editar" />
				</div>
			</form>	

			<form action = "pavDel.php" method = "POST" onsubmit = "return pavilhao3();">
				<div class="panel panel-default jumbotron">	
					<div id="vpdel"></div>
					<div id="err"></div>
					<div class="input-group">
						<span class="input-group-addon" id="sizing-addon2">Pavilhao</span>
	  					<select class="form-control" id="pdel" name = "pdel">
                        	<option>Selecione</option>
	                        <?php
	                            
	                            $sql="SELECT id_pavilhao, nome_pavilhao FROM pavilhao ORDER BY nome_pavilhao";
	                            $stmt = $b ->busca($sql);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
	                                echo "<option>".$rs -> nome_pavilhao."</option>";
	                            }
	                       	?>
                    	</select>
					</div>
					
					<input type="submit" id = "bm" class="btn btn-default espacamento" value="Excluir" />
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>

<?php
	}
?>