<!DOCTYPE html>

<!-- Esse Pode e do modelo para todas as outras paginas, com isso já adiciona o Nav bar, rodape e tambem o <head> do html com todas
	as importações necessarias

	Pagina do bootstrap para ver os componentes existentes e usa -los 

									http://getbootstrap.com/components/
	
	La pode ser varios exemplos que podem ser usados! Eles permitem que customize via CSS também. 
	Criem seus css na pasta css! E cada pessoas crie seu css! Não esqueçam de importar eles no arquivo head.html.

-->
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
		
<?php  $nome=$_GET['nome']; echo $nome;?>
		<div class="container panel panel-default">
			<?php include("nav.html"); ?>

			<div class="table espacamento">
				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading">Dados do Docente</div>
					<!-- Table -->
				  	<table class="table" BORDER RULES=all>
				  		<tr>
				  			
				  			<td><h4>Professor</h4></td>
				  			<td><h4>Disciplina</h4></td>
				  			<td><h4>Codigo</h4></td>
				  			<td><h4>Turma</h4></td>
				  			<td><h4>Semestre</h4></td>
				  							  			
				  		<tr>
							
				    	<?php 
				    		$sql="
				    			SELECT  P.nome_professor, D.nome_disciplina, D.cod_disciplina, T.nome_turma, T.nome_semestre
				    			  FROM `professor`P  JOIN disciplina D ON D.id_area=P.id_area JOIN turma T ON T.siape_professor=P.siape_professor
				    			    WHERE P.nome_professor='".$_POST[nome]."' ;
				    			";

	                            $stmt = $b ->busca($sql);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
	                                echo "<tr>";
	                                
	                                echo "<td>".$rs ->nome_professor."</td>";
	                                echo "<td>".$rs->nome_disciplina."</td>";
	                                echo "<td>".$rs->cod_disciplina."</td>";
	                                echo "<td>".$rs->nome_turma."</td>";
	                                echo "<td>".$rs->nome_semestre."</td>";
	                                
	                                echo "</tr>";
	                            }


				    	?>
				  	</table>
				</div>
			</div>	


		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>


<?php
	}
?>
