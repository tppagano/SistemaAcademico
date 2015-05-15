<?php
$c -> pagina_anterior("pav");
		include_once("banco/banco.php"); 
        $b = new Database();

$id=$_GET['q'];

  
$b -> query("delete from area where id=$id");//apagando a área de conhecimento 
  

  $area="";
   echo "Áreas Cadastradas: </br>";
                         $sql = "select*from area where id>0";
                         $stmt = $b ->busca($sql);
	                            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){                      
                         $cod=$rs['id'];
                         
                            $area.="<input id='terminalidade$cod' name='terminalidade$cod' value='$rs[sigla] - $rs[nome]' readonly='readonly' style='width:220px; height:22px'>
                           
                           
                                <a href='#$cod' onclick='excluir_area(this.href)'><img src='../../imagens/excluir.png' style='widith: 4%; height: 4%'></a>
                                <a href='#$cod' onclick='alterar_area(this.href)'><img src='../../imagens/alterar.png' style='widith: 4%; height: 4%'></a><br>
                          ";
                        }
                        
                        echo $area;