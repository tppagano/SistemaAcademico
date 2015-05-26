
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

<script type="text/javascript">
function validaCampo()
{
	if(document.terminalidade.nome.value=="")
	{
		alert("Digite um nome!");
		return false;
	}

	else
	{
		return true;
	}
		
}

function validaCampo2()
{
	
	if(document.editar.n_Nome.value=="")
	{
		alert("Digite um nome!");
		return false;
	}
	else
	{	
		return true;
	}
}
</script>


<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			
			<form id="pav" name="cadastro" method="post" action="remover.php" >
				<div class="panel panel-default jumbotron">	

					<table width="625" border="0" align="center">
							<tr>
								<td width="69">Excluir:</td>
							</tr>
							<tr>					
								<td width="200">
								<select name="terminalidade" id="terminalidade">
										
									<?php

										$sql = "select nome_categoria_sala from categoria_sala";
										$stmt = $b ->busca($sql);
										
										while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
											echo "<option>" . $rs -> nome_categoria_sala . "</option>";	
										}
									?>
								</select>
							</td>
							<td colspan="2"><p>
								<input  name="Excluir" type="submit"  id="Excluir" class="btn btn-default topElementos" value="Excluir" />
							</td>
							</tr>
					</table>
					</div>
		</form>
		
		<form id="pav" name="terminalidade" method="post" action="inserir.php" onsubmit="return validaCampo(); return false;">
			<div class="panel panel-default jumbotron">	  	
				<table width="625" border="0" align="center">
					<tr>
						<td width="69">Adicionar:</td>
					</tr>	

					<tr>
						<td width="546"><input name="nome" type="text" id="nome" size="70" maxlength="60" />
					</tr>

					<tr>    	
					<td colspan="1"><p>
						<input  name="adicionar"type="submit"  id="adicionar" class="btn btn-default topElementos"value="Adicionar" />
					</tr>
				
				</table>
			</div>
		</form>
					
		<form id="pav" name="editar" method="post" action="alterar.php"  onsubmit="return validaCampo2(); return false;">
			<div class="panel panel-default jumbotron">	  		
				<table width="625" border="0" align="center">
					<tr>
						<td width="69">Editar:</td>
					</tr>
					<tr>	
						<td>
						<select name="nomeTerm" id="nomeTerm">
						
						<?php
							
							$sql = "select nome_categoria_sala from categoria_sala;";
							$stmt = $b ->busca($sql);
							while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
								  echo "<option>" . $rs -> nome_categoria_sala . "</option>";	
							}
						?>	
						</select>
						<td width="54"><input name="n_Nome" type="text" id="n_Nome" size="40" maxlength="40" />
					</tr>
					<tr>
						<td colspan="1"><p>
						<input  name="adicionar"type="submit"  id="adicionar" class="btn btn-default topElementos"value="Alterar" />
					</tr>
				</table>
			</div>	
		</form>					
			
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>

<?php } ?>
