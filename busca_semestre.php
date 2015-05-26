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
			<div class="panel panel-default">
					<div class="panel-heading">Semestre</div>
					<center>
				  	<table class="table" BORDER RULES=all>
				  		<tr>
				  			<td><h4>Semestre</h4></td>
				  		<tr>
				    	<?php 
				    		$sql="
				    			SELECT * from semestre;";

	                            $stmt = $b ->busca($sql);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
	                                echo "<tr>";
	                                echo "<td>".$rs->nome_semestre."</td>";
	                                echo "</tr>";
	                            }
				    	?>
				  	</table>
					<input type="button" class="btn btn-default topElementos" value="Voltar" onclick="location.href='interface_semestre.php'"/>
					</div>
					</center>
			</div>
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>

<?php
	}
?>
