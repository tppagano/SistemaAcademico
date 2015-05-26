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
    <meta charset="UTF-8">
    <title>Consulta Turma</title>
	<?php include("head.html"); ?>	
	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>

			<div class="table espacamento">
				<div class="panel panel-default">
                                    
                                    <div class="panel panel-default jumbotron">	
					<div id="vpav"></div>
					<div class="input-group">  
						<span class="input-group-addon"  id="sizing-addon2"> Área </span>
                                                <select type="text" class="form-control" id = "nome" name="area" onchange="busca_area(this.value)">
                                                    <option></option>
                                                    
                                                    <?php
                                                    $sql_area="SELECT nome_area,id_area from area";
                                                     $stmt = $b ->busca($sql_area);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                                        echo "<option value='".$rs->id_area."'>".$rs->nome_area."</option>";
                                    }
                                                    ?>
                                                </select>
	  				</div>
					
				</div>
					<!-- Default panel contents -->
					<div class="panel-heading">Horario Turmas</div>
					<!-- Table -->
				  	<table class="table" BORDER RULES=all>
				  		<tr>
				  			<td><h4>Cod. Disciplina</h4></td>
				  			<td><h4>Disciplina</h4></td>
				  			<td><h4>Turma</h4></td>
				  			<td><h4>Área</h4></td>
				  			<td><h4>Horário Inicial</h4></td>
				  			<td><h4>Horário Final</h4></td>
				  			<td><h4>Dia</h4></td>
				  			<td><h4>Carga Horaria</h4></td>
				  			<td><h4>Sala</h4></td>
				  			<td><h4>Pavilhão</h4></td>
				  			<td><h4>Professor</h4></td>
				  		<tr>
				    	<?php 
				    		$sql="
				    			select d.cod_disciplina COD_DISCIPLINA, d.nome_disciplina DISCIPLINA,d.carga_horaria_disciplina CARGA_HORARIA, 
                                                        p.nome_professor PROFESSOR, a.nome_area AREA, t.nome_turma TURMA,ds.nome_dia_semana DIA, th.horario_inicial INICIO,th.horario_final TERMINO,
                                                        pv.nome_pavilhao PAVILHAO, s.numero_sala SALA from area a, disciplina d, professor p, turma t, horario_turma th, turma_sala ts, dia_semana ds,
                                                        sala s, pavilhao pv where d.id_area=a.id_area and t.cod_disciplina=d.cod_disciplina and ts.id_turma=t.id_turma 
                                                        AND ts.id_horario=th.id_horario and th.id_dia_semana=ds.id_dia_semana and pv.id_pavilhao=s.id_pavilhao and a.id_area=$_GET[area]
				    			";

	                            $stmt = $b ->busca($sql);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
	                                echo "<tr>";
	                                echo "<td>".$rs->COD_DISCIPLINA."</td>";
	                                echo "<td>".$rs->DISCIPLINA."</td>";
	                                echo "<td>".$rs->TURMA."</td>";
	                                echo "<td>".$rs->AREA."</td>";
	                                echo "<td>".$rs->INICIO."</td>";
	                                echo "<td>".$rs->TERMINO."</td>";
	                                echo "<td>".$rs->DIA."</td>";
	                                echo "<td>".$rs->CARGA_HORARIA."</td>";
	                                echo "<td>".$rs->SALA."</td>";
	                                echo "<td>".$rs->PAVILHAO."</td>";
	                                echo "<td>".$rs->PROFESSOR."</td>";
	                             
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
