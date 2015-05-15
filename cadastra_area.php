<?php
$c -> pagina_anterior("pav");
		include_once("banco/banco.php"); 
        $b = new Database();

$area=$_GET['q'];
$sigla=$_GET['s'];

$sql_terminalidade = Select("select max(id) cod from area"); //selecionando o ultimo id inserido para determinar o próximo
$rs_mt=  mysql_fetch_array($sql_terminalidade);
$max_id=$rs_mt['cod']+1;//incremento que define o nome id a ser inserido
$sql_terminalidade = Select("insert into area(id,nome,sigla) value($max_id,'$area','$sigla')"); //insei
                      
 $sql_area = Select("select*from area where id>0");
  $area="";
  echo "Áreas Cadastradas: </br>";
                         while ($rs = mysql_fetch_array($sql_area)) {                       
                         $cod=$rs['id'];
                         
                            $area.="<input id='area$cod' name='area$cod' value='$rs[sigla] - $rs[nome]' readonly='readonly' style='width:220px; height:22px'>
                           
                           
                                <a href='# $cod' onclick='excluir_area(this.href)'><img src='../../imagens/excluir.png' style='widith: 4%; height: 4%'></a>
                                <a href='# $cod' onclick='alterar_area(this.href)'><img src='../../imagens/alterar.png' style='widith: 4%; height: 4%'></a><br>
                          ";
                        }
                        
                        echo $area;