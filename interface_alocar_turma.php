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
	<?php include("head.html"); 
	$str = "<select size=\"1\" class=\"form-control \" name=\"dias[]\" > ";
	$stmt = $b ->busca("select * from dia_semana");
	while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
		$str= $str."<option> ".$rs -> nome_dia_semana."</option>";		 
	}
	$str=$str."</select>";
	?>	
 
<script>

var counter = 1;
var limit = 3;
function addInput(divName,idHora){
     if (counter == limit)  {
          alert("Número Limite de Horários Atingido ");
     }
     else {		 
		  var lista= <?php echo json_encode($str); ?>;
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<div class='input-group sizeMedio topElementos'>  <span class='input-group-addon sizePequeno' id='sizing-addon2'> Horário da Aula "+ (counter) +"</span>"+"<input type='text' class='form-control' name='horario[]' placeholder='Horário de Início, Ex: 14' aria-describedby='sizing-addon2'> <input type='text' class='form-control' name='horario[]' placeholder='Horário Final, Ex: 16:30' aria-describedby='sizing-addon2'>"+lista+"</div>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
          document.getElementById(idHora).value="Adicionar Outro Horário";
     }
     
}

</script>

	<body>

		<div class="container panel panel-default">
			<?php include("nav.html"); ?>
			</br></br>
			<form action = "turmaAlocar.php" method = "POST" onsubmit = "">
				<div class="panel panel-default jumbotron">	
					<div id="vpav"></div> 
					<div class="input-group sizeMedio" >
	  					<span class="input-group-addon sizePequeno" id="sizing-addon2"> Pavilhão</span>
						<select size="1" class="form-control " name="pav" id="pav"  > ";
						<?php $stmt = $b ->busca("select * from pavilhao");
						while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
						echo "<option> ".$rs -> nome_pavilhao."</option>";		 
							}
						?>
						</select>	
	  				</div>
					<div class="input-group sizeMedio" >
	  					<span class="input-group-addon sizePequeno" id="sizing-addon2">Número da Sala</span>
						<input type="text" class="form-control" id = "sala" name="sala" placeholder="Número da Sala" aria-describedby="sizing-addon2">
					</div>
	  				<div class="input-group sizeMedio" >
						<span class="input-group-addon sizePequeno" id="sizing-addon2"> Código da Disciplina</span>
						<select size="1" class="form-control " name="disciplina" onChange=""> ";
						<?php $stmt = $b ->busca("select * from disciplina");
						while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
						echo "<option value=".$rs -> cod_disciplina."> ".$rs -> cod_disciplina." - ".$rs -> nome_disciplina."</option>";		 
							}
						?>
						</select>
	  				</div>
	  				<div class="input-group sizeMedio" >
	  					<span class="input-group-addon sizePequeno" id="sizing-addon2"> Nome Turma</span>
	  					<input type="text" class="form-control" id = "turma" name="turma" placeholder="Nome da Turma" aria-describedby="sizing-addon2">
	  				</div>
	  				<div class="input-group sizeMedio" >
	  					<span class="input-group-addon sizePequeno" id="sizing-addon2"> Semestre</span>
						<select size="1" class="form-control " name="semestre" > ";
						<?php $stmt = $b ->busca("select * from semestre");
						while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
						echo "<option> ".$rs -> nome_semestre."</option>";		 
							}
						?>
						</select>
					</div>
					<div class="input-group" id="div_dinamic">
						
					</div>	
					<input type="submit" id = "bm" class="btn btn-default topElementos" value="Cadastrar" />
					<input type="button" id = "addHora" onClick="addInput('div_dinamic','addHora');" class="btn btn-default topElementos" value="Adicionar Horário" />
				</div>
			</form>	
		</div><!-- container-->
		<?php include("foot.html"); ?>
	</body>
</html>

<?php
	}
?>
